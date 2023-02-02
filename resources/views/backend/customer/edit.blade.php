@extends('backend.master')

@section('title')
 {{ __('messages.customer_add') }}
@endsection

@php
  $area_lists = \App\Models\Area::where('sp_id', auth()->user()->sp_id)->get();
  $package_lists = \App\Models\Package::where('sp_id', auth()->user()->sp_id)->get();
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
              <form class="form-horizontal" action="{{ route('admin.customer.update') }}" method="POST">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.customer_name') }}</label>
                    <div class="col-sm-8">
                        <input type="hidden" value="{{ $edit->id }}" name="id">
                      <input type="text" name="customer_name" value="{{ $edit->customer_name }}" class="form-control @error('customer_name') is-invalid @enderror" id="inputEmail3" placeholder="{{ __('messages.customer_name') }}">
                      @error('customer_name')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">{{ __('messages.customer') }} {{ __('messages.cell_number') }}</label>
                    <div class="col-sm-8">
                      <input type="text" name="customer_mobial_number" value="{{ $edit->cell_number }}"  class="form-control @error('customer_mobial_number') is-invalid @enderror" id="inputPassword3" placeholder="{{ __('messages.customer') }} {{ __('messages.cell_number') }}">
                      @error('customer_mobial_number')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">{{ __('messages.customer_address') }}</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="address" rows="4" class="form-control @error('address') is-invalid @enderror" id="inputPassword3" placeholder="Flat no, Floor no, Holding no etc">{{ $edit->address }}</textarea>
                            @error('address')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">
                            {{ __('messages.package_name') }}
                        </label>
                        <div class="col-sm-8">
                            <select name="packge_name" id="areaId" class="form-control @error('packge_name') is-invalid @enderror">
                                @foreach($package_lists as $data)
                                    <option {{ $edit->package_id == $data->package_id ? "selected" : ''}} value="{{ $data->package_id }}">{{ $data->package_name}}</option>
                                @endforeach
                            </select>
                            @error('packge_name')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">
                    {{ __('messages.area') }}
                    </label>
                    <div class="col-sm-8">
                      <select name="area" id="areaIdEdit" class="form-control @error('area') is-invalid @enderror">

                        @foreach($area_lists as $data)
                        <option {{ $edit->area_id == $data->area_id ? "selected" : ''}} value="{{ $data->area_id }}">{{  $data->area_name}}</option>
                      @endforeach
                      </select>
                      @error('area')
                          <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-4 col-form-label">
                            {{ __('messages.area_location_name') }}
                        </label>
                        <div class="col-sm-8">
                            <select name="area_location" id="areaLocId" class="form-control @error('area') is-invalid @enderror">
                                <option value="{{ $edit->area_loc_id }}">{{ \App\Models\AreaLocation::where('area_location_id',$edit->area_loc_id)->first()->area_location_name ?? '' }}</option>
                            </select>
                            @error('area')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>




                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                    <div class="col-sm-8">
                    <button type="submit" class="btn btn-info">{{ __('messages.update') }}</button>
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




@section('js')
    <script>
        $(document).ready(function(){
            $('#areaIdEdit').change(function(){
                let areaId = $(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'{{ route('admin.customer.getLocArea') }}',
                    data: {area_id:areaId},
                    success:function(data) {
                        $("#areaLocId").html(data);
                    }
                });
            });
        });
    </script>
@endsection

