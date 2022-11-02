@extends('backend.layouts.main')
@section('title'){{__('book.EditBook')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('books.index')}}" class="text-muted">{{ __('book.BookList') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('book.EditBook') }}</a>
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
                        <h3 class="card-title font-weight-normal">{{ __('book.EditBook') }}</h3>
                    </div>
                    <!--begin::Form-->
                    {!! Form::open(array('route' =>['books.update',$book->id], 'method'=>'patch','id'=>'book-form')) !!}

                    <div class="card-body">
                        <x-backend.form.input type="text"
                                              name="title"
                                              :title="__('book.Title')"
                                              :value="old('title',$book->title)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('book.EnterTitle')"
                                              required="true"
                                              className="">
                        </x-backend.form.input>

                        <x-backend.form.input type="text"
                                              name="isbn"
                                              :title="__('book.ISBNNumber')"
                                              :value="old('isbn',$book->isbn_number)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('book.EnterISBNNumber')"
                                              required="true"
                                              className="">
                        </x-backend.form.input>


                        <x-backend.form.input type="text"
                                              name="author"
                                              :title="__('book.Author')"
                                              :value="old('author',$book->author)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('book.EnterAuthor')"
                                              required="true"
                                              className="">
                        </x-backend.form.input>

                        <x-backend.form.input type="text"
                                              name="genre"
                                              :title="__('book.Genre')"
                                              :value="old('genre',$book->genre)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('book.EnterGenre')"
                                              required="true"
                                              className="">
                        </x-backend.form.input>

                        <x-backend.form.input type="number"
                                              name="quantity"
                                              :title="__('book.Quantity')"
                                              :value="old('quantity',$book->quantity)"
                                              labelClass="col-md-2 col-sm-3 text-md-right"
                                              inputClass="col-md-6 col-sm-7"
                                              :placeholder="__('book.EnterQuantity')"
                                              required="true"
                                              className="">
                        </x-backend.form.input>

                        <div class="form-group row">
                            <label for="description"
                                   class="col-form-label col-md-2 col-sm-3 text-md-right font-weight-bold">{{ __('book.Description') }}
                            </label>

                            <div class="col-md-6 col-sm-7 ">
                                 <textarea style="resize: none" name="description" rows="5" id="description"
                                           class="summernote form-control field-validate {{$errors->has('description') ? 'is-invalid' :'' }}">{{old('description',$book->description)}}</textarea>
                                <span class="form-text text-muted ">{{ __('book.EnterDescription') }}</span>
                            </div>


                            @if($errors->has('description'))
                                <div class="invalid-feedback">{{$errors->first('description')}}</div>
                            @endif

                        </div>


                        <x-backend.form.input-file type="file"
                                                   name="thumbnail"
                                                   :title="__('book.Thumbnail')"
                                                   :value="$book->thumbnail"
                                                   labelClass="col-md-2 col-sm-3 text-md-right"
                                                   inputClass="col-md-6 col-sm-7"
                                                   :path="$book->has_thumbnail"
                                                   :placeholder="__('book.UploadBookThumbnail')"
                                                   required=""
                                                   :text="__('book.BookThumbnailDimension')">

                        </x-backend.form.input-file>


                    </div>

                    <div class="card-footer">
                        <x-backend.form.form-button className="col-md-6 offset-md-2 col-sm-7 offset-sm-3"
                                                    :submit="__('book.EditBook')"
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
    {!! JsValidator::formRequest('App\Http\Requests\Backend\Book\BookStoreRequest', '#book-form'); !!}

    <script type="text/javascript">
        $('.summernote').summernote({
            height: 200
        });
    </script>
@endpush