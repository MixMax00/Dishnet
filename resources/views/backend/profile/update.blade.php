@extends('backend.master')

@section('title')
    {{ __('messages.profile') }}
@endsection

@php($edit = \App\Models\User::find(auth()->user()->id))
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
                <form class="form-horizontal" action="{{ route('profile.updated') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.name') }}</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control  @error('owner_name') is-invalid @enderror"  name="owner_name" value="{{ $edit->sp_representative }}" id="inputEmail3" placeholder="{{__('messages.name') }}">
                                @error('owner_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.cell_number') }}</label>
                            <div class="col-sm-8">

                                <input type="text" class="form-control @error('contact_number') is-invalid @enderror"  name="contact_number" value="{{ $edit->sp_cell_number }}" id="inputEmail3" placeholder="{{__('messages.cell_number') }}">
                                @error('contact_number')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{__('messages.image') }}</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control  @error('image') is-invalid @enderror"  name="image" id="photo">
                                @error('image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <img src="{{ isset($edit->image) ? asset($edit->image) : ' '   }}" id="imgPreview" width="80px" height="80px"/>
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
            $('#photo').change(function(){
                const file = this.files[0];
                console.log(file);
                if (file){
                    let reader = new FileReader();
                    reader.onload = function(event){
                        console.log(event.target.result);
                        $('#imgPreview').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection

