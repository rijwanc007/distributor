@extends('master')
@section('stock','active')
@section('stock_in','active')
@section('content')
                    @php
                    $s = 1;
                    $n = 0; $c = 0; $t = 0 ;$m = 0; $u = 0; $st = 0; $p = 0; $se = 0;
                    $created_at = explode(' ',$show->created_at);
                    $product_name = explode(',',str_replace(str_split('[]""'),'',$show->product_name));
                    $product_code = explode(',',str_replace(str_split('[]""'),'',$show->product_code));
                    $unit_type = explode(',',str_replace(str_split('[]""'),'',$show->unit_type));
                    $unit_measurement = explode(',',str_replace(str_split('[]""'),'',$show->unit_measurement));
                    $unit = explode(',',str_replace(str_split('[]""'),'',$show->unit));
                    $stock_measurement = explode(',',str_replace(str_split('[]""'),'',$show->stock_measurement));
                    $purchase_price = explode(',',str_replace(str_split('[]""'),'',$show->purchase_price));
                    $selling_price = explode(',',str_replace(str_split('[]""'),'',$show->selling_price));
                    @endphp
<div class="row">
    <div class="col-md-3 col-md-offset-8">
        <a class="btn btn-primary btn-lg btn-block" href="{{route('stock.index')}}">All Stock</a>
    </div>
</div>
    <div class="container"  id="printableArea">
        <div class="row">
            <h1 class="text-center text-primary">{{$show->brand_name}}</h1>
            <h3 class="text-center text-primary">Voucher Id : {{$show->slug}}</h3>
            <h4 class="col-md-6 text-left">Created Date : {{$created_at[0]}}</h4>
            <h4 class="col-md-6 text-right">Store Date : {{$show->store_date}}</h4>
            <div class="col-md-8 col-md-offset-2">
            <br/><br/>
            <table class="table table-bordered_two">
                <thead>
                <tr>
                    <th>Sl.no</th>
                    <th>P_N</th>
                    <th>P_C</th>
                    <th>U_T</th>
                    <th>U_M</th>
                    <th>Unit</th>
                    <th>S_M</th>
                    <th>P_P</th>
                    <th>S_P</th>
                    <th>O_T</th>
                    <th>Pieces</th>
                    <th>Offer</th>
                    <th>O_Start</th>
                    <th>O_End</th>
                </tr>
                </thead>
                <tbody>
                @if($offers->count() ==! 0)
                    @foreach($offers as $offer)
                 <tr>
                     <td>{{$s++}}</td>
                     <td>{{$product_name[$n++]}}</td>
                     <td>{{$product_code[$c++]}}</td>
                     <td>{{$unit_type[$t++]}}</td>
                     <td>{{$unit_measurement[$m++]}}</td>
                     <td>{{$unit[$u++]}}</td>
                     <td>{{$stock_measurement[$st++]}}</td>
                     <td>{{$purchase_price[$p++]}}</td>
                     <td>{{$selling_price[$se++]}}</td>
                     <td>{{$offer->offer_type}}</td>
                     <td>{{$offer->pieces}}</td>
                     <td>{{$offer->offer}}</td>
                     <td>{{$offer->start}}</td>
                     <td>{{$offer->end}}</td>
                 </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>{{$s++}}</td>
                        <td>{{$product_name[$n++]}}</td>
                        <td>{{$product_code[$c++]}}</td>
                        <td>{{$unit_type[$t++]}}</td>
                        <td>{{$unit_measurement[$m++]}}</td>
                        <td>{{$unit[$u++]}}</td>
                        <td>{{$stock_measurement[$st++]}}</td>
                        <td>{{$purchase_price[$p++]}}</td>
                        <td>{{$selling_price[$se++]}}</td>
                        <td>{{"Not Set"}}</td>
                        <td>{{"Not Set"}}</td>
                        <td>{{"Not Set"}}</td>
                        <td>{{"Not Set"}}</td>
                        <td>{{"Not Set"}}</td>
                    </tr>
                @endif
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-md-12 text-center">
           <input type="button" class="print_button" onclick="printDiv('printableArea')" value="print" />
       </div>
    </div>
    <script>
       function printDiv(divName)
           {
           var printContents = document.getElementById(divName).innerHTML;
           var originalContents = document.body.innerHTML;
           document.body.innerHTML = printContents;
           window.print();
           document.body.innerHTML = originalContents;
           }
    </script>
@endsection