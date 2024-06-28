<?php

namespace App\Http\Controllers\perpustakaan;

use App\DataTables\PengajuanPlagiarismDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plagiarism;


class PengajuanPlagiarismController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/pengajuan-plagiarism')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('read layanan/pengajuan-plagiarism');

        $plagiarisms = Plagiarism::with('user')
                                ->get()
                                ->groupBy('user_id');

        return view('layanan.perpustakaan.plagiarism.plagiarism', compact('plagiarisms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.perpustakaan.plagiarism.plagiarism-action', ['plagiarism' => new Plagiarism()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Plagiarism $plagiarism)
    {
        $plagiarism = new Plagiarism();
        $plagiarism->user_id = auth()->id();
        $plagiarism->file = $request->file;
        $plagiarism->similarity = null;
        $plagiarism->hasil_cek = null;
        $plagiarism->status = 'Belum Validasi';
        $plagiarism->save();

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
        $plagiarisms = Plagiarism::where('user_id', $id)->firstOrFail();

        return view('layanan.perpustakaan.plagiarism.plagiarism-detail', compact('plagiarisms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plagiarism $pengajuan_plagiarism)
    {
        return view('layanan.perpustakaan.plagiarism.plagiarism-action', compact('pengajuan_plagiarism'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plagiarism $pengajuan_plagiarism)
    {
        $pengajuan_plagiarism->file = $request->file;
        $pengajuan_plagiarism->hasil_cek = $request->hasil_cek;
        $pengajuan_plagiarism->similarity = $request->similarity;
        $pengajuan_plagiarism->keterangan = $request->keterangan;
        $pengajuan_plagiarism->status = $request->status;
        $pengajuan_plagiarism->save();

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
    public function destroy(Plagiarism $pengajuan_plagiarism)
    {
        $pengajuan_plagiarism->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
