@extends('master')
@section('offer','active')
@section('offer_index','active')
@section('content')
    @php
        $s = 1;
    @endphp
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('offer.create')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Offer</a>
            </div>
        </div>
        @if(Session::has('success'))
            <h3 class="success_text">{{Session::get('success')}}</h3>
        @endif
        <br/>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="search_margin">
                    {!! Form::open(['route' => 'exist.offer.search','method' => 'POST']) !!}
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
                        <th>Offer Type</th>
                        <th>Pieces</th>
                        <th>Offer</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($offers->count() ==! 0)
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{$s++}}</td>
                                <td>{{$offer->brand_name}}</td>
                                <td>{{$offer->product_name}}</td>
                                <td>{{$offer->product_code}}</td>
                                <td>{{$offer->offer_type}}</td>
                                <td>{{$offer->pieces}}</td>
                                <td>{{$offer->offer}}</td>
                                <td>{{$offer->start}}</td>
                                <td>{{$offer->end}}</td>
                                <td>
                                    <a class="btn btn-info btn-xs btn-block product_edit_button" href="{{route('offer.edit',$offer->id)}}">Edit</a>
                                    <div class="modal fade" id="delete_modal_{{$offer->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Offer Delete</h4>
                                                </div>
                                                <div class="modal-body text-center text-danger">
                                                    <p>Are You Want To Delete This Offer ?</p>
                                                    <p>Once You Delete These Offer,This Offer Record Will Be Delete Permanently</p>
                                                </div>
                                                {!! Form::open(['route'=>['offer.destroy',$offer->id],'method' => 'DELETE']) !!}
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#delete_modal_{{$offer->id}}">Delete</button>
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
                {!! $offers->links() !!}
            </div>
        </div>
    </div>
@endsection
