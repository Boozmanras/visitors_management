@extends('layouts.default')

@section('meta')
    <title>My Account</title>
    <meta name="description" content="My Account">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">My Account</h3>
        
    <div class="card">
        <div class="card-body">

            <br>
            <div class="row">
                <div class="col-md-4">
                    <h3>Profile</h3>
                    <p>Your name and email address are your identity on Yala and is used to login</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ url('account/profile/update') }}" method="post" class="needs-validation" novalidate autocomplete="off" accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="@isset($user->name){{ $user->name }}@endisset" placeholder="Name" class="form-control text-uppercase" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" value="@isset($user->email){{ $user->email }}@endisset" placeholder="Email Address" class="form-control text-lowercase" required>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">Update Profile</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="line"></div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h3>Password</h3>
                    <p>Changing your password will also reset your API key</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ url('account/password/update') }}" method="post" class="needs-validation" novalidate autocomplete="off" accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Current Password</label>
                            <input type="password" name="currentpassword" placeholder="Current Password" class="form-control" required>
                        </div>

                        <div class="line"></div><br>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="newpassword" placeholder="Enter a new password" class="form-control" required>
                            <small class="form-text">Password must be 6 or more characters</small>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm New Password</label>
                            <input type="password" name="confirmpassword" placeholder="Enter the password again" class="form-control" required>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">Change Password</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection