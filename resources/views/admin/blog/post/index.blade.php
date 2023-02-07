@extends('admin.layouts.master')
@section('blogDropdown', 'menu-open')
@section('blockDropdownMenu', 'd-block')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Blog Posts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"> Blog Posts</li>
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
                                    <h3 class="card-title">Manage Blog Posts </h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.blog.post.create') }}" class="btn btn-primary">Add
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
                                        <th width="10%">Featured Image</th>
                                        <th width="25%">Post Title</th>
                                        <th width="15%">Category</th>
                                        <th width="10%">Date</th>
                                        <th width="10%">Published Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog_posts as $key=>$value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset('assets/images/blog/'.$value->image) }}" width="80" height="80"
                                                alt="fdsfds"></td>
                                        <td>{{  $value->title }}</td>
                                        <td>{{ $value->category->name }}</td>
                                        <td>{{ date('d M Y',strtotime($value->created_at)) }}</td>
                                        <td>
                                            @if($value->status == 1)
                                             <span class="badge badge-success">Published</span>
                                            @else
                                            <span class="badge badge-danger">Unpublished</span>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.post.view',$value->id) }}"
                                                class="btn btn-primary">View</a>
                                            <a href="{{ route('admin.blog.post.edit',$value->id) }}"
                                                class="btn btn-secondary">Edit</a>
                                            <a href="{{ route('admin.blog.post.delete',$value->id) }}" id="deleteData" class="btn btn-danger">Delete</a>
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
