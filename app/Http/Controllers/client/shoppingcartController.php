<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\User;


class shoppingcartController extends Controller
{
    public function getShoppingCart(Request $req)
    {
        $customer_ID = Auth::guard('users')->id();
        $this_customer = User::where('id', $customer_ID)->get();
        $customer_ID = $this_customer[0]->id;
        $carts = Cart::where('Customer_ID', $customer_ID)->get();
       
        foreach ($carts as $item) {
            array_push($Product_Details_ID, $item->Product_Detail_ID);
        };
        $product_Details_Slug = [];

        foreach ($Product_Details_ID as $item) {
            $Slug =  ProductDetail::where('product_details.ID', $item)
                ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
                ->get('product_details.Slug');
            foreach ($Slug as $kk) {
                array_push($product_Details_Slug, $kk);
            }
        }

        $specific_item_slug = [];
        foreach ($product_Details_Slug as $item) {
            array_push($specific_item_slug, $item->Slug);
        }

        $all_cart_products = [];
        foreach ($specific_item_slug as $item) {
            $pro =  ProductDetail::where('product_details.Slug', $item)
                ->join('Products', 'Products.id', '=', 'product_details.Product_ID')
                ->get();
            array_push($all_cart_products, $pro);
        }

        $allPro =[];
        foreach($all_cart_products as $item){
            array_push($allPro,$item[0]);
        }


        return view('clientsPage.shoppingCart', ['this_customer' => $allPro,'cart_details' => $carts]);
    }
}
