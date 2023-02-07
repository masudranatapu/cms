@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Industries</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Industries</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Manage Industries </h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#addInsdustryModal" class="btn btn-primary">Add
                                            New</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="dataTables" class="table table-hover text-nowrap jsgrid-table">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="25%">Industry Name</th>
                                        <th width="15%">Date</th>
                                        <th width="15%">Published Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($insdustry as $key => $value)
                                        <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ date('d M Y',strtotime($value->created_at)) }}</td>
                                        <td>
                                            @if($value->status == 1)
                                                <span class="badge badge-success">Published</span>
                                            @else
                                                <span class="badge badge-danger">Not Published</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary edit" data-id="{{$value->id}}">Edit</a>
                                            <a href="{{ route('admin.industry.delete',$value->id) }}" id="deleteData" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- create modal --}}
<div class="modal fade" id="addInsdustryModal" tabindex="-1" aria-labelledby="addInsdustryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInsdustryModalLabel">Add Insdustry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.industry.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">Insdustry Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Insdustry name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="name" class="form-label">Order Number</label>
                        <input type="text" name="order_number" id="order_number" class="form-control" placeholder="Order Number"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Published Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- edit modal --}}
<div class="modal fade" id="editInsdustryModal" tabindex="-1" aria-labelledby="addInsdustryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInsdustryModalLabel">Edit Insdustry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal_body"></div>
                
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script type="text/javascript">
    $(document).on('click', '.edit', function() {
        let cat_id = $(this).data('id');
        $.get('insdustries/edit/' + cat_id, function(data) {
            console.log(data);
            $('#editInsdustryModal').modal('show');
            $('#modal_body').html(data);
        });
    });
</script>
@endpush
