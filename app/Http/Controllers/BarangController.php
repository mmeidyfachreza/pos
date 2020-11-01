<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPembelianBarang;
use App\Product;
use Carbon\Carbon as Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class BarangController extends Controller
{
    public function tes()
    {
        // $data = DetailPembelianBarang::with('barang')
        // ->whereYear('created_at','=',2020)
        // ->orderBy('created_at','asc')
        // ->get()
        // ->take(10)
        // ->groupBy(function($val){
        //     return Carbon::parse($val->created_at)->format('Y');
        // });
        $collection = DetailPembelianBarang::with('barang')
        ->whereYear('created_at','=',2019)
        ->orWhereYear('created_at','=',2020)
        ->orderBy('created_at','desc')
        ->get()
        ->groupBy('barang.nama');
        foreach ($collection as $nama => $item) {
            Product::create([
                'nama_barang'=>$nama,
                'harga_modal'=>$item->first()->harga_beli,
            ]);
        }
        //dd($collection);
        // return (new FastExcel(Product::all()))->download('harga_modal.xlsx', function ($data) {
        //     return [
        //         'nama_barang' => $data->nama_barang,
        //         'harga_modal' => $data->harga_modal,
        //     ];
        // });
        return view('tes',compact('collection'));
    }

    public function export()
    {
        return (new FastExcel(Product::all()))->download('harga_modal.xlsx', function ($data) {
            return [
                'nama_barang' => $data->nama_barang,
                'harga_modal' => $data->harga_modal,
            ];
        });
    }
}
