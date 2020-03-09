@extends('master')
@section('invoice','active')
@section('content')
    @php
    $s = 1;
    $voucher_id = rand();
    $created_at = explode(' ',$invoice->created_at);
    foreach ($excel as $item){
       $sum[] = $item->selling_rates * $item->sales_qty;
    }
    @endphp
    <div class="container text-center invoice_table">
        <h1>BOISHAKHI TRADERS</h1>
        <h2>KALIKOIR BAZAR,GAZIPUR,DHAKA</h2>
        <h3>01820-507305</h3>
        <h1>Challan</h1>
        <hr class="challan_hr"/>
        {!! Form::open(['route' => 'invoice.store','method' => 'post']) !!}
        <table class="table-bordered table-bordered_two invoice_table">
            <thead>
            <tr>
                <th colspan="4">
                    <div style="margin-left: 10%">
                        <div>Invoice Number : {{$voucher_id}}</div>
                        <input type="hidden" name="invoice_number" value="{{$voucher_id}}"/>
                        <div>Customer Name : {{$user->name}}</div>
                        <input type="hidden" name="customer_number" value="{{$user->name}}"/>
                        <div>Address : {{$user->address}}</div>
                        <input type="hidden" name="address" value="{{$user->address}}"/>
                    </div>
                </th>
                <th colspan="4">
                    <div style="margin-left: 10%">
                    <div>Ref No</div>
                    <div>Date : {{$created_at[0]}}</div>
                        <input type="hidden" name="invoice_create_date" value="{{$created_at[0]}}"/>
                    <div>Delivery Date : <input type="date" id="delivery_date" name="delivery_date"/></div>
                    </div>
                </th>
            </tr>
            <tr>
                <th class="text-center">Sl.No</th>
                <th class="text-center">Brand</th>
                <th class="text-center">Product Name</th>
                <th class="text-center">Product Code</th>
                <th class="text-center">Selling Price</th>
                <th class="text-center">Sales Quantity</th>
                <th class="text-center">Offer Type</th>
                <th class="text-center">Total Offer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($excel as $item)
                <tr>
                    <td>{{$s++}}</td>
                    <td>{{$item->brand_name}}</td>
                    <input type="hidden" name="brand_name[]" value="{{$item->brand_name}}"/>
                    <td>{{$item->product_name}}</td>
                    <input type="hidden" name="product_name[]" value="{{$item->product_name}}"/>
                    <td>{{$item->product_code}}</td>
                    <input type="hidden" name="product_code[]" value="{{$item->product_code}}"/>
                    <td>{{$item->selling_rates}}</td>
                    <input type="hidden" name="selling_price[]" value="{{$item->selling}}"/>
                    <td>{{$item->sales_qty}}</td>
                    <input type="hidden" name="sales_qty[]" value="{{$item->sales_qty}}"/>
                    <td>{{$item->offer_type}}</td>
                    <input type="hidden" name="offer_type[]" value="{{$item->offer_type}}"/>
                    <td></td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">
                <h4>Selling Price Total Amount</h4>
                </td>
                <td>:</td>
                <td colspan="3">{{array_sum($sum)}} tk</td>
                <input type="hidden" name="selling_price_total_amount" value="{{array_sum($sum)}}"/>
            </tr>
{{--            <tr>--}}
{{--                <td colspan="3">--}}
{{--                    <h4>Vat</h4>--}}
{{--                </td>--}}
{{--                <td>:</td>--}}
{{--                <td colspan="2"></td>--}}
{{--            </tr>--}}
            <tr>
                <td colspan="4">
                    <h4>Discount</h4>
                </td>
                <td>:</td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="4">
                    <h4>Net Payable Amount</h4>
                </td>
                <td>:</td>
                <td colspan="3"></td>
            </tr>
            </tbody>
        </table>
        <br>
        <input type="submit" value="Submit"/>
        {!! Form::close() !!}
    </div>
@endsection
