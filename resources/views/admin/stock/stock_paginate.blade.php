@php
    $s = 1;
    $m = 1;
@endphp
<table class="table table_stock_in">
    <thead>
    <tr>
        <th>Sl.no</th>
        <th>Name</th>
        <th>Code</th>
        <th>Unit Type</th>
        <th>Unit Measurement</th>
        <th>Unit</th>
        <th>Purchase Price</th>
        <th>Selling Price</th>
        <th>Stock Measurement</th>
        <th>Offer</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if($products->count() ==! 0)
    @foreach($products as $product)
    <tr>
        <td>{{$s++}}</td>
        <td><input type="text" id="product_name" name="product_name[]" value="{{$product->product_name}}" readonly/></td>
        <td><input type="text" id="product_code" name="product_code[]" value="{{$product->product_code}}" readonly/></td>
        <td><input type="text" id="unit_type" name="unit_type[]" value="{{$product->unit_type}}" readonly/></td>
        <td><input type="text" id="unit_measurement" name="unit_measurement[]" value="{{$product->unit_measurement}}" readonly/></td>
        <td><input type="text" id="unit" name="unit[]" value="{{$product->unit}}" readonly/></td>
        <td><input type="text" id="purchase_price" name="purchase_price[]" value="{{$product->purchase_price}}" readonly/></td>
        <td><input type="text" id="selling_price" name="selling_price[]" value="{{$product->selling_price}}" readonly/></td>
        <td><input type="text" id="stock_measurement" name="stock_measurement[]" required/></td>
        <td>
            <div class="modal fade" id="myModal{{$product->id}}" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Offer On These Product</h4>
                            <table class="table">
                                <tr>
                                    <td>Offer Type :</td>
                                    <td><input class="percentage" id="percentage{{$product->id}}" data-offer_type="offer_type_{{$product->id}}" data-tk="tk{{$product->id}}" data-product="product{{$product->id}}" data-display_offer="display_offer_{{$product->id}}" data-pieces_type="pieces_type_{{$product->id}}" data-percentage_type="percentage_type_{{$product->id}}" data-tk_type="tk_type_{{$product->id}}" data-product_type="product_type_{{$product->id}}" type="checkbox" value="%"/>%</td>
                                    <td><input class="tk" id="tk{{$product->id}}" data-offer_type="offer_type_{{$product->id}}" data-percentage="percentage{{$product->id}}" data-product="product{{$product->id}}" data-display_offer="display_offer_{{$product->id}}" data-pieces_type="pieces_type_{{$product->id}}" data-percentage_type="percentage_type_{{$product->id}}" data-tk_type="tk_type_{{$product->id}}" data-product_type="product_type_{{$product->id}}" type="checkbox" value="TK"/>TK</td>
                                    <td><input class="product" id="product{{$product->id}}" data-offer_type="offer_type_{{$product->id}}" data-tk="tk{{$product->id}}" data-percentage="percentage{{$product->id}}" data-display_offer="display_offer_{{$product->id}}" data-pieces_type="pieces_type_{{$product->id}}" data-percentage_type="percentage_type_{{$product->id}}" data-tk_type="tk_type_{{$product->id}}" data-product_type="product_type_{{$product->id}}" type="checkbox" value="Product"/>Product</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-body display_offer" id="display_offer_{{$product->id}}">
                            <h4 class="text-center">Offer Details</h4>
                            <div><span>Offer Start Day : <input type="date" class="start_offer" id="offer_start_{{$product->id}}" data-start="start_{{$product->id}}"/></span>&nbsp;&nbsp;<span>Offer End Day : <input type="date" class="end_offer" id="end_offer_{{$product->id}}" data-end="end_{{$product->id}}"/></span></div>
                            <br/>
                            <div id="offer_type">
                                <input type="hidden" id="offer_type_{{$product->id}}" name="offer_type[]" value="Not Set"/>
                                <input type="hidden" id="start_{{$product->id}}" name="start[]" value="Not Set"/>
                                <input type="hidden" id="end_{{$product->id}}" name="end[]" value="Not Set"/>
                                <input type="hidden" id="pieces_{{$product->id}}" name="pieces[]" value="Not Set"/>
                                <input type="hidden" id="offer_{{$product->id}}" name="offer[]" value="Not Set"/>
                                <div class="display_offer_one" id="pieces_type_{{$product->id}}"><strong>Pieces : </strong><input type="text" class="form-control pieces_measurement" {{--id="pieces"--}} id="input_pieces_{{$product->id}}" data-pieces="pieces_{{$product->id}}" placeholder="How many pieces can you buy for a discount?"/></div>
                                <div class="display_offer_two" id="percentage_type_{{$product->id}}"><strong>Percentage : </strong><input type="text" class="percentage_type form-control" {{--id="percentage_type"--}} id="input_percentage_{{$product->id}}" data-offer="offer_{{$product->id}}" placeholder="How many percentages will you discount?"/></div>
                                <div class="display_offer_three" id="tk_type_{{$product->id}}"><strong>Money : </strong><input type="text" class="tk_type form-control" {{--id="tk_type"--}} id="input_tk_{{$product->id}}" data-offer="offer_{{$product->id}}"  placeholder="How much money will you discount"/></div>
                                <div class="display_offer_four" id="product_type_{{$product->id}}">
                                    <label for="sel1">Product list:</label>
                                    <select class="form-control product_type" id="sel1"  data-offer="offer_{{$product->id}}">
                                        <option value="select">Select</option>
                                        @foreach($products as $product_item)
                                        <option value="{{$product_item->product_name}}({{$product_item->product_code}})">{{$product_item->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger unset_offer" data-percentage="percentage{{$product->id}}" data-tk="tk{{$product->id}}" data-product="product{{$product->id}}" data-display_offer="display_offer_{{$product->id}}" data-start_offer="offer_start_{{$product->id}}" data-end_offer="end_offer_{{$product->id}}" data-offer_type="offer_type_{{$product->id}}" data-start="start_{{$product->id}}" data-end="end_{{$product->id}}" data-pieces="pieces_{{$product->id}}" data-offer="offer_{{$product->id}}" data-input_pieces="input_pieces_{{$product->id}}" data-input_percentage="input_percentage_{{$product->id}}" data-input_tk="input_tk_{{$product->id}}">Unset</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$product->id}}">Offer</button>
        </td>
        <td><div class="row_remove_button">X</div></td>
    </tr>
        @endforeach
        @else
    <tr>
        <td colspan="11">No data </td>
    </tr>
    @endif
    </tbody>
</table>



