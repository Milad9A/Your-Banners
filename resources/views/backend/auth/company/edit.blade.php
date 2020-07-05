@extends('backend.layouts.app')

@section('title', __('labels.backend.access.companies.management') . ' | ' . __('labels.backend.access.companies.edit'))

@section('breadcrumb-links')
    @include('backend.auth.company.includes.breadcrumb-links')
@endsection

@section('content')

    <form method="POST" action="{{ route('admin.auth.company.update', compact('company')) }}"
          class="form-horizontal">
        @csrf
        @method('PATCH')

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.companies.management')
                            <small class="text-muted">@lang('labels.backend.access.companies.edit')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.companies.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder($company->name)
                                    ->value($company->name)
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.company.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div><!--row-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    </form>
@endsection
