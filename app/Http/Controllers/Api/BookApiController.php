<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Book\BookStoreRequest;
use App\Http\Resources\BookHasUserResource;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\BookCirculation;
use App\Services\Book\BookService;
use Illuminate\Http\Request;

class BookApiController extends ApiBaseController
{

    /**
     * @OA\Get(
     *      path="/books",
     *      summary="Book",
     *      operationId="getAllBookList",
     *      summary="List of books ",
     *      tags={"Books List"},
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
     *          example="awlad",
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

    public function index()
    {
        $books = Book::withTranslation()
            ->translatedIn(app()->getLocale())
            ->search(request()->input('query'))
            ->paginate(10);

        return BookResource::collection($books);
    }

    /**
     * @OA\Post(
     *      path="/books",
     *      summary="Book store",
     *      description="Create a book",
     *      operationId="createBook",
     *      summary="Create a book",
     *      tags={"Book Store"},
     *      @OA\Parameter(
     *          name="title",
     *          description="book title",
     *          in="query",
     *          required=true,
     *          example="Physics",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *          name="author",
     *          description="author name",
     *          in="query",
     *          required=true,
     *          example="Awlad hossain",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="genre",
     *          description="book genre",
     *          in="query",
     *          required=true,
     *          example="Tech",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="isbn",
     *          description="isbn number",
     *          in="query",
     *          required=true,
     *          example="12345",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="description",
     *          description="description",
     *          in="query",
     *          required=false,
     *          example="description",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="quantity",
     *          description="book quantity",
     *          in="query",
     *          required=true,
     *          example="12",
     *          @OA\Schema(type="integer")
     *      ),
     *     @OA\Parameter(
     *          name="thumbnail",
     *          description="book image",
     *          in="query",
     *          required=false,
     *          example="",
     *          @OA\Schema(type="file")
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


    public function store(BookStoreRequest $request)
    {
        $data = BookService::serializeData($request);
        $book = Book::create($data);

        return $this->sendResponse(new BookResource($book),__('book.BookAdded'));
    }


    /**
     * @OA\Get(
     *      path="/books/{book_id}",
     *      summary="Book user list",
     *      operationId="getBookUserList",
     *      summary="List of users that book has ",
     *      tags={"Book user list"},
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
     *          description="Search for user related info e.g = name,phone",
     *          in="query",
     *          required=false,
     *          example="book 1",
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

    public function show(Book $book)
    {
        $issuebooks = BookCirculation::with('user','book')
            ->where('book_id',$book->id)
            ->orderBy('id','desc')
            ->whereHas('user',function ($query){
                $query->search(request()->input('query'));
            })
            ->paginate(10);

        return BookHasUserResource::collection($issuebooks);
    }


    /**
     * @OA\Patch(
     *      path="/books/{book_id}",
     *      summary="Book update",
     *      description="Update a book",
     *      operationId="updateBook",
     *      summary="Update a book",
     *      tags={"Book Update"},
     *      @OA\Parameter(
     *          name="title",
     *          description="book title",
     *          in="query",
     *          required=true,
     *          example="Physics",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *          name="author",
     *          description="author name",
     *          in="query",
     *          required=true,
     *          example="Awlad hossain",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="genre",
     *          description="book genre",
     *          in="query",
     *          required=true,
     *          example="Tech",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="isbn",
     *          description="isbn number",
     *          in="query",
     *          required=true,
     *          example="12345",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="description",
     *          description="description",
     *          in="query",
     *          required=false,
     *          example="description",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="quantity",
     *          description="book quantity",
     *          in="query",
     *          required=true,
     *          example="12",
     *          @OA\Schema(type="integer")
     *      ),
     *     @OA\Parameter(
     *          name="thumbnail",
     *          description="book image",
     *          in="query",
     *          required=false,
     *          example="",
     *          @OA\Schema(type="file")
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


    public function update(BookStoreRequest $request, Book $book)
    {
        $data = BookService::updateSerializeData($request);
        $book->update($data);
        return new BookResource($book);
    }


    /**
     * @OA\Delete(
     *      path="/books/{book_id}",
     *      summary="Book",
     *      description="Delete a book",
     *      operationId="deleteBook",
     *      summary="Delete a book",
     *      tags={"Book Delete"},
     *      @OA\Parameter(
     *          name="book_id",
     *          description="Book id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
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
     *      ),
     *     @OA\Response(
     *          response=404,
     *          description="Error: Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Not found")
     *          )
     *      )
     * )
     *
     * Remove the specified resource from storage.
     *
     */

    public function destroy(Book $book)
    {
        $book->delete();
        return $this->sendResponse([], __('book.BookDeleted'));
    }
}
