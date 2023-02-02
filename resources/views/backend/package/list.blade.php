@extends('backend.master')

@section('title')
  {{ __('messages.package_sidebar_list')}}
@endsection

@php($package_list = \App\Models\Package::where('sp_id',auth()->user()->sp_id)->orderBy('id','DESC')->get())

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
                            <th>{{ __('messages.package_id') }}</th>
                            <th>{{ __('messages.package_name') }}</th>
                            <th>{{ __('messages.package_des') }}</th>
                            <th>{{ __('messages.package_price') }}</th>
                            <th>{{ __('messages.status') }}</th>
                            <th>{{ __('messages.action') }}</th>

                        </tr>
                        </thead>
                        <tbody>


                            @foreach($package_list as $key => $list)
                                <tr>
                                    <td>{{ $loop->index +1 }}</td>
                                    <td>{{ $list->package_id }}</td>
                                    <td>{{ $list->package_name }}</td>
                                    <td>{{ $list->package_description }}</td>
                                    <td>{{ $list->price }}</td>
                                    <td>{{ $list->status == 1 ? "active" : "inactive" }}</td>

                                    <td>
                                        <a href="{{ route('admin.package.status', ["id"=>$list->id]) }}" class="btn btn-{{ $list->status == 1 ? "warning" : "primary" }} btn-sm text-dark m-1">{{ $list->status == 1 ? "Inactive" : "Active" }}</a>
                                        <a href="{{ route('admin.package.edit', ["id"=>$list->id]) }}" class="btn btn-info btn-sm text-white m-1">Edit</a>
                                        {{-- <a href="#" class="btn btn-danger btn-sm text-white">Trash</a> --}}
                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                        <tr>

                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.package_id') }}</th>
                            <th>{{ __('messages.package_name') }}</th>
                            <th>{{ __('messages.package_des') }}</th>
                            <th>{{ __('messages.package_price') }}</th>
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
