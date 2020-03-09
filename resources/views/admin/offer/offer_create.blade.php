@extends('master')
@section('offer','active')
@section('content')
    @php
        $s = 1;
    @endphp
           <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-8">
                        <a class="btn btn-primary btn-lg btn-block" href="{{route('offer.index')}}">All Offer</a>
                    </div>
                </div>
                @if(Session::has('success'))
                    <h3 class="success_text">{{Session::get('success')}}</h3>
                @endif
                <div class="row text-center">
                    <h2 class="text-center">Offer Create</h2>
                    <div class="col-md-8 col-md-offset-1">
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
                        {!! Form::open(['class'=>'form-horizontal','method'=>'POST','route'=>['offer.store']]) !!}
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="role">Brand :</label>
                            <div class="col-sm-8">
                                <select class="user_role_option brand_name" id="brand_name" name="brand_name" required>
                                    <option value="select_brand">{{'Select Brand'}}</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="role">Product Code :</label>
                            <div class="col-sm-8">
                                <select class="user_role_option product_code" id="product_code" name="product_code" required>
                                    <option value="product_code">{{'Product Code'}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4" for="role">Product Name :</label>
                            <div class="col-sm-8">
                                <select class="user_role_option" id="product_name" name="product_name" required>
                                    <option value="product_name">{{'Product Name'}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <table class="table">
                                            <h4 class="modal-title">Create Offer On These Product</h4>
                                            <tr>
                                                <td>Offer Type :</td>
                                                <td><input class="percentage" id="percentage" data-offer_type="offer_type" data-tk="tk" data-product="product" data-display_offer="display_offer" data-pieces_type="pieces_type" data-percentage_type="percentage_type" data-tk_type="tk_type" data-product_type="product_type" type="checkbox" value="%"/>%</td>
                                                <td><input class="tk" id="tk" data-offer_type="offer_type" data-percentage="percentage" data-product="product" data-display_offer="display_offer" data-pieces_type="pieces_type" data-percentage_type="percentage_type" data-tk_type="tk_type" data-product_type="product_type" type="checkbox" value="TK"/>TK</td>
                                                <td><input class="product" id="product" data-offer_type="offer_type" data-tk="tk" data-percentage="percentage" data-display_offer="display_offer" data-pieces_type="pieces_type" data-percentage_type="percentage_type" data-tk_type="tk_type" data-product_type="product_type" type="checkbox" value="Product"/>Product</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-body display_offer" id="display_offer">
                                        <h4 class="text-center">Offer Details</h4>
                                        <div><span>Offer Start Day : <input type="date" class="start_offer" id="offer_start" data-start="start"/></span>&nbsp;&nbsp;<span>Offer End Day : <input type="date" class="end_offer" id="end_offer" data-end="end"/></span></div>
                                        <br/>
                                        <div id="offer_type">
                                            <input type="hidden" id="offer_type_store" name="offer_type" value="Not Set"/>
                                            <input type="hidden" id="start" name="start" value="Not Set"/>
                                            <input type="hidden" id="end" name="end" value="Not Set"/>
                                            <input type="hidden" id="pieces" name="pieces" value="Not Set"/>
                                            <input type="hidden" id="offer" name="offer" value="Not Set"/>
                                            <div class="display_offer_one" id="pieces_type"><strong>Pieces : </strong><input type="text" class="form-control pieces_measurement" id="input_pieces" data-pieces="pieces" placeholder="How many pieces can you buy for a discount?"/></div>
                                            <div class="display_offer_two" id="percentage_type"><strong>Percentage : </strong><input type="text" class="percentage_type form-control" id="input_percentage" data-offer="offer" placeholder="How many percentages will you discount?"/></div>
                                            <div class="display_offer_three" id="tk_type"><strong>Money : </strong><input type="text" class="tk_type form-control" id="input_tk" data-offer="offer"  placeholder="How much money will you discount"/></div>
                                            <div class="display_offer_four" id="product_type">
                                                <label for="sel1">Product list:</label>
                                                <select class="form-control product_type" id="product_list" name="product_list" data-offer="offer">
                                                    <option value="select">Select</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger unset_offer" data-percentage="percentage" data-tk="tk" data-product="product" data-display_offer="display_offer" data-start_offer="offer_start" data-end_offer="end_offer" data-offer_type="offer_type" data-start="start" data-end="end" data-pieces="pieces" data-offer="offer" data-input_pieces="input_pieces" data-input_percentage="input_percentage" data-input_tk="input_tk">Unset</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-4">
                            <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">Offer</button>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <br/>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit" />
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
           </div>
    <script>
        $(document).on('change','.brand_name',function(){
            $('#product_code').empty();
            $('#product_name').empty();
            $('#product_list').empty();
            let brand = $(this).val();
            $.ajax({
                url : '/offer/brand/name/'+brand,
                method:'get',
                success:function(data){
                    $( "#product_code").append('<option value="product_code">Product Code</option>');
                    $( "#product_list").append('<option value="select">Select</option>');
                    jQuery.each(data,function(index,item){
                        $( "#product_code").append('<option value="'+item.product_code+'">'+item.product_code+'</option>');
                        $( "#product_list").append('<option value="'+item.product_name+'('+item.product_code+')">'+item.product_name+'</option>');
                    });
                }
            })
        });
        $(document).on('change','.product_code',function(){
            $('#product_name').empty();
            let code = $(this).val();
            let brand = $('#brand_name').val();
            $.ajax({
                url : '/offer/product/code/'+code+'/'+brand,
                method:'get',
                success:function(data){
                    $( "#product_name").append('<option value="product_name">Product Name</option>');
                    jQuery.each(data,function(index,item){
                        $( "#product_name").append('<option value="'+item.product_name+'">'+item.product_name+'</option>');
                    })
                }
            })
        });
        $(document).on('click','.percentage',function(){
            let display_offer = $(this).data('display_offer');
            let pieces_type = $(this).data('pieces_type');
            let percentage_type = $(this).data('percentage_type');
            let tk_type = $(this).data('tk_type');
            let product_type = $(this).data('product_type');
            document.getElementById('offer_type_store').value = $(this).val();
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
            let pieces_type = $(this).data('pieces_type');
            let percentage_type = $(this).data('percentage_type');
            let tk_type = $(this).data('tk_type');
            let product_type = $(this).data('product_type');
            document.getElementById('offer_type_store').value = $(this).val();
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
            let pieces_type = $(this).data('pieces_type');
            let percentage_type = $(this).data('percentage_type');
            let tk_type = $(this).data('tk_type');
            let product_type = $(this).data('product_type');
            document.getElementById('offer_type_store').value = $(this).val();
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
        $(document).on('click','.unset_offer',function(){
            let percentage = $(this).data('percentage');
            let tk = $(this).data('tk');
            let product = $(this).data('product');
            let display_offer = $(this).data('display_offer');
            let start_offer = $(this).data('start_offer');
            let end_offer = $(this).data('end_offer');
            let offer_type = $(this).data('offer_type');
            let start = $(this).data('start');
            let end = $(this).data('end');
            let pieces = $(this).data('pieces');
            let offer = $(this).data('offer');
            let input_pieces = $(this).data('input_pieces');
            let input_percentage = $(this).data('input_percentage');
            let input_tk = $(this).data('input_tk');
            document.getElementById(percentage).checked = false;
            document.getElementById(tk).checked = false;
            document.getElementById(product).checked = false;
            document.getElementById(display_offer).style.display = 'none';
            document.getElementById(start_offer).value = '';
            document.getElementById(end_offer).value = '';
            document.getElementById(offer_type).value = 'Not Set';
            document.getElementById(start).value = 'Not Set';
            document.getElementById(end).value = 'Not Set';
            document.getElementById(pieces).value = 'Not Set';
            document.getElementById(offer).value = 'Not Set';
            document.getElementById(input_pieces).value = '';
            document.getElementById(input_percentage).value = '';
            document.getElementById(input_tk).value = '';
        });
    </script>
@endsection

