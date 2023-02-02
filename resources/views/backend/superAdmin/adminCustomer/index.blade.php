@extends('backend.master')
@section('title')
{{ __('messages.customer_list') }}
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ __('messages.customer_list') }}</h3>
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
                            <a href="{{ route('admin.customer.status', ["id"=>$cus_list->id]) }}" class="btn btn-{{ $cus_list->status == 1 ? "warning" : "primary" }} btn-sm text-white m-1">{{ $cus_list->status == 1 ? "Inactive" : "Active" }}</a>
                            <a href="{{ route('admin.customer.edit', ["id"=>$cus_list->id]) }}" class="btn btn-info btn-sm text-white m-1">Edit</a>
                          </td>
                        </tr>
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
