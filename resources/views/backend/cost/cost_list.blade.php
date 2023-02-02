@extends('backend.master')
@section('title','Cost List')
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('messages.employee_id') }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{__('messages.si')}}</th>
                            <th>{{__('messages.employee_id')}}</th>
                            <th>{{__('messages.cost_details')}}</th>
                            <th>{{__('messages.ammount')}}</th>
                            <th>{{__('messages.status')}}</th>
                            <th>{{__('messages.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($costs as $key => $list)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $list->employee_id }}</td>
                                <td>{{ $list->cost_details }}</td>
                                <td>{{ $list->amount }}</td>
                                <td>
                                    @if($list->is_Accept==0)
                                        Request
                                        @elseif( $list->is_Accept == 1)
                                        Rejected
                                        @else
                                        Accepted
                                        @endif
                                </td>
                                <td>
                                    @if($list->is_Accept==0)
                                        <a href="{{route('admin.cost.accept',['id'=> $list->id])}}" class="btn btn-success">Accept</a>
                                        <a href="{{route('admin.cost.reject',['id'=> $list->id])}}" class="btn btn-danger">Reject</a>
                                    @elseif( $list->is_Accept == 1)
                                        <h5 style="color: red;">Rejected</h5>
                                    @else
                                        <h5 style="color: green;">Accepted</h5>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('messages.si')}}</th>
                            <th>{{__('messages.employee_id')}}</th>
                            <th>{{__('messages.cost_details')}}</th>
                            <th>{{__('messages.ammount')}}</th>
                            <th>{{__('messages.status')}}</th>
                            <th>{{__('messages.action')}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
