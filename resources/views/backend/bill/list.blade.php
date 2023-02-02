@extends('backend.master')
@section('title')
{{ __('messages.bill_collection_list') }}
@endsection


@php($bills = \App\Models\Bill::where('sp_id', auth()->user()->sp_id)->orderBy('id','DESC')->get())
@section('content')

    <div class="row">
        <div class="col-12">

            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@yield('title')</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.customer_id') }}</th>
                            <th>{{ __('messages.customer_name') }}</th>
                            <th>{{ __('messages.collected_by') }}</th>
                            <th>{{ __('messages.bill_month') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>Payment Date</th>
                            <th>{{ __('messages.status') }}</th>
                             <th>{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($bills as $bill)
                                <tr>
                                    <td>
                                        {{ $loop->index +1 }}
                                    </td>
                                    <td>{{ $bill->customer_id }}</td>
                                    <td>{{ \App\Models\Customer::where('customer_id' ,$bill->customer_id)->first()->customer_name  }}</td>
                                    <td>{{ $bill->em_id }}</td>
                                    <td>{{ $bill->month }}-{{ $bill->year }}</td>
                                    <td>{{ $bill->paid_amount }}</td>
                                    <td>{{ $bill->payment_date }}</td>
                                    <td>
                                        @if($bill->payment_status == 0)
                                            Unpaid
                                        @elseif($bill->payment_status == 1)
                                            Paid
                                        @else
                                        Unpaid
                                            @endif
                                    </td>
                                    <td>
                                        @if($bill->payment_status == 0)
                                            <a href="{{route('admin.bill.paid',['id'=>$bill->id])}}" class="btn btn-success">Paid</a>
                                        @elseif($bill->payment_status == 1)
                                            <h5 class="text-success">Paid</h5>
                                        @else
                                            <h5 class="text-danger">Unpaid</h5>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                        <tr>
                        <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.customer_id') }}</th>
                            <th>{{ __('messages.customer_name') }}</th>
                            <th>{{ __('messages.collected_by') }}</th>
                            <th>{{ __('messages.bill_month') }}</th>
                            <th>{{ __('messages.price') }}</th>
                            <th>Payment Date</th>
                            <th>{{ __('messages.status') }}</th>
                             <th>{{ __('messages.action') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>


@endsection

