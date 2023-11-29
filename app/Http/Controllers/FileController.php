<?php

namespace App\Http\Controllers;

use App\DataTables\BerkasDataTable;
use App\Models\File;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/berkas')->only('create');
    }

    public function index(BerkasDataTable $dataTable)
    {
        //
        $this->authorize('read layanan/berkas');
        return $dataTable->render('layanan.file.file');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.file.file-action', ['berka' => new File()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $berka)
    {
        $berka = new File();
        $berka->user_id = auth()->id();
        $berka->nama = $request->nama;
        $berka->nrp = $request->nrp;
        $berka->judul = $request->judul;
        $berka->laporan_ta = $request->laporan_ta;
        $berka->dokumen_penunjang = $request->dokumen_penunjang;
        $berka->file_presentasi = $request->file_presentasi;
        $berka->product = $request->product;
        $berka->haki = $request->haki;
        $berka->video_trailer = $request->video_trailer;
        $berka->poster = $request->poster;
        $berka->artikel_jurnal = $request->artikel_jurnal;
        $berka->status = 'Belum validasi';
        $berka->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
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
    public function edit(File $berka)
    {
        return view('layanan.file.file-action', compact('berka'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $berka)
    {
        $berka->user_id = auth()->id();
        $berka->nama = $request->nama;
        $berka->nrp = $request->nrp;
        $berka->judul = $request->judul;
        $berka->laporan_ta = $request->laporan_ta;
        $berka->dokumen_penunjang = $request->dokumen_penunjang;
        $berka->file_presentasi = $request->file_presentasi;
        $berka->product = $request->product;
        $berka->haki = $request->haki;
        $berka->video_trailer = $request->video_trailer;
        $berka->poster = $request->poster;
        $berka->artikel_jurnal = $request->artikel_jurnal;
        $berka->keterangan = $request->keterangan;
        $berka->status = $request->status;
        $berka->save();

        return response()->json([
            'status' => 'success',
            'message' => 'updated data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $berka)
    {
        $berka->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
