@extends('layouts.app')
@section('pageTitle', 'Generate Report'));
@section('content')

    <script>
        var stocksStartInDay = <?= isset($finalArray['data-set']['start']['stocksIn']['month']) && $finalArray['data-set']['start']['stocksIn']['month'] !== '' ? json_encode($finalArray['data-set']['start']['stocksIn']['month']) : '' ?>;
        var quantityStart = <?= isset($finalArray['data-set']['start']['stocksIn']['quantity']) && $finalArray['data-set']['start']['stocksIn']['quantity'] !== '' ? json_encode($finalArray['data-set']['start']['stocksIn']['quantity']) : '' ?>;
        var stocksEndInDay = <?= isset($finalArray['data-set']['end']['stocksIn']['month']) && $finalArray['data-set']['end']['stocksIn']['month'] !== '' ? json_encode($finalArray['data-set']['end']['stocksIn']['month']) : '' ?>;
        var quantityEnd = <?= isset($finalArray['data-set']['end']['stocksIn']['quantity']) && $finalArray['data-set']['end']['stocksIn']['quantity'] !== '' ? json_encode($finalArray['data-set']['end']['stocksIn']['quantity']) : '' ?>;
    </script>
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">
                        <div class = "card-title">Generate Report</div>
                    </div>
                    <div class = "card-body">
                        <form action = "{{route('stocks.getReport')}}" method = "post">
                            @csrf
                            <div class = "form-group row">
                                <div class = "form-group col-6">
                                    <label for = "start-date" class = "control-label">Start Date</label>
                                    <input autocomplete = "off" type = "text" id = "start-date" value = "{{old('start_date')}}" name = "date[start]" class = "datepicker form-control required">
                                </div>
                                <div class = "form-group col-6">
                                    <label for = "end-date" class = "control-label">End Date</label>
                                    <input autocomplete = "off" type = "text" id = "end-date" value = "{{old('end_date')}}" name = "date[end]" class = "datepicker form-control required">
                                </div>
                                <div class = "form-group col-6">
                                    <label for = "warehouse">Select Warehouse</label>
                                    <select name = "warehouse_id" id = "warehouse" class = "form-control">
                                        <option value = "">All</option>
                                        @foreach($allWarehouses as $k=>$warehouse)
                                            <option value = "{{$warehouse['id']}}">{{$warehouse['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class = "form-group col-6">
                                    <label for = "product">Select Product</label>
                                    <select name = "product_id" id = "product" class = "form-control">
                                        <option value = "">All</option>
                                        @foreach($products as $k=>$product)
                                            <option value = "{{$product['id']}}">{{$product['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class = "form-group col-12">
                                    <button type = "submit" class = "btn btn-sm btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($finalArray) && $finalArray!=='')
        <button type = "button" class = "btn btn-primary" id = "isModal" data-toggle = "modal" data-target = ".bd-example-modal-lg">View Report</button>
    @endif

    <!-- Modal -->
    <div class = "modal fade bd-example-modal-lg" tabindex = "-1" role = "dialog" aria-labelledby = "myLargeModalLabel" aria-hidden = "true">
        <div class = "modal-dialog modal-lg">
            <div class = "modal-content">
                <div class = "card" style = "background-color: white">
                    <div class = "card-header">
                        <div class = "card-title">
                            <h5>Stock Report Of the Fiscal year</h5>
                            <p>
                                <i class = "fa fa-calendar" aria-hidden = "true"></i>
                                <?= isset($finalArray['start_year']) && $finalArray['start_year'] !== '' ? $finalArray['start_year'] : '' ?>
                                -
                                <?= isset($finalArray['end_year']) && $finalArray['end_year'] !== '' ? $finalArray['end_year'] : '' ?>
                            </p>
                        </div>
                    </div>
                    <div class = "card-body" id = "capture">
                        <div class = "row" style = "background-color: white">
                            <div class = "col-5" style = "display: flex; justify-content: center">
                                <div style = "max-width: 600px;">
                                    <p>
                                        PieChart of total Stockins in <?= isset($finalArray['start_year']) && $finalArray['start_year'] !== '' ? date('M, Y', strtotime($finalArray['start_year'])) : '' ?>
                                    </p>
                                    <canvas id = "myChart" width = "600" height = "600"></canvas>
                                </div>
                            </div>
                            <div class = "col-2">
                                <div class = "card text-white bg-primary">
                                    <div class = "card-body">
                                        <div class = "text-muted text-right mb-4">
                                            <svg class = "c-icon c-icon-2xl">
                                                <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
                                            </svg>
                                        </div>
                                        <div class = "text-value-lg">
                                            <?= isset($finalArray['end']['stocksIn']['total_quantity']) && isset($finalArray['start']['stocksIn']['total_quantity']) && $finalArray['start']['stocksIn']['total_quantity'] !== '' && $finalArray['end']['stocksIn']['total_quantity'] !== '' ? ($finalArray['start']['stocksIn']['total_quantity'] + $finalArray['end']['stocksIn']['total_quantity']) / 2 : '' ?>
                                        </div>
                                        <small class = "text-muted text-uppercase font-weight-bold">Total Avg. Stocks</small>
                                        <div class = "progress progress-white progress-xs mt-3">
                                            <div class = "progress-bar" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class = "col-5" style = "display: flex; justify-content: center">
                                <div style = "max-width: 600px;">
                                    <p>
                                        PieChart of total Stockins in <?= isset($finalArray['end_year']) && $finalArray['end_year'] !== '' ? date('M, Y', strtotime($finalArray['end_year'])) : '' ?>
                                    </p>
                                    <canvas id = "myChart1" width = "600" height = "600"></canvas>
                                </div>
                            </div>
                            <div class = "col-12 mt-5">
                                <div class = "row">
                                    <div class = "col-sm-6 col-md-3">
                                        <div class = "card text-white bg-info">
                                            <div class = "card-body">
                                                <div class = "text-muted text-right mb-4">
                                                    <svg class = "c-icon c-icon-2xl">
                                                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-inbox"></use>
                                                    </svg>
                                                </div>
                                                <div class = "text-value-lg"><?= isset($finalArray['start']['stocksIn']['total_quantity']) && $finalArray['start']['stocksIn']['total_quantity'] !== '' ? $finalArray['start']['stocksIn']['total_quantity'] : '' ?>
                                                </div>
                                                <p class = "text-muted text-uppercase font-weight-bold">Total stocks in - <?= isset($finalArray['start']['stocksIn']['year']) && $finalArray['start']['stocksIn']['year'] !== '' ? $finalArray['start']['stocksIn']['year'] : '' ?></p>
                                                <div class = "progress progress-white progress-xs mt-3">
                                                    <div class = "progress-bar" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-sm-6 col-md-3">
                                        <div class = "card text-white bg-success">
                                            <div class = "card-body">
                                                <div class = "text-muted text-right mb-4">
                                                    <svg class = "c-icon c-icon-2xl">
                                                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-external-link"></use>
                                                    </svg>
                                                </div>
                                                <div class = "text-value-lg"><?= isset($finalArray['start']['stocksOut']['total_quantity']) && $finalArray['start']['stocksOut']['total_quantity'] !== '' ? $finalArray['start']['stocksOut']['total_quantity'] : '' ?>
                                                </div>
                                                <p class = "text-muted text-uppercase font-weight-bold">Total stocks in - <?= isset($finalArray['end']['stocksIn']['year']) && $finalArray['end']['stocksIn']['year'] !== '' ? $finalArray['end']['stocksIn']['year'] : '' ?></p>
                                                <div class = "progress progress-white progress-xs mt-3">
                                                    <div class = "progress-bar" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-sm-6 col-md-3">
                                        <div class = "card text-white bg-success">
                                            <div class = "card-body">
                                                <div class = "text-muted text-right mb-4">
                                                    <svg class = "c-icon c-icon-2xl">
                                                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
                                                    </svg>
                                                </div>
                                                <div class = "text-value-lg"><?= isset($finalArray['totalStockInProductCount']) && $finalArray['totalStockInProductCount'] !== '' ? $finalArray['totalStockInProductCount'] : '' ?></div>
                                                <small class = "text-muted text-uppercase font-weight-bold">Total StocksIn Throughout the entire Fiscal year</small>
                                                <div class = "progress progress-white progress-xs mt-3">
                                                    <div class = "progress-bar" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class = "col-sm-6 col-md-3">
                                        <div class = "card text-white bg-warning">
                                            <div class = "card-body">
                                                <div class = "text-muted text-right mb-4">
                                                    <svg class = "c-icon c-icon-2xl">
                                                        <use xlink:href = "vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                                                    </svg>
                                                </div>
                                                <div class = "text-value-lg"><?= isset($finalArray['totalStockOutProductCount']) && $finalArray['totalStockOutProductCount'] !== '' ? $finalArray['totalStockOutProductCount'] : '' ?></div>
                                                <small class = "text-muted text-uppercase font-weight-bold">Total StocksOut Throughout the entire Fiscal year</small>
                                                <div class = "progress progress-white progress-xs mt-3">
                                                    <div class = "progress-bar" role = "progressbar" style = "width: 25%" aria-valuenow = "25" aria-valuemin = "0" aria-valuemax = "100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class = "col-12 text-right">
                    <button class = "btnPrint btn btn-sm btn-primary noPrint mb-5">Print</button>
                </div>
            </div>
        </div>
    </div>
@endsection
