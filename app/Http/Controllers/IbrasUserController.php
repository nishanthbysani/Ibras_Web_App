<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Cart;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IbrasUserController extends Controller
{
    public function checkloginstatus()
    {

        if (session()->has('loggedinuserid')) {

            $userid = session()->get('loggedinuserid');
            error_log('userid=' . $userid);
            $roletype = DB::table('usersibras')->where('UserID', $userid)->select('RoleID')->Max('RoleID');
            if ($roletype == '') {
                $roletype = 0;
            }
            error_log('roletype ' . $roletype);
            if ($roletype == 0) {
                return redirect('/inicio');
            } else if ($roletype == 1) {
                // Do Nothing
            } else if ($roletype == 2) {
                error_log('Admin Home');
                // return redirect('/adminhome');
                header("Location: " . app('App\Http\Controllers\IbrasAdminController')->indexadmindashboard());
            } else {
                return redirect('/inicio');
            }
        } else {
            return 'true';
            return redirect('/inicio');
        }
    }
    public function indexuserdashboard()
    {
        // $numberredirect = $this->checkloginstatus();
        $menutable = Menu::all();

        return view('customer.customermenupage', ['menutable' => $menutable]);
    }
    public function storeadditemstocart(Request $request)
    {
        // $this->checkloginstatus();
        $cart = new Cart;
        $userid = session()->get('loggedinuserid');
        $itemname = request('hiddenitemname');
        $itemprice = request('hiddenitemprice');
        $itemid = request('hiddenitemid');
        $itemquantity = request('menuitemquantity');
        $cartitems = Cart::where('UserID', $userid)->where('MenuID', $itemid)->where('Quantity', '>', '0')->count();
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
    }
    public function indexusercart()
    {
        $userid = session()->get('loggedinuserid');
        $carttable = DB::table('cart')->where('UserID', $userid)->get();
        $carttotal = DB::table('cart')
            ->join('usersibras', 'usersibras.UserID', 'cart.UserID')
            ->where('cart.UserID', $userid)
            ->value(DB::raw("SUM(cart.itemprice * cart.quantity)"));
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
        return view('customer.customerorderspage', ['orderslist' => $orderslist]);
    }
}
