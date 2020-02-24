<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Models\Banner;
use App\Models\UserAssortment;
use App\Exports\DealersByAssortmentExport;
use App\Exports\StockExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Events\DealersUpdatedEvent;

class AppController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard() {
        broadcast(new DealersUpdatedEvent);
        $dealers = User::where('role', 'dealer')->paginate(20);
        $banners = Banner::all();

        $users_assortments = UserAssortment::select('ocascd', DB::raw('count(*) as total'))->groupBy('ocascd')->orderBy('total', 'desc')->get();
        return view('dashboard', [
            'dealers' => $dealers,
            'users_assortments' => $users_assortments,
            'banners' => $banners
        ]);
    }

    public function profile()
    {
        return view('profile');
    }

    public function search()
    {
        return view('search');
    }

    public function exportDealers()
    {
        return Excel::download(new DealersByAssortmentExport, 'dealer_'.date('Ymd_His').'.xlsx');
    }

    public function exportProducts()
    {
        return Excel::download(new StockExport, 'stock_'.date('Ymd_His').'.xlsx');
    }

}
