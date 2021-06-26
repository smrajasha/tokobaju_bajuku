<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Gambar;

class HomeController extends Controller
{
    public function index(){
		$produk = Gambar::list_produk();
		return view("home")->with("produk", $produk);
	
    }

    public function detail(){
        return view("detail");
    }

	public function login(){
        return view("login");
    }

    public function menu(){
        $produk = Gambar::list_produk();
		return view("menu")->with("produk", $produk);
    }

    public function admin(){
        $barang = Gambar::get();
        return view('admin',['barang' => $barang]);
    }

    public function proses_upload(Request $request){
		$this->validate($request, [
		    
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
		]);

		// menyimpan data file yang diupload ke variabel $file
		
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		Gambar::create([
		    'kode_barang' => $request->kodebarang,
		    'nama_barang' => $request->namabarang,
			'harga' => $request->hargabarang,
			
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]);

		return redirect()->back();
	}

	public function hapus($kode_barang){

		DB::table('barang')->where('kode_barang',$kode_barang)->delete();
		return redirect('/admin');
	}

	public function do_tambah_cart($kode_barang){
		$cart = session("cart");
		$produk = Gambar::detail_produk($kode_barang);
		$cart[$kode_barang] = [
			"nama_barang" => $produk->nama_barang,
			"harga" => $produk->harga
		];

		session(["cart" => $cart]);
		return redirect("/cart");
	}

	public function cart(){
		
		$cart = session("cart");
		return view("cart")->with("cart", $cart);
	}

	public function do_hapus_cart($kode_barang){
		$cart = session("cart");
		unset($cart[$kode_barang]);
		session(["cart" => $cart]);

		return redirect("/cart");
	}

	public function beli(){
		session()->forget("cart");
		return redirect("/cart");
	}

    public function Logout(){
        auth()->logout();
    
        session()->flash('message', 'Some goodbye message');
    
        return redirect('/login');
      }
   
}
