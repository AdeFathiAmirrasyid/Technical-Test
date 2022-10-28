<?php

namespace App\Http\Controllers;

use App\Models\DaftarProduct;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function home()
    {
        return view('home.index');
    }

    public function add_product(Request $request)
    {
        $users = User::get();
        $daftarProducts = DaftarProduct::get();
        if ($request->ajax()) {
            return response()->json(['dataUsers' => $users, 'dataBarang' => $daftarProducts]);
        }

        return view('home.page.product', compact('users', 'daftarProducts'));
    }

    public function store_product(Request $request)
    {
        $result = $request->stok - $request->qty;
        $validateData = [
            'tersedia' =>  $result,
        ];
        DaftarProduct::where('id',  $request->nama_barang)->update($validateData);

        try {
            $data = [
                'nik' => $request->nik,
                'name' => $request->name,
                'departemen' => $request->departemen,
                'tgl_permintaan' => $request->tgl_permintaan,
                'nama_barang_id' => $request->nama_barang,
                'lokasi' => $request->location,
                'tersedia' => $result,
                'qty' => $request->qty,
                'decs' => $request->decs,
                'satuan' => $request->satuan,
                'status' => $request->status,
            ];
            Product::create($data);
            return redirect('/tambah-barang')->with('success', 'Pengumuman Baru telah ditambahkan!');
        } catch (Exception $e) {
            return redirect('/tambah-barang')->with('error', $e->getMessage());
        }
    }
}
