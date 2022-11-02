@extends('backend.layouts.main')
@section('title'){{__('book.BookList')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('book.BookList') }}</a>
            </li>
        </x-backend.partial.page-header>

        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Advance Table Widget 5-->
                <div class="card card-custom gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label font-weight-normal text-dark">{{ __('book.BookList') }}</span>
                        </h3>

                        <x-backend.table.search :search="route('books.index')" :placeholder="__('book.TypeBookInformation')" :buttonUrl="route('books.create')" :buttonText="__('book.AddBook')"></x-backend.table.search>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                <thead>
                                <tr class="text-left">
                                    <th class="pl-0">
                                        <label class="checkbox checkbox-lg checkbox-inline">
                                            <input type="checkbox" value="1">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>{{ __('book.Thumbnail') }}</th>
                                    <th>{{ __('book.Title') }}</th>
                                    <th>{{ __('book.ISBNNumber') }}</th>
                                    <th>{{ __('book.Author') }}</th>
                                    <th>{{ __('book.Genre') }}</th>
                                    <th>{{ __('book.Quantity') }}</th>
                                    <th class="pr-0">{{ __('book.Status') }}</th>
                                    <th class="pr-0 text-right" style="min-width: 150px">{{ __('book.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($books as $book)
                                    <tr>
                                        <td class="pl-0">
                                            <label class="checkbox checkbox-lg checkbox-inline">
                                                <input type="checkbox" value="1">
                                                <span></span>
                                            </label>
                                        </td>

                                        <td>
                                            <div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label bg-white">
																	<img src="{{ $book->thumbnail }}"
                                                                         class="h-100 align-self-end" alt="">
																</span>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{route('books.edit',$book->id)}}" class="font-weight-normal text-info mb-1 font-size-lg">{{ $book->title }}</a>
                                        </td>

                                        <td>
                                            {{ $book->isbn_number }}
                                        </td>

                                        <td>
                                            {{ $book->author }}
                                        </td>

                                        <td>
                                            {{ $book->genre }}
                                        </td>
                                        <td>
                                            {{ $book->quantity }}
                                        </td>

                                        <td>

                                            <span class="switch switch-outline switch-icon switch-info">
                                                <label>
                                                    <input class="loading" type="checkbox" {{$book->status ? 'checked' : ''}}
                                                    onclick="event.preventDefault(); document.getElementById('active_{{$book->id}}').submit();"/>
                                                    <span></span>
                                                </label>
                                            </span>
                                            <form method="POST" class="hidden"
                                                  action="{{ route('books.active',$book->id) }}"
                                                  id="active_{{$book->id}}">
                                                @csrf
                                            </form>
                                        </td>

                                        <td class="pr-0 text-right">

                                            <x-backend.table.button.show :link="route('books.show',$book->id)" :title="__('book.Show')" class="btn-hover-info" ></x-backend.table.button.show>
                                            <x-backend.table.button.edit :link="route('books.edit',$book->id)" :title="__('book.Edit')" class="btn-hover-primary"></x-backend.table.button.edit>
                                            <x-backend.table.button.delete :title="__('common.Delete')" class="btn-hover-danger" :id="$book->id" name="books" :message="__('vendors.DeleteVendorText')"></x-backend.table.button.delete>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">{{ __('vendors.NoRecordFound') }}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                            {{--{{$users->appends(['query' => request()->input('query')])->links('vendor.pagination.custom')}}--}}

                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Body-->

                </div>
                <!--end::Advance Table Widget 5-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    <!-- Modal -->
    <x-backend.modal.delete ><p>{{ __('vendors.DeleteVendorText') }}</p></x-backend.modal.delete>
@stop
