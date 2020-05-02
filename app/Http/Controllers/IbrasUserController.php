<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Cart;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IbrasUserController extends Controller
{
    public function indexuserdashboard()
    {
        $menutable = Menu::all();

        return view('customer.customermenupage', ['menutable' => $menutable]);
    }
    public function storeadditemstocart(Request $request)
    {
        $cart = new Cart;
        $userid = session()->get('loggedinuserid');
        $itemname = request('hiddenitemname');
        $itemprice = request('hiddenitemprice');
        $itemid = request('hiddenitemid');
        $itemquantity = request('menuitemquantity');
        error_log('userid' . $userid);
        error_log('menuid' . $itemid);
        $cartitems = Cart::where('UserID', $userid)->where('MenuID', $itemid)->where('Quantity', '>', '0')->count();
        error_log('cartitems' . $cartitems);
        if ($cartitems == '') {
            $cartitems = 0;
        }

        if ($cartitems == 0) {
            $cart->MenuID = $itemid;
            $cart->itemname = $itemname;
            $cart->Quantity = $itemquantity;
            $cart->itemprice = $itemprice;
            $cart->UserID = $userid;
            $save = $cart->save();
            if ($save) {
                session()->flash('addtocart', 'success');
            } else {
                session()->flash('addtocart', 'unsuccess');
            }
            return redirect('/customerhome');
        } else {
            $affectedRows = Cart::where('MenuID', '=', $itemid)->where('UserID', '=', $userid)->update(array('Quantity' => $itemquantity));
            if ($affectedRows) {
                session()->flash('addtocart', 'success');
            } else {
                session()->flash('addtocart', 'unsuccess');
            }
            return redirect('/customerhome');
        }
        // return $totalmenuitems;
    }
    public function indexusercart()
    {
        $userid = session()->get('loggedinuserid');
        $carttable = DB::table('cart')->where('UserID', $userid)->get();
        $carttotal = DB::table('cart')
            ->join('usersibras', 'usersibras.UserID', 'cart.UserID')
            ->where('cart.UserID', $userid)
            ->value(DB::raw("SUM(cart.itemprice * cart.quantity)"));
        // $carttotal = DB::select("SELECT SUM(cart.itemprice * cart.quantity) as total from cart,usersibras where cart.UserID=usersibras.UserID and usersibras.UserID='" . $userid. "'");
        if ($carttotal == '') {
            $carttotal = 0;
        }
        $cartquantity = DB::table('cart')
            ->join('usersibras', 'usersibras.UserID', 'cart.UserID')
            ->where('cart.UserID', $userid)
            ->value(DB::raw("SUM(cart.quantity)"));
        if ($cartquantity == '') {
            $cartquantity = 0;
        }
        return view('customer.customercartpage', ['carttable' => $carttable, 'carttotal' => $carttotal, 'cartquantity' => $cartquantity]);


        // SELECT SUM(cart.itemprice * cart.quantity) as total from cart,users where cart.UserID=users.UserID and users.Username='" . $userid. "'
    }
    // Delete items from the cart
    public function storedeletefromcart(Request $request)
    {
        $cartmenuid = request('cartmenuid');
        $userid = session()->get('loggedinuserid');
        $affectedRows = Cart::where('MenuID', '=', $cartmenuid)->where('UserID', '=', $userid)->delete();
        if ($affectedRows) {
            session()->flash('deleteitemcart', 'success');
        } else {
            session()->flash('deleteitemcart', 'unsuccess');
        }
        return redirect('/customercart');
    }
    public function indexplaceorder()
    {
        $orders = new Orders();
        $userid = session()->get('loggedinuserid');
        $cartcount = DB::table('cart')
            ->join('usersibras', 'usersibras.UserID', 'cart.UserID')
            ->where('cart.UserID', $userid)
            ->value(DB::raw("count(*)"));
        if ($cartcount > 0) {
            $carttotal = DB::table('cart')
                ->join('usersibras', 'usersibras.UserID', 'cart.UserID')
                ->where('cart.UserID', $userid)
                ->value(DB::raw("SUM(cart.itemprice * cart.quantity)"));
            if ($carttotal == '') {
                $carttotal = 0;
            }
            $orders->OrderPrice = $carttotal;
            $orders->UserID = $userid;
            $save = $orders->save();
            if ($save == 1) {
                $latestorderid = DB::table('orders')->select('OrderID')->Max('OrderID');
                $carttable = DB::table('cart')->where('UserID', '=', $userid)
                    ->get();

                foreach ($carttable as $carttable) {
                    $data =
                        ['orderID' => $latestorderid, 'menuID' => $carttable->MenuID, 'quantity' => $carttable->Quantity];
                    DB::table('orderitems')->insert($data);
                }
                //    Insert Into Feedback
                $data =
                    ['OrderID' => $latestorderid,  'UserID' => $userid];
                DB::table('feedback')->insert($data);
                $affectedRows = Cart::where('UserID', '=', $userid)->delete();
                session()->flash('ordercart', 'success');
                return redirect('/customercart');
            } else {
                session()->flash('ordercart', 'unsuccess');
                return redirect('/customercart');
            }
        }
    }

    // Orders Page
    public function indexuserorders()
    {
        $userid = session()->get('loggedinuserid');
        $orderslist = DB::table('orders')->where('UserID', $userid)->get();
        return view('customer.customerorderspage',['orderslist'=>$orderslist]);
    }
}
