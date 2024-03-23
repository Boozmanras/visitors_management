@extends('layouts.default')

@section('meta')
    <title>Add New User</title>
    <meta name="description" content="Add New User">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Add New User
        <a href="{{ url('users') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('users/store') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8">
        @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control text-uppercase" value="" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control text-lowercase" value="" required>
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <select name="role_id" class="form-select text-uppercase">
                        <option value="" selected="" disabled="">Choose...</option>
                        @isset($roles)
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select text-uppercase">
                        <option value="" selected="" disabled="">Choose..</option>
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('users') }}" class="btn btn-secondary">
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