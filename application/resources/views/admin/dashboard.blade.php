@extends('layouts.default')

@section('meta')
    <title>Dashboard</title>
    <meta name="description" content="Dashboard">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title">Dashboard</h2>
        </div>
    </div>

    <div class="row">

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-primary">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                  <div class="avatar me-2">
                    <span class="avatar-initial rounded bg-label-primary"><i class="ti ti-truck ti-md"></i></span>
                  </div>
                  <h4 class="ms-1 mb-0">  @php echo e(date("F")) @endphp @php echo e(date("d")) @endphp</h4>
                </div>
                <p class="mb-1">@php echo e(date("l")) @endphp</p>
                <p class="mb-0">
                  <span class="date-time mb-0" id="clock"></span>
                  <small class="text-muted"></small>
                </p>
              </div>
            </div>
          </div>

        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-success">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                  <div class="avatar me-2">
                    <span class="avatar-initial rounded bg-label-success"
                      ><i class="ti ti-user-plus ti-md"></i
                    ></span>
                  </div>
                  <h4 class="ms-1 mb-0">@isset($visitors_in_today){{ $visitors_in_today }}@endisset</h4>
                </div>
                <p class="mb-1">visitors time in Today</p>
                <p class="mb-0">
                  <span class="fw-medium me-1"></span>
                  <small class="text-muted"></small>
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-border-shadow-danger">
              <div class="card-body">
                <div class="d-flex align-items-center mb-2 pb-1">
                  <div class="avatar me-2">
                    <span class="avatar-initial rounded bg-label-danger"
                      ><i class="ti ti-user-minus ti-md"></i
                    ></span>
                  </div>
                  <h4 class="ms-1 mb-0">@isset($visitors_out_today){{ $visitors_out_today }}@endisset</h4>
                </div>
                <p class="mb-1">Visitors Time Out Today</p>
                <p class="mb-0">
                  <span class="fw-medium me-1"></span>
                  <small class="text-muted"></small>
                </p>
              </div>
            </div>
          </div>

  
    </div>

    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header py-3">Monthly Visitor Counts <span class="text-muted">(Current year)</span></div>
                <div class="card-body">
                    <p class="card-title"></p>
                    <div class="canvas-wrapper">
                        <canvas class="chart" id="linechart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header py-3">Top Reasons for Visit <span class="text-muted">(Current year)</span></div>
                <div class="card-body">
                    <p class="card-title"></p>
                    <div class="canvas-wrapper">
                        <canvas class="chart" id="piechart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    var timezone = "{{ $settings->time_zone }}";
    var timeformat = "{{ $settings->time_format }}";
    var visitorcounts = [@isset($chart_data) {{ $chart_data }} @endisset];
    var topreasons = [@isset($reasonstats) {{ $reasonstats }} @endisset];
    var topreasonlabels = [@isset($reasonlabel) @php foreach ($reasonlabel as $key => $value) { echo '"' . $key . ' ('. $value .')' . '"' . ', '; } @endphp @endisset];
</script>
<script src="{{ asset('/assets/vendor/chartsjs/chart.umd.js') }}"></script>
<script src="{{ asset('/assets/vendor/momentjs/moment.js') }}"></script>
<script src="{{ asset('/assets/vendor/momentjs/moment-timezone-with-data.js') }}"></script>
<script src="{{ asset('/assets/js/date-time.js') }}"></script>
<script src="{{ asset('/assets/js/dashboard-charts.js') }}"></script>
@endsection
