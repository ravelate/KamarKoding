<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Pembayaran;
use App\Models\Langganan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // <-------------------------------------------------- Data Pengguna -------------------------------------------->
    // ini buat list pengguna doang
    public function listPengguna() {
        $role=Auth::user()->role;
        if($role == '1'){
            $data= Auth::user()->get();
        return view('admin/listusers',compact(['data']));
        }else {
            return redirect('/redirects');
        }
    
    }
    public function updatepengguna(Request $request)
    {
        // dd($request);
        $pengguna = Auth::user()->find($request->id);
        // dd($request);
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
            $role=Auth::user()->role;
        if($role == '1'){
            $data= Order::get();
            $datauser= Auth::user()->get();
            return view('admin/listorder',['data' => $data],['datauser' => $datauser]);
        }else {
            return redirect('/redirects');
        }
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
            $role=Auth::user()->role;
            if($role == '1'){
                $data= Pembayaran::get();
            return view('admin/listpembayaran',compact(['data']));
            }else {
                return redirect('/redirects');
            }
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

        // <-------------------------------------------- Kelas Kontrol -------------------------------------------> //
        
    // ini buat list Kelas doang
    public function listKelas() {
        $role=Auth::user()->role;
        if($role == '1'){
            $dataLangganan= Langganan::with('users')->get();
        return view('admin/kelas',compact(['dataLangganan']));
        }else {
            return redirect('/redirects');
        }
    }
    public function storeKelas(Request $request)
    {
        // dd($request);
        Langganan::create($request->all());
        return redirect('redirects/listkelas')->with('sukses', 'Data berhasil diinput');
    }

    public function updateKelas(Request $request)
    {
        // dd($request);
        $pengguna = Langganan::findOrFail($request->id);
        $pengguna->update($request->all());
        return redirect('redirects/listkelas')->with('sukses', 'Data berhasil diupdate');
    }
    public function destroyKelas(Request $request)
    {
        $pengguna = Langganan::findOrFail($request->id);
        $pengguna->delete();
        return redirect('redirects/listpengguna')->with('sukses', 'Data berhasil dihapus');
    }
    // end list kelas doang
    // ini buat tambah kelas pengguna
    public function tambahKelas() {
        $role=Auth::user()->role;
        if($role == '1'){
            $dataLangganan= Langganan::get();
        return view('admin/tambahkelas',compact(['dataLangganan']));
        }else {
            return redirect('/redirects');
        }
    }
    public function addKelas(Request $request)
    {
        // dd($request);  
        if($request->get('user_id')) {
            Langganan::findOrfail($request->id)->users()->attach($request->get('user_id'));
        }
        return redirect('redirects/tambahkelas')->with('sukses', 'Data berhasil diinput');
    }
}
