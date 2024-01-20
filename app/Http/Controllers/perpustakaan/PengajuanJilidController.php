<?php

namespace App\Http\Controllers\perpustakaan;

use App\Http\Controllers\Controller;
use App\Models\Jilid;
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
    public function index()
    {
        $this->authorize('read layanan/pengajuan-jilid');

        $jilid = Jilid::with('user')
            ->get()
            ->groupBy('user_id');

        return view('layanan.perpustakaan.jilid.jilid', compact('jilid'));
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
    public function edit(Jilid $jilid)
    {
        return view('layanan.perpustakaan.jilid.jilid-action', compact('jilid'));
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
        $jilid->keterangan = $request->keterangan;
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
    public function destroy($id)
    {
        //
    }
}
