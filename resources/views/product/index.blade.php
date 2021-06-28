@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row justify-content-center">
            <div class = "col-md-12">
                <div class = "card">
                    <div class = "card-header">{{ __('All Products') }}</div>
                    <div class = "card-body">
                        <table class="table table-responsive-sm table-bordered table-striped table-sm data-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all as $k=>$a)
                                <tr>
                                    <td>{{$a->title}}</td>
                                    <td>
                                        <span class="badge badge-{{($a->status == '1') ? 'success' : 'danger'}}">{{($a->status == '1') ? 'Active' : 'InActive'}}</span>
                                    </td>
                                    <td>
                                        <a href = "{{route('admin.products.edit',$a->id)}}">
                                            <button class="btn btn-sm"><i class="fa fa-edit"></i></button>
                                        </a>
                                            <form action = "{{route('admin.products.destroy',$a)}}" method="post" style="display: inline-block">
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
