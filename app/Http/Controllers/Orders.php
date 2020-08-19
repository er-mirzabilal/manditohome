<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; //access auth users
use Illuminate\Http\Request;
use App\Order;
use App\Area;
use App\OrderDetail;
use App\User;
use App\Setting;
use DB;
use Cart;

class Orders extends Controller
{
  function checkoutpage()
  {
    $areas = Area::where('available', true)->get();
    $setting = Setting::find(2);
    date_default_timezone_set("Asia/Karachi");
    //$today=date('2020-06-28');
    $today = date('Y/m/d');
    $limit = Order::select(DB::raw('count(*) as total'))->whereDate('created_at', $today)->get();
    if (Auth::check()) {
      $count = Order::select(DB::raw('count(*) as total'))->where('customer_contact', '=', Auth::user()->email)->get();
      if (!$count[0]->total > 0) {
        //                echo $count[0]->total;
        //                exit;
        $discount = Setting::where('setting_name', '=', 'Discount')->first();
        return view('checkout', ['areas' => $areas], ['discount' => $discount])->with('limit', $limit)->with('setting', $setting);
      }
    }
    return view('checkout', ['areas' => $areas])->with('limit', $limit)->with('setting', $setting);
  }
  function store(Request $request)
  {
    //     //One to Many relation store multiple records with Eloquent Model
    $order = new Order();
    $order->customer_name = $request->input('name');
    $order->customer_contact = $request->input('number');
    $order->customer_address = $request->input('address');
    $order->delivery_area = $request->input('deliveryArea');
    $order->delivery_fee = $request->input('deliveryFee');
    $order->order_status = 'pending';
    if (isset($request->comment)) {
      $order->order_comment = $request->input('comment');
    }
    $order->order_price = $request->input('totalprice');

    if (Auth::check()) {
      $order->loyalty_earned = $request->input('priceToLoyaltyInput');
      $user = User::find(Auth::user()->id);
      $user->loyalty_points += $order->loyalty_earned;
      $user->save();
      if ($request->spendloyalty) {
        $order->loyalty_spent = $request->input('spendloyalty');
        $user = User::find(Auth::user()->id);
        $user->loyalty_points -= $order->loyalty_spent;
        $user->save();
        $order->order_price -= $order->loyalty_spent;
      }
    }
    $order->save();
    foreach (Cart::content() as $item) {
      $orderdetails = new OrderDetail();
      $orderdetails->name = $item->name;
      $orderdetails->picture = $item->model->picture;
      $orderdetails->sell_type = $item->model->sell_type;
      $orderdetails->quant_step = $item->options->quant;
      $orderdetails->quantity = $item->qty;
      $orderdetails->price = $item->price;
      $order->orderdetail()->save($orderdetails);
    }
    Cart::destroy();
    return redirect('/checkout')->with('success', 'Thank you for choosing our Services, Your order is placed and
       will be delivered to you shortly.');
  }
}
