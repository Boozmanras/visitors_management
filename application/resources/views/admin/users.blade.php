@extends('layouts.default')

@section('meta')
    <title>Users</title>
    <meta name="description" content="Users">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Users
        <a href="{{ url('/users/add') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-plus"></i><span class="button-with-icon">Add</span>
        </a>

        <a href="{{ url('/users/roles') }}" class="btn btn-outline-success btn-sm me-1 float-end">
            <i class="fas fa-user"></i><span class="button-with-icon">Roles</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <div class="card-body">
            <table width="100%" class="table table-hover datatables-table" data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   @isset($users_roles)
                        @foreach ($users_roles as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->role_name }}</td>
                            <td>
                                @if($data->status == 1) 
                                    Enabled
                                @else
                                    Disabled
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ url('/users/edit') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-pen"></i></a>
                                <a href="{{ url('/users/delete') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-trash"></i></a>
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