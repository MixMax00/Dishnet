@extends('backend.master')

@section('title')
{{ __('messages.service_provider_add') }}
@endsection

@php($divisions = \App\Models\Division::all())
@section('content')

    <div class="row" >
        <div class="col-8 offset-2">

            <!-- /.card -->

            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('super.merchant.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.service_provider_name') }}</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control @error('name') is-invalid @enderror" required name="name" id="inputEmail3"  placeholder="{{__('messages.service_provider_name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.service_provider_representative_name') }}</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control  @error('owner_name') is-invalid @enderror" required name="owner_name" id="inputEmail3" placeholder="{{__('messages.service_provider_representative_name') }}">
                                @error('owner_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.cell_number') }}</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror" required name="contact_number" id="inputEmail3" placeholder="{{__('messages.cell_number') }}">
                                @error('contact_number')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">{{__('messages.service_provider_email') }}</label>
                            <div class="col-sm-8">

                                <input type="email" class="form-control @error('email') is-invalid @enderror" required name="email"  id="email" placeholder="{{__('messages.service_provider_email') }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Division</label>
                            <div class="col-sm-8">

                               <select id="divisionId" name="division" class="form-control">
                                   <option>Please select</option>
                                   @foreach($divisions as $division)
                                       <option value="{{ $division->id  }}">{{ $division->name }}</option>
                                   @endforeach
                               </select>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">District</label>
                            <div class="col-sm-8">

                                <select id="disId" name="district" class="form-control">
                                    <option>Please select</option>
                                </select>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Upzila</label>
                            <div class="col-sm-8">

                                <select id="thanaId" name="upzila" class="form-control">
                                    <option>Please select</option>
                                </select>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.service_provider_address') }}</label>
                            <div class="col-sm-8">

                                <textarea  class="form-control  @error('address') is-invalid @enderror" name="address" cols="6" rows="4" id="inputEmail3" placeholder="{{__('messages.service_provider_address') }}"></textarea>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{__('messages.submit') }}</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->


                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection


@section('js')

    <script>
        $(document).ready(function(){
            $('#divisionId').change(function(){
                var divId = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{ route('getDistrict') }}",
                    data: {div_id:divId},
                    success:function(data) {
                        $('#disId').html(data);
                    }
                });
            });

            $('#disId').change(function(){
                var disId = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:"{{ route('getthana') }}",
                    data: {dis_id:disId},
                    success:function(data) {
                        $('#thanaId').html(data);
                        // alert(data);
                    }
                });
            });
        });
    </script>
@endsection
