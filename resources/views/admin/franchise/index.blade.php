@extends('admin.layouts.master')
@section('dashboard', 'active')

@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Listing</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All listing</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            <div class="row ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Manage listing </h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.franchises.create') }}" class="btn btn-primary">Add
                                            New</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table id="dataTables" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="15%">Image</th>
                                        <th width="20%">Title</th>
                                        <th width="15%">Minimun Cash Hand</th>
                                        <th width="15%">Total Investment</th>
                                        <th width="15%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($franchises as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset($item->thumbnail) }}" class="rounded border"
                                                width="80" alt=""></td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->min_hand_cash }}</td>
                                        <td>{{ $item->investment }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <span class="badge badge-success">Active</span>
                                            @else
                                            <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.franchises.view', $item->slug) }}"
                                                class="btn btn-primary">View</a>
                                            <a href="{{ route('admin.franchises.edit', $item->slug) }}"
                                                class="btn btn-secondary">Edit</a>
                                            <a href="{{ route('admin.franchises.delete', $item->id) }}" id="deleteData" class="btn btn-danger">Delete</a>
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

@endsection
