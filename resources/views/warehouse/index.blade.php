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
                            @foreach($all as $k=>$a)
                                <tr>
                                    <td>{{ucfirst($a->name)}}</td>
                                    <td>{{ucfirst($a->location)}}</td>
                                    <td>
                                        <span class="badge badge-{{($a->status == '1') ? 'success' : 'danger'}}">{{($a->status == '1') ? 'Active' : 'InActive'}}</span>
                                    </td>
                                    <td>
                                        <a href = "{{route('admin.warehouses.edit',$a->id)}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action = "{{route('admin.warehouses.destroy',$a)}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class = "btn btn-sm " onclick="return confirm('{{__('are you sure?')}}')" type = "submit"><i class="fa fa-trash" style="color: red"></i></button>
                                        </form>
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
