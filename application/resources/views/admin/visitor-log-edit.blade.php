@extends('layouts.default')

@section('meta')
    <title>Edit Visitor Record</title>
    <meta name="description" content="Edit Visitor Record">
@endsection

@section('styles')
    <link href="{{ asset('/assets/vendor/airdatepicker/css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Edit Visitor Record
        <a href="{{ url('/visitor-log') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('/visitor-log/update') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8">
        @csrf
            <div class="card-body">

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-control text-uppercase" value="@isset($visitor){{ $visitor->firstname }}@endisset" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control text-uppercase" value="@isset($visitor){{ $visitor->lastname }}@endisset" required>
                    </div>
                </div>


                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="id_type" class="form-label">ID Type</label>
                        <input type="text" name="id_type" class="form-control text-uppercase" value="@isset($visitor){{ $visitor->id_type }}@endisset" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="id_no" class="form-label">ID Number</label>
                        <input type="number" name="id_no" class="form-control" value="@isset($visitor){{ $visitor->id_no }}@endisset" required>
                    </div>
                </div>

                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" name="phone" class="form-control" value="@isset($visitor){{ $visitor->phone }}@endisset" required>
                </div>
                {{--
                <div class="mb-3">
                    <label for="reasonforvisit" class="form-label">Reason For Visit</label>
                    <input type="text" name="reasonforvisit" class="form-control" value="@isset($visitor){{ $visitor->reasonforvisit }}@endisset" required>
                </div>--}}

                <div class="mb-3">
                    <label for="person_to_see" class="form-label">Person to see</label>
                    <input type="text" name="person_to_see" class="form-control text-uppercase" value="@isset($visitor){{ $visitor->person_to_see }}@endisset" required>
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">Tag</label>
                    <input type="text" name="tag_no" class="form-control text-uppercase" value="@isset($visitor){{ $visitor->tag_no }}@endisset" required>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="text" name="date" class="form-control text-uppercase airdatepicker" value="@isset($visitor){{ $visitor->date }}@endisset" placeholder="YYYY-MM-DD" required data-position="top right">
                </div>
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Time In</label>
                        <input type="text" name="timein" class="form-control text-uppercase timepicker" value="@isset($visitor){{ $visitor->timein }}@endisset" placeholder="00:00:00 AM" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Time Out</label>
                        <input type="text" name="timeout" class="form-control text-uppercase timepicker" value="@isset($visitor){{ $visitor->timeout }}@endisset" placeholder="00:00:00 PM" required>
                    </div>
                </div>
            <div class="card-footer text-end">
                <input type="hidden" name="reference" value="@isset($visitor){{ $visitor->id }}@endisset" readonly>
                
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