<?php

namespace App\Http\Controllers\Admin;

use App\Imports\SaleImport;
use App\Offer;
use App\Sale;
use App\User;
use Illuminate\Support\Facades\DB;
use App\SaleInvoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function index()
    {
        //
    }
    public function create(Request $request)
    {
        $invoice = Sale::find($request->id);
//        find the user who upload these sale excel file
        $user = User::where('id','=',$invoice->auth_id)->first();

//        if have older track in sale_invoice table delete that
//        $delete_sale_invoice = SaleInvoice::where('sale_id','=',$invoice->id);
//        if(!empty($delete_sale_invoice)){
//            $delete_sale_invoice->delete();
//        }

//        find the excel file and value store into a array
        $path = public_path().'/assets/files/'.$invoice->upload_file;
        $rows = Excel::toArray(new SaleImport(),$path);
        if(count($rows)){
            foreach ($rows as $key => $value){
                foreach($value as $index => $result){
                       $arr[] = $result;
                }
            }
        }

//        sale_invoice table store value with expected value
        $saleInvoiceCheck = SaleInvoice::where('sale_id','=',$invoice->id)->first();
        if(empty($saleInvoiceCheck)){
            foreach ($arr as $item){
                $saleInvoice = SaleInvoice::where('sale_id','=',$invoice->id)->where('product_code','=',$item['product_code'])->first();
                $offer = Offer::where('product_code','=',$item['product_code'])->first();
                if (!empty($offer)){
                    $type = $offer->offer_type;
                }else{
                    $type = 'Not Set';
                }
                if(empty($saleInvoice)){
                    SaleInvoice::create([
                        'sale_id' => $invoice->id,
                        'brand_name' => $item['brand'],
                        'product_code' => $item['product_code'],
                        'product_name' => $item['product_name'],
                        'selling_rates' => $item['selling_rate'],
                        'sales_qty' => $item['sales_qty'],
                        'offer_type' => $type,
                    ]);
                }else{
                    $sales_qty = $saleInvoice->sales_qty + $item['sales_qty'];
                    $saleInvoice->update([
                        'sales_qty' => $sales_qty,
                    ]);
                }
            }
        }
        $excel = SaleInvoice::where('sale_id','=',$invoice->id)->get();
        return view('admin.invoice.invoice_create',compact('excel','invoice','user'));
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
