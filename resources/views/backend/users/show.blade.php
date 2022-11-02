@extends('backend.layouts.main')
@section('title'){{__('vendors.DetailsVendor')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-page-header>
            <li class="breadcrumb-item text-muted">
                <a href="{{route('admin.vendors.index')}}"
                   class="text-muted">{{ trans('vendors.ListingAllVendors') }}</a>
            </li>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ trans('vendors.DetailsVendor') }}</a>
            </li>
        </x-page-header>

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
                            <span class="card-label font-weight-normal text-dark">{{ trans('vendors.DetailsVendor') }}</span>
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
                                    <th scope="row">{{ trans('common.ID') }}</th>
                                    <td>{{$vendor->id}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('common.Name') }}</th>
                                    <td>{{$vendor->name}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('common.Description') }}</th>
                                    <td>{!! $vendor->description !!}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('common.Slug') }}</th>
                                    <td>{!! $vendor->slug !!}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('vendors.VendorURL') }}</th>
                                    <td><a href="{{$vendor->url}}" target="_blank">{{$vendor->url}}</a></td>
                                </tr>

                                <tr>

                                <tr>
                                    <th scope="row">{{ trans('vendors.Clicked') }}</th>
                                    <td>{{$vendor->url_clicked}}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('common.Status') }}</th>
                                    <td><span class="label label-outline-info label-inline mr-2">{{$vendor->status ? trans('vendors.True') : trans('vendors.False') }}</span></td>
                                </tr>


                                <tr>
                                    <th scope="row">{{ trans('common.MetaTitle') }}</th>
                                    <td>{{$vendor->meta_title }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('common.MetaDescription') }}</th>
                                    <td>{{$vendor->meta_description }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('vendors.Banner') }}</th>
                                    <td><div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label bg-white">
																	<img src="{{ $vendor->banner}}"
                                                                         class="h-75 align-self-end" alt="">
																</span>
                                        </div></td>
                                </tr>

                                <tr>
                                    <th scope="row">{{ trans('common.Image') }}</th>
                                    <td><div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label bg-white">
																	<img src="{{ $vendor->image}}"
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
