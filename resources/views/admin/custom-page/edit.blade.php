@extends('admin.layouts.master')
@section('cpage_create', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Custome Page Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.cpage.index') }}">Manage Custome Page</a>
                        </li>
                        <li class="breadcrumb-item active">Custome Page Edit</li>
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
                                    <h3 class="card-title"> Custome Page Edit</h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="{{ route('admin.cpage.index') }}" class="btn btn-primary">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-4">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name" class="form-lable">Page Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="slug" class="form-lable">Page Slug</label>
                                            <input type="text" name="slug" id="slug" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status" class="form-lable">Published Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1">Published</option>
                                                <option value="0">Unpublished</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status" class="form-lable">Description</label>
                                            <textarea name="description" id="summernote" cols="30" rows="5"
                                                class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Update Page</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
