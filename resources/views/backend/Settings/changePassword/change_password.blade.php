@extends('backend.master')

@section('title')
    {{ __('messages.change_password') }}
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
                <form class="form-horizontal" action="{{ route('admin.password.changePassword') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.old_password') }}</label>
                            <div class="col-sm-8">

                                <input type="password" class="form-control @error('old_password') is-invalid @enderror" required name="old_password" id="inputEmail3" placeholder="">
                                @error('old_password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.password') }}</label>
                            <div class="col-sm-8">

                                <input type="password" class="form-control @error('password') is-invalid @enderror" required name="password" id="inputEmail3" placeholder="">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.password_confirmation') }}</label>
                            <div class="col-sm-8">

                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" required name="password_confirmation"  id="inputEmail3"  placeholder="">
                                @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{__('messages.change_password') }}</button>
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
