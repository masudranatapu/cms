@extends('admin.layouts.master')
@section('cpage_create', 'active')
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
                    <h1 class="m-0">Custome Page View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.cpage.index') }}">Manage Custome Page</a>
                        </li>
                        <li class="breadcrumb-item active">Custome Page View</li>
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
                                    <h3 class="card-title"> Custome Page View</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table">
                            <tr>
                                <td>Page Name</td>
                                <td>Privacy Policy</td>
                            </tr>
                            <tr>
                                <td>Page Slug</td>
                                <td>privacy-policy</td>
                            </tr>
                            <tr>
                                <td>Publihed Status</td>
                                <td><span class="badge badge-success">Active</span></td>
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


@endsection
