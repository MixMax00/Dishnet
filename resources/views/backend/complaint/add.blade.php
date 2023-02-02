@extends('backend.master')

@section('title')
    {{ __('messages.complaint_add') }}
@endsection


@php($customers = \App\Models\Customer::where('sp_id', auth()->user()->sp_id)->get())
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
                <form class="form-horizontal" action="{{  route('admin.complaint.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.customer_id')  }}</label>
                            <div class="col-sm-8">
                                <select name="customer_id" id="" class="form-control selectpicker" data-dropup-auto="false"   data-live-search="true">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->customer_id }}">{{ $customer->customer_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label for="inputEmail3" class="col-sm-4 col-form-label">Area Name</label>--}}
{{--                            <div class="col-sm-8">--}}
{{--                                <input type="text" class="form-control" required name="area_name" id="inputEmail3">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.complaint')}}</label>
                            <div class="col-sm-8">
                                <textarea name="complain" class="form-control" placeholder="please write your complain...."></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{__('messages.submit')}}</button>
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
