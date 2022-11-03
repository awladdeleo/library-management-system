@extends('backend.layouts.main')
@section('title'){{__('circulation.ReturnBook')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('circulations.issue')}}" class="text-muted">{{ __('circulation.IssuedBookList') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('circulation.ReturnBook') }}</a>
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
                        <h3 class="card-title font-weight-normal">{{ __('circulation.ReturnBook') }}</h3>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open(array('route' =>['circulations.submit.return.book',$books[0]->user_id], 'method'=>'patch','id'=>'return-form')) !!}

                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group row">

                                    <label for="book_name"
                                           class="col-form-label font-weight-bold col-md-2 col-sm-3 text-md-right">{{__('circulation.BookName') }}
                                        <span class="text-danger">*</span></label>

                                    <div class="@if($errors->has('book_name')) div-invalid @endif col-md-8 col-sm-9">

                                        <select class="form-control select2 @if($errors->has('book_name')) is-invalid @endif"
                                                id="kt_select2_3" name="book_name[]" multiple="multiple">

                                            @foreach($books as $item)
                                                <option value="{{$item->id}}">{{$item->book->title}}</option>
                                            @endforeach

                                        </select>


                                        @if($errors->has('book_name'))
                                            <div class="invalid-feedback">{{$errors->first('book_name')}}</div>
                                        @endif

                                        <span class="form-text text-muted ">{{ __('circulation.MultipleBook') }}</span>

                                    </div>

                                </div>


                                <x-backend.form.text-area name="note"
                                                          :title="__('circulation.Note')"
                                                          :value="old('note')"
                                                          labelClass="col-md-2 col-sm-3 text-md-right"
                                                          inputClass="col-md-8 col-sm-9"
                                                          :placeholder="__('circulation.EnterNote')"
                                                          required=""
                                                          className="">
                                </x-backend.form.text-area>

                                <x-backend.form.form-button className="col-md-8 offset-md-2 col-sm-9 offset-sm-3"
                                                            :submit="__('circulation.IssueBook')"
                                                            reset="">

                                </x-backend.form.form-button>

                            </div>
                            <div class="col-6">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label font-weight-bolder text-dark">{{ __('circulation.BookBelongsToUser') }}</span>
                                </h3>

                                <div class="table-responsive">
                                    <table class="table table-borderless table-vertical-center">
                                        <thead>
                                        <tr>
                                            <th class="p-0 w-40px text-left">{{__('book.Thumbnail')}}</th>
                                            <th class="p-0 min-w-100px text-center">{{__('book.Title')}}</th>
                                            <th class="p-0 min-w-100px text-center">{{__('circulation.BookDetails')}}</th>
                                            <th class="p-0 min-w-100px text-right">{{__('circulation.IssueDate')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($books as $book)
                                            <tr>
                                                <td class="pl-0 py-4">
                                                    <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                                        <div class="symbol-label" style="background-image: url({{  $book->book->thumbnail }})"></div>
                                                    </div>
                                                </td>
                                                <td class="pl-0 text-center">
                                                    <a href="#"
                                                       class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $book->book->title }}</a>
                                                </td>
                                                <td class="text-center">
                                                    <p class="text-dark-75 font-weight-bolder d-block font-size-md mb-0">{{__('book.Author')}} : {{ $book->book->author }}</p>
                                                    <p class="text-muted font-weight-500">{{__('book.Genre')}} : {{ $book->book->genre }}</p>
                                                </td>

                                                <td class="text-right">
                                                    <span class="label label-lg label-light-primary label-inline">{{ $book->issue_date->format('d F, Y') }}</span>
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

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
    {!! JsValidator::formRequest('App\Http\Requests\Backend\Circulation\ReturnBookRequest', '#return-form'); !!}

    <script src="{{ asset('backend/js/pages/crud/forms/widgets/bootstrap-datepicker62fd.js') }}"></script>


    <script type="text/javascript">
        $('.summernote').summernote({
            height: 200
        });

        $('#kt_select2_3').select2({
            placeholder: '{{__('circulation.SelectBookName')}}',
            allowClear: false
        });

    </script>
@endpush