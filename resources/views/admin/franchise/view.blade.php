@extends('admin.layouts.master')
@section('franchises_create', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
@push('style')
<style>
    td {
        width: 0;
    }
</style>
@endpush
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listing View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.franchises.index') }}">Manage Listing</a>
                        </li>
                        <li class="breadcrumb-item active">Listing View</li>
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
                                    <h3 class="card-title"> View Listing</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.franchises.index') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-4">
                            <table class="table">
                                <tr>
                                    <td>Featured Image</td>
                                    <td><img src="{{ asset('assets/default.png') }}" width="100" alt=""></td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>Tips For Owning A Health And Wellness Franchise</td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td>$55.55</td>
                                </tr>
                                <tr>
                                    <td>Publihed Status</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>01 Feb, 23</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fuga at quis a fugiat
                                        omnis aperiam illum animi harum expedita molestiae odit, hic beatae optio fugit
                                        accusantium quae molestias unde vel!</td>
                                </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
