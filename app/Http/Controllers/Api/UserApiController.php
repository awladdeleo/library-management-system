<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Book\BookStoreRequest;
use App\Http\Requests\Backend\User\UserStoreRequest;
use App\Http\Requests\Backend\User\UserUpdateRequest;
use App\Http\Resources\UserHasBookResource;
use App\Http\Resources\UserResource;
use App\Models\Book;
use App\Models\BookCirculation;
use App\Models\User;
use App\Services\Book\BookService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserApiController extends ApiBaseController
{

    /**
     * @OA\Get(
     *      path="/users",
     *      summary="User",
     *      operationId="getUserList",
     *      summary="List of users ",
     *      tags={"Users List"},
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
     *          description="Search for users related info e.g = name,phone",
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

        $users = User::withTranslation()
            ->translatedIn(app()->getLocale())
            ->search(request()->input('query'))
            ->paginate(10);

        return UserResource::collection($users);
    }

    /**
     * @OA\Post(
     *      path="/users",
     *      summary="User store",
     *      description="Create a user",
     *      operationId="createUser",
     *      summary="Create a user",
     *      tags={"Users Store"},
     *      @OA\Parameter(
     *          name="name",
     *          description="user name",
     *          in="query",
     *          required=true,
     *          example="Awlad de leo",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *          name="phone",
     *          description="user phone number",
     *          in="query",
     *          required=true,
     *          example="01856214523",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="user email",
     *          in="query",
     *          required=true,
     *          example="abc@mail.com",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *          name="image",
     *          description="user image",
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

    public function store(UserStoreRequest $request)
    {
        $data = UserService::serializeData($request);
        $user = User::create($data);
        return new UserResource($user);
    }



    /**
     * @OA\Get(
     *      path="/users/{user_id}",
     *      summary="User book list",
     *      operationId="getBookList",
     *      summary="List of books that user has ",
     *      tags={"User book list"},
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

    public function show(User $user)
    {

        $issuebooks = BookCirculation::with('book')
            ->where('user_id',$user->id)
            ->orderBy('id','desc')
            ->whereHas('book',function ($query){
                $query->search(request()->input('query'));
            })
            ->paginate(10);

        return UserHasBookResource::collection($issuebooks);
    }



    /**
     * @OA\Patch(
     *      path="/users/{user_id}",
     *      summary="User update",
     *      description="Update a user",
     *      operationId="updateUser",
     *      summary="update a user",
     *      tags={"Users Update"},
     *      @OA\Parameter(
     *          name="name",
     *          description="user name",
     *          in="query",
     *          required=true,
     *          example="Awlad de leo",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *          name="phone",
     *          description="user phone number",
     *          in="query",
     *          required=true,
     *          example="01856214523",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="user email",
     *          in="query",
     *          required=true,
     *          example="abc@mail.com",
     *          @OA\Schema(type="string")
     *      ),
     *     @OA\Parameter(
     *          name="image",
     *          description="user image",
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

    public function update(UserUpdateRequest $request, User $user)
    {
        $data = UserService::updateSerializeData($request);
        $user->update($data);
        return new UserResource($user);
    }


    /**
     * @OA\Delete(
     *      path="/users/{user_id}",
     *      summary="User",
     *      description="Delete a user",
     *      operationId="deleteUser",
     *      summary="Delete a user",
     *      tags={"User Delete"},
     *      @OA\Parameter(
     *          name="user_id",
     *          description="User id",
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

    public function destroy(User $user)
    {
        if($user->id != 1){
            $user->delete();
            return $this->sendResponse([], __('user.UserDeleted'));
        }
        return $this->sendResponse([], __('user.UserDeleted'));
    }
}
