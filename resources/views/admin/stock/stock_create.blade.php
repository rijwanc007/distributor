@extends('master')
@section('stock','active')
@section('stock_in','active')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <select class="select_product_category_design_two brand_name" id="product_brand" name="product_brand">
                      @foreach($brands as $brand)
                         <option value="{{$brand->brand_name}}">{{$brand->brand_name}}</option>
                      @endforeach
                </select>
                <button class="select_button_design brand_select">Select</button>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <a class="btn btn-primary btn-lg btn-block" href="{{route('stock.index')}}">All Stock</a>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="text-primary" id="product_brand_show"></h2>
            {!! Form::open(['route' => 'stock.store','method' => 'POST']) !!}
            <h4 id="store_date_display">Store Date :  <input type="date" id="store_date" name="store_date" required/></h4>
            <input type="hidden" id="product_brand_name_store" name="brand_name"/>
            <div class="pagination_data">
                @include('admin.stock.stock_paginate')
            </div>
            <div id="stock_store_button"><input type="submit"  class="stock_create_button" value="Stock"/></div>
            {!! Form::close() !!}
        </div>
    </div>
    <script>
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
        $(document).on('click','.row_remove_button',function(){
           $(this).parent().parent().remove();
        });
        $(document).on('click','.brand_select',function(){
            document.getElementById('store_date_display').style.display = 'block';
            document.getElementById('stock_store_button').style.display = 'block';
            document.getElementById('product_brand_name_store').value = document.getElementById('product_brand').value;
            document.getElementById('product_brand_show').innerHTML = document.getElementById('product_brand').value;
            let product_brand = document.getElementById('product_brand').value;
            $.ajax({
                url : '/distributor/brand/select/'+product_brand,
                success:function(data){
                    $('.pagination_data').html(data);
                }
            })
        })
    </script>
@endsection
