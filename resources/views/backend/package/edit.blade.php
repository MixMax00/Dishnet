@extends('backend.master')

@section('title')
 {{ __('messages.package_edit') }}
@endsection
@section('content')

    <div class="row" >
        <div class="col-8 offset-2">

            <!-- /.card -->

            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">{{ __('messages.package_edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ route('admin.package.update') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.package_name') }}</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" value="{{ $edit->id }}">
                                <input type="text" class="form-control @error("name") is-invalid @enderror" required name="name" value="{{ $edit->package_name }}" id="inputEmail3" placeholder="{{ __('messages.package_name') }}">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('messages.package_des') }}</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control @error("details") is-invalid @enderror" name="details" cols="6" rows="4" id="inputEmail3" placeholder="{{ __('messages.package_des') }}">{{ $edit->package_description }}</textarea>
                                @error('details')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">{{ __('messages.package_price') }}</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error("value") is-invalid @enderror" required name="value" value="{{ $edit->price }}"  id="email" placeholder="{{ __('messages.package_price') }}">
                                @error('value')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-info">{{ __('messages.update')}}</button>
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
