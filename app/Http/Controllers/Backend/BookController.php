<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Book\BookStoreRequest;
use App\Models\Book;
use App\Services\Book\BookService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['books'] = Book::withTranslation()
            ->translatedIn(app()->getLocale())
            ->get();

        return view('backend.books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.books.create');
    }


    /**
     * @param BookStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookStoreRequest $request)
    {
        $data = BookService::serializeData($request);
        Book::create($data);
        Toastr::success(__('book.BookAdded'), __('book.Books'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $data['book'] = $book;
        return view('backend.books.edit',$data);
    }



    public function update(BookStoreRequest $request, Book $book)
    {
        $data = BookService::updateSerializeData($request);
        $book->update($data);
        Toastr::success(__('book.BookUpdated'), __('book.Books'));
        return back();
    }


    /**
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();
        Toastr::success(__('book.BookDeleted'), __('book.Books'));
        return back();
    }


    /**
     * @param Book $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activeBook(Book $book)
    {
        $book->status = $book->status ? false : true;
        $book->update();
        Toastr::success(__('translation.StatusUpdated'), __('book.Books'));
        return back();
    }
}
