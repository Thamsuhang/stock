<div class = "c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id = "sidebar">
    <div class = "c-sidebar-brand d-lg-down-none p-2">
        <h6>STOCK MANAGEMENT SYSTEM</h6>
    </div>
    <ul class = "c-sidebar-nav">
        <li class = "c-sidebar-nav-item"><a class = "c-sidebar-nav-link" href = "{{route('home')}}">
                <svg class = "c-sidebar-nav-icon">
                    <use xlink:href = "{{asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg>
                {{_('Dashboard')}}</a></li>
        @if(auth()->user()->is_admin)
            <li class = "c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class = "c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href = "{{route('home')}}">
                    <svg class = "c-sidebar-nav-icon">
                        <use xlink:href = "{{asset('vendors/@coreui/icons/svg/free.svg#cil-house')}}"></use>
                    </svg>
                    Warehouse Management
                </a>
                <ul class = "c-sidebar-nav-dropdown-items">
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('admin.warehouses.create')}}">
                            Add WareHouse</a>
                    </li>
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('admin.warehouses.index')}}">
                            Manage WareHouses
                        </a>
                    </li>
                </ul>
            </li>
            <li class = "c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class = "c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href = "{{route('home')}}">
                    <svg class = "c-sidebar-nav-icon">
                        <use xlink:href = "{{asset('vendors/@coreui/icons/svg/free.svg#cil-layers')}}"></use>
                    </svg>
                    Product Management
                </a>
                <ul class = "c-sidebar-nav-dropdown-items">
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('admin.products.create')}}">
                            Add Product</a>
                    </li>
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('admin.products.index')}}">
                            Manage Products
                        </a>
                    </li>
                </ul>
            </li>
            <li class = "c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class = "c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href = "javascript:void(0);">
                    <svg class = "c-sidebar-nav-icon">
                        <use xlink:href = "{{asset('vendors/@coreui/icons/svg/free.svg#cil-apps-settings')}}"></use>
                    </svg>
                    Stock Management
                </a>
                <ul class = "c-sidebar-nav-dropdown-items">
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('admin.stocks.create')}}">
                            Add new Stock
                        </a>
                    </li>
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('stock-out')}}">
                            Stock Out
                        </a>
                    </li>
                    <li class = "c-sidebar-nav-item">
                        <a class = "c-sidebar-nav-link" href = "{{route('report')}}">
                            Generate Report
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        <li class = "c-sidebar-nav-title">{{_('Other')}}</li>
        <li class = "c-sidebar-nav-item">
            <a class = "c-sidebar-nav-link" href = "{{ route('logout') }}" onclick = "event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <svg class = "c-sidebar-nav-icon">
                    <use xlink:href = "{{asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer')}}"></use>
                </svg>
                {{ __('Logout') }}
            </a>
            <form id = "logout-form" action = "{{ route('logout') }}" method = "POST" class = "d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
