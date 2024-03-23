@extends('layouts.default')

@section('meta')
    <title>Add New Visitor</title>
    <meta name="description" content="Add New Visitor">
@endsection

@section('styles')
    <link href="{{ asset('/assets/vendor/airdatepicker/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Add New Visitor
        <a href="{{ url('/visitor-log') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('/visitor-log/store') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8">
        @csrf
            <div class="card-body">
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-control text-uppercase" value="" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control text-uppercase" value="" required>
                    </div>
                </div>
         
                <div class="mb-3">
                    <label for="visitorfrom" class="form-label">Visitor From</label>
                    <input type="text" name="visitorfrom" class="form-control text-uppercase" value="" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" name="date" class="form-control text-uppercase airdatepicker" value="" placeholder="YYYY-MM-DD" required data-position="top right">
                </div>
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Time In</label>
                        <input type="text" name="timein" class="form-control text-uppercase timepicker" value="" placeholder="00:00:00 AM" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Time Out</label>
                        <input type="text" name="timeout" class="form-control text-uppercase timepicker" value="" placeholder="00:00:00 PM" required>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/visitor-log') }}" class="btn btn-secondary">
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
<script src="{{ asset('/assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.js') }}"></script>
<script src="{{ asset('/assets/js/initiate-mdtimepicker.js') }}"></script>
<script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
@endsection