@extends('layouts.default')

@section('meta')
    <title>Edit Permissions</title>
    <meta name="description" content="Edit Permissions">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Edit Permissions
        <a href="{{ url('/users/roles') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('users/roles/permissions/update') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8">
        @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="role_name" class="form-label">Dashboard</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck1" name="perms[]" @isset($permissions) @if(in_array(1, $permissions)==true) checked @endif @endisset value="1">
                      <label class="form-check-label" for="customCheck1">Open dashboard page</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Visitor Logs</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck2" name="perms[]" @isset($permissions) @if(in_array(2, $permissions)==true) checked @endif @endisset value="2">
                      <label class="form-check-label" for="customCheck2">Open visitor logs page</label>
                    </div>
                    <div class="ps-3 pt-2">
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch1" name="perms[]" @isset($permissions) @if(in_array(21, $permissions)==true) checked @endif @endisset value="21">
                          <label class="form-check-label" for="customSwitch1">Add Visitor</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch2" name="perms[]" @isset($permissions) @if(in_array(22, $permissions)==true) checked @endif @endisset value="22">
                          <label class="form-check-label" for="customSwitch2">View Visitor</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch3" name="perms[]" @isset($permissions) @if(in_array(23, $permissions)==true) checked @endif @endisset value="23">
                          <label class="form-check-label" for="customSwitch3">Edit Visitor</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch4" name="perms[]" @isset($permissions) @if(in_array(24, $permissions)==true) checked @endif @endisset value="24">
                          <label class="form-check-label" for="customSwitch4">Delete Visitor</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Visitor Timeline</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck5" name="perms[]" @isset($permissions) @if(in_array(6, $permissions)==true) checked @endif @endisset value="6">
                      <label class="form-check-label" for="customCheck5">Open visitor timeline page</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Reason for Visits</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck6" name="perms[]" @isset($permissions) @if(in_array(7, $permissions)==true) checked @endif @endisset value="7">
                      <label class="form-check-label" for="customCheck6">Open reason for visits page</label>
                    </div>
                    <div class="ps-3 pt-2">
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch7" name="perms[]" @isset($permissions) @if(in_array(71, $permissions)==true) checked @endif @endisset value="71">
                          <label class="form-check-label" for="customSwitch7">Add Reason</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch8" name="perms[]" @isset($permissions) @if(in_array(72, $permissions)==true) checked @endif @endisset value="72">
                          <label class="form-check-label" for="customSwitch8">Delete Reason</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch9" name="perms[]" @isset($permissions) @if(in_array(73, $permissions)==true) checked @endif @endisset value="73">
                          <label class="form-check-label" for="customSwitch9">Import Reason</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch10" name="perms[]" @isset($permissions) @if(in_array(74, $permissions)==true) checked @endif @endisset value="74">
                          <label class="form-check-label" for="customSwitch10">Export Reason</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Visitor Kiosk</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck22" name="perms[]" @isset($permissions) @if(in_array(8, $permissions)==true) checked @endif @endisset value="8">
                      <label class="form-check-label" for="customCheck22">Open visitor kiosk</label>
                    </div>
                </div>

               <div class="mb-3">
                    <label for="role_name" class="form-label">Users</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck11" name="perms[]" @isset($permissions) @if(in_array(3, $permissions)==true) checked @endif @endisset value="3">
                      <label class="form-check-label" for="customCheck11">Open users page</label>
                    </div>
                    <div class="ps-3 pt-2">
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch12" name="perms[]" @isset($permissions) @if(in_array(31, $permissions)==true) checked @endif @endisset value="31">
                          <label class="form-check-label" for="customSwitch12">Add User</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch13" name="perms[]" @isset($permissions) @if(in_array(32, $permissions)==true) checked @endif @endisset value="32">
                          <label class="form-check-label" for="customSwitch13">Edit User</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch14" name="perms[]" @isset($permissions) @if(in_array(33, $permissions)==true) checked @endif @endisset value="33">
                          <label class="form-check-label" for="customSwitch14">Delete User</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">User Roles</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck15" name="perms[]" @isset($permissions) @if(in_array(4, $permissions)==true) checked @endif @endisset value="4">
                      <label class="form-check-label" for="customCheck15">Open user roles page</label>
                    </div>
                    <div class="ps-3 pt-2">
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch16" name="perms[]" @isset($permissions) @if(in_array(41, $permissions)==true) checked @endif @endisset value="41">
                          <label class="form-check-label" for="customSwitch16">Add Role</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch17" name="perms[]" @isset($permissions) @if(in_array(42, $permissions)==true) checked @endif @endisset value="42">
                          <label class="form-check-label" for="customSwitch17">Edit Role</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch18" name="perms[]" @isset($permissions) @if(in_array(43, $permissions)==true) checked @endif @endisset value="43">
                          <label class="form-check-label" for="customSwitch18">Set Permission</label>
                        </div>
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch19" name="perms[]" @isset($permissions) @if(in_array(44, $permissions)==true) checked @endif @endisset value="44">
                          <label class="form-check-label" for="customSwitch19">Delete Role</label>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="role_name" class="form-label">Settings</label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="customCheck20" name="perms[]" @isset($permissions) @if(in_array(5, $permissions)==true) checked @endif @endisset value="5">
                      <label class="form-check-label" for="customCheck20">Open settings page</label>
                    </div>
                    <div class="ps-3 pt-2">
                        <div class="form-check form-switch">
                          <input type="checkbox" class="form-check-input" id="customSwitch21" name="perms[]" @isset($permissions) @if(in_array(51, $permissions)==true) checked @endif @endisset value="51">
                          <label class="form-check-label" for="customSwitch21">Update settings</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <input type="hidden" value="@isset($id){{ $id }}@endisset" name="role_id" readonly>

                <a href="{{ url('/users/roles') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i><span class="button-with-icon">Cancel</span>
                </a>

                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-check"></i><span class="button-with-icon">Set Permission</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')

@endsection