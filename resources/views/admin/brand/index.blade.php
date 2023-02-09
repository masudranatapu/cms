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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="line-height: 36px;">{{ __('brand_list') }}</h3>
                                <a href=""
                                    class="btn bg-success float-right d-flex align-items-center justify-content-center">
                                    <i class="fas fa-plus"></i>&nbsp; {{ __('Add_brand') }}
                                </a>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="5%">#</th>
                                            <th>{{ __('Category Name') }}</th>
                                            <th>{{ __('name') }} ({{ __('ads_count') }}) </th>
                                            <th>{{ __('created_date') }} </th>
                                            <th>{{ __('last_updated') }} </th>
                                            <th width="10%">{{ __('actions') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
