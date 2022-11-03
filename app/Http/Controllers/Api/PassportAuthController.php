<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LoginRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class PassportAuthController extends ApiBaseController
{


    /**
     * @OA\Post(
     *      path="/login",
     *      summary="Sign in",
     *      description="Login by email and password",
     *      operationId="login",
     *      summary="Login",
     *      tags={"Authentication"},
     *      @OA\RequestBody(
     *          required=true,
     *          description="Give User Credentials - (Email, Password)",
     *          @OA\JsonContent(
     *              required={"email","password"},
     *              @OA\Property(property="email", type="string", format="email", example="admin@mail.com"),
     *              @OA\Property(property="password", type="string", format="password", example="12345678")
     *          ),
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."),
     *              @OA\Property(property="user", type="object"),
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Error: Bad Request",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Your credentials are incorrect. Please try again")
     *          )
     *      )
     * )
     *
     */

    public function login(LoginRequest $request)
    {
        try{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

                $user = Auth::user();
                $success['token'] =  $user->createToken('authToken')->accessToken;
                $success['user'] =  $user;

                return $this->sendResponse($success, 'User login successfully.');
            }
            else{
                return $this->sendError('Unauthorised.', ['error'=>'Your credentials are incorrect. Please try again']);
            }
        }catch (\Exception $ex){
            return $this->sendError('Unauthorised', ['error'=>$ex->getMessage()]);
        }

    }

}
