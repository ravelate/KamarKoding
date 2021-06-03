<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Langganan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    public function index(){
        $role=Auth::user()->role;
        if($role == '1'){
            return view('admin/dashboard');
        }else {
            $dataLangganan= Langganan::with('users')->get();
            return view('user/dashboard',compact(['dataLangganan']));
        }
    }
    }
        