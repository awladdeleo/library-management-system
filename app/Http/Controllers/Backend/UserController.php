<?php

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\UserStoreRequest;
use App\Http\Requests\Backend\User\UserUpdateRequest;
use App\Models\User;
use App\Services\User\UserService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::withTranslation()
            ->translatedIn(app()->getLocale())
            ->get();

        return view('backend.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $data = UserService::serializeData($request);
        User::create($data);
        Toastr::success(__('user.UserAdded'), __('user.Users'));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('backend.users.edit',$data);
    }


    /**
     * @param UserUpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $data = UserService::updateSerializeData($request);
        $user->update($data);
        Toastr::success(__('user.UserUpdated'), __('user.Users'));
        return back();
    }


    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();
        Toastr::success(__('user.UserDeleted'), __('user.Users'));
        return back();
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activeUser(User $user){
        $user->status = $user->status ? false : true;
        $user->update();
        Toastr::success(__('translation.StatusUpdated'), __('user.Users'));
        return back();
    }
}
