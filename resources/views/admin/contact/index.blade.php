@extends('admin.layouts.master')
@section('title')
    {{ $data['title'] ?? '' }}
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Contact</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contact</li>
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
                                        <h3 class="card-title">Manage Contact </h3>
                                    </div>

                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table id="dataTables" class="table table-hover text-nowrap jsgrid-table">
                                    <thead>
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="10%">Name</th>
                                            <th width="10%">Email</th>
                                            <th width="10%">Phone</th>
                                            <th width="15%">Reason for Inquiry</th>
                                            <th width="15%">Message</th>
                                            <th width="10%">Date</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($data['rows']) && count($data['rows']) > 0)
                                            @foreach ($data['rows'] as $key => $row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->reason }}</td>
                                                    <td>{{ $row->message }}</td>
                                                    <td>
                                                        @if ($row->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">InActive</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ date('d M Y', strtotime($row->created_at)) }}</td>

                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->can('admin.contact.index'))
                                                            <a href="{{ route('admin.contact.view', $row->id) }}"
                                                                class="btn btn-primary btn-xs">View</a>
                                                        @endif
                                                        @if (Auth::user()->can('admin.contact.index'))
                                                            <a href="{{ route('admin.contact.edit', $row->id) }}"
                                                                class="btn btn-secondary btn-xs">Edit</a>
                                                        @endif
                                                        @if (Auth::user()->can('admin.contact.index'))
                                                            <a href="{{ route('admin.contact.delete', $row->id) }}"
                                                                id="deleteData" class="btn btn-xs btn-danger">Delete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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
