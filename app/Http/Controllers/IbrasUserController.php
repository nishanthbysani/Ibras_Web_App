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
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole==='user') {
            $totalmenuitems = DB::table('menu')->count();
            if ($totalmenuitems == '') {
                $totalmenuitems = 0;
            }

            $minitemprice = DB::table('menu')->min('price');
            if ($minitemprice == '') {
                $minitemprice = 0;
            }

            $maxitemprice = DB::table('menu')->max('price');
            if ($maxitemprice == '') {
                $maxitemprice = 0;
            }
            $menutable = Menu::all();

            return view('customer.customermenupage', ['totalmenuitems' => $totalmenuitems, 'minitemprice' => $minitemprice, 'maxitemprice' => $maxitemprice, 'menutable' => $menutable]);
        } else {
            return redirect('/inicio');
        }
    }
    public function storeadditemstocart(Request $request)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
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
        } else {
            return redirect('/inicio');
        }
    }
    public function indexusercart()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
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
        } else {
            return redirect('/inicio');
        }
    }
    // Delete items from the cart
    public function storedeletefromcart(Request $request)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $cartmenuid = request('cartmenuid');
            $userid = session()->get('loggedinuserid');
            $affectedRows = Cart::where('MenuID', '=', $cartmenuid)->where('UserID', '=', $userid)->delete();
            if ($affectedRows) {
                session()->flash('deleteitemcart', 'success');
            } else {
                session()->flash('deleteitemcart', 'unsuccess');
            }
            return redirect('/customercart');
        } else {
            return redirect('/inicio');
        }
    }
    public function indexplaceorder()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
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
        } else {
            return redirect('/inicio');
        }
    }

    // Orders Page
    public function indexuserorders()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $userid = session()->get('loggedinuserid');
            $orderslist = DB::table('orders')->where('UserID', $userid)->get();
            return view('customer.customerorderspage', ['orderslist' => $orderslist]);
        } else {
            return redirect('/inicio');
        }
    }
    // Feedback Page
    public function indexuserfeedback()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $userid = session()->get('loggedinuserid');
            $feedbackdata = DB::table('feedback')->where('UserID', $userid)->orderBy('isfeedbackprovided', 'ASC')->get();
            $totalreviewitems = DB::table('feedback')->where('UserID', $userid)->count();
            if ($totalreviewitems == '') {
                $totalreviewitems = 0;
            }

            $pendingreviewitems = DB::table('feedback')->where('UserID', $userid)->where('isfeedbackprovided', 0)->count();
            if ($pendingreviewitems == '') {
                $pendingreviewitems = 0;
            }

            $completedreviewitems = DB::table('feedback')->where('UserID', $userid)->where('isfeedbackprovided', 1)->count();
            if ($completedreviewitems == '') {
                $completedreviewitems = 0;
            }
            return view('customer.customerfeedbackpage', ['feedbackdata' => $feedbackdata, 'totalreviewitems' => $totalreviewitems, 'pendingreviewitems' => $pendingreviewitems, 'completedreviewitems' => $completedreviewitems]);
        } else {
            return redirect('/inicio');
        }
    }
    public function showuserfeedback($feedbackid)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $userid = session()->get('loggedinuserid');
            $feedbackdata = DB::table('feedback')->where('UserID', $userid)->orderBy('isfeedbackprovided', 'ASC')->get();
            $totalreviewitems = DB::table('feedback')->where('UserID', $userid)->count();
            if ($totalreviewitems == '') {
                $totalreviewitems = 0;
            }

            $pendingreviewitems = DB::table('feedback')->where('UserID', $userid)->where('isfeedbackprovided', 0)->count();
            if ($pendingreviewitems == '') {
                $pendingreviewitems = 0;
            }

            $completedreviewitems = DB::table('feedback')->where('UserID', $userid)->where('isfeedbackprovided', 1)->count();
            if ($completedreviewitems == '') {
                $completedreviewitems = 0;
            }
            $userid = session()->get('loggedinuserid');
            $feedbackdata = DB::table('feedback')->where('UserID', $userid)->orderBy('isfeedbackprovided', 'ASC')->get();
            $feedbackdataitem = DB::table('feedback')->where('UserID', $userid)->where('FeedbackID', $feedbackid)->get();
            return view('customer.customerfeedbackpage', ['feedbackdata' => $feedbackdata, 'feedbackdataitem' => $feedbackdataitem, 'totalreviewitems' => $totalreviewitems, 'pendingreviewitems' => $pendingreviewitems, 'completedreviewitems' => $completedreviewitems]);
        } else {
            return redirect('/inicio');
        }
    }
    public function storeuserfeedback(Request $request)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $feedbackorderid = request('feedbackorderid');
            $feedbackorderrating = request('feedbackorderrate');
            $feedbackordercomments = request('feedbackordercomments');
            $save =  DB::table('feedback')->where('OrderID', $feedbackorderid)->update(['Comments' => $feedbackordercomments, 'Ratings' => $feedbackorderrating, 'isfeedbackprovided' => 1]);
            if ($save) {
                session()->flash('feedbackgiven', 'success');
                return redirect('/customerfeedback');
            } else {
                session()->flash('feedbackgiven', 'unsuccess');
                return redirect('/customerfeedback');
            }
        } else {
            return redirect('/inicio');
        }
    }
    // User Profile
    public function indexuserprofiles()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $userid = session()->get('loggedinuserid');
            $profile = DB::table('profile')->where('UserID', $userid)->get();
            return view('customer.customermyprofile', ["profile" => $profile]);
        } else {
            return redirect('/inicio');
        }
    }
    public function storeuserupdateprofile()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole === 'user') {
            $userid = session()->get('loggedinuserid');
            $profilefullname = request('profilefullname');
            $profileaddress = request('profileaddress');
            $profilecity = request('profilecity');
            $profilecountry = request('profilecountry');
            $profiletelephone = request('profiletelephone');
            $profileoccupation = request('profileoccupation');
            $profileworksat = request('profileworksat');
            $save =  DB::table('profile')->where('UserID', $userid)->update(['FullName' => $profilefullname, 'address' => $profileaddress, 'city' => $profilecity, 'country' => $profilecountry, 'phonenumber' => $profiletelephone, 'occupation' => $profileoccupation, 'worksfor' => $profileworksat]);
            if ($save) {
                session()->flash('profileupdated', 'success');
                return redirect('/customerprofile');
            } else {
                session()->flash('profileupdated', 'unsuccess');
                return redirect('/customerprofile');
            }
        } else {
            return redirect('/inicio');
        }
    }
}
