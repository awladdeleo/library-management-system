@extends('backend.layouts.main')
@section('title'){{__('circulation.IssuedBookList')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('circulation.IssuedBookList') }}</a>
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
                            <span class="card-label font-weight-normal text-dark">{{ __('circulation.IssuedBookList') }}</span>
                        </h3>

                        <x-backend.table.search :search="route('books.show',$book->id)"
                                                :placeholder="__('book.TypeBookInformation')"
                                                :buttonUrl="route('circulations.create.issue')"
                                                :buttonText="__('circulation.IssueBook')"></x-backend.table.search>

                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-0">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                                <thead>
                                <tr class="text-left">
                                    <th>{{ __('user.Image') }}</th>
                                    <th>{{ __('circulation.UserName') }}</th>
                                    <th>{{ __('book.BookTitle') }}</th>
                                    <th>{{ __('circulation.BookDetails') }}</th>
                                    <th>{{ __('circulation.Date') }}</th>
                                    <th class="pr-0 text-right">{{ __('circulation.Status') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($issuebooks as $issuebook)
                                    <tr>

                                        <td>
                                            <div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label bg-white">
																	<img src="{{ $issuebook->user->image }}"
                                                                         class="h-100 align-self-end" alt="">
																</span>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{route('users.edit',$issuebook->user->id)}}"
                                               class="font-weight-normal text-info mb-1 font-size-lg">{{ __('user.Name') }}
                                                : {{ $issuebook->user->name }}</a>
                                            <p class="font-weight-normal text-dark font-size-sm mb-0">{{ __('user.Email') }}
                                                : {{ $issuebook->user->email }}</p>
                                            <p class="font-weight-normal text-dark font-size-sm  mb-0">{{ __('user.Phone') }}
                                                : {{ $issuebook->user->phone }}</p>
                                        </td>


                                        <td>
                                            <a href="{{route('books.edit',$issuebook->book->id)}}"
                                               class="font-weight-normal text-info mb-1 font-size-lg">{{ $issuebook->book->title }}</a>
                                            <p class="font-weight-normal text-dark font-size-sm">{{__('book.ISBNNumber')}}
                                                : {{ $issuebook->book->isbn_number }}</p>
                                        </td>


                                        <td>
                                            <p class="font-weight-normal text-dark font-size-md mb-1">{{ __('book.Author') }}
                                                : {{ $issuebook->book->author }}</p>
                                            <p class="font-weight-normal text-dark font-size-md  mb-0">{{ __('book.Genre') }}
                                                : {{ $issuebook->book->genre }}</p>
                                        </td>

                                        <td>
                                            <p class="font-weight-normal text-dark font-size-md mb-1">{{ __('circulation.IssueDate') }}
                                                : {{ $issuebook->issue_date->format('d F, Y') }}</p>
                                            <p class="font-weight-normal text-dark font-size-md  mb-0">{{ __('circulation.ReturnDate') }}
                                                : {{ $issuebook->return_date->format('d F, Y') }}</p>
                                        </td>

                                        <td class="text-right">
                                            @if($issuebook->status == \App\Models\BookCirculation::CIRCULATION_STATUS['Issued'])
                                                <span class="label label-outline-success label-inline">{{ $issuebook->status }}</span>
                                            @else
                                                <span class="label label-outline-danger label-inline">{{ $issuebook->status }}</span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>

                            {{$issuebooks->appends(['query' => request()->input('query')])->links('vendor.pagination.custom')}}

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
    <x-backend.modal.delete><p>{{ __('vendors.DeleteVendorText') }}</p></x-backend.modal.delete>
@stop
