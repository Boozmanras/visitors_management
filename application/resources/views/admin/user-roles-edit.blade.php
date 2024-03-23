@extends('layouts.default')

@section('meta')
    <title>Edit Role</title>
    <meta name="description" content="Edit Role">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Edit Role
        <a href="{{ url('/users/roles') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('/users/roles/update') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8">
        @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="role_name" class="form-label">Role Name</label>
                    <input type="text" name="role_name" class="form-control text-uppercase" value="@isset($role){{ $role->role_name}}@endisset" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="status" class="form-select text-uppercase">
                        <option value="" disabled="" selected="">Choose...</option>
                        <option value="Active" @if($role->status == "Active") selected @endif>Active</option>
                        <option value="Disabled" @if($role->status == "Disabled") selected @endif>Disabled</option>
                    </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" name="reference" value="@isset($role){{ $role->id}}@endisset" readonly>

                <a href="{{ url('/users/roles') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i><span class="button-with-icon">Cancel</span>
                </a>

                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-check"></i><span class="button-with-icon">Save</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

@endsection