@extends('master')
@section('sale','active')
@section('content')
                <table class="table-bordered table-bordered_two">
                    <thead>
                    <tr>
                        @for($i=0; $i< count($head); $i++)
                            <th scope="col"> {{$head[$i]}}</th>
                        @endfor
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($arr as $key => $result)
                        <tr>
                            @for($i = 0; $i <count($head); $i++)
                                <td> {{ $result[$head[$i]] }} </td>
                            @endfor
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    @endsection
