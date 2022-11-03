@extends('backend.layouts.main')
@section('title'){{__('circulation.IssuedBookDetails')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('circulations.issue') }}"
                   class="text-muted">{{ __('circulation.IssuedBookList') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('circulation.IssuedBookDetails') }}</a>
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
                            <span class="card-label font-weight-normal text-dark">{{ __('circulation.IssuedBookDetails') }}</span>
                        </h3>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr></tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">{{ __('circulation.BookName') }}</th>
                                    <td>{{$issuebook->id}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('book.Author') }}</th>
                                    <td>{{$issuebook->book->author}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('book.Genre') }}</th>
                                    <td>{{ $issuebook->book->genre  }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('circulation.UserName') }}</th>
                                    <td>{{ $issuebook->user->name }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('user.Email') }}</th>
                                    <td>{{ $issuebook->user->email }}</td>
                                </tr>

                                <tr>

                                <tr>
                                    <th scope="row">{{ __('user.Phone') }}</th>
                                    <td>{{$issuebook->user->phone}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('circulation.Status') }}</th>
                                    <td>
                                        @if($issuebook->status == \App\Models\BookCirculation::CIRCULATION_STATUS['Issued'])
                                            <span class="label label-outline-success label-inline">{{ $issuebook->status }}</span>
                                        @else
                                            <span class="label label-outline-danger label-inline">{{ $issuebook->status }}</span>
                                        @endif
                                    </td>
                                </tr>


                                <tr>
                                    <th scope="row">{{ __('circulation.IssueDate') }}</th>
                                    <td>{{ $issuebook->issue_date->format('d F, Y')}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ __('circulation.ReturnDate') }}</th>
                                    <td>{{ $issuebook->return_date->format('d F, Y')}}</td>
                                </tr>


                                <tr>
                                    <th scope="row">{{ __('book.Thumbnail') }}</th>
                                    <td><div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label bg-white">
																	<img src="{{ $issuebook->book->thumbnail}}"
                                                                         class="h-75 align-self-end" alt="">
																</span>
                                        </div></td>
                                </tr>

                                </tbody>
                            </table>
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

@stop
