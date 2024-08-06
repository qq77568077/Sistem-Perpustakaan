<?php

namespace App\Http\Controllers;

use App\DataTables\ProdiDataTable;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Document;

class ProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create master/prodi')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProdiDataTable $dataTable)
    {
        $this->authorize('read master/prodi');
        return $dataTable->render('master.prodi.index');
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
        $validated = $request->validate([
            'jenis_file' => 'required|exists:documents,id',
            'bukti_file' => 'required|string',
            'keterangan' => 'nullable|string',
            'status' => 'nullable|string|in:Valid,Belum Validasi,Tidak Valid,File Tidak Bisa Dibuka',
        ]);

        File::create($validated);

        return redirect()->route('files.index')->with('success', 'File successfully created!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_file' => 'required|exists:documents,id',
            'bukti_file' => 'required|string',
            'keterangan' => 'nullable|string',
            'status' => 'nullable|string|in:Valid,Belum Validasi,Tidak Valid,File Tidak Bisa Dibuka',
        ]);

        $file = File::findOrFail($id);
        $file->update($validated);

        return redirect()->route('files.index')->with('success', 'File successfully updated!');
    }
}