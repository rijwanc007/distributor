@extends('master')
@section('product','active')
@section('product_categories','active')
@section('content')
    @php
    $s = 1;
    @endphp
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {!! Form::open(['route' => 'select.product.brand','method' => 'post']) !!}
                    <select class="select_product_category_design_two" name="product_brand">
                        @foreach($brands as $brand)
                            <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                        @endforeach
                            <option value="all">all</option>
                    </select>
                    <button class="select_button_design">Select</button>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('product_category.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Product Category</a>
            </div>
        </div>
        <br/>
        @if(Session::has('success'))
            <h3 class="success_text">{{Session::get('success')}}</h3>
        @endif
        <br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="search_margin">
                    {!! Form::open(['route' => 'exist.product_category.search','method' => 'POST']) !!}
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
                          <th>Product Brand</th>
                          <th>Product code</th>
                          <th>Product name</th>
                          <th>Unit Type</th>
                          <th>Unit Measurement</th>
                          <th>Unit</th>
                          <th>Purchase Price</th>
                          <th>Selling Price</th>
                          <th>status</th>
                          <th>Option</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if($products->count() ==! 0)
                    @foreach($products as $product)
                    <tr>
                        <td>{{$s++}}</td>
                        <td>{{$product->product_brand}}</td>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->unit_type}}</td>
                        <td>{{$product->unit_measurement}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->purchase_price}}</td>
                        <td>{{$product->selling_price}}</td>
                        <td>{{$product->product_status}}</td>
                        <td>
                            <a class="btn btn-info btn-xs btn-block product_edit_button" href="{{route('product_category.edit',$product->id)}}">Edit</a>
                            <div class="modal fade" id="delete_modal_{{$product->id}}" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Product Category Delete</h4>
                                        </div>
                                        <div class="modal-body text-center text-danger">
                                            <p>Are You Want To Delete This Product Category ?</p>
                                            <p>Once You Delete These Product Category,This Product Category Record Will Be Delete Permanently</p>
                                        </div>
                                        {!! Form::open(['route'=>['product_category.destroy',$product->id],'method' => 'DELETE']) !!}
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-danger" value="Delete"/>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#delete_modal_{{$product->id}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                        @else
                        <tr>
                            <td colspan="5">No Product Category Create Yet</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>
    </div>
@endsection

