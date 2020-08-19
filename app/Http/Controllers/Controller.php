<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Product;
use App\Category;
use App\Area;
use App\Setting;
use App\Order;
use DB;
use Illuminate\Http\Request;

class Controller extends BaseController
{
  
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
      // $this->middleware(['auth']);
    }
    public function index()
    {
        $setting=Setting::find(2);
        date_default_timezone_set("Asia/Karachi");
        //$today=date('2020-06-28');
        $today=date('Y/m/d');
        $limit=Order::select(DB::raw('count(*) as total'))->whereDate('created_at',$today)->get();
        $categories= category::where('status',true)->get();
        $areas = Area::where('available',true)->get();
        return view('index',['areas'=>$areas],['categories'=>$categories])->with('limit',$limit)->with('setting',$setting);
    }
    public function getproductindex(Request $request)
    {
        $products = Product::where('status', true)->where('cat_id',$request->id)->orderBy('id','desc')->take(8)->get();
        echo '<div id="grid-view" class="tab-pane fade active in" role="tabpanel">
        <div class="row"> ';
        foreach($products as $p)
        {
            echo
                '<div class="col-lg-3 col-md-4 col-sm-6"> 
            <div class="product-box"> 
                <div class="product-media" style="height:200px;"> 
                    <img class="prod-img" style="width:140px;height:160px;position:absolute;" alt="'.$p->picture.'" src="img/products/'.$p->picture.'">     
                    <img class="shape" alt="shap-small.png" src="img/icons/shap-small.png"> 
                </div>                                           
                <div class="product-caption"> 
                <form action="/cart" class="addtocart" method="POST">';
            echo csrf_field();
            echo  '<h3 class="product-title">
                        <a> <span class="light-font"> '.$p->name.' </span></a>
                    </h3>
                    <div class="prod-btns fontbold-2" style="margin:0px auto;border-top:none;border-bottom:none;padding:0px 0px 10px 0px;">
                    <div class="quantity" >
                            <button class="btn minus" onclick="this.parentNode.querySelector('."'".'input[type=number]'."'".').stepDown()" type="button"><i class="fa fa-minus-circle"></i></button>
                            <input title="Qty" name="quantity" onKeyDown="return false" min="'.$p->quant_step.'" step="'.$p->quant_step.'" value="'.$p->quant_step.'" class="form-control qty" type="number">
                            <button class="btn plus" onclick="this.parentNode.querySelector('."'".'input[type=number]'."'".').stepUp()" type="button"><i class="fa fa-plus-circle"></i></button>
                    </div>
                    </div>
                    <div class="price"> 
                        <strong class="clr-txt">Pkr <span class="price-span">'.$p->price.'</span> </strong>
                        <input type="hidden" name="id" value="'.$p->id.'">
                        <input type="hidden" name="name" value="'.$p->name.'">
                        <input type="hidden" class="priceinput" name="price" value="'.$p->price.'">
                        <input type="hidden" name="orig_quant" value="'.$p->quant_step.'">
                    </div>
                    <button type="submit" style="margin-top:10px;" class="theme-btn btn"> <strong> ADD TO CART </strong> </button>
                </form>
                </div>
            </div>
        </div>';
        }
        echo '</div>
       </div>';
    }
}
