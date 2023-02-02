@extends('backend.master')

@section('title')
    {{ __('messages.send_customer_notification') }}
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
                <form class="form-horizontal" action="{{ route('admin.notification.sendNotificationrToCustomer') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
{{--                        <div class="form-group row">--}}
{{--                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.customer_id')  }}</label>--}}
{{--                            <div class="col-sm-8">--}}
{{--                                <select name="customer_id" id="" class="form-control selectpicker" data-dropup-auto="false" multiple  data-live-search="true" required>--}}
{{--                                    @foreach($customers as $customer)--}}
{{--                                        <option value="{{ $customer->customer_id }}">{{ $customer->customer_name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.title')}}</label>
                            <div class="col-sm-8">
                                <input type="text" name="title" class="form-control" required placeholder="please write your title...." />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.message')}}</label>
                            <div class="col-sm-8">
                                <textarea name="body" class="form-control" placeholder="please write your message...." required></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.image')}}</label>
                            <div class="col-sm-8">
                                <input type="file" name="image" class="form-control" required />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{__('messages.send')}}</button>
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
