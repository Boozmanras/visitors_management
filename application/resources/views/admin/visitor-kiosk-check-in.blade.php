@extends('layouts.kiosk')

@section('meta')
    <title>Visitor Kiosk</title>
    <meta name="description" content="Visitor Kiosk">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center me-3 ms-3">
        <div class="col-md-4 mt-4">
            <div class="card border-0 mt-4">
                <div class="card-body p-1">
                    <div class="row g-1">
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ url('/visitor-kiosk/check-in') }}" class="btn-kiosk checkin text-center text-decoration-none active" data-type="checkin">Check In</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ url('/visitor-kiosk/check-out') }}" class="btn-kiosk checkout text-center text-decoration-none" data-type="checkout">Check Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>

    <div class="row justify-content-center me-3 ms-3">
        <div class="card col-md-8 border-0 border-top border-info shadow-sm mb-4 mt-4 animate__animated animate__fadeIn">
            <div class="card-body">
                
                <h6 class="mb-4 text-center">Please fill the form for Check-In</h6>

                <form action="{{ url('/visitor-kiosk/checkin') }}" method="POST" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
                    @csrf

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" name="firstname" class="form-control text-uppercase" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" name="lastname" class="form-control text-uppercase" required>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="id_type" class="form-label">ID Type</label>
                            <input type="text" name="id_type" class="form-control text-uppercase" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="id_no" class="form-label">ID Number</label>
                            <input type="number" name="id_no" class="form-control" required>
                        </div>
                    </div>

                    
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>
                    {{--<div class="mb-3">
                        <label for="reasonforvisit" class="form-label">Reason For Visit</label>
                        <input type="text" name="reasonforvisit" class="form-control" required>
                    </div>--}}

                    <div class="mb-3">
                        <label for="person_to_see" class="form-label">Person to see</label>
                        <input type="text" name="person_to_see" class="form-control text-uppercase" required>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tag</label>
                        <select name="tags" class="form-select text-uppercase" required>
                            <option value="" selected disabled>Choose...</option>


                            @foreach ($tags as $tag)
                                <option value="{{ $tag->tag_no }}">{{ $tag->tag_no }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="row g-2">
                        <div class="mb-3 col-md-6">
                            <label for="date" class="form-label">Date of Check-in</label>
                            <input type="text" name="date" class="form-control" id="show_date" readonly required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="time" class="form-label">Time of Check-in</label>
                            <input type="text" name="time" class="form-control" id="show_time" readonly required>
                        </div>
                    </div>

                    <div class="mb-4 mt-2 d-grid">
                      <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

<!-- message alert -->
<div class="position-fixed bottom-0 start-50 translate-middle-x p-3" style="z-index: 5;">
    @if ($success = Session::get('success'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
      <div class="toast-header">
        <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#198754"></rect>
        </svg>
        <strong class="me-auto">{{ __("Success") }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ $success }}
      </div>
    </div>
    @endif
    
    @if ($error = Session::get('error'))
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
      <div class="toast-header">
        <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
            <rect width="100%" height="100%" fill="#f44336"></rect>
        </svg>
        <strong class="me-auto">{{ __("Error") }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ $error }}
      </div>
    </div>
    @endif
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    var timezone = "@isset($settings){{ $settings->time_zone }}@endisset";
    var timeformat = "@isset($settings){{ $settings->time_format }}@endisset";
</script>
<script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
<script src="{{ asset('/assets/js/visitor-kiosk-checkin.js') }}"></script>
<script src="{{ asset('/assets/js/form-validator.js') }}"></script>
@endsection