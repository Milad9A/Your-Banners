@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.locations.management'))

@section('breadcrumb-links')
    @include('backend.auth.company.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.companies.management')
                    </h4>
                </div>
                <!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.auth.company.includes.header-buttons')
                </div>
                <!--col-->
            </div>
            <!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            @foreach($companies as $company)
                                <a href="{{ route('admin.auth.company.edit', compact('company')) }}">
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td class="btn-td"
                                            style="width: 0px">@include('backend.auth.company.includes.actions', ['company' => $company])</td>
                                    </tr>
                                </a>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!--col-->
            </div><!--row-->
            <!--row-->
        </div>
        <!--card-body-->
    </div>
    <!--card-->
@endsection
