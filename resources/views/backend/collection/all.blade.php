@extends('backend.master')
@section('title')
    {{ __('messages.collection_add') }}
@endsection


@php($all_collections = \App\Models\Collection::where('sp_id',auth()->user()->sp_id)->orderBy('id','DESC')->get())


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="d-flex align-items-center justify-content-between">
                       <h3 class="card-title">{{ __('messages.collection_list') }}</h3>
                       <a href="{{ route('admin.collection.add')  }}" class="btn btn-info float-end"> Add Collection</a>
                   </div>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.employee_id') }}</th>
                            <th>{{ __('messages.employee_name') }}</th>
                            <th>{{ __('messages.collection') }}</th>
{{--                            <th>{{ __('messages.cost') }}</th>--}}
{{--                            <th>{{ __('messages.total') }}</th>--}}
                            <th>{{ __('messages.due') }}</th>
                            <th>{{ __('messages.explanation') }}</th>
                            <th>{{ __('messages.status') }}</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($all_collections as $all_collection)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $all_collection->employee_id }}</td>
                                <td>{{ $all_collection->employee->employee_name }}</td>
                                <td>{{ $all_collection->collection }}</td>
{{--                                <td>{{ $all_collection->cost }}</td>--}}
{{--                                <td>{{ $all_collection->total }}</td>--}}
                                <td>{{ $all_collection->due }}</td>
                                <td>{{ $all_collection->explanation }}</td>
                                <td>
                                    @if($all_collection->due==0)
                                        <span class="text-success">Paid</span>
                                    @else
                                        <a href="{{ route('admin.collection.edit', ['id'=>$all_collection->id]) }}" class="btn btn-warning">Due</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.employee_id') }}</th>
                            <th>{{ __('messages.employee_name') }}</th>
                            <th>{{ __('messages.collection') }}</th>
{{--                            <th>{{ __('messages.cost') }}</th>--}}
{{--                            <th>{{ __('messages.total') }}</th>--}}
                            <th>{{ __('messages.due') }}</th>
                            <th>{{ __('messages.explanation') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection
