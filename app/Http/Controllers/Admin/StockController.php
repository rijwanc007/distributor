<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Offer;
use App\ProductCategory;
use App\Stock;
use App\StockOffer;
use App\Warehouse;
use PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StockController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        $stocks = Stock::orderBy('id','DESC')->paginate(24);
        return view('admin.stock.stock_in',compact('brands','stocks'));
    }
    public function create()
    {
        $products = ProductCategory::where('product_status','=','nothing')->orderBy('id','DESC')->get();
        $brands = Brand::orderBy('id','DESC')->get();
        return view('admin.stock.stock_create',compact('brands','products'));
    }
    public function store(Request $request)
    {
        $slug = rand();
        Stock::create([
           'brand_name' => $request->brand_name,
            'product_name' =>json_encode($request->product_name),
            'product_code' => json_encode($request->product_code),
            'unit_type' => json_encode($request->unit_type),
            'unit_measurement' => json_encode($request->unit_measurement),
            'unit' => json_encode($request->unit),
            'stock_measurement' => json_encode($request->stock_measurement),
            'purchase_price' => json_encode($request->purchase_price),
            'selling_price' => json_encode($request->selling_price),
            'store_date' => $request->store_date,
            'slug' => $slug
        ]);
        for($i = 0;$i < count($request->offer_type);$i++){
            StockOffer::create([
                'brand_name' => $request->brand_name,
                'product_name' => $request->product_name[$i],
                'product_code' => $request->product_code[$i],
                'offer_type' => $request->offer_type[$i],
                'start' => $request->start[$i],
                'end' => $request->end[$i],
                'pieces' => $request->pieces[$i],
                'offer' => $request->offer[$i],
                'slug' => $slug
            ]);
        }
        for ($i = 0;$i < count($request->product_code);$i++){
            $product_check = Warehouse::where('product_code','=',$request->product_code[$i])->first();
            if(empty($product_check)){
                Warehouse::create([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'product_availability' => $request->stock_measurement[$i],
                ]);
            }else{
                $update_product_availability = $product_check->product_availability + $request->stock_measurement[$i];
                $product_check->update([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'product_availability' => $update_product_availability,
                ]);
            }
        }
        for ($i = 0;$i < count($request->product_code);$i++){
            $offer_check = Offer::where('product_code','=',$request->product_code[$i])->where('product_name','=',$request->product_name[$i])->first();
            if(empty($offer_check)){
                Offer::create([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'offer_type' => $request->offer_type[$i],
                    'start' => $request->start[$i],
                    'end' => $request->end[$i],
                    'pieces' => $request->pieces[$i],
                    'offer' => $request->offer[$i],
                    'slug' => $slug
                ]);
            }else{
                $offer_check->update([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'offer_type' => $request->offer_type[$i],
                    'start' => $request->start[$i],
                    'end' => $request->end[$i],
                    'pieces' => $request->pieces[$i],
                    'offer' => $request->offer[$i],
                    'slug' => $slug
                ]);
            }
        }
        Session::flash('success','Your Stock Created Successfully');
        return redirect('stock');
    }
    public function show($id)
    {
        $show = Stock::find($id);
        $offers = StockOffer::where('slug','=',$show->slug)->get();
        return view('admin.stock.stock_details',compact('show','offers'));
    }
    public function edit($id)
    {
       $edit = Stock::find($id);
       $offers = StockOffer::where('slug','=',$edit->slug)->get();
       $products = ProductCategory::where('product_brand','=',$edit->brand_name)->orderBy('id','DESC')->get();
       return view('admin.stock.stock_edit',compact('edit','offers','products'));
    }
    public function update(Request $request, $id)
    {
        $update = Stock::find($id);
        $update->update([
            'brand_name' => $request->brand_name,
            'product_name' =>json_encode($request->product_name),
            'product_code' => json_encode($request->product_code),
            'unit_type' => json_encode($request->unit_type),
            'unit_measurement' => json_encode($request->unit_measurement),
            'unit' => json_encode($request->unit),
            'stock_measurement' => json_encode($request->stock_measurement),
            'purchase_price' => json_encode($request->purchase_price),
            'selling_price' => json_encode($request->selling_price),
            'store_date' => $request->store_date,
        ]);
        $offer_delete = StockOffer::where('slug','=',$update->slug);
        $offer_delete->delete();
        for($i = 0;$i < count($request->offer_type);$i++){
            StockOffer::create([
                'brand_name' => $request->brand_name,
                'product_name' => $request->product_name[$i],
                'product_code' => $request->product_code[$i],
                'offer_type' => $request->offer_type[$i],
                'start' => $request->start[$i],
                'end' => $request->end[$i],
                'pieces' => $request->pieces[$i],
                'offer' => $request->offer[$i],
                'slug' => $update->slug
            ]);
        }
        for ($i = 0;$i < count($request->product_code);$i++){
            $product_check = Warehouse::where('product_code','=',$request->product_code[$i])->first();
            if(empty($product_check)){
                Warehouse::create([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'product_availability' => $request->stock_measurement[$i],
                ]);
            }else{
                $update_product_availability = $product_check->product_availability + $request->stock_measurement[$i];
                $product_check->update([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'product_availability' => $update_product_availability,
                ]);
            }
        }
        for ($i = 0;$i < count($request->product_code);$i++){
            $offer_check = Offer::where('product_code','=',$request->product_code[$i])->first();
            if(empty($offer_check)){
                Offer::create([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'offer_type' => $request->offer_type[$i],
                    'start' => $request->start[$i],
                    'end' => $request->end[$i],
                    'pieces' => $request->pieces[$i],
                    'offer' => $request->offer[$i],
                ]);
            }else{
                $offer_check->update([
                    'brand_name' => $request->brand_name,
                    'product_name' => $request->product_name[$i],
                    'product_code' => $request->product_code[$i],
                    'offer_type' => $request->offer_type[$i],
                    'start' => $request->start[$i],
                    'end' => $request->end[$i],
                    'pieces' => $request->pieces[$i],
                    'offer' => $request->offer[$i],
                ]);
            }
        }
        Session::flash('success','Your Stock Updated Successfully');
        return redirect('stock');
    }
    public function destroy($id)
    {
        $stock_delete = Stock::find($id);
        $stock_slug = $stock_delete->slug;
        $offer_delete = StockOffer::where('slug','=',$stock_slug);
        $stock_delete->delete();
        $offer_delete->delete();
        Session::flash('success','You Stock Delete Successfully');
        return redirect('stock');
    }
    public function brandSelect($product_brand){
        $brands = Brand::orderBy('id','DESC')->get();
        $products = ProductCategory::where('product_brand','=',$product_brand)->get();
        return view('admin.stock.stock_paginate',compact('products','brands'))->render();
    }
    public function stockBrandSelect(Request $request){
        $brands = Brand::orderBy('id','DESC')->get();
        if($request->brand_name == 'all'){
            $stocks = Stock::orderBy('id','DESC')->paginate(24);
        }else{
            $stocks = Stock::where('brand_name','=',$request->brand_name)->orderBy('id','DESC')->paginate(24);
        }
        return view('admin.stock.stock_in',compact('brands','stocks'));
    }
    public function stockSearch(Request $request){
        $brands = Brand::orderBy('id','DESC')->get();
        $stocks = Stock::where('brand_name','like','%'.$request->search.'%')
                        ->orWhere('store_date','like','%'.$request->search.'%')
                        ->orWhere('created_at','like','%'.$request->search.'%')
                        ->orderBy('id','DESC')->paginate(24);
        return view('admin.stock.stock_in',compact('brands','stocks'));
    }
    public function stockPDFDownload($id){
        $show = Stock::find($id);
        $data = [
          'brand_name' => $show->brand_name,
          'slug' => $show->slug,
          'created_at' => explode(' ',$show->created_at),
          'store_date' => $show->store_date,
          'product_name' => explode(',',str_replace(str_split('[]""'),'',$show->product_name)),
          'product_code' => explode(',',str_replace(str_split('[]""'),'',$show->product_code)),
          'unit_type' => explode(',',str_replace(str_split('[]""'),'',$show->unit_type)),
          'unit_measurement' => explode(',',str_replace(str_split('[]""'),'',$show->unit_measurement)),
          'unit' => explode(',',str_replace(str_split('[]""'),'',$show->unit)),
          'stock_measurement' => explode(',',str_replace(str_split('[]""'),'',$show->stock_measurement)),
          'purchase_price' => explode(',',str_replace(str_split('[]""'),'',$show->purchase_price)),
          'selling_price' => explode(',',str_replace(str_split('[]""'),'',$show->selling_price)),
          'offers' => StockOffer::where('slug','=',$show->slug)->get(),
        ];
        $pdf = PDF::loadView('admin.stock.stock_pdf_download',$data);
        return $pdf->download('stock.pdf');
    }
}
