@extends('backend.layouts.main')
@section('title'){{__('user.EditUser')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('users.index')}}" class="text-muted">{{ __('user.UserList') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('user.EditUser') }}</a>
            </li>
        </x-backend.partial.page-header>

        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Advance Table Widget 5-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title font-weight-normal">{{ __('user.EditUser') }}</h3>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open(array('route' =>['users.update',$user->id], 'method'=>'patch','id'=>'user-form')) !!}

                    <div class="card-body">

                        <x-backend.form.input type="text"
                                              name="name"
                                              :title="__('user.Name')"
                                              :value="old('name',$user->name)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('user.EnterYourName')"
                                              required="true"
                                              className=""></x-backend.form.input>

                        <x-backend.form.input type="text"
                                              name="phone"
                                              :title="__('user.Phone')"
                                              :value="old('phone',$user->phone)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('user.EnterYourPhone')"
                                              required="true"
                                              className=""></x-backend.form.input>



                        <x-backend.form.input type="email"
                                              name="email"
                                              :title="__('user.Email')"
                                              locale=""
                                              :value="old('email',$user->email)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('user.EnterYourEmail')"
                                              required="true"
                                              className=""></x-backend.form.input>


                        <x-backend.form.input-file type="file"
                                                   name="image"
                                                   :title="__('user.Image')"
                                                   :value="$user->image"
                                                   labelClass="col-md-2 col-sm-3 text-md-right"
                                                   inputClass="col-md-6 col-sm-7"
                                                   :path="$user->has_image"
                                                   :placeholder="__('user.UploadUserImage')"
                                                   required=""
                                                   :text="__('user.UserImageDimension')">

                        </x-backend.form.input-file>





                    </div>

                    <div class="card-footer">
                        <x-backend.form.form-button className="col-md-6 offset-md-2 col-sm-7 offset-sm-3"
                                                    :submit="__('user.AddUser')"
                                                    :reset="__('translation.Reset')"></x-backend.form.form-button>
                    </div>

                {!! Form::close() !!}
                <!--end::Form-->
                </div>
                <!--end::Advance Table Widget 5-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@stop

@push('script')
    {!! JsValidator::formRequest('App\Http\Requests\Backend\User\UserUpdateRequest', '#user-form'); !!}

@endpush