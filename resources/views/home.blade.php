@extends('layouts.app')
@section('pageTitle', 'Dashboard'));
@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">{{ __('Dashboard') }}</div>
                    <div class = "card-body">
                        <div class = "row">
                            <div class = "col-sm-6 col-lg-4">
                                  <a href = "{{route('stock-out')}}" style="text-decoration: none">
                                <div class = "card">
                                    <div class = "card-header bg-facebook content-center">
                                        <svg class = "c-icon c-icon-3xl text-white my-4">
                                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-applications-settings"></use>
                                        </svg>
                                    </div>
                                    <div class = "card-body row text-center">
                                        <div class = "col">
                                            <div class = "text-value-xl">{{$stats['stocksInThisYear']}}</div>
                                            <div class = "text-uppercase text-muted small">Total StocksIn ({{date('Y')}})</div>
                                        </div>
                                        <div class = "c-vr"></div>
                                        <div class = "col">
                                            <div class = "text-value-xl">{{$stats['totalStocks']}}</div>
                                            <div class = "text-uppercase text-muted small">Total StocksOut</div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>

                            <div class = "col-sm-6 col-lg-4">
                                  <a href = "{{route('admin.warehouses.index')}}" style="text-decoration: none">
                                <div class = "card">
                                    <div class = "card-header bg-twitter content-center">
                                        <svg class = "c-icon c-icon-3xl text-white my-4">
                                            <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-house"></use>
                                        </svg>
                                    </div>
                                    <div class = "card-body row text-center">
                                        <div class = "col">
                                            <div class = "text-value-xl">{{$stats['warehouseActive']}}</div>
                                            <div class = "text-uppercase text-muted small">Total Active Warehouses</div>
                                        </div>
                                        <div class = "c-vr"></div>
                                        <div class = "col">
                                            <div class = "text-value-xl">{{$stats['warehouseInActive']}}</div>
                                            <div class = "text-uppercase text-muted small">Total Inactive Warehouses</div>
                                        </div>
                                    </div>
                                </div>
                                  </a>
                            </div>

                                <div class = "col-sm-6 col-lg-4">
                                    <a href = "{{route('admin.products.index')}}" style="text-decoration: none">
                                    <div class = "card">
                                        <div class = "card-header bg-linkedin content-center">

                                            <svg class = "c-icon c-icon-3xl text-white my-4">
                                                <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-line-weight"></use>
                                            </svg>

                                        </div>

                                        <div class = "card-body row text-center">
                                            <div class = "col">
                                                <div class = "text-value-xl">{{$stats['productActive']}}</div>
                                                <div class = "text-uppercase text-muted small">Total Active Products</div>
                                            </div>
                                            <div class = "c-vr"></div>
                                            <div class = "col">
                                                <div class = "text-value-xl">{{$stats['productInActive']}}</div>
                                                <div class = "text-uppercase text-muted small">Total InActive Products</div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
