@extends('master')
@section('stock','active')
@section('stock_in','active')
@section('content')
    @php(
    $s =1
    )
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                {!! Form::open(['route' => 'stock.brand.select','method' => 'post']) !!}
                <select class="select_product_category_design_two" name="brand_name">
                    @foreach($brands as $brand)
                        <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                    @endforeach
                        <option value="all">All</option>
                </select>
                <button class="select_button_design">Select</button>
                {!! Form::close() !!}
            </div>
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('stock.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Stock</a>
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
                    {!! Form::open(['route' => 'stock.search','method' => 'POST']) !!}
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
            <table class="table">
                <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>Brand Name</th>
                    <th>Total Item</th>
                    <th>Store Date</th>
                    <th>Create Date</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @if($stocks->count() == ! 0)
                @foreach($stocks as $stock)
                <tr>
                    <td>{{$s++}}</td>
                    <td>{{$stock->brand_name}}</td>
                    <td>{{count(json_decode($stock->product_code),COUNT_NORMAL)}}</td>
                    <td>{{$stock->store_date}}</td>
                    @php( $created_at = explode(' ',$stock->created_at))
                    <td>{{$created_at[0]}}</td>
                    <td>
                        <a class="btn btn-success btn-xs" href="{{route('stock.show',$stock->id)}}">Details</a>
                        <a class="btn btn-warning btn-xs" href="{{route('stock.pdf.download',$stock->id)}}">Download</a>
                        <a class="btn btn-info btn-xs" href="{{route('stock.edit',$stock->id)}}">Edit</a>
                        <div class="modal fade" id="delete_modal_{{$stock->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Stock Delete</h4>
                                    </div>
                                    <div class="modal-body text-center text-danger">
                                        <p>Are You Want To Delete This Stock ?</p>
                                        <p>Once You Delete These Stock,Your Stock Record Will Be Delete Permanently</p>
                                    </div>
                                    {!! Form::open(['route' => ['stock.destroy',$stock->id],'method' => 'DELETE']) !!}
                                    <div class="modal-footer">
                                        <input type="submit" class="btn btn-danger" value="Delete"/>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete_modal_{{$stock->id}}">Delete</button>
                    </td>
                </tr>
                    @endforeach
                    @else
                <tr>
                    <td colspan="5">No Stock Available</td>
                </tr>
                @endif
                </tbody>
            </table>
            {!! $stocks->links() !!}
        </div>
    </div>
@endsection

