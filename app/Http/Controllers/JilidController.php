<?php

namespace App\Http\Controllers;

use App\DataTables\JilidDataTable;
use App\Models\Jilid;
use Illuminate\Http\Request;

class JilidController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/jilid')->only('create');
    }

    public function index(JilidDataTable $dataTable)
    {
        $this->authorize('read layanan/jilid');
        return $dataTable->render('layanan.jilid.jilid');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.jilid.jilid-action', ['jilid' => new Jilid()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Jilid $jilid)
    {
        $jilid = new Jilid();
        $jilid->nama = $request->nama;
        $jilid->nrp = $request->nrp;
        $jilid->judul = $request->judul;
        $jilid->page_berwarna = $request->page_berwarna;
        $jilid->page_hitamPutih = $request->page_hitamPutih;
        $jilid->exemplar = $request->exemplar;
        $jilid->cover = $request->cover;
        $jilid->total = $request->total;
        $jilid->bukti_pembayaran = $request->bukti_pembayaran;
        $jilid->file = $request->file;
        $jilid->keterangan = $request->keterangan;
        $jilid->status = 'Belum Validasi';
        $jilid->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);

    }


    public function show($id)
    {
    }


    public function edit(Jilid $jilid)
    {
        return view('layanan.jilid.jilid-action', compact('jilid'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jilid $jilid)
    {
        $jilid->nama = $request->nama;
        $jilid->nrp = $request->nrp;
        $jilid->judul = $request->judul;
        $jilid->page_berwarna = $request->page_berwarna;
        $jilid->page_hitamPutih = $request->page_hitamPutih;
        $jilid->exemplar = $request->exemplar;
        $jilid->cover = $request->cover;
        $jilid->total = $request->total;
        $jilid->bukti_pembayaran = $request->bukti_pembayaran;
        $jilid->file = $request->file;
        $jilid->keterangan = $request->keterangan;
        $jilid->status = $request->status;
        $jilid->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jilid $jilid)
    {
        $jilid->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
