@extends('backend.master')

@section('title')
  {{ __('messages.service_area_list')}}
@endsection

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
              <form class="form-horizontal" action="{{ route('admin.serviceArea.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.area_name')}}</label>
                    <div class="col-sm-8">
                      <input type="text" name="area_name" class="form-control" id="inputEmail3" placeholder="{{ __('messages.area_name')}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{ __('messages.area_des')}}</label>
                    <div class="col-sm-8">
                        <textarea  name="area_description" class="form-control"rows="4" id="inputPassword3" placeholder="{{ __('messages.area_des')}}"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">
                    {{ __('messages.area_code')}}
                    </label>
                    <div class="col-sm-8">
                      <input type="text" name="area_code" class="form-control" id="inputPassword3" placeholder=" {{ __('messages.area_code')}}">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                    <button type="submit" class="btn btn-info"> {{ __('messages.submit')}}</button>
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
