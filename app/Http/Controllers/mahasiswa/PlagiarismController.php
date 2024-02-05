<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;
use App\DataTables\PlagiarismDataTable;
use App\Models\Plagiarism;
use App\Models\User;
use Illuminate\Http\Request;

class PlagiarismController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create layanan/plagiarism')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlagiarismDataTable $dataTable)
    {
        $this->authorize('read layanan/plagiarism');


        return $dataTable->render('layanan.mahasiswa.plagiarism.plagiarism');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.mahasiswa.plagiarism.plagiarism-action', ['plagiarism' => new Plagiarism()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plagiarism $plagiarism)
    {
        $plagiarism = new Plagiarism();
        $plagiarism->user_id = auth()->id();
        $plagiarism->file = $request->file;
        $plagiarism->similarity = null;
        $plagiarism->hasil_cek = null;
        $plagiarism->status = null;
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
        $plagiarism = Plagiarism::findOrFail($id);

        return view('layanan.mahasiswa.plagiarism.plagiarism-detail', compact('plagiarism'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plagiarism $plagiarism)
    {
        return view('layanan.mahasiswa.plagiarism.plagiarism-action', compact('plagiarism'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plagiarism $plagiarism)
    {

        $plagiarism->user_id = auth()->id();
        $plagiarism->file = $request->file;
        $plagiarism->hasil_cek = $request->hasil_cek;
        $plagiarism->similarity = $request->similarity;
        $plagiarism->keterangan = $request->keterangan;
        $plagiarism->status = $request->status;
        $plagiarism->save();

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
    public function destroy(Plagiarism $plagiarism)
    {
        $plagiarism->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
