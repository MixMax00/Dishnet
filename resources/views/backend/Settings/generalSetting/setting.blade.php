@extends('backend.master')

@section('title')
    {{ __('messages.settings') }}
@endsection
@php($general_setting = \App\Models\GeneralSetting::where('sp_id',auth()->user()->sp_id)->first())
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
                <form class="form-horizontal" action="{{ route('admin.setting.generalSetting.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.app_name') }}</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control @error('app_name') is-invalid @enderror" required name="app_name" value="{{ $general_setting->app_name ?? '' }}" id="inputEmail3"  placeholder="{{__('messages.app_name') }}">
                                @error('app_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.app_logo') }}</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control  @error('app_logo') is-invalid @enderror"  name="app_logo" id="photo1">
                                @error('app_logo')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <img src="{{ isset($general_setting->app_logo) ? asset($general_setting->app_logo) : ' '   }}" id="imgPreview1" width="80px" height="80px"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.app_fav_icon') }}</label>
                            <div class="col-sm-8">

                                <input type="file" class="form-control @error('app_fav_icon') is-invalid @enderror"  name="app_fav_icon" id="photo2">
                                @error('app_fav_icon')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <img src="{{ isset($general_setting->fav_icon) ? asset($general_setting->fav_icon) : ' ' }}" id="imgPreview2" width="80px" height="80px"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{__('messages.update') }}</button>
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
        $(document).ready(()=>{
            $('#photo1').change(function(){
                const file = this.files[0];
                console.log(file);
                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        console.log(event.target.result);
                        $('#imgPreview1').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });

        $(document).ready(()=>{
            $('#photo2').change(function(){
                const file = this.files[0];
                console.log(file);
                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        console.log(event.target.result);
                        $('#imgPreview2').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection

