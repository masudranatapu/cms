@extends('admin.layouts.master')
@section('title')
    {{ __('email_list') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('email_list') }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="50%">{{ __('email') }}</th>
                                    <th width="40%">{{ __('subscriptions_date') }}</th>
                                    <th width="5%">{{ __('actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($emails as $email)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $email->email }}<< /td>
                                        <td>{{ date('d M, Y', strtotime($email->created_at)) }}</td>

                                        <td>
                                            <form action="{{ route('newsletter.delete', $email->id) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf

                                                <button data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete_email') }}"
                                                    onclick="return confirm('{{ __('are_you_sure_want_to_delete_this_item') }}')"
                                                    class="btn bg-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>
                                        </td>


                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">

                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
