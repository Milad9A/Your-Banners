<div class="btn-group" role="group" aria-label="@lang('labels.backend.access.users.user_actions')">

    <a href="{{ route('admin.auth.company.edit', $company) }}" data-toggle="tooltip" data-placement="top"
       title="@lang('buttons.general.crud.edit')" class="btn btn-primary">
        <i class="fas fa-edit"></i>
    </a>

    <a href="{{ route('admin.auth.company.destroy', $company) }}" data-toggle="tooltip" data-placement="top"
       title="@lang('buttons.general.crud.delete')" class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </a>

</div>
