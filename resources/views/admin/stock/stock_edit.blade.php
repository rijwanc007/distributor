@extends('master')
@section('stock','active')
@section('stock_in','active')
@section('content')
                    @php
                    $s = 1;
                    $n = 0; $c = 0; $t = 0 ;$m = 0; $u = 0; $st = 0; $p = 0; $se = 0;
                    $product_name = explode(',',str_replace(str_split('[]""'),'',$edit->product_name));
                    $product_code = explode(',',str_replace(str_split('[]""'),'',$edit->product_code));
                    $unit_type = explode(',',str_replace(str_split('[]""'),'',$edit->unit_type));
                    $unit_measurement = explode(',',str_replace(str_split('[]""'),'',$edit->unit_measurement));
                    $unit = explode(',',str_replace(str_split('[]""'),'',$edit->unit));
                    $stock_measurement = explode(',',str_replace(str_split('[]""'),'',$edit->stock_measurement));
                    $purchase_price = explode(',',str_replace(str_split('[]""'),'',$edit->purchase_price));
                    $selling_price = explode(',',str_replace(str_split('[]""'),'',$edit->selling_price));
                    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('stock.index')}}">All Stock</a>
            </div>
        </div>
    </div>
                    {!! Form::open(['route' => ['stock.update',$edit->id],'method' => 'PATCH']) !!}
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="text-primary">{{$edit->brand_name}}</h2>
            <h4>Store Date :  <input type="date" id="store_date" name="store_date" value="{{$edit->store_date}}" required/></h4>
        </div>
    </div>
    <input type="hidden" id="product_brand_name_store" name="brand_name" value="{{$edit->brand_name}}"/>
    <table class="table table_stock_in">
        <thead>
        <tr>
            <th>Sl.no</th>
            <th>Name</th>
            <th>Code</th>
            <th>Unit Type</th>
            <th>Unit Measurement</th>
            <th>Unit</th>
            <th>Stock Measurement</th>
            <th>Purchase Price</th>
            <th>Selling Price</th>
            <th>Offer</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
                <tr>
                    <td>{{$s++}}</td>
                    <td><input type="text" id="product_name" name="product_name[]" value="{{$product_name[$n++]}}" readonly/></td>
                    <td><input type="text" id="product_code" name="product_code[]" value="{{$product_code[$c++]}}" readonly/></td>
                    <td><input type="text" id="unit_type" name="unit_type[]" value="{{$unit_type[$t++]}}" readonly/></td>
                    <td><input type="text" id="unit_measurement" name="unit_measurement[]" value="{{$unit_measurement[$m++]}}" readonly/></td>
                    <td><input type="text" id="unit" name="unit[]" value="{{$unit[$u++]}}" readonly/></td>
                    <td><input type="text" id="stock_measurement" name="stock_measurement[]" value="{{$stock_measurement[$st++]}}" required/></td>
                    <td><input type="text" id="purchase_price" name="purchase_price[]" value="{{$purchase_price[$p++]}}" required/></td>
                    <td><input type="text" id="selling_price" name="selling_price[]" value="{{$selling_price[$se++]}}" required/></td>
                    <td>
                        <div class="modal fade" id="myModal{{$offer->id}}" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div id="display_offer_type_{{$offer->id}}">Offer Type : {{$offer->offer_type}}</div>
                                        <div id="display_offer_start_day_{{$offer->id}}">Offer Start Day : {{$offer->start}}</div>
                                        <div id="display_offer_end_day_{{$offer->id}}">Offer End Day : {{$offer->end}}</div>
                                        <div id="display_offer_pieces_{{$offer->id}}">Pieces : {{$offer->pieces}}</div>
                                        <div id="display_offer_view_{{$offer->id}}">Offer : {{$offer->offer}}</div>
                                        <h4 class="modal-title">Create Offer On These Product</h4>
                                        <table class="table">
                                            <tr>
                                                <td>Offer Type :</td>
                                                <td><input class="percentage" id="percentage{{$offer->id}}" data-offer_type="offer_type_{{$offer->id}}" data-tk="tk{{$offer->id}}" data-product="product{{$offer->id}}" data-display_offer="display_offer_{{$offer->id}}" data-pieces_type="pieces_type_{{$offer->id}}" data-percentage_type="percentage_type_{{$offer->id}}" data-tk_type="tk_type_{{$offer->id}}" data-product_type="product_type_{{$offer->id}}" type="checkbox" value="%" />%</td>
                                                <td><input class="tk" id="tk{{$offer->id}}" data-offer_type="offer_type_{{$offer->id}}" data-percentage="percentage{{$offer->id}}" data-product="product{{$offer->id}}" data-display_offer="display_offer_{{$offer->id}}" data-pieces_type="pieces_type_{{$offer->id}}" data-percentage_type="percentage_type_{{$offer->id}}" data-tk_type="tk_type_{{$offer->id}}" data-product_type="product_type_{{$offer->id}}" type="checkbox" value="TK" />TK</td>
                                                <td><input class="product" id="product{{$offer->id}}" data-offer_type="offer_type_{{$offer->id}}" data-tk="tk{{$offer->id}}" data-percentage="percentage{{$offer->id}}" data-display_offer="display_offer_{{$offer->id}}" data-pieces_type="pieces_type_{{$offer->id}}" data-percentage_type="percentage_type_{{$offer->id}}" data-tk_type="tk_type_{{$offer->id}}" data-product_type="product_type_{{$offer->id}}" type="checkbox" value="Product" />Product</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-body display_offer" id="display_offer_{{$offer->id}}">
                                        <h4 class="text-center">Offer Details</h4>
                                        <div><span>Offer Start Day : <input type="date" class="start_offer" id="offer_start_{{$offer->id}}" data-start="start_{{$offer->id}}"/></span>&nbsp;&nbsp;<span>Offer End Day : <input type="date" class="end_offer" id="end_offer_{{$offer->id}}" data-end="end_{{$offer->id}}"/></span></div>
                                        <br/>
                                        <div id="offer_type">
                                            <input type="hidden" id="offer_type_{{$offer->id}}" name="offer_type[]" value="{{$offer->offer_type}}"/>
                                            <input type="hidden" id="start_{{$offer->id}}" name="start[]" value="{{$offer->start}}"/>
                                            <input type="hidden" id="end_{{$offer->id}}" name="end[]" value="{{$offer->end}}"/>
                                            <input type="hidden" id="pieces_{{$offer->id}}" name="pieces[]" value="{{$offer->pieces}}"/>
                                            <input type="hidden" id="offer_{{$offer->id}}" name="offer[]" value="{{$offer->offer}}"/>
                                            <div class="display_offer_one" id="pieces_type_{{$offer->id}}"><strong>Pieces : </strong><input type="text" class="form-control pieces_measurement" {{--id="pieces"--}} id="input_pieces_{{$offer->id}}" data-pieces="pieces_{{$offer->id}}" placeholder="How many pieces can you buy for a discount?"/></div>
                                            <div class="display_offer_two" id="percentage_type_{{$offer->id}}"><strong>Percentage : </strong><input type="text" class="percentage_type form-control" {{--id="percentage_type"--}} id="input_percentage_{{$offer->id}}" data-offer="offer_{{$offer->id}}" placeholder="How many percentages will you discount?"/></div>
                                            <div class="display_offer_three" id="tk_type_{{$offer->id}}"><strong>Money : </strong><input type="text" class="tk_type form-control" {{--id="tk_type"--}} id="input_tk_{{$offer->id}}" data-offer="offer_{{$offer->id}}"  placeholder="How much money will you discount"/></div>
                                            <div class="display_offer_four" id="product_type_{{$offer->id}}">
                                                <label for="sel1">Product list:</label>
                                                <select class="form-control product_type" id="sel1"  data-offer="offer_{{$offer->id}}">
                                                    <option value="select">Select</option>
                                                    @foreach($products as $product_item)
                                                        <option value="{{$product_item->product_name}}({{$product_item->product_code}})">{{$product_item->product_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger unset_offer" data-display_offer_type="display_offer_type_{{$offer->id}}" data-display_offer_start_day="display_offer_start_day_{{$offer->id}}" data-display_offer_end_day="display_offer_end_day_{{$offer->id}}" data-display_offer_pieces="display_offer_pieces_{{$offer->id}}" data-display_offer_view="display_offer_view_{{$offer->id}}" data-percentage="percentage{{$offer->id}}" data-tk="tk{{$offer->id}}" data-product="product{{$offer->id}}" data-display_offer="display_offer_{{$offer->id}}" data-start_offer="offer_start_{{$offer->id}}" data-end_offer="end_offer_{{$offer->id}}" data-offer_type="offer_type_{{$offer->id}}" data-start="start_{{$offer->id}}" data-end="end_{{$offer->id}}" data-pieces="pieces_{{$offer->id}}" data-offer="offer_{{$offer->id}}" data-input_pieces="input_pieces_{{$offer->id}}" data-input_percentage="input_percentage_{{$offer->id}}" data-input_tk="input_tk_{{$offer->id}}">Unset</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$offer->id}}">Offer</button>
                    </td>
                    <td><div class="row_remove_button">X</div></td>
                </tr>
            @endforeach
        </tbody>
    </table>
                    <br/>
                    <div class="col-md-7 col-md-offset-5"><input type="submit"  class="stock_create_button" value="Update"/></div>
                     {!! Form::close() !!}
    <script>
        $(document).on('click','.unset_offer',function(){
            document.getElementById($(this).data('display_offer_type')).innerHTML = 'Offer Type : Not Set';
            document.getElementById($(this).data('display_offer_start_day')).innerHTML = 'Offer Start Day : Not Set';
            document.getElementById($(this).data('display_offer_end_day')).innerHTML = 'Offer End Dat : Not Set';
            document.getElementById($(this).data('display_offer_pieces')).innerHTML = 'Pieces : Not Set';
            document.getElementById($(this).data('display_offer_view')).innerHTML = 'Offer : Not Set';
            document.getElementById($(this).data('percentage')).checked = false;
            document.getElementById($(this).data('tk')).checked = false;
            document.getElementById($(this).data('product')).checked = false;
            document.getElementById($(this).data('display_offer')).style.display = 'none';
            document.getElementById($(this).data('start_offer')).value = '';
            document.getElementById($(this).data('end_offer')).value = '';
            document.getElementById($(this).data('offer_type')).value = 'Not Set';
            document.getElementById($(this).data('start')).value = 'Not Set';
            document.getElementById($(this).data('end')).value = 'Not Set';
            document.getElementById($(this).data('pieces')).value = 'Not Set';
            document.getElementById($(this).data('offer')).value = 'Not Set';
            document.getElementById($(this).data('input_pieces')).value = '';
            document.getElementById($(this).data('input_percentage')).value = '';
            document.getElementById($(this).data('input_tk')).value = '';
        });
        $(document).on('click','.stock_save_button',function(){
            let save_button = $(this).data('save_button');
            document.getElementById(save_button).value = 'saved';
        });
        $(document).on('click','.percentage',function(){
            let display_offer = $(this).data('display_offer');
            let offer_type = $(this).data('offer_type');
            let pieces_type = $(this).data('pieces_type');
            let percentage_type = $(this).data('percentage_type');
            let tk_type = $(this).data('tk_type');
            let product_type = $(this).data('product_type');
            document.getElementById(offer_type).value = $(this).val();
            document.getElementById(display_offer).style.display = 'block';
            document.getElementById(pieces_type).style.display = 'block';
            document.getElementById(percentage_type).style.display = 'block';
            document.getElementById(tk_type).style.display = 'none';
            document.getElementById(product_type).style.display = 'none';
            let tk = document.getElementById($(this).data('tk'));
            let product = document.getElementById($(this).data('product'));
            if(tk.checked){
                tk.checked = false;
            }
            if(product.checked){
                product.checked = false;
            }
        });
        $(document).on('click','.tk',function(){
            let display_offer = $(this).data('display_offer');
            let offer_type = $(this).data('offer_type');
            let pieces_type = $(this).data('pieces_type');
            let percentage_type = $(this).data('percentage_type');
            let tk_type = $(this).data('tk_type');
            let product_type = $(this).data('product_type');
            document.getElementById(offer_type).value = $(this).val();
            document.getElementById(display_offer).style.display = 'block';
            document.getElementById(pieces_type).style.display = 'block';
            document.getElementById(tk_type).style.display = 'block';
            document.getElementById(percentage_type).style.display = 'none';
            document.getElementById(product_type).style.display = 'none';
            let percentage = document.getElementById($(this).data('percentage'));
            let product = document.getElementById($(this).data('product'));
            if(percentage.checked){
                percentage.checked = false;
            }
            if(product.checked){
                product.checked = false;
            }
        });
        $(document).on('click','.product',function(){
            let display_offer = $(this).data('display_offer');
            let offer_type = $(this).data('offer_type');
            let pieces_type = $(this).data('pieces_type');
            let percentage_type = $(this).data('percentage_type');
            let tk_type = $(this).data('tk_type');
            let product_type = $(this).data('product_type');
            document.getElementById(offer_type).value = $(this).val();
            document.getElementById(display_offer).style.display = 'block';
            document.getElementById(pieces_type).style.display = 'block';
            document.getElementById(product_type).style.display = 'block';
            document.getElementById(percentage_type).style.display = 'none';
            document.getElementById(tk_type).style.display = 'none';
            let tk = document.getElementById($(this).data('tk'));
            let percentage = document.getElementById($(this).data('percentage'));
            if(tk.checked){
                tk.checked = false;
            }
            if(percentage.checked){
                percentage.checked = false;
            }
        });
        $(document).on('change','.start_offer',function(){
            let start = $(this).data('start');
            document.getElementById(start).value = $(this).val();
        });
        $(document).on('change','.end_offer',function(){
            let end = $(this).data('end');
            document.getElementById(end).value = $(this).val();
        });
        $(document).on('input','.pieces_measurement',function(){
            let pieces_type = $(this).data('pieces');
            document.getElementById(pieces_type).value = $(this).val();
        });
        $(document).on('input','.percentage_type',function(){
            let offer = $(this).data('offer');
            document.getElementById(offer).value = $(this).val();
        });
        $(document).on('input','.tk_type',function(){
            let offer = $(this).data('offer');
            document.getElementById(offer).value = $(this).val();
        });
        $(document).on('change','.product_type',function(){
            let offer = $(this).data('offer');
            document.getElementById(offer).value = $(this).val();
        });
        $(document).on('click','.row_remove_button',function(){
            $(this).parent().parent().remove();
        });

    </script>
@endsection
