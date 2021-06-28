@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">{{ __('Dashboard') }}</div>
                    <div class = "card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm data-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $k=>$a)
                                <tr>
                                    <td>{{ucfirst($a->name)}}</td>
                                    <td>{{ucfirst($a->location)}}</td>
                                    <td>
                                        <span class="badge badge-{{($a->status == '1') ? 'success' : 'danger'}}">{{($a->status == '1') ? 'Active' : 'InActive'}}</span>
                                    </td>
                                    <td>
                                        <a href = "{{route('stocks/adjust',$a->id)}}">
                                            <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> <span class="text-white">Adjust Stocks</span></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
