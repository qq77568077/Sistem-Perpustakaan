<?php

namespace App\Http\Controllers\perpustakaan;

use App\Http\Controllers\Controller;
use App\DataTables\DocumentDataTable;
use App\Models\Category;
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
    public function index(Request $request)
    {
        $this->authorize('read layanan/file');

        // Mengambil semua kategori yang tersedia
        $categories = Category::all();

        // Mengambil nilai filter program studi dan kategori dari request
        $prodiFilter = $request->input('prodi');
        $kategoriFilter = $request->input('kategori');

        // Mengambil data berkas dengan menyertakan relasi user dan kategori
        $files = File::with(['user', 'category'])->when($prodiFilter, function ($query) use ($prodiFilter) {
            return $query->whereHas('user.mahasiswa', function ($mahasiswaQuery) use ($prodiFilter) {
                $mahasiswaQuery->whereHas('prodi', function ($prodiQuery) use ($prodiFilter) {
                    $prodiQuery->where('nama', 'like', '%' . $prodiFilter . '%');
                });
            });
        })->when($kategoriFilter, function ($query) use ($kategoriFilter) {
            return $query->where('kategori', $kategoriFilter);
        })->get()->groupBy('user_id');

        // Mengambil semua dokumen yang tersedia dan mengurutkannya berdasarkan id secara ascending
        $document = Document::orderBy('id', 'asc')->get();

        // Mem-passing data ke view untuk dirender
        return view('layanan.perpustakaan.file.file', compact('document', 'files', 'categories'));
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
        $file = File::where('user_id', $id)->firstOrFail();

        return view('layanan.perpustakaan.file.file-detail', compact('file'));
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
        return view('layanan.perpustakaan.file.file-action', compact('documents', 'file'));
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
        // Validasi input tidak boleh kosong
        $request->validate([
            'jenis_pengumpulan' => 'required',
            'bukti_file' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ], [
            'jenis_pengumpulan.required' => 'Jenis Pengumpulan tidak boleh kosong.',
            'bukti_file.required' => 'Bukti File tidak boleh kosong.',
            'keterangan.required' => 'Keterangan tidak boleh kosong.',
            'status.required' => 'Status tidak boleh kosong.',
        ]);
        // Mengambil nilai dari request dan menyimpan ke atribut model file
        $file->jenis_file = $request->jenis_file; // Mengupdate jenis file
        $file->bukti_file = $request->bukti_file; // Mengupdate bukti file (tautan atau lokasi file)
        $file->keterangan = $request->keterangan; // Mengupdate keterangan tambahan
        $file->status = $request->status; // Mengupdate status berkas TA

        // Menyimpan perubahan ke database
        $file->save(); // Menyimpan data yang telah diupdate ke database

        // Mengembalikan respon JSON dengan status sukses
        return response()->json([
            'status' => 'success', // Menyatakan bahwa operasi berhasil
            'message' => 'updated data successfully' // Pesan sukses
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
