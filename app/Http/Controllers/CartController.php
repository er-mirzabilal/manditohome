<?php

namespace App\Http\Controllers;

use App\Order;
use App\Setting;
use Illuminate\Http\Request;
use Cart;
use DB;
class CartController extends Controller
{
    public function view(){
        $setting=Setting::find(2);
        date_default_timezone_set("Asia/Karachi");
        //$today=date('2020-06-28');
        $today=date('Y/m/d');
        $limit=Order::select(DB::raw('count(*) as total'))->whereDate('created_at',$today)->get();
        return view('cart')->with('limit',$limit)->with('setting',$setting);
    }
    public function store(Request $request){
         Cart::add($request->id, $request->name, $request->quantity, $request->price,0.0,['quant' => $request->orig_quant])->associate('App\Product');
//         return redirect('/cart')->with('success', 'Item added to cart!');
         echo Cart::content()->count();
    }
    public function empty()
    {
        Cart::destroy();
        return redirect('/cart')->with('success', 'Your cart is destroyed!');
    }
    public function delete($id)
    {
         Cart::remove($id);
         return back()->with('success', 'Item has been removed!');
    }
    public function update(Request $request,$id)
    {
        Cart::update($id, ['qty' => $request['qty']]);
        //return redirect('/cart')->with('success', 'Item quantity updated!');

           if(session()->has("success")) {
               echo '<div class="alert alert-success" id="success-alert">' . session()->get('success') . '</div>';
            }
                        echo    '<table class="product-table">
                                <thead class="">
                                    <tr>
                                        <th>product detail</th>
                                        <th></th>
                                        <th>Unit price</th>
                                        <th>quantity</th>
                                        <th>total price</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>';
                    $total=0;
               foreach (Cart::content() as $item)
               {
                   echo '<tr>
                                        <td class="image" style="padding:0px;">
                                            <div class="white-bg">
                                                <a class="media-link"><img style="width:70px;" src="img/products/' . $item->model->picture . '" alt="' . $item->model->picture . '"></a>
                                            </div>
                                        </td>
                                        <td class="description" style="padding:0px;">
                                            <h3 class="product-title no-margin"> <a > <span class="light-font">' . $item->name . '</span></a> </h3>
                                        </td>
                                        <td style="padding:0px;">
                                            <div class="price fontbold-2">
                                                <strong class="fsz-20">Pkr ' . $item->price . ' </strong>
                                            </div>
                                        </td>
                                        <td style="padding:0px;">

                                            <div class="prod-btns fontbold-2">

                                                <div class="quantity">
                                                    <input type="hidden" name="hiddenid" value="' . $item->rowId . '" class="hiddenid">
                                                    <button class="btn minus" onclick="this.parentNode.querySelector(' . "'" . 'input[type=number]' . "'" . ').stepDown()" type="button"><i class="fa fa-minus-circle"></i></button>
                                                    <input title="Qty" name="quantity" onKeyDown="return false" min="' . $item->options->quant . '" step="' . $item->options->quant . '" value="' . $item->qty . '" class="form-control qty" type="number">
                                                    <button class="btn plus" onclick="this.parentNode.querySelector(' . "'" . 'input[type=number]' . "'" . ').stepUp()" type="button"><i class="fa fa-plus-circle"></i></button>

                                                </div>

                                            </div>
                                        </td>
                                        <td style="padding:0px;">
                                            <span style="display:none;">';
               $new_price = $item->price;
               $new_qty = $item->options->quant;
               while ($new_qty != $item->qty) {
                   $new_price = $new_price + $item->price;
                   $new_qty = $new_qty + $item->options->quant;
               }
               echo '</span>
                                            <strong class="clr-txt fsz-20 fontbold-2">Pkr ' . $new_price . '</strong>
                                            </td>
                                            <td style="padding:0px;">
                                                <form action="' . route('delete', $item->rowId) . '" method="POST" style="display:inline-block;">';
               echo csrf_field();
               echo method_field('DELETE');
               echo '<button class="" style="padding:0px;background:none;border:0px;" type="submit"><i class="remove fa fa-close clr-txt" ></i></button>
                                                </form>
                                            </td>
                                        </tr>';
                                   echo    '<span style="display:none;">';
                                   $total=floatval($total);
                                   $total+=$new_price;
                                       echo'</span>';
           }
                                echo   '</tbody>
                                </table>

                                <div class="continue-shopping">

                                    <div class="right"> <strong class="fsz-20 fontbold-2">Subtotal : <span class="clr-txt"> '.$total.' </span> </strong> </div>
                            </div>

                            <div class="shp-btn col-sm-12 text-center">
                                <a href="' . route('product').'"><button class="theme-btn-2 btn"> <b> CONTINUE SHOPPING </b> </button></a>
                                <a href="' . route('checkout').'"><button class="theme-btn-3 btn"> <b> CHECKOUT NOW </b> </button></a>
                            </div>';




    }

}
