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
                                <a href="{{ url('/visitor-kiosk/check-in') }}" class="btn-kiosk checkin text-center text-decoration-none" data-type="checkin">Check In</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-grid">
                                <a href="{{ url('/visitor-kiosk/check-out') }}" class="btn-kiosk checkout text-center text-decoration-none active" data-type="checkout">Check Out</a>
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
                
                <h6 class="mb-4 text-center">Please find your name and then Check out</h6>

                <form action="{{ url('/visitor-kiosk/checkout') }}" method="POST" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
                    @csrf

                    <div class="mb-3">
                        <label for="visitorname" class="form-label">Select Your Name</label>
                        <select id="select-search" name="visitorname"  class="form-control">
                            <option value="" selected="" disabled="">Choose...</option>
                            @isset($visitor_checkout)
                                @foreach ($visitor_checkout as $visitor)
                                    <option value="{{ $visitor->id }}"> {{ $visitor->firstname }}, {{ $visitor->lastname }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
            
                    <div class="card check-out-message hidden">
                        <div class="card-body">
                            <p class="lead mb-0">Was this you?</p>
                            <hr class="mt-0">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="" class="form-control text-uppercase" readonly>
                            </div>
                          {{--  <div class="row g-2">
                                
                                    <label for="" class="form-label">Reason for Visit</label>
                                    <input type="text" name="reasonforvisit" value="" class="form-control text-uppercase" readonly>
                            
                             
                            </div>--}}
                            <div class="mb-3">
                                <label for="" class="form-label">Date of Check-in</label>
                                <input type="text" name="date" value="" class="form-control" readonly>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Time of Check-in</label>
                                    <input type="text" name="checkin" value="" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Time of Check-out</label>
                                    <input type="text" name="time" value="" class="form-control" id="show_outtime" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 mt-4 d-grid">
                      <input type="hidden" value="" name="id" readonly>
                      <button class="btn btn-success btn-submit hidden" type="submit">Submit</button>
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
<script src="{{ asset('/assets/js/visitor-kiosk-checkout.js') }}"></script>
<script src="{{ asset('/assets/js/initiate-select2.js') }}"></script>
@endsection