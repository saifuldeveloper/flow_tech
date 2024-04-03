<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use Session;

class CartController extends Controller
{
    public function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();
        if ($product->discount_price == 0) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->quantity;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            $totalQuantity = Cart::count();
            return \Response::json(['success' => 'Successfully Added on your Cart!', 'totalCart' => $totalQuantity]);
        } else {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->quantity;
            $data['price'] = $product->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            $totalQuantity = Cart::count();
            return \Response::json(['success' => 'Successfully Added on your Cart!', 'totalCart' => $totalQuantity]);
        }

    } // End Method

    public function check()
    {
        $content = Cart::content();
        return response()->json($content);
    }

    public function showCart()
    {

        $cart = Cart::content();
        $totalQuantity = Cart::count();
        // dd($totalQuantity);

        //  return response($cart);
        return view('frontend.pages.cart_page', compact('cart', 'totalQuantity'));
        //   return view('frontend.pages.cart_page');

    } // End Method

    public function removeCart($rowId)
    {

        Cart::remove($rowId);
        return Redirect()->back()->with('error', 'Product Remove from Cart!');

    } // End Method

    public function updateCart(Request $request)
    {

        $rowId = $request->productid;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
        return Redirect()->back()->with('success', 'Product Quantity Updated!');

    } // End Method

    public function Checkout(Request $request)
    {
        $id = $request->id;
        $product = DB::table('products')->where('id', $id)->first();
        $data = array();
        if ($product) {
            $data['id'] = $product->id;
            $data['name'] = $product->product_name;
            $data['qty'] = $request->quantity;
            $data['price'] = $product->selling_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            $url = route('user.checkout.rediect');
            return \Response::json(['success' => 'Successfully Added on your Cart!', 'url' => $url]);
        }
        return view('frontend.pages.checkout');

    }

    public function CheckoutRedirect()
    {
        return view('frontend.pages.checkout');

    }

    public function Wishlist()
    {

        $userid = Auth::id();
        $product = DB::table('wishlists')
            ->join('products', 'wishlists.product_id', 'products.id')
            ->select('products.*', 'wishlists.user_id')
            ->where('wishlists.user_id', $userid)
            ->get();

        // return response()->json($product);
        return view('frontend.pages.wishlist', compact('product'));

    } // End Method

    public function applyCoupon(Request $request)
    {

        $coupon = $request->coupon;
        // echo $coupon;
        $check = DB::table('coupons')->where('coupon', $coupon)->first();

        if ($check) {
            // echo "yes have coupon";
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::Subtotal() - $check->discount,
            ]);
            return Redirect()->back()->with('success', 'Successfully Coupon Applied!');
        } else {
            return Redirect()->back()->with('error', 'Invalid Coupon!');
        }

    } // End Method

    public function CouponRemove()
    {

        Session::forget('coupon');
        return Redirect()->back()->with('success', 'Coupon Remove Successfully!');

    } // End Method

    public function PaymentPage()
    {

        $cart = Cart::Content();
        return view('frontend.pages.payment', compact('cart'));

    } // End Method

}
