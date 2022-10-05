<?php

namespace App\Http\Controllers;

use App\Models\item;
use App\Models\produk;
use App\Models\tipe;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class admin extends Controller
{
    public function addtipe(Request $request)
    {
        $tipe = $request->tipe;

        $null = tipe::where('tipe_produk','LIKE','%'.$tipe.'%')->count();
        // dd($null);
        if ($null == 0) {
            $id = "TP_";
            $count = tipe::all()->count();
            if ($count<10) $id = $id.'00'.$count;
            else $id= $id.'0'.$count;
            $tipe = tipe::insert([
                'id_produk'=>$id,
                "tipe_produk"=>$tipe
            ]);
            $hasil=["message"=>"Berhasil tambah tipe ".$tipe];
            echo json_encode($hasil);
        }else         $hasil=["message"=>"Tipe ".$tipe." sudah ada"];
        echo json_encode($hasil);
    }

    public function loadtipe(Type $var = null)
    {
        $data = tipe::all();
        return DataTables::of($data)
                        ->addColumn('action', function ($row) use($data) {
                            $btn = view('btnDelType',['data'=>$data,'selected'=>$row]);
                            return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
    }


    public function viewitem()
    {
        $data = tipe::all();
        return view('additem')->with(['tipe'=>$data]);
    }

    public function additem(Request $request)
    {
        $tipe = $request->jenis;
        $berat = $request->berat;
        $item = $request->item;
        $gambar = $request->gambar;
        $deskripsi = $request->deskripsi;
        $harga = $request->harga;
        // dd($item);
        $null = produk::where('nama_barang','LIKE','%'.$item.'%')->count();
        if ($null == 0) {
            $id = "IT_";
            $count = produk::all()->count();
            if ($count<10) $id = $id.'00'.$count;
            else $id= $id.'0'.$count;
            if ($tipe == null) {
                $tipe = 'TP_000';
            }

            $path=$gambar->move('GambarProduk',$gambar->getClientOriginalName());
            $tipe = item::insert([
                'id_barang'=>$id,
                'id_produk'=>$tipe,
                "nama_barang"=>$item,
                "gambar_barang"=>$gambar->getClientOriginalName(),
                'deskripsi'=>$deskripsi,
                'harga'=>$harga,
                'berat'=>$berat,
            ]);
            return redirect()->back()->with(["sukses"=>'berhasil menambahkan barang baru']);
        }else {
            $id = produk::where('nama_barang','LIKE','%'.$item.'%')->get();
            // dd($gambar);
            if ($gambar==null) {
                foreach ($id as $key => $value) {
                    $gambar = $value->gambar_barang;
                }
            }else {
                // dd($gambar->getClientOriginalName());
                $path=$gambar->move('GambarProduk',$gambar->getClientOriginalName());
                $gambar =$gambar->getClientOriginalName();
            }
            foreach ($id as $key => $value) {
                $id = $value->id_barang;
            }
            $tipe = item::where('id_barang',$id)
                        ->update([
                            "nama_barang"=>$item,
                            "gambar_barang"=>$gambar,
                            'deskripsi'=>$deskripsi,
                            'berat'=>$berat,
                            'harga'=>$harga
                        ]);
            return redirect()->back()->with(["sukses"=>'Barang berhasil diupdate']);

        }
    }

    public function loaditem($jenis)
    {
        // dd($jenis);
        $data = item::where('id_produk',$jenis)->get();
        return DataTables::of($data)
                        ->addColumn('action', function ($row) use($data) {
                            $btn = view('btnedititem',['data'=>$data,'selected'=>$row]);
                            return $btn;
                        })
                        ->addColumn('edit', function ($row) use($data) {
                            $btn = view('btnstatus',['data'=>$data,'selected'=>$row]);
                            return $btn;
                        })
                        ->rawColumns(['action','edit'])
                        ->make(true);
    }
    public function editstatus($id_barang)
    {
        $status = item::where('id_barang',$id_barang)->get();
        foreach ($status as $key => $value) {
            $status = $value->status_barang;
        }
        if ($status==1) {
            item::where('id_barang',$id_barang)
                ->update([
                    "status_barang"=>0,
                ]);
        }else {
            item::where('id_barang',$id_barang)
                ->update([
                    "status_barang"=>1,
            ]);
        }
    }
}
