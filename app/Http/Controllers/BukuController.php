<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "buku" =>  $buku = DB::table('buku')
            ->join('kategori', 'buku.kategori_id', '=', 'kategori.id')
            ->select('buku.*', 'kategori.nama_kategori AS nama_kategori')
            ->get(),
            "kategori" => Kategori::all()
        ];
        
        return view("buku.index",$data);
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
            "nama_kategori" => "required",
            "judul_buku" => "required",
            "penerbit" => "required"
        ]);
        date_default_timezone_set('Asia/Jakarta');
        $buku = new Buku;
        $buku->kategori_id = $request->nama_kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->penerbit = $request->penerbit;
        $buku->created_at = date('Y-m-d H:i:s');
        $buku->updated_at = date('Y-m-d H:i:s');
        $buku->save();
        return redirect('buku')->with('message','Data berhasil berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('buku')->where('id', $id)->first();
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
            "nama_kategori" => "required",
            "judul_buku" => "required",
            "penerbit" => "required"
        ]);
        date_default_timezone_set('Asia/Jakarta');
        $buku = Buku::find($id);
        $buku->kategori_id = $request->nama_kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->penerbit = $request->penerbit;
        $buku->updated_at = date('Y-m-d H:i:s');
        $buku->save();
        return redirect('buku')->with('message','Data berhasil berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);

        $buku->delete();
        return redirect('buku')->with('message','Data buku berhasil dihapus');
    }
}
