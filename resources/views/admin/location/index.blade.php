@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Locations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Locations</li>
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
                                    <h3 class="card-title">Manage Locations </h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#addLocationModal"
                                            class="btn btn-primary">Add
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
                                        <th width="25%">Location Name</th>
                                        <th width="15%">Date</th>
                                        <th width="15%">Published Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Arizona</td>
                                        <td>01 Feb, 23</td>
                                        <td><span class="badge badge-success">Published</span></td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#editLocationModal">Edit</a>
                                            <a href="#" id="deleteData" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>Callifornia</td>
                                        <td>01 Feb, 23</td>
                                        <td><span class="badge badge-danger">Unpublished</span></td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#editLocationModal">Edit</a>
                                            <a href="#" id="deleteData" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>

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
<div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name" class="form-label">Location Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Location name"
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
<div class="modal fade" id="editLocationModal" tabindex="-1" aria-labelledby="editLocationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLocationModalLabel">Edit Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name" class="form-label">Location Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="Arizona"
                            placeholder="Insdustry name">
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
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
