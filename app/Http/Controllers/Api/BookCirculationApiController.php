<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Circulation\IssueBookRequest;
use App\Http\Requests\Backend\Circulation\ReturnBookRequest;
use App\Http\Resources\IssuedBookResource;
use App\Models\BookCirculation;
use App\Models\User;
use App\Services\Book\BookService;
use App\Services\MailService;
use Illuminate\Http\Request;

class BookCirculationApiController extends ApiBaseController
{

    /**
     * @OA\Get(
     *      path="/book-circulations",
     *      summary="Book Circulation",
     *      operationId="getAllIssuedBookList",
     *      summary="List of books ",
     *      tags={"Circulated Books List"},
     *      security={{"bearer_token":{}}},
     *     @OA\Header(
     *      header="x-lang",
     *       description="set x-lang=en or bn for specific language data",
     *       @OA\Schema(
     *       type="string",
     *       )
     *   ),
     *      @OA\Parameter(
     *          name="page",
     *          description="Page number for pagination",
     *          in="query",
     *          required=false,
     *          example="1",
     *          @OA\Schema(type="integer")
     *      ),
     *     @OA\Parameter(
     *          name="query",
     *          description="Search for book related info e.g = title,author,genre",
     *          in="query",
     *          required=false,
     *          example="book name",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="200"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Bad Request")
     *          )
     *      ),
     *     @OA\Response(
     *          response=401,
     *          description="Error: Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthenticated")
     *          )
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Error: Forbidden",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Forbidden")
     *          )
     *      )
     * )
     *
     * Display a listing of the resource.
     *
     */

    public function issueBookList(){
        $issuebooks = BookCirculation::with('book','user')
            ->orderBy('id','desc')
            ->paginate(10);

        return IssuedBookResource::collection($issuebooks);
    }

    /**
     * @OA\Post(
     *      path="/book-circulations",
     *      summary="Book Issue",
     *      description="Issue or Return book",
     *      operationId="createIssueBook",
     *      summary="Create Issue book",
     *      tags={"Book Issue"},
     *      @OA\Parameter(
     *          name="user_name",
     *          description="user id",
     *          in="query",
     *          required=true,
     *          example="1",
     *          @OA\Schema(type="integer")
     *      ),
     *     @OA\Parameter(
     *          name="book_name",
     *          description="list of book id",
     *          in="query",
     *          required=true,
     *          example="[1,2,3]",
     *          @OA\Schema(type="object")
     *      ),
     *      @OA\Parameter(
     *          name="return_date",
     *          description="book return date",
     *          in="query",
     *          required=true,
     *          example="05-11-2022",
     *          @OA\Schema(type="date")
     *      ),
     *      @OA\Parameter(
     *          name="note",
     *          description="issue note",
     *          in="query",
     *          required=false,
     *          example="text note",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Response(
     *          response=201, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="201"),
     *             @OA\Property(property="data",type="string")
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content"
     *      )
     * )
     *
     * Store a newly created resource in storage.
     *
     */


    public function submitIssueBook(IssueBookRequest $request){

        $books = $request->input('book_name');
        $validateData = [];

        // if true , user already have 5 books.
        if(BookService::quantityCheck($request->input('user_name') ,$books)){
            return $this->sendResponse([],__('circulation.QuantityGreaterThanFive'));
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

        return $this->sendResponse([],__('circulation.BookIssuedAdded'));
    }


    /**
     * @OA\Patch(
     *      path="/book-circulations/return-book/{user_id}/submit",
     *      summary="return book",
     *      description="return issue book",
     *      operationId="returnBook",
     *      summary="return an issue book",
     *      tags={"Return Book"},
     *     @OA\Parameter(
     *          name="book_name",
     *          description="list of book id",
     *          in="query",
     *          required=true,
     *          example="[1,2,3]",
     *          @OA\Schema(type="object")
     *      ),
     *      @OA\Parameter(
     *          name="note",
     *          description="return note",
     *          in="query",
     *          required=false,
     *          example="text note",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Response(
     *          response=201, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(property="status", type="integer", example="201"),
     *             @OA\Property(property="data",type="object")
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Content"
     *      )
     * )
     *
     * Store a newly created resource in storage.
     *
     */

    public function submitReturnBook(ReturnBookRequest $request, User $user){
        $issuedIds = $request->input('book_name');

        BookCirculation::whereIn('id',$issuedIds)
            ->where('user_id',$user->id)
            ->update([
                'status' => BookCirculation::CIRCULATION_STATUS['Returned'],
                'return_note' => $request->input('note'),
                'return_date' => now()
            ]);

        return $this->sendResponse([],__('circulation.BookReturned'));

    }
}
