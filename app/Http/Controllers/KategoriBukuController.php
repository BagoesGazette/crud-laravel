<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Datatable;
use Illuminate\Support\Facades\DB;

class KategoriBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "kategori" => Kategori::all()
        ];
        
        return view("kategori.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            "nama_kategori" => "required|min:3"
        ]);
        date_default_timezone_set('Asia/Jakarta');
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->created_at = date('Y-m-d H:i:s');
        $kategori->updated_at = date('Y-m-d H:i:s');
        $kategori->save();
        return redirect('kategori')->with('message','Data kategori berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('kategori')->where('id', $id)->first();
        echo json_encode($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            "nama_kategori" => "required|min:3"
        ]);
        date_default_timezone_set('Asia/Jakarta');
        $kategori = Kategori::find($id);
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->updated_at = date('Y-m-d H:i:s');
        $kategori->save();
        return redirect('kategori')->with('message','Data kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);

        $kategori->delete();
        return redirect('kategori')->with('message','Data kategori berhasil dihapus');
    }
}
