<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header"></li>
<li class="nav-item">
    <a href="{{ aurl('') }}" class="nav-link {{ active_link(null,'active') }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
            {{ trans('admin.dashboard') }}
        </p>
    </a>
</li>
@if(admin()->user()->role("admins_show"))
    <li class="nav-item">
        <a href="{{aurl('admins')}}" class="nav-link {{ active_link('admins','active') }}">
            <i class="fas fa-users nav-icon"></i>
            <p>{{trans('admin.admins')}}</p>
        </a>
    </li>
@endif
<!--subscribers_start_route-->
@if(admin()->user()->role("subscribers_show"))
    <li class="nav-item">
        <a href="{{aurl('subscribers')}}" class="nav-link  {{active_link('subscribers','active')}}">
            <i class="fa fa-icons nav-icon"></i>
            <p>{{trans('admin.subscribers')}} </p>
        </a>
    </li>
@endif
<!--subscribers_end_route-->
<!--tickets_start_route-->
@if(admin()->user()->role("tickets_show"))
    <li class="nav-item">
        <a href="{{aurl('tickets')}}" class="nav-link  {{active_link('tickets','active')}}">
            <i class="fa fa-icons nav-icon"></i>
            <p>{{trans('admin.tickets')}} </p>
        </a>
    </li>
@endif
<!--tickets_end_route-->
<!--tickets_start_route-->
@if(admin()->user()->role("tickets_show"))
    <li class="nav-item">
        <a href="{{aurl('archives')}}" class="nav-link  {{active_link('archives','active')}}">
            <i class="fa fa-icons nav-icon"></i>
            <p>أرشيف الأعطال </p>
        </a>
    </li>
@endif
<!--tickets_end_route-->

@if(admin()->user()->role("settings_show"))
    <li class="nav-item {{ active_link('admins','menu-open') }}">
        <a href="#" class="nav-link  {{ active_link('admins','active') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                {{trans('admin.settings')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <!--damages_start_route-->
            @if(admin()->user()->role("damages_show"))
                <li class="nav-item">
                    <a href="{{aurl('damages')}}" class="nav-link  {{active_link('damages','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.damages')}} </p>
                    </a>
                </li>
            @endif
        <!--damages_end_route-->
            <!--regions_start_route-->
            @if(admin()->user()->role("regions_show"))
                <li class="nav-item">
                    <a href="{{aurl('regions')}}" class="nav-link  {{active_link('regions','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.regions')}} </p>
                    </a>
                </li>
            @endif
        <!--regions_end_route-->
            <!--streets_start_route-->
            @if(admin()->user()->role("streets_show"))
                <li class="nav-item">
                    <a href="{{aurl('streets')}}" class="nav-link  {{active_link('streets','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.streets')}} </p>
                    </a>
                </li>
            @endif
        <!--streets_end_route-->
            @if(admin()->user()->role("admingroups_show"))
                <li class="nav-item">
                    <a href="{{aurl('admingroups')}}" class="nav-link {{ active_link('admingroups','active') }}">
                        <i class="fas fa-users nav-icon"></i>
                        <p>{{trans('admin.admingroups')}}</p>
                    </a>
                </li>
            @endif
            @if(admin()->user()->role('settings_show'))
                <li class="nav-item">
                    <a href="{{ aurl('settings') }}" class="nav-link  {{ active_link('settings','active') }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            {{ trans('admin.settings') }}
                        </p>
                    </a>
                </li>
            @endif
            @if(admin()->user()->role("actions_show"))
                <li class="nav-item">
                    <a href="{{aurl('actions')}}" class="nav-link  {{active_link('actions','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.actions')}} </p>
                    </a>
                </li>
            @endif
            @if(admin()->user()->role("routers_show"))
                <li class="nav-item">
                    <a href="{{aurl('routers')}}" class="nav-link  {{active_link('routers','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.routers')}} </p>
                    </a>
                </li>
            @endif
        <!--categories_start_route-->
            @if(admin()->user()->role("categories_show"))
                <li class="nav-item">
                    <a href="{{aurl('categories')}}" class="nav-link  {{active_link('categories','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.categories')}} </p>
                    </a>
                </li>
            @endif
        <!--categories_end_route-->
            <!--subcategories_start_route-->
            @if(admin()->user()->role("subcategories_show"))
                <li class="nav-item">
                    <a href="{{aurl('subcategories')}}" class="nav-link  {{active_link('subcategories','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.subcategories')}} </p>
                    </a>
                </li>
            @endif
        <!--subcategories_end_route-->
            <!--merchants_start_route-->
            @if(admin()->user()->role("merchants_show"))
                <li class="nav-item">
                    <a href="{{aurl('merchants')}}" class="nav-link  {{active_link('merchants','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.merchants')}} </p>
                    </a>
                </li>
        @endif
        <!--merchants_end_route-->

        </ul>
    </li>
@endif


@if(admin()->user()->role("reports_show"))
    <li class="nav-item {{ active_link('admins','menu-open') }}">
        <a href="#" class="nav-link  {{ active_link('admins','active') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
                {{trans('admin.reports')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <!--damages_start_route-->
            @if(admin()->user()->role("salaryreports_show"))
                <li class="nav-item">
                    <a href="{{aurl('salaryreports')}}" class="nav-link  {{active_link('salaryreports','active')}}">
                        <i class="fa fa-icons nav-icon"></i>
                        <p>{{trans('admin.salaryreports')}} </p>
                    </a>
                </li>
        @endif
        <!--damages_end_route-->
            <!--regions_start_route-->

        </ul>
    </li>
@endif


<!--salaries_start_route-->
@if(admin()->user()->role("salaries_show"))
    <li class="nav-item {{active_link('salaries','menu-open')}} ">
        <a href="#" class="nav-link {{active_link('salaries','active')}}">
            <i class="nav-icon fa fa-icons"></i>
            <p>
                {{trans('admin.salaries')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('salaries')}}" class="nav-link  {{active_link('salaries','active')}}">
                    <i class="fa fa-icons nav-icon"></i>
                    <p>{{trans('admin.salaries')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('salaries/create') }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--salaries_end_route-->


<!--funds_start_route-->
@if(admin()->user()->role("funds_show"))
    <li class="nav-item {{active_link('funds','menu-open')}} ">
        <a href="#" class="nav-link {{active_link('funds','active')}}">
            <i class="nav-icon fa fa-icons"></i>
            <p>
                {{trans('admin.funds')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('funds')}}" class="nav-link  {{active_link('funds','active')}}">
                    <i class="fa fa-icons nav-icon"></i>
                    <p>{{trans('admin.funds')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('funds/create') }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--funds_end_route-->

<!--purchases_start_route-->
@if(admin()->user()->role("purchases_show"))
    <li class="nav-item {{active_link('purchases','menu-open')}} ">
        <a href="#" class="nav-link {{active_link('purchases','active')}}">
            <i class="nav-icon fa fa-icons"></i>
            <p>
                {{trans('admin.purchases')}}
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{aurl('purchases')}}" class="nav-link  {{active_link('purchases','active')}}">
                    <i class="fa fa-icons nav-icon"></i>
                    <p>{{trans('admin.purchases')}} </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ aurl('purchases/create') }}" class="nav-link">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>{{trans('admin.create')}} </p>
                </a>
            </li>
        </ul>
    </li>
@endif
<!--purchases_end_route-->


