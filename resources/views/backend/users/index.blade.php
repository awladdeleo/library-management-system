@extends('backend.layouts.main')
@section('title'){{__('user.UserList')}}@stop
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->

        <x-backend.partial.page-header>
            <li class="breadcrumb-item text-muted">
                <a href="" class="active">{{ __('user.UserList') }}</a>
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
                            <span class="card-label font-weight-normal text-dark">{{ __('user.UserList') }}</span>
                        </h3>

                        <x-backend.table.search :search="route('users.index')" :placeholder="__('user.TypeUserInformation')" :buttonUrl="route('users.create')" :buttonText="__('user.AddUser')"></x-backend.table.search>

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
                                    <th>{{ __('user.Name') }}</th>
                                    <th>{{ __('user.Email') }}</th>
                                    <th class="pr-0">{{ __('user.Status') }}</th>
                                    <th class="pr-0 text-right" style="min-width: 150px">{{ __('user.Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <div class="symbol symbol-50 symbol-light mt-1">
																<span class="symbol-label bg-white">
																	<img src="{{ $user->image }}"
                                                                         class="h-100 align-self-end" alt="">
																</span>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{route('users.edit',$user->id)}}" class="font-weight-normal text-info mb-1 font-size-lg">{{ $user->name }}</a>
                                        </td>

                                        <td>
                                            {{ $user->email }}
                                        </td>

                                        <td>

                                            <span class="switch switch-outline switch-icon switch-info">
                                                <label>
                                                    <input class="loading" type="checkbox" {{$user->status ? 'checked' : ''}}
                                                    onclick="event.preventDefault(); document.getElementById('active_{{$user->id}}').submit();"/>
                                                    <span></span>
                                                </label>
                                            </span>
                                            <form method="POST" class="hidden"
                                                  action="{{ route('users.active',$user->id) }}"
                                                  id="active_{{$user->id}}">
                                                @csrf
                                            </form>
                                        </td>

                                        <td class="pr-0 text-right">

                                            <x-backend.table.button.show :link="route('users.show',$user->id)" :title="__('translation.Show')" class="btn-hover-info" ></x-backend.table.button.show>
                                            <x-backend.table.button.edit :link="route('users.edit',$user->id)" :title="__('translation.Edit')" class="btn-hover-primary"></x-backend.table.button.edit>
                                            <x-backend.table.button.delete :title="__('translation.Delete')" class="btn-hover-danger" :id="$user->id" name="users" :message="__('translation.Delete')"></x-backend.table.button.delete>

                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>

                            {{$users->appends(['query' => request()->input('query')])->links('vendor.pagination.custom')}}

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
    <x-backend.modal.delete ><p>{{ __('translation.DeleteText') }}</p></x-backend.modal.delete>
@stop
