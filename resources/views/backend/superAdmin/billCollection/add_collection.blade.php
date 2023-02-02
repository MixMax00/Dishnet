@extends('backend.master')

@section('title')
    {{ __('messages.collection_add') }}
@endsection

@php($service_providers = \App\Models\User::where('role', 1)->where('status', 1)->get())
@php($admin_packages = \App\Models\AdminPackage::all())


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
                <form class="form-horizontal" action="{{ route('superadmin.collection.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.date') }}</label>
                            <div class="col-sm-8">
                                <input type="date" name="date" id="date" class="form-control">
                                @error('date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.service_provider_name') }}</label>
                            <div class="col-sm-8">
                                <select name="sp_id" id="employeeId" class="form-control">
                                    <option>please select service provider</option>
                                    @foreach($service_providers as $list)
                                        <option value="{{ $list->sp_id }}">{{ $list->name }}</option>
                                    @endforeach
                                </select>
                                @error('sp_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.package_name') }}</label>
                            <div class="col-sm-8">
                                <select name="package_name" id="packageId" class="form-control">
                                    <option>please select package</option>
                                    @foreach($admin_packages as $list)
                                        <option value="{{ $list->id }}">{{ $list->package_name }}</option>
                                    @endforeach
                                </select>
                                @error('sp_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.collection') }}</label>
                            <div class="col-sm-8">
                                <input type="collection" name="collection" id="billCollection" class="form-control" readonly>
                                @error('collection')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.cash_handover') }}</label>
                            <div class="col-sm-8">
                                <input type="number" name="cash_handover" class="form-control">
                                @error('cash_handover')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.explanation') }}</label>
                            <div class="col-sm-8">
                               <textarea name="explanation" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{ __('messages.submit') }}</button>
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
            $('#packageId').change(function(){
                let packageId = $(this).val();

                // alert(employeeId);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'{{ route('superadmin.collection.getcollection') }}',
                    data: {
                        package_id: packageId,
                    },
                    success:function(data) {
                        $("#billCollection").val(data);
                        //alert(data);
                    }
                });
            });
        });
    </script>
@endsection


