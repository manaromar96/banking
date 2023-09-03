@extends('dashboard.layouts.app')

@section('content')
    <admins-form
        :user='{!! isset($user) ? $user->toJson() : 'null' !!}'
        inline-template>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-header">
                            <h3 class="card-title">{{isset($user) ?__('Edit Admin'):__('Add Admin')}}</h3>
                        </div>
                        <!--begin::Form-->
                        <form class="form">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>{{__('Name')}}</label>
                                        <input v-model="name" type="text" class="form-control form-control-solid " :class="{ 'is-invalid': requestForm.error && requestForm.validations.name }" placeholder="{{__('Name')}}">
                                        <div v-if="requestForm.validations && requestForm.validations.name" class="invalid-feedback">@{{ requestForm.validations.name[0] }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{__('Email')}}</label>
                                        <input v-model="email" type="email" class="form-control form-control-solid " :class="{ 'is-invalid': requestForm.error && requestForm.validations.name }" placeholder="{{__('Email')}}">
                                        <div v-if="requestForm.validations && requestForm.validations.email" class="invalid-feedback">@{{ requestForm.validations.email[0] }}</div>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label>{{__('Password')}}</label>
                                        <input v-model="password" type="text" class="form-control form-control-solid " :class="{ 'is-invalid': requestForm.error && requestForm.validations.password }" placeholder="{{__('Password')}}">
                                        <div v-if="requestForm.validations && requestForm.validations.password" class="invalid-feedback">@{{ requestForm.validations.password[0] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button @click="save" type="reset" class="btn btn-primary mr-2">{{__('Save')}}</button>
                                <a href="/dashboard/admins" type="reset" class="btn btn-secondary">{{__('Cancel')}}</a>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>

                </div>

            </div>
        </div>
    </admins-form>
@endsection
