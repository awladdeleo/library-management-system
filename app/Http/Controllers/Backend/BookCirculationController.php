<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Circulation\IssueBookRequest;
use App\Http\Requests\Backend\Circulation\ReturnBookRequest;
use App\Models\Book;
use App\Models\BookCirculation;
use App\Models\User;
use App\Services\Book\BookService;
use App\Services\MailService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BookCirculationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function issueBook(){
        $data['issuebooks'] = BookCirculation::with('book','user')
            ->orderBy('id','desc')
            ->paginate(10);
        return view('backend.circulations.index',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createIssueBook(){
        $data['users'] = User::withTranslation()
            ->translatedIn(app()->getLocale())
            ->onlyUser()
            ->orderBy('id','desc')
            ->get();

        $data['books'] = Book::withTranslation()
            ->translatedIn(app()->getLocale())
            ->orderBy('id','desc')
            ->get();

        return view('backend.circulations.create',$data);
    }

    /**
     * @param IssueBookRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitIssueBook(IssueBookRequest $request){
        $books = $request->input('book_name');
        $validateData = [];

        // if true , user already have 5 books.
        if(BookService::quantityCheck($request->input('user_name') ,$books)){
            return back();
        }

        foreach ($books as $book){
            array_push($validateData,[
                'user_id' => $request->input('user_name'),
                'book_id' => $book,
                'status' => BookCirculation::CIRCULATION_STATUS['Issued'],
                'issue_date' => now(),
                'return_date' => date('Y-m-d' , strtotime($request->input('return_date'))),
                'issue_note' => $request->input('note')
            ]);
        }

        BookCirculation::insert($validateData);

        try{
            MailService::sendNotification($request->input('user_name'));
        }catch (\Exception $exception){}

        Toastr::success(__('circulation.BookIssuedAdded'), __('circulation.BookCirculation'));

        return back();
    }

    /**
     * @param BookCirculation $bookCirculation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function view(BookCirculation $bookCirculation){
        $data['issuebook'] = $bookCirculation->load('book','user');
        return view('backend.circulations.show',$data);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function returnBook(User $user){
        $data['books'] = BookCirculation::with('user','book')
            ->where('user_id',$user->id)
            ->where('status',BookCirculation::CIRCULATION_STATUS['Issued'])
            ->get();

        if(!count($data['books'])) return redirect()->route('circulations.issue');

        return view('backend.circulations.return_book',$data);
    }

    public function submitReturnBook(ReturnBookRequest $request, User $user){
        $issuedIds = $request->input('book_name');

        BookCirculation::whereIn('id',$issuedIds)
            ->where('user_id',$user->id)
            ->update([
               'status' => BookCirculation::CIRCULATION_STATUS['Returned'],
               'return_note' => $request->input('note'),
               'return_date' => now()
            ]);

        Toastr::success(__('circulation.BookReturned'), __('circulation.BookCirculation'));

        return redirect()->route('circulations.return.book',$user->id);
    }
}
