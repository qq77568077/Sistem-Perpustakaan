<?php

namespace App\Http\Controllers;

use App\DataTables\jilidLaporanDataTable;
use App\Http\Requests\JilidRequest;
use App\Models\JilidLaporan;
use Illuminate\Http\Request;

class JilidLaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create layanan/jilidLaporan')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(jilidLaporanDataTable $dataTable)
    {
        
        $this->authorize('read layanan/jilidLaporan');
        return $dataTable->render('layanan.jilidTa');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layanan.jilidTa-action', ['JilidLaporan' => new JilidLaporan()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JilidRequest $request, JilidLaporan $JilidLaporan)
    {

        $JilidLaporan = new JilidLaporan();

        $JilidLaporan->user_id = auth()->id();
        $JilidLaporan->nama = $request->nama;
        $JilidLaporan->page_berwarna = $request->page_berwarna;
        $JilidLaporan->page_hitamPutih = $request->page_hitamPutih;
        $JilidLaporan->exemplar = $request->exemplar;
        $JilidLaporan->cover = $request->cover;
        $JilidLaporan->total = $request->total;
        $JilidLaporan->bukti_pembayaran = $request->bukti_pembayaran;
        $JilidLaporan->file = $request->file;
        $JilidLaporan->status = 'Tidak Valid';
        $JilidLaporan->save();

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
    public function edit(JilidLaporan $JilidLaporan)
    {
        //
        return view('layanan.jilidTa-action', compact('JilidLaporan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JilidLaporan $JilidLaporan)
    {
        //
        $JilidLaporan->user_id = auth()->id();
        $JilidLaporan->nama = $request->nama;
        $JilidLaporan->page_berwarna = $request->page_berwarna;
        $JilidLaporan->page_hitamPutih = $request->page_hitamPutih;
        $JilidLaporan->exemplar = $request->exemplar;
        $JilidLaporan->cover = $request->cover;
        $JilidLaporan->total = $request->total;
        $JilidLaporan->bukti_pembayaran = $request->bukti_pembayaran;
        $JilidLaporan->file = $request->file;
        $JilidLaporan->status = $request->status;
        $JilidLaporan->save();

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
    public function destroy(JilidLaporan $JilidLaporan)
    {
        $JilidLaporan->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
