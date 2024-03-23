@extends('layouts.default')

@section('meta')
    <title>Tags</title>
    <meta name="description" content="tags">
@endsection

@section('styles')
@endsection

@section('content')
    <div class="container">
        <h3 class="page-title">
            Add Tag
            <a href="{{ url('/reason-for-visits/export') }}" class="btn btn-outline-secondary btn-sm btn-export float-end">
                <i class="fas fa-download"></i><span class="button-with-icon">Export</span>
            </a>
            <a href="{{ url('reason-for-visits/import-csv') }}" class="btn btn-outline-secondary btn-sm btn-import me-1 float-end">
                <i class="fas fa-upload"></i><span class="button-with-icon">Import</span>
            </a>
            <a href="{{ url('/visitor-log') }}" class="btn btn-outline-primary me-1 btn-sm float-end">
                <i class="fas fa-arrow-left"></i><span class="button-with-icon">Return</span>
            </a>
        </h3>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 border-top border-info shadow-sm">
                    <div class="card-body">
                        <form action="{{ url('reason-for-visits/add') }}" method="post" class="needs-validation" novalidate accept-charset="utf-8">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Tag Number</label>
                                <input type="text" name="tag_no" class="form-control text-uppercase" value="" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-0 border-top border-info shadow-sm">
                    <div class="card-body">
                        <table width="100%" class="table table-hover datatables-table">
                            <thead>
                                <tr>
                                    <th>Tag Number</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($tags)
                                    @foreach ($tags as $tag)
                                        <tr>
                                            <td>{{ $tag->tag_no }}</td>
                                            <td>{{ $tag->status }}</td>
                                            <td class="text-end">
                                                <a href="{{ url('/reason-for-visits/delete') }}/{{ $tag->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
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
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/initiate-datatable.js') }}"></script>
@endsection