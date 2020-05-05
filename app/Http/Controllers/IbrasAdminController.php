<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use App\User;
use App\UsersIbras;
use App\Menu;
use Illuminate\Support\Facades\DB;

class IbrasAdminController extends Controller
{
    //
    public function indexadmindashboard()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole==='admin') {
            // Net Earnings Monthly
            $netearningsmonthly = Orders::whereraw('YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW())')
                ->value(DB::raw("SUM(OrderPrice)"));

            if ($netearningsmonthly == '') {
                $netearningsmonthly = 0;
            }
            // Net Earnings Daily
            $netearningsdaily = Orders::whereraw('YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW()) and Day(OrderTime)=Day(NOW())')
                ->value(DB::raw("SUM(OrderPrice)"));

            if ($netearningsdaily == '') {
                $netearningsdaily = 0;
            }
            // Monthly Orders
            $monthlyorders = Orders::whereraw("YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW())")
                ->value(DB::raw("COUNT(Distinct(`OrderID`))"));

            if ($monthlyorders == '') {
                $monthlyorders = 0;
            }
            // Daily Orders
            $dailyorders = Orders::whereraw('YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW()) and Day(OrderTime)=Day(NOW())')
                ->value(DB::raw("COUNT(Distinct(`OrderID`))"));

            if ($dailyorders == '') {
                $dailyorders = 0;
            }
            // Monthly Users
            $monthlyusers = Orders::whereraw('YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW())')
                ->value(DB::raw("COUNT(Distinct(`USERID`))"));

            if ($monthlyusers == '') {
                $monthlyusers = 0;
            }
            // Daily Users
            $dailyusers = Orders::whereraw('YEAR(OrderTime)=Year(NOW()) and Month(OrderTime) = Month(NOW()) and Day(OrderTime)=Day(NOW())')
                ->value(DB::raw("COUNT(Distinct(`USERID`))"));

            if ($dailyusers == '') {
                $dailyusers = 0;
            }

            // return view('dashboardadmin');
            return view('admin.dashboardadmin', ['netearningsmonthly' => $netearningsmonthly, 'netearningsdaily' => $netearningsdaily, 'monthlyorders' => $monthlyorders, 'dailyorders' => $dailyorders, 'monthlyusers' => $monthlyusers, 'dailyusers' => $dailyusers]);
        } else {
            return redirect('/inicio');
        }
    }
    public function indexadminmenu()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
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
            // return $maxitemprice;
            // return $menutable;
            return view('admin.adminmenupage', ['totalmenuitems' => $totalmenuitems, 'minitemprice' => $minitemprice, 'maxitemprice' => $maxitemprice, 'menutable' => $menutable]);
        } else {
            return redirect('/inicio');
        }
    }
    public function showadminmenuitem($MenuID)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
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
            $menuitems = DB::table('menu')->where('MenuID', $MenuID)->get();
            return view('admin.adminmenupage', ['totalmenuitems' => $totalmenuitems, 'minitemprice' => $minitemprice, 'maxitemprice' => $maxitemprice, 'menutable' => $menutable, 'menuitems' => $menuitems]);
        } else {
            return redirect('/inicio');
        }
    }
    public function showadminaddmenuitem()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $menuitemname = request('menuitemname');
            $menuitemprice = request('menuitemprice');
            $menuitemdescription = request('menuitemdescription');
            $menuitemnutrientfacts = request('menuitemnutrientfacts');
            $menu = new Menu();
            $menu->itemname = $menuitemname;
            $menu->price = $menuitemprice;
            $menu->description = $menuitemdescription;
            $menu->nutrientfacts = $menuitemnutrientfacts;
            $save = $menu->save();
            if ($save) {
                session()->flash('addtomenu', 'success');
                return redirect('/adminmenu');
            } else {
                session()->flash('addtomenu', 'unsuccess');
                return redirect('/adminmenu');
            }
        } else {
            return redirect('/inicio');
        }
    }
    public function showadmineditmenuitem(Request $request)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $menu = new Menu();
            $menuitemname = request('updatemenuitemname');
            $menuitemprice = request('updatemenuitemprice');
            $menuitemdescription = request('updatemenuitemdescription');
            $menuitemnutrientfacts = request('updatemenuitemnutrientfacts');
            $menuitemid = request('updatemenuid');
            switch ($request->input('editmenuitem')) {
                case 'Delete':
                    // Delete Menu Item
                    $save = Menu::where('MenuID', '=', $menuitemid)->delete();
                    if ($save) {
                        session()->flash('deletemenuitem', 'success');
                        return redirect('/adminmenu');
                    } else {
                        session()->flash('deletemenuitem', 'unsuccess');
                        return redirect('/adminmenu');
                    }
                    break;

                case 'Update':
                    // Update Menu Item
                    // return $menuitemname.$menuitemprice.$menuitemdescription.$menuitemnutrientfacts.$menuitemid;
                    $save = Menu::where('MenuID', $menuitemid)->update(['itemname' => $menuitemname, 'price' => $menuitemprice, 'description' => $menuitemdescription, 'nutrientfacts' => $menuitemnutrientfacts]);
                    if ($save) {
                        session()->flash('updatemenuitem', 'success');
                        return redirect('/adminmenu');
                    } else {
                        session()->flash('updatemenuitem', 'unsuccess');
                        return redirect('/adminmenu');
                    }
                    break;
            }
        } else {
            return redirect('/inicio');
        }
    }
    // Admin Feedback
    public function indexadminreview()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $totalfeedbackitems = DB::table('feedback')->count();
            if ($totalfeedbackitems == '') {
                $totalfeedbackitems = 0;
            }
            $pendingfeedbackitems = DB::table('feedback')->where('isfeedbackprovided', 0)->count();
            if ($pendingfeedbackitems == '') {
                $pendingfeedbackitems = 0;
            }
            $completedfeedbackitems = DB::table('feedback')->where('isfeedbackprovided', 1)->count();
            if ($completedfeedbackitems == '') {
                $completedfeedbackitems = 0;
            }
            $reviewitems = DB::select('select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, usersibras b where a.UserID=b.UserID');
            return view('admin.adminreviewpage', ['totalfeedbackitems' => $totalfeedbackitems, 'pendingfeedbackitems' => $pendingfeedbackitems, 'completedfeedbackitems' => $completedfeedbackitems, 'reviewitems' => $reviewitems]);
        } else {
            return redirect('/inicio');
        }
    }
    public function showadminreview($status)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $totalfeedbackitems = DB::table('feedback')->count();
            if ($totalfeedbackitems == '') {
                $totalfeedbackitems = 0;
            }
            $pendingfeedbackitems = DB::table('feedback')->where('isfeedbackprovided', 0)->count();
            if ($pendingfeedbackitems == '') {
                $pendingfeedbackitems = 0;
            }
            $completedfeedbackitems = DB::table('feedback')->where('isfeedbackprovided', 1)->count();
            if ($completedfeedbackitems == '') {
                $completedfeedbackitems = 0;
            }
            if ($status == 'pending') {
                error_log('pending');
                $reviewitems = DB::select('select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, usersibras b where a.UserID=b.UserID and a.isfeedbackprovided=0');
            } else if ($status == 'completed') {
                error_log('completed');
                $reviewitems = DB::select('select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, usersibras b where a.UserID=b.UserID and a.isfeedbackprovided=1');
            }
            return view('admin.adminreviewpage', ['totalfeedbackitems' => $totalfeedbackitems, 'pendingfeedbackitems' => $pendingfeedbackitems, 'completedfeedbackitems' => $completedfeedbackitems, 'reviewitems' => $reviewitems]);
        } else {
            return redirect('/inicio');
        }
    }

    // Admin Users
    public function indexadminusers()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $totalusers = DB::table('profile')->count();
            if ($totalusers == '') {
                $totalusers = 0;
            }
            $userslist = DB::table('profile')->get();
            return view('admin.adminuserspage', ["userslist" => $userslist, 'totalusers' => $totalusers]);
        } else {
            return redirect('/inicio');
        }
    }
    // Admin Enquiry
    public function indexadminenquiry()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $totalenquiryitems = DB::table('contact')->count();
            if ($totalenquiryitems == '') {
                $totalenquiryitems = 0;
            }
            $pendingenquiryitems = DB::table('contact')->where('isresolved', 0)->count();
            if ($pendingenquiryitems == '') {
                $pendingenquiryitems = 0;
            }
            $completedenquiryitems = DB::table('contact')->where('isresolved', 1)->count();
            if ($completedenquiryitems == '') {
                $completedenquiryitems = 0;
            }
            $reviewitems = DB::select('select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact');
            return view('admin.adminenquirypage', ['totalenquiryitems' => $totalenquiryitems, 'pendingenquiryitems' => $pendingenquiryitems, 'completedenquiryitems' => $completedenquiryitems, 'reviewitems' => $reviewitems]);
        } else {
            return redirect('/inicio');
        }
    }
    public function showadminenquiry($status)
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $totalenquiryitems = DB::table('contact')->count();
            if ($totalenquiryitems == '') {
                $totalenquiryitems = 0;
            }
            $pendingenquiryitems = DB::table('contact')->where('isresolved', 0)->count();
            if ($pendingenquiryitems == '') {
                $pendingenquiryitems = 0;
            }
            $completedenquiryitems = DB::table('contact')->where('isresolved', 1)->count();
            if ($completedenquiryitems == '') {
                $completedenquiryitems = 0;
            }
            if ($status == 'pending') {
                error_log('pending');
                $reviewitems = DB::select('select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact where isresolved=0');
            } else if ($status == 'completed') {
                error_log('completed');
                $reviewitems = DB::select('select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact where isresolved=1');
            }
            return view('admin.adminenquirypage', ['totalenquiryitems' => $totalenquiryitems, 'pendingenquiryitems' => $pendingenquiryitems, 'completedenquiryitems' => $completedenquiryitems, 'reviewitems' => $reviewitems]);
        } else {
            return redirect('/inicio');
        }
    }


    // Admin Timesheet
    public function indexadmintimesheet()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $reviewitems = DB::select('select * from stafftimesheet');
            return view('admin.adminstafftimesheet', ['reviewitems' => $reviewitems]);
        } else {
            return redirect('/inicio');
        }
    }

    // Admin Inventory  
    public function indexadmininventory()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $reviewitems = DB::select('select * from inventory');
            return view('admin.admininventory', ['reviewitems' => $reviewitems]);
        } else {
            return redirect('/inicio');
        }
    }
    // Admin Profile
    public function indexadminprofiles()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
            $userid = session()->get('loggedinuserid');
            $profile = DB::table('profile')->where('UserID', $userid)->get();
            return view('admin.adminmyprofile', ["profile" => $profile]);
        } else {
            return redirect('/inicio');
        }
    }
    public function storeupdateprofile()
    {
        $loggedin = session()->get('loginstatus');
        $userrole = session()->get('userrole');
        if ($loggedin == true && $userrole=='admin') {
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
                return redirect('/adminprofile');
            } else {
                session()->flash('profileupdated', 'unsuccess');
                return redirect('/adminprofile');
            }
        } else {
            return redirect('/inicio');
        }
    }
}
