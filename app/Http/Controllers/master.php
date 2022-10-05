<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\item;
use App\Models\tipe;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class master extends Controller
{
    public function loaddata(Type $var = null)
    {
        $tipe = tipe::all();
        $item = item::all();
        Session::put('tipe',$tipe);
        Session::put('item',$item);
        return view('index');
    }

    public function addcart(Request $request)
    {
        $produk = [
            "id" => $request->id,
            "harga" => $request->harga,
            "berat"=> $request->berat,
        ];
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
                // dd($cart);
        $cart->add($produk,$request->id,$request->jumlah,);
        Session::put('cart',$cart);
        if (Session::has('cart')) {
            foreach (Session::get('cart') as $key => $value) {
                $result[$key] = $value;
            }
            $total= $result["total"];
        }else $total = "0";
        Session::put("total",$total);
        $hasil=["message"=>"Berhasil menambahkan barang ".$request->nama,"total" => $total];
        echo json_encode($hasil);
    }
}
