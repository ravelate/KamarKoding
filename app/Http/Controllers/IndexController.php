<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    public function index(){
        $role=Auth::user()->role;
        if($role == '1'){
            return view('admin/dashboard');
        }else {
            return view('dashboard');
        }
    }
    // ini buat list pengguna doang
    public function listPengguna() {
        $data= Auth::user()->get();
        return view('admin/listusers',compact(['data']));
    }
    public function updatepengguna(Request $request)
    {
        // dd($request);
        $pengguna = Auth::user()->find($request->id);
        $pengguna->update($request->all());
        return redirect('redirects/listpengguna')->with('sukses', 'Data berhasil diupdate');
    }
    public function destroypengguna(Request $request)
    {
        $pengguna = Auth::user()->find($request->id);
        // dd($Authors);
        // foreach($Authors->news as $tes){
        //     // return $tes->pivot['author_id'];
        //     $Authors->news()->detach( $tes->pivot['author_id'],  $tes->pivot['news_id']);
        // }
        $pengguna->delete();
        return redirect('redirects/listpengguna')->with('sukses', 'Data berhasil dihapus');
    }
    // end list pengguna doang

        // ini buat list order doang
        public function listorder() {
            $data= Order::get();
            $datauser= Auth::user()->get();
            return view('admin/listorder',['data' => $data],['datauser' => $datauser]);
        }
        public function updateorder(Request $request)
        {
            // dd($request);
            $order = Order::findOrFail($request->id);
            $order->update($request->all());
            return redirect('redirects/listorder')->with('sukses', 'Data berhasil diupdate');
        }
        public function destroyorder(Request $request)
        {
            $order = Order::findOrFail($request->id);
            // dd($Authors);
            // foreach($Authors->news as $tes){
            //     // return $tes->pivot['author_id'];
            //     $Authors->news()->detach( $tes->pivot['author_id'],  $tes->pivot['news_id']);
            // }
            $order->delete();
            return redirect('redirects/listorder')->with('sukses', 'Data berhasil dihapus');
        }
        // end list order doang
         // ini buat list pembayaran doang
         public function listpembayaran() {
            $data= Pembayaran::get();
            return view('admin/listpembayaran',compact(['data']));
        }
        public function updatepembayaran(Request $request)
        {
            // dd($request);
            $order = Order::findOrFail($request->id);
            $order->update($request->all());
            return redirect('redirects/listpembayaran')->with('sukses', 'Data berhasil diupdate');
        }
        public function destroypembayaran(Request $request)
        {
            $order = Pembayaran::findOrFail($request->id);
            // dd($Authors);
            // foreach($Authors->news as $tes){
            //     // return $tes->pivot['author_id'];
            //     $Authors->news()->detach( $tes->pivot['author_id'],  $tes->pivot['news_id']);
            // }
            $order->delete();
            return redirect('redirects/listpembayaran')->with('sukses', 'Data berhasil dihapus');
        }
        // end list order doang
    }
        