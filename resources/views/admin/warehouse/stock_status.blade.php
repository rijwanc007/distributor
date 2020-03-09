@extends('master')
@section('warehouse','active')
@section('stock_status','active')
@section('content')
    @php
        $s = 1;
    @endphp
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {!! Form::open(['route' => 'warehouse.brand.select','method' => 'post']) !!}
                <select class="select_product_category_design_two" name="brand_name">
                    @foreach($brands as $brand)
                        <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                    @endforeach
                    <option value="all">All</option>
                </select>
                <button class="select_button_design">Select</button>
                {!! Form::close() !!}
            </div>
        </div>
        @if(Session::has('success'))
            <h3 class="success_text">{{Session::get('success')}}</h3>
        @endif
        <br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="search_margin">
                    {!! Form::open(['route' => 'warehouse.search','method' => 'POST']) !!}
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                        <span class="input-group-btn"><button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button></span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Product Code</th>
                        <th>Product Availability</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($warehouses->count() ==! 0)
                        @foreach($warehouses as $warehouse)
                            <tr>
                                <td>{{$s++}}</td>
                                <td>{{$warehouse->brand_name}}</td>
                                <td>{{$warehouse->product_name}}</td>
                                <td>{{$warehouse->product_code}}</td>
                                <td>{{$warehouse->product_availability}}</td>
                                <td>
                                    <a class="btn btn-info btn-xs btn-block product_edit_button" href="{{route('warehouse.edit',$warehouse->id)}}">Edit</a>
                                    <div class="modal fade" id="delete_modal_{{$warehouse->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Stock Product Delete</h4>
                                                </div>
                                                <div class="modal-body text-center text-danger">
                                                    <p>Are You Want To Delete This Stock Product ?</p>
                                                    <p>Once You Delete These Stock Product,This Stock Product Record Will Be Delete Permanently</p>
                                                </div>
                                                {!! Form::open(['route'=>['warehouse.destroy',$warehouse->id],'method' => 'DELETE']) !!}
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#delete_modal_{{$warehouse->id}}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Brand Create Yet</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {!! $warehouses->links() !!}
            </div>
        </div>
    </div>
@endsection