@extends('admin.layouts.master')
@section('contact_view', 'active')
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
                    <h1 class="m-0">Contact View</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Manage Contact</a></li>
                        <li class="breadcrumb-item active">Contact View</li>
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
                                    <h3 class="card-title">View Contact</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-4">
                            <table class="table">
                                <tr>
                                    <td>Name</td>
                                    <td>Rabin</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>rabin@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>0124-9854-985</td>
                                </tr>
                                <tr>
                                    <td>Reason for Inquiry</td>
                                    <td>Advertising</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>02 Feb, 23</td>
                                </tr>
                                <tr>
                                    <td>Message</td>
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
