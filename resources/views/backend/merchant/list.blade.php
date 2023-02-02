@extends('backend.master')

@section('title')
{{ __('messages.service_provider_list') }}
@endsection


@php($merchent_list = \App\Models\User::orderBy('id','DESC')->get())

@section('content')

    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.merchent_id') }}</th>
                            <th>{{ __('messages.name') }}</th>
                            <th>{{ __('messages.service_provider_representative_name') }}</th>
                            <th>{{ __('messages.contact') }}</th>
                            <th>{{ __('messages.email') }}</th>
                            <th>{{ __('messages.address') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.action') }}</th>

                        </tr>
                        </thead>
                        <tbody>

                            @foreach($merchent_list as $list)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $list->sp_id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->sp_representative }}</td>
                                    <td>{{ $list->sp_cell_number }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td>{{ $list->address }}</td>
                                    <td>{{ $list->status == 1 ? "active" : "inactive"}}</td>
                                    <td>
                                        <a href="{{ route('admin.merchant.status', ["id"=>$list->id]) }}" class="btn btn-{{ $list->status == 1 ? "warning" : "primary" }} btn-sm text-dark m-1">{{ $list->status == 1 ? "Inactive" : "Active" }}</a>
                                        <a href="{{ route('admin.merchant.edit',["id"=>$list->id]) }}" class="btn btn-info btn-sm text-white m-1">Edit</a>
                                        {{-- <a href="#" class="btn btn-danger btn-sm text-white">Trash</a> --}}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                        <tr>

                        <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.merchent_id') }}</th>
                            <th>{{ __('messages.name') }}</th>
                            <th>{{ __('messages.service_provider_representative_name') }}</th>
                            <th>{{ __('messages.contact') }}</th>
                            <th>{{ __('messages.email') }}</th>
                            <th>{{ __('messages.address') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>


@endsection

