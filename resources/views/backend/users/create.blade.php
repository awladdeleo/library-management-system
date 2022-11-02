@extends('backend.layouts.main')
@section('title'){{__('user.AddUser')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('users.index')}}" class="text-muted">{{ __('user.UserList') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('user.AddUser') }}</a>
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
                        <h3 class="card-title font-weight-normal">{{ __('user.AddUser') }}</h3>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open(array('route' =>'users.store', 'method'=>'post','id'=>'user-form')) !!}

                    <div class="card-body">

                        <x-backend.form.input type="text"
                                              name="name"
                                              :title="__('user.Name')"
                                              :value="old('name')"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('user.EnterYourName')"
                                              required="true"
                                              className=""></x-backend.form.input>

                        <x-backend.form.input type="text"
                                              name="phone"
                                              :title="__('user.Phone')"
                                              :value="old('phone')"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('user.EnterYourPhone')"
                                              required="true"
                                              className=""></x-backend.form.input>



                            <x-backend.form.input type="email"
                                                  name="email"
                                                  :title="__('user.Email')"
                                                  locale=""
                                                  :value="old('email')"
                                                  labelClass="col-md-2 col-sm-3 text-md-right"
                                                  inputClass="col-md-6 col-sm-7"
                                                  :placeholder="__('user.EnterYourEmail')"
                                                  required="true"
                                                  className=""></x-backend.form.input>


                            <x-backend.form.input-file type="file"
                                          name="image"
                                          :title="__('user.Image')"
                                          value=""
                                          labelClass="col-md-2 col-sm-3 text-md-right"
                                          inputClass="col-md-6 col-sm-7"
                                          path=""
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
    {!! JsValidator::formRequest('App\Http\Requests\Backend\User\UserStoreRequest', '#user-form'); !!}

@endpush