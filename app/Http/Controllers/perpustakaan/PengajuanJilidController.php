<?php

namespace App\Http\Controllers\perpustakaan;

use App\Http\Controllers\Controller;
use App\Models\Jilid;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class PengajuanJilidController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/pengajuan-jilid')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read layanan/pengajuan-jilid');

        $jilids = Jilid::with('user')
            ->get()
            ->groupBy('user_id');
        // dd($jilids);
        return view('layanan.perpustakaan.jilid.jilid', compact('jilids'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jilids = Jilid::where('user_id', $id)->firstOrFail();

        return view('layanan.perpustakaan.jilid.jilid-detail', compact('jilids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Jilid $pengajuan_jilid)
    {
        $pengumpulan = Pengumpulan::all();
        return view('layanan.perpustakaan.jilid.jilid-action', compact('pengumpulan', 'pengajuan_jilid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jilid $pengajuan_jilid)
    {
        $pengajuan_jilid->keterangan = $request->keterangan;
        $pengajuan_jilid->status = $request->status;
        $pengajuan_jilid->save();

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
    public function destroy($id)
    {
        //
    }
}
