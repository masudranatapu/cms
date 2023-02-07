@extends('admin.layouts.master')
@section('faq_create', 'active')
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
                        <h1 class="m-0">Faq View</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">Manage Faq</a></li>
                            <li class="breadcrumb-item active">Faq View</li>
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
                                        <h3 class="card-title">View Faq</h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.faq.index') }}" class="btn btn-primary">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <table class="table">
                                    <tr>
                                        <td>Question</td>
                                        <td>{{ $data->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Answer</td>
                                        <td>{!! $data->body !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Answer</td>
                                        <td>{!! $data->body !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>
                                            @if ($data->is_active == 1)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
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
