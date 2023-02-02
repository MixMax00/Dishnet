@extends('backend.master')
@section('title')
{{ __('messages.employee_add') }}
@endsection

@php
    $areas = \App\Models\Area::where('sp_id', auth()->user()->sp_id)->where('status', 1)->get();
@endphp
@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-8 offset-2">
    <!-- jquery validation -->
    <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('admin.representative.update') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.employee_name') }}</label>
                    <div class="col-sm-8">
                        <input type="hidden" name="id" value="{{ $edit->id }}">
                      <input type="text" name="employee_name" value="{{ $edit->employee_name }}" class="form-control" id="inputEmail3" placeholder="{{ __('messages.employee_name') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{ __('messages.employee_designation') }}</label>
                    <div class="col-sm-8">
                      <input type="text" name="employee_designation" value="{{ $edit->employee_designation }}" class="form-control" id="inputPassword3" placeholder="{{ __('messages.employee_designation') }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{ __('messages.cell_number') }}</label>
                    <div class="col-sm-8">
                      <input type="text" name="cell_number"  value="{{ $edit->cell_number }}" class="form-control" id="inputPassword3" placeholder="{{ __('messages.cell_number') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{ __('messages.responsible_area') }}</label>
                    <div class="col-sm-8">

                        <select name="responsible_area[]" class="selectpicker form-control" data-dropup-auto="false" data-size="5"  data-live-search="true" multiple >

                            @foreach ($areas as $area)

                                    <option {{ in_array($area->area_id, $area_list)  ? "selected" : " " }} value="{{ $area->area_id }}">{{ $area->area_name }} </option>

                            @endforeach
                        </select>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">{{ __('messages.submit') }}</button>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">

                </div> -->
                <!-- /.card-footer -->
              </form>
            </div>
    <!-- /.card -->
    </div>
    <!--/.col (right) -->
</div>
@endsection
