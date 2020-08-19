<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Auth; //access auth users
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Redirect;
use App\Order;
use App\OrderDetail;
use App\Area;
use App\User;
use App\Product;
use DB;
use Carbon\Carbon;
use App\Setting;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware(['auth']);
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    date_default_timezone_set("Asia/Karachi");
    //$today=date('2020-06-28');
    $today = date('Y/m/d');
    $sale = Order::select(DB::raw('sum(order_price+delivery_fee) as total'))->where('order_status', '=', 'complete')->whereDate('created_at', $today)->get();
    $areaWise = Order::select(DB::raw('delivery_area,count(*) as total'))->whereDate('created_at', $today)->groupBy('delivery_area')->get();
    $customer = User::select(DB::raw('count(*) as total'))->where('is_admin', false)->get();
    $product = Product::select(DB::raw('count(*) as total'))->where('status', true)->get();
    $orders = Order::count();
    return view('admin.index', ['sale' => $sale], ['areaWise' => $areaWise])->with('customer', $customer[0]->total)->with('product', $product[0]->total);
  }

  public function orders(Request $request)
  {
    date_default_timezone_set("Asia/Karachi");
    //$today=date('2020-06-28');
    $today = date('Y/m/d');
    if (isset($request->area)) {
      $orders = Order::where('delivery_area', '=', $request->area)->whereDate('created_at', $today)->orderBy('id', 'desc')->paginate(8);
      return view('admin.orders', ['orders' => $orders])->with('area', $request->area);
    } else {
      $orders = Order::whereDate('created_at', $today)->orderBy('id', 'desc')->paginate(8);
      return view('admin.orders', ['orders' => $orders]);
    }
  }
  public function orderdetails(Request $request, $id)
  {
    $orderdetail = OrderDetail::where('order_id', $id)->get();

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
    foreach ($orderdetail as $od) {
      echo '<tr class="text-center">
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="' . asset('/img/products/' . $od->picture) . '" alt="' . $od->picture . '" width="50" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a class="text-dark d-inline-block align-middle">' . $od->name . '</a></h5>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle"><strong>' . $od->price . '</strong></td>
                  <td class="border-0 align-middle"><strong>' . $od->quantity . '</strong></td>';
      $new_price = $od->price;
      $new_qty = $od->quant_step;
      while ($new_qty != $od->quantity) {
        $new_price = $new_price + $od->price;
        $new_qty = $new_qty + $od->quant_step;
      }
      echo '

                  <td class="border-0 align-middle"><a class="text-dark">' . $new_price . '</a></td>
                </tr>';
      $comment = $od->Order->order_comment;
    }
    echo '</tbody>
            </table>
            <textarea class="form-control" style="display:block;width:100%;" disabled >' . $comment . '</textarea>
          </div>';
  }
  public function orderfilter(Request $request)
  {

    $text = $request->textfield;
    $from = $request->datefrom;
    $to = $request->dateto;
    $date_from = Carbon::parse($request->datefrom)->startOfDay();
    $date_to = Carbon::parse($request->dateto)->endOfDay();
    if (!empty($text) && !empty($from) && !empty($to)) {
      $orders = Order::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->where('delivery_area', 'like', '%' . $text . '%')->orWhere('customer_name', 'like', '%' . $text . '%')->orWhere('customer_contact', 'like', '%' . $text . '%')->orderBy('id', 'desc')->paginate(8);
    } else if (empty($text) && !empty($from) && !empty($to)) {
      $orders = Order::whereDate('created_at', '>=', $date_from)->whereDate('created_at', '<=', $date_to)->orderBy('id', 'desc')->paginate(8);
    } else if (!empty($text) && empty($from) && !empty($to)) {
      $orders = Order::whereDate('created_at', '<=', $date_to)->where('delivery_area', 'like', '%' . $text . '%')->orWhere('customer_name', 'like', '%' . $text . '%')->orWhere('customer_contact', 'like', '%' . $text . '%')->orderBy('id', 'desc')->paginate(8);
    } else if (!empty($text) && !empty($from) && empty($to)) {
      $orders = Order::whereDate('created_at', '>=', $date_from)->where('delivery_area', 'like', '%' . $text . '%')->orWhere('customer_name', 'like', '%' . $text . '%')->orWhere('customer_contact', 'like', '%' . $text . '%')->orderBy('id', 'desc')->paginate(8);
    } else if (empty($text) && empty($from) && !empty($to)) {
      $orders = Order::whereDate('created_at', '<=', $date_to)->orderBy('id', 'desc')->paginate(8);
    } else if (!empty($text) && empty($from) && empty($to)) {
      $orders = Order::where('delivery_area', 'like', '%' . $text . '%')->orWhere('customer_name', 'like', '%' . $text . '%')->orWhere('customer_contact', 'like', '%' . $text . '%')->orderBy('id', 'desc')->paginate(8);
    } else if (empty($text) && !empty($from) && empty($to)) {
      $orders = Order::whereDate('created_at', '>=', $date_from)->orderBy('id', 'desc')->paginate(8);
    } else if (empty($text) && empty($from) && empty($to)) {
      $orders = Order::all()->orderBy('id', 'desc')->paginate(8);
    }


    echo '<div class="card-header" style="padding:0px;padding-top:10px;padding-bottom: 10px;">
              <div class="row">
                <div class="col-sm-4">
                   <div class="col-md-8 col-sm-12" style="float:right;">
                    <div class="input-group">
                        <input type="text" placeholder="Search Name/Contact/Area" value="' . $text . '"  name="textfield" id="textfield" class="form-control" style="" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-success" id="textfield-btn" ><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 text-center" >
                    <label>From:</label>
                    <input type="date" value="' . $from . '" name="datefrom" id="datefrom" class="form-control">
              </div>
                  <div class="col-sm-4">
                      <label>To:</label>
                      <input type="date" value="' . $to . '" name="dateto" id="dateto" class="form-control" >
                  </div>
            </div>
            </div>
            <div class="card-body">';
    if ($orders->isEmpty()) {
      echo  '<h5 style="text-align:center;display:block;margin:20px;">No Record Found, try other input.</h5>';
    } else {
      echo  '<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align:center;">
                      <th>ID</th>
                      <th>Client Name</th>
                      <th>Contact #</th>
                      <th>Address</th>
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
                      <td>' . $od->customer_name . '</td>
                      <td>' . $od->customer_contact . '</td>
                      <td>' . $od->customer_address . '</td>
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
                          <div class="dropdown">
                              <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Choose Action
                                  <span class="caret"></span></button>
                              <ul class="dropdown-menu" style="min-width:9rem;text-align:center;">
                                  <li>
                                      <input type="hidden" class="ordertotal" value="' . $od->order_price . '">
                                      <input type="hidden" class="orderid" value="' . $od->id . '">
                                      <button class="btn getdetails_btn" type="button" style="color:#FFCC00;"><i class="fa fa-external-link"></i> View Detail</button>
                                  </li>
                                  <li>---------------------</li>';
        if ($od->order_status == "pending") {
          echo '<li>
                                      <form method="POST" action="' . route('updatestatus') . '" style="display:inline-block">';
          echo csrf_field();
          echo '<input type="hidden" name="id" value="' . $od->id . '">
                                        <input type="hidden" name="status" value="1">
                                        <button class="btn" type="submit" style="color:#00ff00;"><i class="fa fa-check"></i> Complete</button>
                                      </form>
                                   </li>
                                  <li>
                                      <form method="POST" action="' . route('updatestatus') . '" style="display:inline-block">';
          echo csrf_field();
          echo '<input type="hidden" name="id" value="' . $od->id . '">
                                          <input type="hidden" name="status" value="-1">
                                          <button class="btn text-danger" type="submit" style="color:#00ff00;"><i class="fa fa-times"></i> Cancel</button>
                                          </form>
                                  </li>';
        } else {
        }
        echo '</ul>
                            </div>
                    </td>
                    </tr>';
      }

      echo '</tbody>
                </table>
              </div>';
    }
    echo '</div>
            <div class="card-footer" style="padding-bottom:0px;">
                 <span style="float:left;">
                 Showing Records ' . $orders->count() . '
                 </span>
                 <span style="float:right;">';
    if ($orders->count() > 0) {
      echo $orders->links();
    }
    echo '</span>
             </div>';
  }
  public function updatestatus(Request $request)
  {
    $order = Order::find($request->id);
    $status = $request->status;
    if ($status == "1") {
      $order->order_status = "complete";
    } else if ($status == "-1") {
      if (!empty($order->loyalty_earned)) {
        $user = User::where('email', '=', $order->customer_contact)->first();
        $user->loyalty_points -= $order->loyalty_earned;
        $user->save();
      }

      if (!empty($order->loyalty_spent)) {
        $user = User::where('email', '=', $order->customer_contact)->first();
        $user->loyalty_points += $order->loyalty_spent;
        $user->save();
      }
      $order->order_status = "cancel";
    }
    $order->save();

    return redirect()->back()->with('success', 'Order Status updated Successfully');
  }
  public function viewcategory()
  {
    $category = Category::all();
    return view('admin.viewcategory', ['category' => $category]);
  }
  public function addcategory(Request $request)
  {
    $category = new Category();
    $category->name = $request->input('catname');
    $category->status = $request->input('catstatus');
    $category->save();
    return redirect()->back()->with('success', 'New Category Added Successfully');
  }
  public function updatecategory(Request $request, $id)
  {
    $category = Category::find($id);
    $category->name = $request->input('updatecatname');
    $category->status = $request->input('updatecatstatus');
    $category->save();
    return redirect()->back()->with('success', 'Category info updated Successfully');
  }
  public function viewarea()
  {
    $area = Area::all();
    return view('admin.viewarea', ['area' => $area]);
  }
  public function addarea(Request $request)
  {
    $area = new Area();
    $area->name = $request->input('areaname');
    $area->shipping_price = $request->input('areaprice');
    $area->available = $request->input('areastatus');
    $area->save();
    return redirect()->back()->with('success', 'New Delivery Area Added Successfully');
  }
  public function updatearea(Request $request, $id)
  {
    $area = Area::find($id);
    $area->name = $request->input('updateareaname');
    $area->shipping_price = $request->input('updateareaprice');
    $area->available = $request->input('updateareastatus');
    $area->save();
    return redirect()->back()->with('success', 'Delivery Area info updated Successfully');
  }
  public function viewcustomers()
  {
    $users = User::where('is_admin', false)->paginate(8);
    return view('admin.viewcustomers', ['users' => $users]);
  }
  public function viewproducts()
  {
    $products = Product::all();
    return view('admin.viewproducts', ['products' => $products]);
  }
  public function addproduct()
  {
    $category = Category::where('status', true)->get();
    return view('admin.addproduct', ['category' => $category]);
  }
  public function addproductsubmit(Request $request)
  {
    $product = new Product();
    $product->name = $request->input('name');
    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
    $request->image->move(public_path('/img/products'), $imageName);
    $product->picture = $imageName;
    $product->price = $request->input('price');
    $product->status = $request->input('status');
    $product->sell_type = $request->input('sell_type');
    $product->quant_step = $request->input('quant_step');
    $product->cat_id = $request->input('cat_id');

    $product->save();
    return redirect()->back()->with('success', 'New Product Added Successfully');
  }
  public function editproduct($id)
  {
    $category = Category::where('status', true)->get();
    $product = Product::find($id);
    return view('admin.editproduct', ['product' => $product], ['category' => $category]);
  }
  public function editproductsubmit(Request $request, $id)
  {
    $product = Product::find($id);
    $product->name = $request->input('name');
    $product->price = $request->input('price');
    $product->status = $request->input('status');
    $product->sell_type = $request->input('sell_type');
    $product->quant_step = $request->input('quant_step');
    $product->cat_id = $request->input('cat_id');

    if (isset($request->image)) {

      $previmage = '/img/products/' . $request->prevPicture;

      if (File::exists(public_path($previmage))) {
        File::delete(public_path($previmage));
      }
      $imageName = time() . '.' . $request->image->getClientOriginalExtension();
      $request->image->move(public_path('/img/products'), $imageName);
      $product->picture = $imageName;
    }

    $product->save();
    return redirect()->back()->with('success', 'Product info updated Successfully');
  }
  public function deleteproduct(Request $request)
  {
    $product = Product::find($request->id);

    $previmage = "/img/products/" . $product->picture;
    if (File::exists(public_path($previmage))) {
      File::delete(public_path($previmage));
    }
    $product->delete();
    return redirect()->back()->with('success', 'Product deleted Successfully');
  }

  public function itemrequire(Request $request)
  {
    $text = $request->textfield;
    $from = $request->datefrom;
    $to = $request->dateto;
    $date_from = Carbon::parse($request->datefrom)->startOfDay();
    $date_to = Carbon::parse($request->dateto)->endOfDay();
    if (!empty($text) && !empty($from) && !empty($to)) {
      //echo "all set";
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->where('orders.delivery_area', 'like', '%' . $text . '%')->whereDate('orders.created_at', '>=', $date_from)->whereDate('orders.created_at', '<=', $date_to)
        ->groupBy('order_details.name')
        ->get();
    } else if (empty($text) && !empty($from) && !empty($to)) {
      //echo "date from and to";
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->whereDate('orders.created_at', '>=', $date_from)->whereDate('orders.created_at', '<=', $date_to)
        ->groupBy('order_details.name')
        ->get();
    } else if (!empty($text) && empty($from) && !empty($to)) {
      //echo "text and date to";
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->where('orders.delivery_area', 'like', '%' . $text . '%')->whereDate('orders.created_at', '<=', $date_to)
        ->groupBy('order_details.name')
        ->get();
    } else if (!empty($text) && !empty($from) && empty($to)) {
      //echo "text and date from";
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->where('orders.delivery_area', 'like', '%' . $text . '%')->whereDate('orders.created_at', '>=', $date_from)
        ->groupBy('order_details.name')
        ->get();
    } else if (!empty($text) && empty($from) && empty($to)) {
      //echo "only text";
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->where('orders.delivery_area', 'like', '%' . $text . '%')
        ->groupBy('order_details.name')
        ->get();
    } else if (empty($text) && !empty($from) && empty($to)) {
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->whereDate('orders.created_at', '>=', $date_from)
        ->groupBy('order_details.name')
        ->get();
    } else if (empty($text) && empty($from) && !empty($to)) {
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')->whereDate('orders.created_at', '<=', $date_to)
        ->groupBy('order_details.name')
        ->get();
    } else if (empty($text) && empty($from) && empty($to)) {
      //echo "all empty";
      $data = DB::table('order_details')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('*', DB::raw('SUM(order_details.quantity) AS itemTotal'))
        ->where('orders.order_status', '=', 'pending')
        ->groupBy('order_details.name')
        ->get();
    }

    if (empty($data)) {
      echo  '<h5 style="text-align:center;display:block;margin:20px;">No require items, from selected input.</h5>';
    } else {
      echo '<div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Item Name</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Item Require</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Require In</div>
                  </th>
                </tr>
              </thead>
              <tbody>';
      foreach ($data as $d) {
        echo '<tr class="text-center">';
        echo '<td class="border-0 align-middle"><strong>' . $d->name . '</strong></td>';
        echo '<td class="border-0 align-middle"><strong>' . $d->itemTotal . '</strong></td>';
        echo '<td class="border-0 align-middle"><strong>' . $d->sell_type . '</strong></td>';
        echo '</tr>';
      }
      echo '</tbody>
             </table>
             </div>';
    }

    //       dd($data);
    //return view('admin.itemrequire',['items'=>$data]);
  }
  public function viewsettings()
  {
    $settings = Setting::all();
    return view('admin.settings', ['settings' => $settings]);
  }
  public function updatesetting(Request $request, $id)
  {
    $setting = Setting::find($id);
    $setting->setting_name = $request->input('updatesetname');
    $setting->setting_value = $request->input('updatesetvalue');
    $setting->save();
    return redirect()->back()->with('success', 'Setting info updated Successfully');
  }
}
