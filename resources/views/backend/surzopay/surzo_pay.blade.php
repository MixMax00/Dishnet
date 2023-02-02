@extends('backend.master')

@section('title')
    {{ __('messages.surzo_pay') }}
@endsection


@php($surzo_pay = \App\Models\SurzoPay::where('sp_id', auth()->user()->sp_id)->first())

{{--{{dd($surzo_pay)}}--}}

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
                <form class="form-horizontal" action="{{ route('admin.surzopay.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.merchant_username')}}</label>
                            <div class="col-sm-8">
                                <input type="text" name="merchant_username" value="{{ $surzo_pay->merchant_username ?? '' }}" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.merchant_password')}}</label>
                            <div class="col-sm-8">
                                <input type="text" name="merchant_password" value="{{ $surzo_pay->merchant_password ?? '' }}" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Prefix </label>
                            <div class="col-sm-8">
                                <input type="text" name="prefix" value="{{ $surzo_pay->prefix ?? '' }}" class="form-control" required/>
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label for="inputEmail3" class="col-sm-4 col-form-label">Engine URL</label>--}}
{{--                            <div class="col-sm-8">--}}
{{--                                <input type="text" name="engine_url" value="{{ $surzo_pay->engine_url ?? '' }}" class="form-control" required/>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{__('messages.save')}}</button>
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
