@extends('backend.master')
@section('title')
    {{ __('messages.complaint_list') }}
@endsection


@php($complains = \App\Models\Complaint::where('sp_id', auth()->user()->sp_id)->get())
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
                            <th>{{__('messages.si')}}</th>
                            <th>{{ __('messages.customer_name') }}</th>
                            <th>{{ __('messages.area_name') }}</th>
                            <th>{{ __('messages.complaint') }}</th>
                            <th>{{ __('messages.date') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($complains as $complain)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $complain->customer_id }}</td>
                                <td>{{ $complain->area_id }}</td>
                                <td>{{ $complain->complain }}</td>
                                <td>{{ $complain->created_at->format('d-m-y') }}</td>
                                <td>
                                    @if($complain->status==0)
                                        <a href="{{route('admin.complaint.status',['id'=> $complain->id])}}" class="btn btn-success">Solve</a>
                                    @elseif( $complain->status == 1)
                                        <h5 style="color: green;">Soloved</h5>
                                    @else

                                    @endif
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{__('messages.si')}}</th>
                            <th>{{ __('messages.customer_name') }}</th>
                            <th>{{ __('messages.area_name') }}</th>
                            <th>{{ __('messages.complaint') }}</th>
                            <th>{{ __('messages.date') }}</th>
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


