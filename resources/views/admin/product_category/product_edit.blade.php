@extends('master')
@section('product','active')
@section('product_categories','active')
@section('content')
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('product_category.index')}}">Product Categories</a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Create Product Category</h3>
            </div>
            <div class="col-md-7 col-md-offset-2">
                <div class="text-center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                @if(Session::has('success'))
                    <h3 class="success_text">{{Session::get('success')}}</h3>
                @endif
                <br/>
                {!! Form::open(['class'=>'form-horizontal','method'=>'PATCH','route'=>['product_category.update',$edit->id]]) !!}
                <div class="form-group">
                    <label class="control-label col-sm-4" for="gender">Product Brand :</label>
                    <div class="col-sm-8">
                        <select class="select_product_category_design" name="product_brand" required>
                            @foreach($brands as $brand)
                                <option value="{{$brand->brand_name}}" @if($edit->product_brand == $brand->brand_name) selected="selected" @endif>{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Product Code : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_code" name="product_code" value="{{$edit->product_code}}" placeholder="Enter Product Code" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Product Name : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{$edit->product_name}}" placeholder="Enter Product Name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Unit Type : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="unit_type" name="unit_type" value="{{$edit->unit_type}}" placeholder="Enter Unit Type" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Unit Measurement : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="unit_measurement" name="unit_measurement" value="{{$edit->unit_measurement}}" placeholder="Enter Unit Measurement" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Purchase Price : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="purchase_price" name="purchase_price" value="{{$edit->purchase_price}}" placeholder="Enter Purchase Price" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Selling Price : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{$edit->selling_price}}" placeholder="Enter Selling Price" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4" for="gender">Status :</label>
                    <div class="col-sm-8">
                        <select class="select_product_category_design" name="product_status" required>
                            <option @if($edit->product_status == 'active') selected="selected" @endif>active</option>
                            <option @if($edit->product_status == 'deactivate') selected="selected" @endif>deactivate</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Update" />
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
