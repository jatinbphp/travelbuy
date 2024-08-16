<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;
use DataTables;
use Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request){
        $data['menu'] = 'Cart';
        $cart_data = Carts::with('product')->where('user_id', Session::get('loginData.MerchantID'))->get();

        if(count($cart_data)==0){
            \Session::flash('danger', 'Please add the product to your cart.');
                return redirect()->route('productList.index');
        }

        if ($request->ajax()) {
            return Datatables::of($cart_data)
            ->addIndexColumn()
            ->addColumn('product_name', function($row) {
                return $row->product->name;
            })
            ->addColumn('product_price', function($row) {
                return env('CURRENCY').number_format($row->product->price, 2);
            })
            ->addColumn('total', function($row) {
                return env('CURRENCY').number_format($row->product->price * $row->qty, 2);
            })
            ->addColumn('qty', function($row){

                return $row->qty;
                $quantity = '<div class="qty">';
                $quantity .= '<button class="btn-sm btn-danger" type="button" id="minus" data-id="'.$row->id.'"><i class="fa fa-minus" aria-hidden="true"></i></button>';
                $quantity .= '<input type="text" id="quantity'.$row->id.'" value="'.$row->qty.'" style="width: 50px; text-align: center;">'; // Center-align the text
                $quantity .= '<button class="btn-sm btn-info" type="button" id="plus" data-id="'.$row->id.'"><i class="fa fa-plus" aria-hidden="true"></i></button>';
                $quantity .= '</div>';
                return $quantity;
            })
            ->addColumn('action', function($row){
                $row['section_name'] = 'carts';
                $row['section_title'] = 'Carts';
                return view('admin.common.action-buttons', $row);
            })
            ->rawColumns(['qty'])
            ->make(true);
        }

        return view('admin.productList.carts',$data);
    }

    public function destroy(string $id){
        $cart = Carts::findOrFail($id);

        if(!empty($cart)){
            $cart->delete();
            return 1;
        } else {
            return 0;
        }
    }
}
