<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{
    function post(Request $request) 
    {
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->keterangan = $request->keterangan;
        $produk->jumlah = $request->jumlah;
        $produk->harga = $request->harga;

        $produk->save();

        return response()->json(
            [
                "message" => "Success",
                "data" => $produk
            ]
            );
    }

    function get() 
    {
        $data = Produk::all();

        return response()->json($data
            );
    }

    function getById($id) 
    {
        $data = Produk::where('id', $id)->get();

        return response()->json($data
            );
    }
    
    function put($id, Request $request) 
    {
        $produk = Produk::where('id', $id)->first();
        if($produk){
            $produk->nama_produk = $request->nama_produk ? $request->nama_produk : $produk->nama_produk  ;
            $produk->keterangan = $request->keterangan ? $request->keterangan : $produk->keterangan;
            $produk->jumlah = $request->jumlah ? $request->jumlah : $produk->jumlah;
            $produk->harga = $request->harga ? $request->harga : $produk->harga;
            $produk->save();

            return response()->json(
                [
                    "message" => "Put Method Success",
                    "data" => $produk
                ]
                );
        }
        return response()->json(
            [
                "message" => "Produk with ".$id." Not Found"
            ],
            400
            );
    }

    function delete($id, Request $request) 
    {
        $produk = Produk::where('id', $id)->first();
        if($produk){
            $produk->delete();
            return response()->json(
                [
                    "message" => "Delete Method Success".$id
                ]
                );
        }
        return response()->json(
            [
                "message" => "Produk with ".$id." Not Found"
            ],
            400
            );
    }
}
