@extends('admin.layouts.master')
@section('franchises_create', 'active')
@section('title') {{ $data['title'] ?? '' }} @endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.franchises.index') }}">Franchises</a>
                            </li>
                            <li class="breadcrumb-item active"> Edit</li>
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
                                        <h3 class="card-title"> Edit </h3>
                                    </div>
                                    <div class="col-6">
                                        <div class="float-right">
                                            <a href="{{ route('admin.franchises.index') }}" class="btn btn-primary">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-4">
                                <form action="{{ route('admin.franchises.update', $franchise->slug) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="title" class="form-lable">Title <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="title" id="title"
                                                    value="{{ $franchise->title }}" class="form-control" required>
                                                @error('title')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="min_hand_cash" class="form-lable">Minimum Cash on Hand
                                                    Required <span class="text-danger">*</span></label>
                                                <input type="number" name="min_hand_cash" id="min_hand_cash"
                                                    value="{{ $franchise->min_hand_cash }}" class="form-control" required>
                                                @error('min_hand_cash')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="investment" class="form-lable">Total Invesment <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="investment" id="investment"
                                                    value="{{ $franchise->investment }}" class="form-control" required>
                                                @error('investment')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="net_worth" class="form-lable">Net Worth Required<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="net_worth" id="net_worth"
                                                    value="{{ $franchise->net_worth }}" class="form-control" required>
                                            </div>
                                            @error('net_worth')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="founded_year" class="form-lable">Year Founded </label>
                                                <select name="founded_year" id="founded_year" class="form-control select2">
                                                    <option value="" disabled selected>Choose One</option>
                                                    @for ($i = 1900; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $franchise->founded_year == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="franchising_start" class="form-lable">Franchising
                                                    Since(Year)</label>
                                                <select name="franchising_start" id="franchising_start"
                                                    class="form-control select2">
                                                    <option value="" disabled selected>Choose One</option>
                                                    @for ($i = 1900; $i <= date('Y'); $i++)
                                                        <option value="{{ $i }}"
                                                            {{ $franchise->franchising_start == $i ? 'selected' : '' }}>
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="franchise_fee" class="form-lable">Franchise Fee</label>
                                                <input type="text" name="franchise_fee" id="franchise_fee"
                                                    value="{{ $franchise->franchise_fee }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="royalty_fee" class="form-lable">Royalty Fee</label>
                                                <input type="text" name="royalty_fee" id="royalty_fee"
                                                    value="{{ $franchise->royalty_fee }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="ad_fee" class="form-lable">Ad Fee</label>
                                                <input type="text" name="ad_fee" id="ad_fee"
                                                    value="{{ $franchise->ad_fee }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="units_number" class="form-lable">Units Number</label>
                                                <input type="text" name="units_number" id="units_number"
                                                    value="{{ $franchise->units_number }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="video" class="form-lable">Video Link</label>
                                                <input type="text" name="video" id="video"
                                                    value="{{ $franchise->video }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="order_number" class="form-lable">Order Number</label>
                                                <input type="text" name="order_number" id="order_number"
                                                    value="{{ $franchise->order_number }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="financing_availability" class="form-lable">Financing
                                                    Availability</label>
                                                <select name="financing_availability" id="financing_availability"
                                                    class="form-control">
                                                    <option value="1">Available</option>
                                                    <option value="0"
                                                        {{ $franchise->financing_availability == '0' ? 'selected' : '' }}>
                                                        Not
                                                        available</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class="form-lable">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0"
                                                        {{ $franchise->status == '0' ? 'selected' : '' }}>
                                                        Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description" class="form-lable">Description<span
                                                        class="text-danger">*</span></label>
                                                <textarea name="description" id="description" cols="30" rows="5" class="form-control summernote">{!! $franchise->description !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="opportunities" class="form-lable">Opportunities</label>
                                                <textarea name="opportunities" id="opportunities" cols="30" rows="5" class="form-control summernote">{!! $franchise->opportunities !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="awards" class="form-lable">Awards</label>
                                                <textarea name="awards" id="awards" cols="30" rows="5" class="form-control summernote">{!! $franchise->awards !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="testimonials" class="form-lable">Testimonials</label>
                                                <textarea name="testimonials" id="testimonials" cols="30" rows="5" class="form-control summernote">{!! $franchise->testimonials !!}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 text-center">
                                            <img src="{{ asset($franchise->thumbnail) }}" alt="Thumbnail"
                                                style="width: 250px"; height="200px">
                                        </div>
                                        <div class="col-lg-6 text-center">
                                            <img src="{{ asset($franchise->banner_image) }}" alt="Thumbnail"
                                                style="width: 250px"; height="200px">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="thumbnail" class="form-lable">Thumbnail</label>
                                                <input type="file" name="thumbnail" id="thumbnail"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="banner_image" class="form-lable">Banner Image </label>
                                                <input type="file" name="banner_image" id="banner_image"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success loading">Save Franchise</button>
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