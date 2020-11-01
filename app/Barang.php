<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    public function DtlPemBrg()
    {
        return $this->hasMany('App\DetailPembelianBarang');
    }
}
