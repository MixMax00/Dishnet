@extends('backend.master')
@section('title','Employee List')
@section('content')

@php
  $employee_list = \App\Models\Representative::where('sp_id',auth()->user()->sp_id)->with('areas')->orderBy('id','desc')->get();

@endphp

<div class="row">
    <div class="col-md-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('messages.employee_id') }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>{{ __('messages.si') }}</th>
                    <th>{{ __('messages.employee_id') }}</th>
                    <th>{{ __('messages.employee_name') }}</th>
                    <th>{{ __('messages.employee_designation') }}</th>
                    <th>{{ __('messages.cell_number') }}</th>
                    <th>{{ __('messages.responsible_area') }}</th>
                    <th>{{ __('messages.action') }}</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($employee_list as $key => $list)
                    <tr>
                      <td>{{ $loop->index +1 }}</td>
                      <td>{{ $list->employee_id }}</td>
                      <td>{{ $list->employee_name }}</td>
                      <td>{{ $list->employee_designation }}</td>
                      <td>{{ $list->cell_number }}</td>
                      <td>

                            @foreach($list->areas as $area_name)

                                <a href="{{ route('admin.serviceArea.viewCustomer',["area_id" =>$area_name->area_id ]) }}">{{ $area_name->areas_name->area_name }}</a>
                              @if($loop->last)

                               @else
                                  ,
                                @endif
                            @endforeach

                      </td>
                      <td>
                        <a href="{{ route('admin.representative.status', ["id"=>$list->id]) }}" class="btn btn-{{ $list->status == 1 ? "warning" : "primary" }} btn-sm text-dark m-1">{{ $list->status == 1 ? "Inactive" : "Active" }}</a>
                        <a href="{{ route('admin.representative.edit', ["id"=>$list->id]) }}" class="btn btn-info btn-sm text-white m-1">Edit</a>
                      </td>
                    </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                      <th>{{ __('messages.si') }}</th>
                        <th>{{ __('messages.employee_id') }}</th>
                        <th>{{ __('messages.employee_name') }}</th>
                        <th>{{ __('messages.employee_designation') }}</th>
                        <th>{{ __('messages.cell_number') }}</th>
                        <th>{{ __('messages.responsible_area') }}</th>
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
