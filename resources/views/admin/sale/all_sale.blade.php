@extends('master')
@section('sale','active')
@section('all_sale','active')
@section('content')
    @php
        $s = 1;
    @endphp
    <br/>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="search_margin">
                                        {!! Form::open(['route' => 'exist.all.sale.search','method' => 'POST']) !!}
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Files</th>
                        <th>Message</th>
                        <th>Created Time</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($sales->count() ==! 0)
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{$s++}}</td>
                                <td>{{$sale->name}}</td>
                                <td>{{$sale->email}}</td>
                                <td>{{$sale->upload_file}}</td>
                                <td>{{$sale->message}}</td>
                                <td>
                                    @php(
                                     $created_at = explode(' ',$sale->created_at)
                                    )
                                    {{$created_at[0]}}
                                </td>
                                <td>
                                    <a class="btn btn-success btn-xs btn-block" href="{{route('sale.show',$sale->id)}}">Show</a>
                                    <a class="btn btn-info btn-xs btn-block product_edit_button" href="{{route('sale.edit',$sale->id)}}">Edit</a>
                                    <div class="modal fade" id="delete_modal_{{$sale->id}}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Sale Delete</h4>
                                                </div>
                                                <div class="modal-body text-center text-danger">
                                                    <p>Are You Want To Delete This Sale ?</p>
                                                    <p>Once You Delete These Sale,This Sale Record Will Be Delete Permanently</p>
                                                </div>
                                                {!! Form::open(['route'=>['sale.destroy',$sale->id],'method' => 'DELETE']) !!}
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-danger" value="Delete"/>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-xs btn-block" data-toggle="modal" data-target="#delete_modal_{{$sale->id}}">Delete</button>
                                    <div class="invoice_button">
                                        {!! Form::open(['route' => 'invoice.create','method' => 'get']) !!}
                                        <input type="hidden" name="id" value="{{$sale->id}}"/>
                                        <input type="submit" class="btn btn-primary btn-xs btn-block" value="Invoice"/>
                                        {!! Form::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Tax Create Yet</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {!! $sales->links() !!}
            </div>
        </div>
    </div>
@endsection

