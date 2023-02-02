@extends('backend.master')
@section('title')

{{ __('messages.service_area_list') }}

@endsection

@php($area_list = \App\Models\Area::where('sp_id',auth()->user()->sp_id)->orderBy('id','DESC')->get())
@section('content')

<div class="row">
    <div class="col-md-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('messages.service_area_list') }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('messages.si') }}</th>
                      <th>{{ __('messages.area_id') }}</th>
                    <th>{{ __('messages.area_name') }}</th>
                    <th>{{ __('messages.area_des') }}</th>
                    <th>{{ __('messages.area_code') }}</th>
                    <th>{{ __('messages.action') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($area_list as $key => $list)
                    <tr>
                      <td>{{ $loop->index +1 }}</td>
                      <td>{{ $list->area_id  }}</td>
                      <td>{{ $list->area_name  }}</td>
                      <td>{{ $list->area_description  }}</td>
                      <td>{{ $list->area_code  }}</td>
                      <td>

                        <a href="{{ route('admin.serviceArea.status', ["id"=>$list->id]) }}" class="btn btn-{{ $list->status == 1 ? "warning" : "primary" }} btn-sm text-white m-1">{{ $list->status == 1 ? "Inactive" : "Active" }}</a>
                        <a href="{{ route('admin.serviceArea.edit', ["id"=>$list->id]) }}" class="btn btn-info btn-sm text-white m-1">Edit</a>
                        <a href="{{ route('admin.serviceArea.viewCustomer', ["area_id"=>$list->area_id]) }}" class="btn btn-success btn-sm text-white m-1">View Customer</a>
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>{{ __('messages.si') }}</th><th>{{ __('messages.area_name') }}</th>
                      <th>{{ __('messages.area_id') }}</th>
                      <th>{{ __('messages.area_des') }}</th>
                      <th>{{ __('messages.area_code') }}</th>
                      <th>{{ __('messages.action') }}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
</div>

@endsection
