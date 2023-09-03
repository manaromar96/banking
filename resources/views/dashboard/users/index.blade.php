@extends('dashboard.layouts.app')

@section('content')
    <admins-index inline-template>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
                <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                    <div class="d-flex align-items-center flex-wrap mr-2">
                        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{__('Users')}}</h5>
                        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                        <a href="{{url('dashboard/users/create')}}" class="btn btn-light-warning font-weight-bolder btn-sm">{{__('Add New')}}</a>
                    </div>

                </div>
\            </div>
            <div class="card-body" style="background-color: white">

                <!--begin::Section-->
                <div class="kt-section">
                    <div class="kt-section__content">
                        <table-component
                            :data="fetchData"
                            :show-caption="false"
                            :show-filter="false"
                            ref="table"
                        >
                            <table-column show="name" label="{{__('Name')}} "></table-column>
                            <table-column show="email" label="{{__('Email')}}"></table-column>
                            <table-column label="{{__('Operations')}}" :sortable="false" :filterable="false">
                                <template slot-scope="user">
                                    <a :href="`/dashboard/users/${user.id}/edit`" class="btn btn-brand btn-elevate btn-circle btn-icon">
                                        <i class="flaticon2-edit"></i>
                                    </a>
                                    <a @click="deleteItem(user.id, `/dashboard/users/${user.id}`, 'userDeleted')" href="javascript:" class="btn btn-danger btn-elevate btn-circle btn-icon">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </template>
                            </table-column>
                        </table-component>
                    </div>
                </div>
            </div>
        </div>
    </admins-index>
@endsection
