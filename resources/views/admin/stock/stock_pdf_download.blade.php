                    @php
                    $s = 1;
                    $n = 0; $c = 0; $t = 0 ;$m = 0; $u = 0; $st = 0; $p = 0; $se = 0;
                    @endphp
<div class="container">
    <div class="row">
        <h1 class="text-center text-primary">{{$brand_name}}</h1>
        <h3 class="text-center text-primary">Voucher Id : {{$slug}}</h3>
        <div class="col-md-6 text-left">Created Date : {{$created_at[0]}}</div>
        <div class="col-md-6 text-right">Store Date : {{$store_date}}</div>
        <br/><br/>
        <table>
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
            </tbody>
        </table>
    </div>
</div>

