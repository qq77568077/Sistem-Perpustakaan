<?php

namespace App\Http\Controllers;

use App\DataTables\PlagiarismDataTable;
use App\Models\Plagiarism;
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
        //
        $this->authorize('read layanan/plagiarism');
        return $dataTable->render('layanan.plagiarism');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layanan.plagiarism-action', ['plagiarism' => new Plagiarism()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Plagiarism $plagiarism)
    {
        // $request->validate([
        //     'file' => 'required|mimes|max:10240', // doc format dan maksimal 10 MB
        // ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('documents', $fileName);


        Plagiarism::create([
            'file' => $fileName,
            'hasil_cek' => 'Belum ada hasil',
            'status' => 'Belum validasi',
        ]);

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
    public function edit(Plagiarism $plagiarism)
    {
        return view('layanan.plagiarism-action', compact('plagiarism'));
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
        //
        $plagiarism->file = $request->file;
        $plagiarism->hasil_cek = $request->hasil_cek;
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
