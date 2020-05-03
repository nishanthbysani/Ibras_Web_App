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
    }
    public function indexadminmenu()
    {
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
    }

    public function showadminmenuitem($MenuID)
    {
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
    }
    public function showadminaddmenuitem()
    {
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
    }
    public function showadmineditmenuitem(Request $request)
    {
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
                $save = Menu::where('MenuID',$menuitemid)->update(['itemname' => $menuitemname, 'price' => $menuitemprice, 'description' => $menuitemdescription, 'nutrientfacts' => $menuitemnutrientfacts]);
                if ($save) {
                    session()->flash('updatemenuitem', 'success');
                    return redirect('/adminmenu');
                } else {
                    session()->flash('updatemenuitem', 'unsuccess');
                    return redirect('/adminmenu');
                }
                break;
        }
    }
    // Admin Feedback
    public function indexadminreview()
    {
        $reviewitems = DB::select('select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, usersibras b where a.UserID=b.UserID');
        return view('admin.adminreviewpage', ['reviewitems' => $reviewitems]);
    }
    public function showadminreview($status)
    {
        if ($status == 'pending') {
            error_log('pending');
            $reviewitems = DB::select('select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, usersibras b where a.UserID=b.UserID and a.isfeedbackprovided=0');
        } else if ($status == 'completed') {
            error_log('completed');
            $reviewitems = DB::select('select a.FeedbackID,a.OrderID,a.Comments,a.Ratings,b.username,a.feedbacktime,a.isfeedbackprovided from feedback a, usersibras b where a.UserID=b.UserID and a.isfeedbackprovided=1');
        }
        return view('admin.adminreviewpage', ['reviewitems' => $reviewitems]);
    }


    public function indexadminusers()
    {
        // return view('admin.adminreviewpage');

    }
    // Admin Enquiry
    public function indexadminenquiry()
    {
        $reviewitems = DB::select('select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact');
        return view('admin.adminenquirypage', ['reviewitems' => $reviewitems]);
    }
    public function showadminenquiry($status)
    {
        if ($status == 'pending') {
            error_log('pending');
            $reviewitems = DB::select('select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact where isresolved=0');
        } else if ($status == 'completed') {
            error_log('completed');
            $reviewitems = DB::select('select ContactID,Name,Email,Subject,Message,enquiretime,isresolved,resolvedby,resolutioncomments,lastupdated from contact where isresolved=1');
        }
        return view('admin.adminenquirypage', ['reviewitems' => $reviewitems]);
    }


    // Admin Timesheet
    public function indexadmintimesheet()
    {
        $reviewitems = DB::select('select * from stafftimesheet');
        return view('admin.adminstafftimesheet', ['reviewitems' => $reviewitems]);
    }

    // Admin Inventory  
    public function indexadmininventory()
    {
        $reviewitems = DB::select('select * from inventory');
        return view('admin.admininventory', ['reviewitems' => $reviewitems]);
    }
}
