@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Custom Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Custom Page</li>
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
                                    <h3 class="card-title">Manage Custom Page</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.cpage.create') }}" class="btn btn-primary">Add
                                            New</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="dataTables" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Page Name</th>
                                        <th>Page Slug</th>
                                        <th>Description</th>
                                        <th>Published Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Privacy Policy</td>
                                        <td>privacy-policy</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. ....</td>
                                        <td><span class="badge badge-success">Published</span></td>
                                        <td>
                                            <a href="{{ route('admin.cpage.view') }}" class="btn btn-primary">View</a>
                                            <a href="{{ route('admin.cpage.edit') }}" class="btn btn-secondary">Edit</a>
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
@endsection
