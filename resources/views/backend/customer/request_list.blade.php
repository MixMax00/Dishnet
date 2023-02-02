@extends('backend.master')
@section('title')
    {{ __('messages.request_customer_list') }}
@endsection


@php($customer_lists = \App\Models\Customer::where('sp_id',auth()->user()->sp_id)->where('isAccept', 0)->orderBy('id','DESC')->get())
@php($package_lists = \App\Models\Package::where('sp_id', auth()->user()->sp_id)->get())

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('messages.request_customer_list') }}</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.id') }}</th>
                            <th>{{ __('messages.customer') }}</th>
                            <th>{{ __('messages.cell_number') }}</th>
                            <th>{{ __('messages.address') }}</th>
                            <th>{{ __('messages.area') }}</th>
                            <th>{{ __('messages.area_location') }}</th>
                            <th>{{ __('messages.package_sideber_title') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($customer_lists as $cus_list)
                            <tr>
                                <td>{{ $loop->index +1 }}</td>
                                <td>{{ $cus_list->customer_id }}</td>
                                <td>{{ $cus_list->customer_name }}</td>
                                <td>{{ $cus_list->cell_number }}</td>
                                <td>{{ $cus_list->address }}</td>
                                <td>{{ \App\Models\Area::where('area_id',$cus_list->area_id)->first()->area_name ?? '' }}</td>
                                <td>{{ \App\Models\AreaLocation::where('area_location_id',$cus_list->area_loc_id)->first()->area_location_name ?? '' }}</td>
                                <td>{{ \App\Models\Package::where('package_id',$cus_list->package_id)->first()->package_name ?? ''}}</td>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm text-white m-1" data-toggle="modal" data-target="#modal-default_{{ $cus_list->id }}">{{ __('messages.accept') }}</a>
                                    <div class="modal fade" id="modal-default_{{ $cus_list->id }}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{ __('messages.customer_accept') }}</h4>

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.cutomer.isAccept') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>{{ __('messages.customer') }}</th>
                                                                <td>{{ $cus_list->customer_name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.cell_number') }}</th>
                                                                <td>{{ $cus_list->cell_number }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.email') }}</th>
                                                                <td>{{ $cus_list->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.profession') }}</th>
                                                                <td>{{ $cus_list->profession }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.dob') }}</th>
                                                                <td>{{ $cus_list->dob }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.nid') }}</th>
                                                                <td>{{ $cus_list->nid }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.address') }}</th>
                                                                <td>{{ $cus_list->address }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.area_name') }}</th>
                                                                <td>{{ \App\Models\Area::where('area_id',$cus_list->area_id)->first()->area_name ?? '' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.area_location_name') }}</th>
                                                                <td>{{ \App\Models\AreaLocation::where('area_location_id',$cus_list->area_loc_id)->first()->area_location_name ?? '' }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>{{ __('messages.status') }}</th>
                                                                <td>{{ $cus_list->accept == 0 ? "Inactive" : "Active" }}</td>
                                                            </tr>
                                                            <tr class="bg-gradient-lightblue">
                                                                <th>
                                                                    <label for="inputPassword3" class="col-form-label">
                                                                        {{ __('messages.package_name') }}
                                                                    </label>
                                                                </th>
                                                                <td>
                                                                    <input type="hidden" name="id" value="{{ $cus_list->id }}">
                                                                    <select name="packge_name" class="form-control @error('packge_name') is-invalid @enderror">
{{--                                                                        <option>Please Select packages name</option>--}}
                                                                        @foreach($package_lists as $data)
                                                                            <option value="{{ $data->package_id }}">{{ $data->package_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <span style="color: blue">Please select customer packages.</span>
                                                                    @error('packge_name')
                                                                     <p class="text-danger">{{ $message }}</p>
                                                                    @enderror
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="modal-footer justify-content-end">
                                                        <button type="submit" class="btn btn-primary btn-lg text-white m-1" >{{ __('messages.accept') }}</button>
                                                    </div>
                                                </form>

                                            </div>

                                        </div>

                                    </div>
                                </td>


                            </tr>

{{--                            // accept modal--}}


                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>{{ __('messages.si') }}</th>
                            <th>{{ __('messages.customer_id') }}</th>
                            <th>{{ __('messages.customer_name') }}</th>
                            <th>{{ __('messages.cell_number') }}</th>
                            <th>{{ __('messages.address') }}</th>
                            <th>{{ __('messages.area') }}</th>
                            <th>{{ __('messages.area_location') }}</th>
                            <th>{{ __('messages.package_sideber_title') }}</th>
                            <th>{{ __('messages.action') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection
