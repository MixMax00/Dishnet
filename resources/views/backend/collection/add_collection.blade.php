@extends('backend.master')

@section('title')
    {{ __('messages.collection_add') }}
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
                <form class="form-horizontal" action="{{ route('admin.collection.store') }}" method="POST">
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
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.employee_name') }}</label>
                            <div class="col-sm-8">
                                <select name="employee_name" id="employeeId" class="form-control">
                                    <option>please select employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->employee_id }}">{{ $employee->employee_name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_name')
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

