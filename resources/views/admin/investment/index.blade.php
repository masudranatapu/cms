@extends('admin.layouts.master')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Investment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Investment</li>
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
                                    <h3 class="card-title">Manage Investment </h3>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a href="javascript:void(0)" data-toggle="modal"
                                            data-target="#addInvestmentModal" class="btn btn-primary">Add
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
                                        <th width="25%">Investment Name</th>
                                        <th width="15%">Date</th>
                                        <th width="15%">Published Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>01</td>
                                        <td>Up to 10k</td>
                                        <td>01 Feb, 23</td>
                                        <td><span class="badge badge-success">Published</span></td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#editInvestmentModal">Edit</a>
                                            <a href="#" id="deleteData" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>02</td>
                                        <td>Up to 50k</td>
                                        <td>01 Feb, 23</td>
                                        <td><span class="badge badge-danger">Unpublished</span></td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-secondary" data-toggle="modal"
                                                data-target="#editInvestmentModal">Edit</a>
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

{{-- create modal --}}
<div class="modal fade" id="addInvestmentModal" tabindex="-1" aria-labelledby="addInvestmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvestmentModalLabel">Add Investment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="investment_price" class="form-label">Investment Price</label>
                        <input type="number" name="investment_price" id="investment_price" class="form-control"
                            placeholder="Investment price" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Published Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- edit modal --}}
<div class="modal fade" id="editInvestmentModal" tabindex="-1" aria-labelledby="editInvestmentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvestmentModalLabel">Edit Investment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="investment_price" class="form-label">Investment Price</label>
                        <input type="number" name="investment_price" id="investment_price" class="form-control"
                            value="Up to 10k" placeholder="Investment price">
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Published Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                    </div>
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
