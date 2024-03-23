@extends('layouts.default')

@section('meta')
    <title>User Roles</title>
    <meta name="description" content="User Roles">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">User Roles
        <a href="{{ url('/users/roles/add') }}" class="btn btn-outline-success btn-sm float-end">
            <i class="fas fa-plus"></i><span class="button-with-icon">Add</span>
        </a>

        <a href="{{ url('/users') }}" class="btn btn-outline-primary btn-sm me-1 float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <div class="card-body">
            <table width="100%" class="table datatables-table" data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($roles)
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->role_name }}</td>
                            <td>{{ $role->status }}</td>
                            <td class="text-end">
                                <a href="{{ url('/users/roles/permissions/edit') }}/{{ $role->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-tasks"></i>
                                </a>
                                <a href="{{ url('/users/roles/edit') }}/{{ $role->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ url('/users/roles/delete') }}/{{ $role->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/assets/js/initiate-datatable.js') }}"></script>
@endsection