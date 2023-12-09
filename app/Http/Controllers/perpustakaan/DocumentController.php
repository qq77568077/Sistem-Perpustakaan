<?php

namespace App\Http\Controllers\perpustakaan;
use App\Http\Controllers\Controller;
use App\DataTables\DocumentDataTable;
use App\Models\Document;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;


class DocumentController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/file')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read layanan/file');
        $files = File::with('user')->get()->groupBy('user_id');
        return view('layanan.perpustakaan.file.file', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Document::all();
        $file = new File(); // Instantiate a new File model object
    
        return view('layanan.perpustakaan.file.file-action', compact('documents', 'file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $file)
    {
        $file = new File();
        $file->user_id = auth()->id();
        $file->jenis_file = $request->jenis_file;
        $file->bukti_file = $request->bukti_file;
        $file->status = 'Belum Validasi';
        $file->save();

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
        $documents = Document::all();
        $file = File::findOrFail($id);

        return view('layanan.perpustakaan.file.file-detail', compact('documents', 'file'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $documents = Document::all();
        return view('layanan.perpustakaan.file.file-action',compact('documents', 'file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $file->jenis_file = $request->jenis_file;
        $file->bukti_file = $request->bukti_file;
        $file->keterangan = $request->keterangan;
        $file->status = $request->status;
        $file->save();

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
    public function destroy(File $file)
    {
        $file->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
