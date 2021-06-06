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
            $dataLangganan= Langganan::with('users')->get();
            $dataOrder= Order::get();
            $dataUser= Auth::user()->get();
            $dataPembayaran= Pembayaran::get();

            $Income = 0;
            foreach($dataOrder as $inco){
                $Income = $Income + (int)$inco->harga;
            }
            $date = now()->year;
            $tanggal = now()->month;
            $dataBulan = array(
                "Januari" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '1')->count(),
                "Februari" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '2')->count(),
                "Maret" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '3')->count(),
                "April" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '4')->count(),
                "Mei" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '5')->count(),
                "Juni" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '6')->count(),
                "Juli" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '7')->count(),
                "Agustus" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '8')->count(),
                "September" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '9')->count(),
                "Oktober" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '10')->count(),
                "November" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '11')->count(),
                "Desember" => Auth::user()->whereYear('created_at', '=', $date)->whereMonth('created_at', '=', '12')->count(),
              );
            return view('admin/dashboard')->with(compact('dataLangganan', 'dataOrder','dataUser','dataPembayaran',"Income","dataBulan","tanggal"));
            $dataLangganan= Langganan::with('users')->get();
            // dd($dataLangganan);
            return view('user/dashboard',compact(['dataLangganan']));
        }
    }
    }
        