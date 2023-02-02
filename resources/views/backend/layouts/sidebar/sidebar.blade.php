@php
    $prefix =Request::route()->getPrefix();
     $route =Route::current()->getname();
//     $settings = \App\Models\GeneralSettings::where('school_id', auth()->user()->school_id)->first();
@endphp

<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @if(auth()->user()->role == 0)
          <li class="nav-item {{($route == 'super.dashboard')?'menu-open': ''}}">
{{--              {{dd($route)}}--}}
            <a href="{{route('super.dashboard')}}" class="nav-link {{($route == 'super.dashboard')?'active': ''}}">
              <i class="nav-icon fas fa-tachometer-alt " style="color:orange"></i>
              <p>
              {{ __('messages.dashboard') }}

              </p>
            </a>

          </li>
            @else
            <li class="nav-item {{($route == 'super.dashboard')?'menu-open': ''}}">
{{--              {{dd($route)}}--}}
            <a href="{{route('super.dashboard')}}" class="nav-link {{($route == 'super.dashboard')?'active': ''}}">
              <i class="nav-icon fas fa-tachometer-alt " style="color:orange"></i>
              <p>
              {{ __('messages.dashboard') }}

              </p>
            </a>

          </li>
            @endif

        @if(auth()->user()->role == 0)
          <li class="nav-item
          {{($route == 'super.merchant')?'menu-open': ''}}
          {{($route == 'super.merchant.add')?'menu-open': ''}}
          ">
            <a href="#" class="nav-link
            {{($route == 'super.merchant')?'active': ''}}
            {{($route == 'super.merchant.add')?'active': ''}}
            ">
                <i class="nav-icon fas fa-store " style="color:orange"></i>
              <p>
              {{ __('messages.service_provider') }}
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="{{route('super.merchant')}}" class="nav-link {{($route == 'super.merchant')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{ __('messages.service_provider_list') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('super.merchant.add')}}" class="nav-link {{($route == 'super.merchant.add')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p> {{ __('messages.service_provider_add') }}</p>
                </a>
              </li>

            </ul>
          </li>
                <li class="nav-item
          {{($route == 'superadmin.package')?'menu-open': ''}}
          {{($route == 'superadmin.package.add')?'menu-open': ''}}
          ">
                    <a href="#" class="nav-link
            {{($route == 'superadmin.package')?'active': ''}}
            {{($route == 'superadmin.package.add')?'active': ''}}
            ">
                        <i class="nav-icon fa-solid fa-boxes-packing" style="color:orange"></i>                    <p>
                            {{ __('messages.package_sideber_title') }}
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('superadmin.package')}}" class="nav-link {{($route == 'superadmin.package')?'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('messages.package_sidebar_list') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('superadmin.package.add')}}" class="nav-link {{($route == 'superadmin.package.add')?'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('messages.package_sidebar_add') }}</p>
                            </a>
                        </li>

                    </ul>
                </li>

            <li class="nav-item {{($route == 'superadmin.collection.all')?'menu-open': ''}}">
                <a href="{{route('superadmin.collection.all')}}" class="nav-link {{($route == 'superadmin.collection.all')?'active': ''}}">
                    <i class="nav-icon fa-solid fa-bangladeshi-taka-sign" style="color: orange;"></i>

                    <p>
                        {{ __('messages.collection') }}

                    </p>
                </a>

            </li>
                <li class="nav-item
            {{($route == 'superadmin.customer.index')?'menu-open': ''}}
            {{($route == 'superadmin.request.cutomer')?'menu-open': ''}}
          ">
                    <a href="#" class="nav-link
              {{($route == 'superadmin.customer.index')?'active': ''}}
              {{($route == 'superadmin.request.cutomer')?'active': ''}}
            ">
                        <i class="nav-icon fas fa-users " style="color:orange"></i>
                        <p>
                            {{ __('messages.customer') }}  </p>
                        <i class="fas fa-angle-left right"></i>
                        <!-- <span class="badge badge-info right">2</span> -->
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item ">
                            <a href="{{route('superadmin.customer.index')}}" class="nav-link {{($route == 'superadmin.customer.index')?'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('messages.customer_list') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('superadmin.request.cutomer')}}" class="nav-link {{($route == 'superadmin.request.cutomer')?'active': ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('messages.request_customer_list') }} </p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-item {{($route == 'superadmin.notification.getNotificationCustomer')?'menu-open': ''}}">
                    <a href="{{route('superadmin.notification.getNotificationCustomer')}}" class="nav-link {{($route == 'superadmin.notification.getNotificationCustomer')?'active': ''}}">
                        <i class="nav-icon fa-solid fa-bell" style="color: orange;"></i>

                        <p>
                            {{ __('messages.notification') }}

                        </p>
                    </a>

                </li>
            @endif

            @if(auth()->user()->role == 1)
            <li class="nav-item
          {{($route == 'admin.package')?'menu-open': ''}}
          {{($route == 'admin.package.add')?'menu-open': ''}}
          ">
                <a href="#" class="nav-link
            {{($route == 'admin.package')?'active': ''}}
            {{($route == 'admin.package.add')?'active': ''}}
            ">
                    <i class="nav-icon fa-solid fa-boxes-packing" style="color:orange"></i>                    <p>
                    {{ __('messages.package_sideber_title') }}
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('admin.package')}}" class="nav-link {{($route == 'admin.package')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.package_sidebar_list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.package.add')}}" class="nav-link {{($route == 'admin.package.add')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.package_sidebar_add') }}</p>
                        </a>
                    </li>

                </ul>
            </li>

          <li class="nav-item
            {{($route == 'admin.serviceArea.index')?'menu-open': ''}}
            {{($route == 'admin.serviceArea.create')?'menu-open': ''}}
          ">
            <a href="#" class="nav-link
              {{($route == 'admin.serviceArea.index')?'active': ''}}
              {{($route == 'admin.serviceArea.create')?'active': ''}}
            ">
                <i class="nav-icon fas fa-map " style="color:orange"></i>
              <p>
              {{ __('messages.service_area') }}
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="{{route('admin.serviceArea.index')}}" class="nav-link {{($route == 'admin.serviceArea.index')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('messages.service_area_list') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.serviceArea.create')}}" class="nav-link {{($route == 'admin.serviceArea.create')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('messages.service_area_add') }}</p>
                </a>
              </li>

            </ul>
          </li>

            <li class="nav-item
            {{($route == 'admin.arealocation.index')?'menu-open': ''}}
            {{($route == 'admin.arealocation.create')?'menu-open': ''}}
          ">
                <a href="#" class="nav-link
              {{($route == 'admin.arealocation.index')?'active': ''}}
              {{($route == 'admin.arealocation.create')?'active': ''}}
            ">
                    <i class="nav-icon fa-sharp fa-solid fa-location-crosshairs" style="color:orange"></i>

                    <p>
                        {{ __('messages.area_location') }}
                        <i class="fas fa-angle-left right"></i>
                        <!-- <span class="badge badge-info right">2</span> -->
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item ">
                        <a href="{{route('admin.arealocation.index')}}" class="nav-link {{($route == 'admin.arealocation.index')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.area_location_list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.arealocation.create')}}" class="nav-link {{($route == 'admin.arealocation.create')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.area_location_add') }}</p>
                        </a>
                    </li>


                </ul>
            </li>

          <li class="nav-item
            {{($route == 'admin.representative.index')?'menu-open': ''}}
            {{($route == 'admin.representative.create')?'menu-open': ''}}
          ">
            <a href="#" class="nav-link
              {{($route == 'admin.representative.index')?'active': ''}}
              {{($route == 'admin.representative.create')?'active': ''}}
            ">
                <i class="nav-icon fas fa-user " style="color:orange"></i>
              <p>
              {{ __('messages.employee') }}
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="{{route('admin.representative.index')}}" class="nav-link {{($route == 'admin.representative.index')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('messages.employee_list') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.representative.create')}}" class="nav-link {{($route == 'admin.representative.create')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('messages.employee_add') }}</p>
                </a>
              </li>

            </ul>
          </li>




          <li class="nav-item
            {{($route == 'admin.customer.index')?'menu-open': ''}}
            {{($route == 'admin.customer.create')?'menu-open': ''}}
            {{($route == 'admin.request.cutomer')?'menu-open': ''}}
          ">
            <a href="#" class="nav-link
              {{($route == 'admin.customer.index')?'active': ''}}
              {{($route == 'admin.customer.create')?'active': ''}}
              {{($route == 'admin.request.cutomer')?'active': ''}}
            ">
                <i class="nav-icon fas fa-users " style="color:orange"></i>
              <p>
              {{ __('messages.customer') }}  <span class="text-warning notification-customer">(0)</span></p>
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">2</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item ">
                <a href="{{route('admin.customer.index')}}" class="nav-link {{($route == 'admin.customer.index')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('messages.customer_list') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.customer.create')}}" class="nav-link {{($route == 'admin.customer.create')?'active': ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('messages.customer_add') }}</p>
                </a>
              </li>
                <li class="nav-item">
                    <a href="{{route('admin.request.cutomer')}}" class="nav-link {{($route == 'admin.request.cutomer')?'active': ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('messages.request_customer_list') }} <span class="text-dark notification-customer">(0)</span></p>
                    </a>
                </li>


            </ul>
          </li>
            <li class="nav-item
            {{($route == 'admin.bill')?'menu-open': ''}}
            {{($route == 'admin.bill.collect')?'menu-open': ''}}
          ">
                <a href="#" class="nav-link
              {{($route == 'admin.bill')?'active': ''}}
              {{($route == 'admin.bill.collect')?'active': ''}}
            ">
                    <i class="nav-icon fas fa-money-bill " style="color:orange"></i>
                    <p>
                    {{ __('messages.bill_collection') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item ">
                        <a href="{{route('admin.bill')}}" class="nav-link {{($route == 'admin.bill')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.bill_collection_list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.bill.collect')}}" class="nav-link {{($route == 'admin.bill.collect')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.bill_collection_add') }}</p>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item {{($route == 'admin.cost')?'menu-open': ''}}">
                {{--              {{dd($route)}}--}}
                <a href="{{route('admin.cost')}}" class="nav-link {{($route == 'admin.cost')?'active': ''}}">
                    <i class="nav-icon fa-solid fa-hand" style="color: orange;"></i>
                    <p>
                        {{ __('messages.cost') }}

                    </p>
                </a>

            </li>

            <li class="nav-item {{($route == 'admin.collection.all')?'menu-open': ''}}">
                <a href="{{route('admin.collection.all')}}" class="nav-link {{($route == 'admin.collection.all')?'active': ''}}">
                    <i class="nav-icon fa-solid fa-bangladeshi-taka-sign" style="color: orange;"></i>

                    <p>
                        {{ __('messages.collection') }}

                    </p>
                </a>

            </li>

            <li class="nav-item
            {{($route == 'admin.complaint')?'menu-open': ''}}
            {{($route == 'admin.complaint.add')?'menu-open': ''}}
          ">
                <a href="#" class="nav-link
              {{($route == 'admin.complaint')?'active': ''}}
              {{($route == 'admin.complaint.add')?'active': ''}}
            ">
                    <i class="nav-icon fa fa-building" style="color:orange"></i>

                    <p>
                        {{ __('messages.complaint') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item ">
                        <a href="{{route('admin.complaint')}}" class="nav-link {{($route == 'admin.complaint')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.complaint_list') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.complaint.add')}}" class="nav-link {{($route == 'admin.complaint.add')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.complaint_add') }}</p>
                        </a>
                    </li>

                </ul>
            </li>

                <li class="nav-item {{($route == 'admin.notification.getNotificationCustomer')?'menu-open': ''}}">
                    <a href="{{route('admin.notification.getNotificationCustomer')}}" class="nav-link {{($route == 'admin.notification.getNotificationCustomer')?'active': ''}}">
                        <i class="nav-icon fa-solid fa-bell" style="color: orange;"></i>

                        <p>
                            {{ __('messages.notification') }}

                        </p>
                    </a>

                </li>


                <li class="nav-item ">
                    <a href="{{route('admin.surzopay.index')}}" class="nav-link {{($route == 'admin.surzopay.index')?'active': ''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('messages.surzo_pay') }}</p>
                    </a>
                </li>

            @endif

            <li class="nav-item
            {{($route == 'admin.setting.generalSetting')?'menu-open': ''}}
            {{($route == 'admin.password.index')?'menu-open': ''}}
            {{($route == 'admin.surzopay.index')?'menu-open': ''}}

          ">
                <a href="#" class="nav-link
              {{($route == 'admin.setting.generalSetting')?'active': ''}}
              {{($route == 'admin.password.index')?'active': ''}}
              {{($route == 'admin.surzopay.index')?'active': ''}}

            ">
                    <i class="nav-icon fa-solid fa-wrench" style="color:orange"></i>

                    <p>
                        {{ __('messages.settings') }}
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview ">
                    <li class="nav-item ">
                        <a href="{{route('admin.setting.generalSetting')}}" class="nav-link {{($route == 'admin.setting.generalSetting')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.general_setting') }}</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{route('admin.password.index')}}" class="nav-link {{($route == 'admin.password.index')?'active': ''}}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('messages.change_password') }}</p>
                        </a>
                    </li>




                </ul>
            </li>

        </ul>
      </nav>
