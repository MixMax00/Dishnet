@extends('backend.master')

@section('title','Package Add')
@section('content')

    <div class="row" >
        <div class="col-8 offset-2">

            <!-- /.card -->

            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ __('messages.package_header_title') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.package.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.package_name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error("name") is-invalid @enderror" required name="name" id="inputEmail3" placeholder="{{ __('messages.package_name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.package_des') }}</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control @error("details") is-invalid @enderror" name="details" cols="6" rows="4" id="inputEmail3" placeholder="{{ __('messages.package_des') }}"></textarea>
                                @error('details')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">{{ __('messages.package_price') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error("value") is-invalid @enderror" required name="value"  id="email" placeholder="{{ __('messages.package_price') }}">
                                @error('value')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info">{{ __('messages.submit')}}</button>
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
