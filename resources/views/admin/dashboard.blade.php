@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $data['title'] ?? 'Page Header' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Listing ads</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Industry</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Location</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Investment</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Verified Users</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Blog Post</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <div class="info-box-content">
                            <span class="info-box-text">Total Custome Page</span>
                            <span class="info-box-number">00</span>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent franchises listing</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="dataTables" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="15%">Image</th>
                                        <th width="20%">Title</th>
                                        <th width="15%">Price</th>
                                        <th width="15%">Date</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td><img src="{{ asset('assets/default.png') }}" class="rounded border"
                                                width="80" alt=""></td>
                                        <td>Moswuito Squad</td>
                                        <td>$55.77</td>
                                        <td>01 Feb, 23</td>
                                        <td><span class="badge badge-success">Active</span></td>
                                        <td>
                                            <a href="#" class="btn btn-primary">View</a>
                                            <a href="#" class="btn btn-secondary">Edit</a>
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
