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
        return view('layanan.jilidTa-action', ['jilid' => new JilidLaporan()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JilidRequest $request, JilidLaporan $jilid)
    {

        $jilid = new JilidLaporan();

        $jilid->user_id = auth()->id();
        $jilid->nama = $request->nama;
        $jilid->page_berwarna = $request->page_berwarna;
        $jilid->page_hitamPutih = $request->page_hitamPutih;
        $jilid->exemplar = $request->exemplar;
        $jilid->cover = $request->cover;
        $jilid->total = $request->total;
        $jilid->bukti_pembayaran = $request->bukti_pembayaran;
        $jilid->file = $request->file;
        $jilid->status = 'Tidak Valid';
        $jilid->save();

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
    public function edit(JilidLaporan $jilid)
    {
        //
        return view('layanan.jilidTa-action', compact('jilid'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JilidLaporan $jilid)
    {
        //
        $jilid->user_id = auth()->id();
        $jilid->nama = $request->nama;
        $jilid->page_berwarna = $request->page_berwarna;
        $jilid->page_hitamPutih = $request->page_hitamPutih;
        $jilid->exemplar = $request->exemplar;
        $jilid->cover = $request->cover;
        $jilid->total = $request->total;
        $jilid->bukti_pembayaran = $request->bukti_pembayaran;
        $jilid->file = $request->file;
        $jilid->status = $request->status;
        $jilid->save();

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
    public function destroy(JilidLaporan $jilid)
    {
        $jilid->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
