<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; //access auth users
use Illuminate\Http\Request;
use App\Order;
use App\Area;
use App\OrderDetail;
use App\User;

class CustomerController extends Controller
{
    public function index()
    {
        $orders = Order::where('order_status','pending')->count();
        return view('customer.index',['orders'=>$orders],['points'=>Auth::user()->loyalty_points]);
    }
    public function loyaltypoints()
    {
        $points=Auth::user()->loyalty_points;
        $price=0;
        for($i=1;$i<=Auth::user()->loyalty_points;$i++)
        {
            $price+=1;
        }
        return view('customer.loyaltypoints',['points'=>$points],['price'=>$price]);
    }
   public function orders()
    {
        $orders=Order::orderBy('id', 'desc')->where('customer_name', Auth::user()->name)->paginate(8);
        return view('customer.orders',['orders'=>$orders]);
    }
   public function orderdetails(Request $request,$id)
    {

        $orderdetail=OrderDetail::where('order_id',$id)->get();

        echo '<div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Total</div>
                  </th>
                </tr>
              </thead>
              <tbody>';
        foreach($orderdetail as $od)
        {
            echo '<tr class="text-center"> 
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="'.asset('/img/products/'.$od->picture).'" alt="'.$od->picture.'" width="50" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a class="text-dark d-inline-block align-middle">'.$od->name.'</a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>'.$od->price.'</strong></td>
                  <td class="border-0 align-middle"><strong>'.$od->quantity.'</strong></td>';
            $new_price = $od->price;
            $new_qty = $od->quant_step;
            while ($new_qty != $od->quantity) {
                $new_price = $new_price + $od->price;
                $new_qty = $new_qty + $od->quant_step;
            }
            echo '
                  <td class="border-0 align-middle"><a class="text-dark">'.$new_price.'</a></td>
                </tr>';
            $comment=$od->Order->order_comment;
        }
        echo '</tbody>
            </table>
            <textarea class="form-control" style="display:block;width:100%;" disabled >'.$comment.'</textarea>
          </div>';
    }
    public function orderfilter(Request $request)
    {
        $from = $request->datefrom;
        $to = $request->dateto;
        $date_from = Carbon::parse($request->datefrom)->startOfDay();
        $date_to = Carbon::parse($request->dateto)->endOfDay();
        if (empty($from) && empty($to)) {
            $orders = Order::orderBy('id', 'desc')->paginate(8);
        } else if (!empty($from) && empty($to)) {
            $orders = Order::whereDate('created_at', '>=', $date_from)->orderBy('id', 'desc')->paginate(8);
        } else if (empty($from) && !empty($to)) {
            $orders = Order::whereDate('created_at', '<=', $date_to)->orderBy('id', 'desc')->paginate(8);
        } else if (!empty($from) && !empty($to)) {
            $orders = Order::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('id', 'desc')->paginate(8);
        }

        echo ' <div class="card-header" style="padding:0px;padding-top:15px;">
                            <div class="row">

                                <div class="col-sm-4">
                                    <div class="col-md-8 col-sm-12" style="float:right;padding-top:5px;">
                                      Showing entries : ' . $orders->count() . '
                                    </div>
                                  
                                </div>
                                <div class="col-sm-4 text-center" >
                                    <label>From : </label>
                                    <input type="date" style="margin-bottom:10px;" value="' . $from . '" name="datefrom" id="datefrom" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>To : </label>
                                    <input type="date" style="margin-bottom:10px;" value="' . $to . '" name="dateto" id="dateto" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="card-body">';
        if ($orders->isEmpty()) {
            echo '<h5 style="text-align:center;display:block;margin:20px;">No order is placed yet.</h5>';
        } else {
            echo '<div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr style="text-align:center;">
                                            <th>ID</th>
                                            <th>Deliver to</th>
                                            <th>Order Price</th>
                                            <th>Status</th>
                                            <th>Added At</th>
                                            <th>Action</th>

                                        </tr>
                                        </thead>

                                        <tbody>';
            foreach ($orders as $od) {
                echo '<tr class="text-center">
                                            <td>' . $od->id . '</td>
                                            <td>' . $od->delivery_area . '</td>
                                            <td>' . $od->order_price . '</td>
                                            <td>' . $od->order_status . '</td>
                                            <td>';
                $time = 0;
                $time = strtotime($od->created_at);
                $carbon = Carbon::createFromTimestamp($time);
                echo $carbon->day . ' ' . $carbon->format('M') . ' ' . $carbon->year;
                echo '</td>      
                                                <td>
                                                    <input type="hidden" class="ordertotal" value="' . $od->order_price . '">
                                                    <input type="hidden" class="orderid" value="' . $od->id . '">
                                                    <attr title="View Details"><button class="btn btn-warning getdetails_btn" type="button"><i class="fa fa-external-link"></i></button></attr>
                                                </td>
                                            </tr>';
            }

            echo '</tbody>
                                    </table>
                                </div>';
        }
        echo '</div>
                        <div class="card-footer" style="padding-bottom:0px;">
                            <span style="float:right;">';
        if ($orders->count() > 0) {
            echo $orders->links();
        }
        echo '</span>
                        </div>';

    }
}
