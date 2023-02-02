@extends('backend.master')

@php($total_customer = \App\Models\Customer::where('sp_id', auth()->user()->sp_id)->where('isAccept', 1)->count())
@php($new_customer = \App\Models\Customer::where('sp_id', auth()->user()->sp_id)->where('isAccept', 0)->count())
@php($total_collection = \App\Models\Collection::where('sp_id', auth()->user()->sp_id)->sum('collection'))
@php($collection_due = \App\Models\Collection::where('sp_id', auth()->user()->sp_id)->sum('due'))
@php($customer_paymet = \App\Models\Bill::where('sp_id', auth()->user()->sp_id)->where('payment_status', 1)->sum('paid_amount'))


@section('content')

    @if(auth()->user()->role == 1 )
        <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $new_customer }}</h3>
                        <p>New Customers</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.request.cutomer') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_customer }}</h3>
                        <p>Total Customer</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('admin.customer.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$total_collection}}</h3>
                        <p>Total Collection</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $collection_due }}</h3>
                        <p>Collection Due</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $customer_paymet }}</h3>
                        <p>Customer Payment</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    @endif

{{--    <div class="row">--}}

{{--        <section class="col-lg-7 connectedSortable">--}}

{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h3 class="card-title">--}}
{{--                        <i class="fas fa-chart-pie mr-1"></i>--}}
{{--                        Sales--}}
{{--                    </h3>--}}
{{--                    <div class="card-tools">--}}
{{--                        <ul class="nav nav-pills ml-auto">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="tab-content p-0">--}}

{{--                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">--}}
{{--                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>--}}
{{--                        </div>--}}
{{--                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">--}}
{{--                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}



@endsection
