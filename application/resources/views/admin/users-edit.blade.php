@extends('layouts.default')

@section('meta')
    <title>Edit User</title>
    <meta name="description" content="Edit User">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Edit User
        <a href="{{ url('users') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('users/update/user') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8">
        @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control text-uppercase" value="@isset($user->name){{ $user->name }}@endisset" readonly required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control text-lowercase" value="@isset($user->email){{ $user->email }}@endisset" readonly required>
                </div>
                <div class="mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <select name="role_id" class="form-select text-uppercase">
                        <option value="" selected="" disabled="">Choose...</option>
                        @isset($roles)
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if($role->id == $user->role_id) selected @endif>{{ $role->role_name }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-select text-uppercase">
                        <option value="" selected="" disabled="">Choose..</option>
                        <option value="1" @isset($user->status) @if($user->status == 1) selected @endif @endisset>Enabled</option>
                        <option value="0" @isset($user->status) @if($user->status == 0) selected @endif @endisset>Disabled</option>
                    </select>
                </div>
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" name="password" class="form-control" placeholder="********">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="********">
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" value="@isset($reference){{ $reference }}@endisset" name="reference" readonly>

                <a href="{{ url('users') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i><span class="button-with-icon">Cancel</span>
                </a>

                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-check"></i><span class="button-with-icon">Update</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

@endsection