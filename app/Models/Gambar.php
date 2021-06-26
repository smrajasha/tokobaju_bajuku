<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    public $timestamps = false;
    protected $table = "barang";

    protected $fillable = ['kode_barang','nama_barang','harga','file','keterangan'];

    static function list_produk(){
        $data = Gambar::all();
        return $data;
    }

    static function detail_produk($kode_barang){
        $data = Gambar::where("kode_barang", $kode_barang)->first();
        return $data;
    }
}
