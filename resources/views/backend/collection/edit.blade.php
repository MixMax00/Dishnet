
@extends('backend.master')

@section('title')
    {{ __('messages.collection_update') }}
@endsection

@php($employees = \App\Models\Representative::where('sp_id',auth()->user()->sp_id)->where('status', 1)->get())


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
                <form class="form-horizontal" action="{{ route('admin.collection.update') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.date') }}</label>
                            <div class="col-sm-8">
                                <input type="hidden"  name="id" value="{{ $edit->id }}">
                                <input type="text" name="date" value="{{ $edit->date }}"  id="date" class="form-control" readonly>
                                @error('date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.employee_name') }}</label>
                            <div class="col-sm-8">
                                <input type="text" name="date" value="{{ $edit->employee_id }}"  id="date" class="form-control" readonly>
                                @error('employee_name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.due') }}</label>
                            <div class="col-sm-8">
                                <input type="collection" name="collection" id="billCollection" value="{{ $edit->due }}" class="form-control" readonly>
                                @error('collection')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.pay') }}</label>
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
            $('#employeeId').change(function(){
                let employeeId = $(this).val();
                let date = $("#date").val();

                // alert(employeeId);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'{{ route('admin.collection.getcollection') }}',
                    data: {
                        employee_id: employeeId,
                        date: date,
                    },
                    success:function(data) {
                        $("#billCollection").val(data);
                        // alert(data);
                    }
                });
            });
        });
    </script>
@endsection

