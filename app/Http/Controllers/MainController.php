<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Banks;
use App\Models\Booked;
use App\Models\Meja;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Auth;
use illuminate\Http\Str;

class MainController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        return view('web.front.index');
    }

    public function Menu()
    {
        $menus = Menu::get();
        return view('web.front.menu', compact('menus'));
    }

    public function setMeja(Request $request)
    {
        $meja = Meja::query();
        $noMeja = $meja->where('status','active')->get();
        $booked = Booked::create([
            'id_meja' => $noMeja[0]->id,
            'name'  => $request->name,
            'no_meja' => $request->no_hp,
            'tanggal' => date('d/m/y'),
            'waktu' => date('H:i')
        ]);
        $checking = User::where('email', $request->no_hp)->first();
        if($checking){
        
            $user = $checking;
        }else{
            $user = User::create([
                'email' => $request->no_hp,
                'name'  => $request->name,
                'password' =>   Hash::make($request->no_hp),
            ]);
        }
        $auth = Auth::loginUsingId($user->id);
        return response()->json([
            'status' => ($booked == true)?true:false,
            'auth' => ($auth == true)?true:false
        ]);
    }

    public function addMenu(Request $request)
    {
        dd($request->all());
    }

}
