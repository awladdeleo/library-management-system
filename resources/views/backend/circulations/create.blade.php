@extends('backend.layouts.main')
@section('title'){{__('book.AddBook')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('books.index')}}" class="text-muted">{{ __('book.BookList') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('book.AddBook') }}</a>
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
                        <h3 class="card-title font-weight-normal">{{ __('book.AddBook') }}</h3>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open(array('route' =>'circulations.submit.issue', 'method'=>'post','id'=>'issue-form')) !!}

                    <div class="card-body">

                        <x-backend.form.select name="user_name"
                                  :option="$users"
                                  :optionText="__('circulation.SelectUserName')"
                                  :title="__('circulation.UserName')"
                                  :value="old('user_name')"
                                  labelClass="col-md-2 col-sm-3 text-md-right"
                                  inputClass="col-md-6 col-sm-7"
                                  placeholder=""
                                  required="true">
                        </x-backend.form.select>

                        <x-backend.form.select name="book_name"
                                               :option="$books"
                                               :optionText="__('circulation.SelectBookName')"
                                               :title="__('circulation.BookName')"
                                               :value="old('books')"
                                               labelClass="col-md-2 col-sm-3 text-md-right"
                                               inputClass="col-md-6 col-sm-7"
                                               placeholder="{{ __('circulation.MultipleBook') }}"
                                               required="true">
                        </x-backend.form.select>

                        <x-backend.form.date-form
                                name="return_date"
                                :title="__('circulation.ReturnDate')"
                                placeholder="{{ __('circulation.EnterReturnDate') }}"
                                labelClass="col-md-2 col-sm-3 text-md-right"
                                inputClass="col-md-6 col-sm-7"
                                required="true">
                        </x-backend.form.date-form>

                        <x-backend.form.text-area name="note"
                                              :title="__('circulation.Note')"
                                              :value="old('note')"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('circulation.EnterNote')"
                                              required=""
                                              className="">
                        </x-backend.form.text-area>



                    </div>

                    <div class="card-footer">
                        <x-backend.form.form-button className="col-md-6 offset-md-2 col-sm-7 offset-sm-3"
                                                    :submit="__('circulation.IssueBook')"
                                                    reset="">

                        </x-backend.form.form-button>
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
    {!! JsValidator::formRequest('App\Http\Requests\Backend\Circulation\IssueBookRequest', '#issue-form'); !!}

    <script src="{{ asset('backend/js/pages/crud/forms/widgets/bootstrap-datepicker62fd.js') }}"></script>


    <script type="text/javascript">
        $('.summernote').summernote({
            height: 200
        });

        $('#user_name').select2({
            placeholder: '{{__('circulation.SelectUserName')}}',
            allowClear: false
        });

        $('#kt_select2_3').select2({
            placeholder: '{{__('circulation.SelectBookName')}}',
            allowClear: false
        });

        $('#kt_datetimepicker_5').datetimepicker({
            format: 'DD-MM-yyyy',
            todayHighlight: true,
            defaultDate: new Date(),
            ignoreReadonly: true,
            minDate: moment(new Date(), 'DD-MM-yyyy')
        });
    </script>
@endpush