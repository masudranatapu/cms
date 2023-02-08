@extends('admin.layouts.master')
@section('title')
    {{ _('language_list') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form action="" method="">
                    @csrf
                    <div class="form-row align-items-center">
                        <label for="">Set Default Language</label>
                        <div class="col-auto my-1">
                            <select name="code" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                <option value="" hidden>{{ __('language') }}
                                <option value="">
                                </option>

                                </option>

                            </select>
                        </div>
                        <div class="col-auto my-2 py-2 ">
                            <button type="submit" class="btn btn-primary "
                                style="margin-top:25px">{{ __('save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('language_list') }}</h3>
                        <a href=""
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-plus"></i>
                            &nbsp;
                            {{ __('Add_language') }}
                        </a>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('code') }}</th>
                                    <th>{{ __('direction') }}</th>
                                    <th>{{ __('flag') }}</th>
                                    <th width="15%">{{ __('actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>English</td>
                                    <td>en</td>
                                    <td>ltr</td>
                                    <td><i class="flag-icon"></i></td>
                                    <td>
                                        <a href="" class="btn btn-secondary mr-2"><i class="fas fa-cog"></i></a>

                                        <a href="javascript:void(0)" class="btn btn-warning mt-0 mr-2"data-toggle="tooltip"
                                            title="You can't delete or edit this language">

                                            <i class="fas fa-lock"></i> </a>

                                        <a href="" class="btn btn-info mt-0 mr-2"><i class="fas fa-edit"></i></a>
                                        <form action="" class="d-inline" method="">
                                            @csrf
                                            <button data-toggle="tooltip" data-placement="top"
                                                title="{{ __('delete_language') }}"
                                                onclick="return confirm('{{ __('are_you_sure_want_to_delete_this_item?') }}');"
                                                class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
