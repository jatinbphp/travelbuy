<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;
use DataTables;
use Session;

class ProductlistController extends Controller
{
    public function index(Request $request)
    {
        $data['menu'] = 'Shop Now';

        $data['productsList'] = Products::where('status','active')->get();
        
        return view('admin.productList.index',$data);
    }

    public function addToCart(Request $request)
    {
        $input = $request->all();
        $MerchantID = Session::get('loginData.MerchantID');
        $productId = $input['product_id'];        

        $cart = Carts::where('user_id', $MerchantID)->where('product_id', $productId)->first();

        if (!empty($cart)) {
            $cart->qty = 1;            
            $cart->save();
        } else {
            $cartData = [
                'user_id' => $MerchantID,
                'product_id' => $productId,
                'qty' => 1
            ];

            Carts::create($cartData);
        }

        return response()->json(['success' => 'Product added to cart successfully!'], 200);    
    }    

    public function updateQty(Request $request)
    {
        $input = $request->all();
        $cart = Carts::find($input['id']);

        if ($cart) {
            $quantityChange = ($input['type'] == 1) ? -1 : 1;
            $cart->qty += $quantityChange; 
            $cart->save(); 
        }

        return 1;
    }
}
