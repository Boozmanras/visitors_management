@extends('layouts.default')

@section('meta')
    <title>Visitor Log</title>
    <meta name="description" content="Visitor Log">
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link href="{{ asset('/assets/vendor/airdatepicker/css/datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Visitor Log
        <a href="{{ url('/visitor-log/add') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-plus"></i><span class="button-with-icon">Add</span>
        </a>

        <a href="{{ url('/reason-for-visits') }}" class="btn btn-outline-success btn-sm me-1 float-end">
            <i class="fas fa-edit"></i><span class="button-with-icon">Add tag</span>
        </a>
    </h3>
    
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ url('visitor-log') }}" method="post" class="needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
                @csrf
                <div class="col-md-12">
                  <div class="row g-1">
                    <div class="col-sm-2">
                        <input name="start" type="text" class="airdatepicker form-control form-control-sm mr-1" value="" placeholder="Start Date" required>
                    </div>

                    <div class="col-sm-2 position-relative">
                        <input name="end" type="text" class="airdatepicker form-control form-control-sm mr-1" value="" placeholder="End Date" required>
                    </div>

                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-outline-secondary btn-sm col-md-12">
                            <i class="fas fa-filter"></i><span class="button-with-icon">Filter</span>
                        </button>
                    </div>

                    <div class="col-sm-2">
                        <button type="button" id="btnTableExport" class="btn btn-outline-primary btn-sm col-md-12">
                            <i class="fas fa-file-export"></i><span class="button-with-icon">Export to CSV</span>
                        </button>
                    </div>
                </div>
            </div>
            </form>
            <div class="table-responsive">
            <table width="100%" class="table table-hover datatables-table" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>Date</th> 
                        <th>Visitor's Name</th> 
                        <th>ID Type</th>
                        <th>Id no.</th>
                        <th>Person to see</th>
                        <th>Phone</th>
                        <th>Tag no.</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Duration</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($visitors)
                    @foreach ($visitors as $visitor)
                        <tr>
                            <td>{{ $visitor->date }}</td>
                            <td>{{ $visitor->lastname }}, {{ $visitor->firstname }}</td>
                            <td>{{ $visitor->id_type }}</td>
                            <td>{{ $visitor->id_no }}</td>
                           {{-- <td> {{$visitor->reasonforvisit }} </td>--}}
                            <td>{{ $visitor->person_to_see }}</td>
                            <td>{{ $visitor->phone }}</td>
                            <td>{{ $visitor->tag_no}}</td>
                            <td>{{ $visitor->timein }}</td>
                            <td>{{ $visitor->timeout }}</td>
                            <td>
                                @php
                                    $timein = "$visitor->date $visitor->timein";
                                    $timein = new DateTime($timein);

                                    $timeout = "$visitor->date $visitor->timeout";
                                    $timeout = new DateTime($timeout);

                                    $duration = $timein->diff($timeout);

                                    echo "$duration->h hr $duration->i min";
                                @endphp
                            </td>
                            <td class="text-end">
                                <a href="{{ url('/visitor-log/edit') }}/{{ $visitor->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="{{ url('/visitor-log/delete') }}/{{ $visitor->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('/assets/js/initiate-datatable.js') }}"></script>
<script src="{{ asset('/assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script>
<script src="{{ asset('/assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script>
<script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
<script src="{{ asset('/assets/js/table-export-csv.js') }}"></script>
@endsection