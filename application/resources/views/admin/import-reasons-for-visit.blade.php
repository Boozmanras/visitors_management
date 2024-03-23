@extends('layouts.default')

@section('meta')
    <title>Import Reasons For Visit</title>
    <meta name="description" content="Import Reasons For Visit">
@endsection

@section('styles')

@endsection

@section('content')

<div class="container">
    <h3 class="page-title">Import Reasons For Visit
        <a href="{{ url('/reason-for-visits') }}" class="btn btn-outline-primary btn-sm float-end">
            <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
        </a>
    </h3>
        
    <div class="card border-0 border-top border-info shadow-sm mb-4">
        <form action="{{ url('/reason-for-visits/import') }}" method="POST" class="needs-validation" novalidate accept-charset="utf-8" enctype="multipart/form-data">
        @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="csv" class="form-label">Import CSV file</label>
                    <input class="form-control text-uppercase" type="file" name="csv" id="csvfile" accept=".csv">
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ url('/reason-for-visits') }}" class="btn btn-secondary">
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