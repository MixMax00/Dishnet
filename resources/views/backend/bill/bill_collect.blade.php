@extends('backend.master')

@section('title')
  {{ __('messages.bill_collection_add')}}
@endsection

@php($customers = \App\Models\Customer::where('sp_id',auth()->user()->sp_id)->get())
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
                <form class="form-horizontal" action="{{ route('admin.bill.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"> {{ __('messages.customer_id')}}</label>
                            <div class="col-sm-8">
                                <select name="customer_id" id="customerId" class="selectpicker form-control" data-dropup-auto="false"  data-live-search="true">
                                    <option value="">Search Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->customer_id }}">{{ $customer->customer_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.customer_name')}}</label>
                            <div class="col-sm-8">
                                <input type="text" id="customerName" class="form-control" readonly>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.package_sideber_title')}}</label>
                            <div class="col-sm-8">
                                <input type="text" id="packageName" class="form-control" readonly>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.package_price')}}</label>
                            <div class="col-sm-8">
                                <input type="text" id="price" class="form-control" readonly>
                             </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.current_month')}}</label>
                            <div class="col-sm-8">
                                <select name="month" id="" class="selectpicker form-control" data-dropup-auto="false"  data-live-search="true">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November </option>
                                    <option value="December">December </option>

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('messages.bill_year')}}</label>
                            <div class="col-sm-8">
                                <select name="year" id="" class="selectpicker form-control" data-dropup-auto="false"  data-live-search="true">
                                   @for ($i = 2000; $i <= 2050; $i++)
                                   <option value="{{ $i }}">{{ $i }}</option>
                                   @endfor
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">{{ __('messages.service_charge')}}</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="serviceCharge" value="0" required name="service_charge"
                                 id="" placeholder="{{ __('messages.service_charge')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">{{ __('messages.total')}}</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="total" required name="total" readonly id="" placeholder="{{ __('messages.total')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-info">{{ __('messages.pay_confiram')}}</button>
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
        $(document).ready(function(){
            $('#customerId').change(function(){
                let customerId = $(this).val();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'{{ route('admin.bill.getcustomer') }}',
                    data: {customer_id:customerId},
                    success:function(data) {
                        $("#customerName").val(data.customer_name);
                        var packId = data.package_id;
                        // alert(data.package_id);
                        packagist(packId);
                    }
                });
            });

            function packagist(packId)
            {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:'{{ route('admin.bill.getpackage') }}',
                    data: {package_id:packId},
                    success:function(data) {
                        $("#packageName").val(data.package_name);
                        $("#price").val(data.price);
                        $("#total").val(data.price);
                    }
                });
            }

            $("#serviceCharge").keyup(function(){
                let serviceCharge = $(this).val();
                let packagePrice =  $("#price").val();
                $("#total").val(packagePrice);
                let totalPrice = parseInt(packagePrice) + parseInt(serviceCharge);
                $("#total").val(totalPrice);

            });

            $("#serviceCharge").keydown(function(){
                let serviceCharge = $(this).val();
                let packagePrice =  $("#price").val();
                $("#total").val(packagePrice);
                let totalPrice = parseInt(packagePrice) - parseInt(serviceCharge);
                $("#total").val(totalPrice);

            });
        });

    </script>

@endsection
