<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPembelianBarang extends Model
{
    protected $table = 'detail_pembelian_barang';

    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
