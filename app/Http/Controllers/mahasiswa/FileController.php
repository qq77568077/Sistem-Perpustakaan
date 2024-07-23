<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;

use App\DataTables\BerkasDataTable;
use App\Models\Category;
use App\Models\Document;
use App\Models\File;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FileController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/berkas')->only('create');
    }

    public function index(BerkasDataTable $dataTable)
    {
        // Memeriksa otorisasi untuk membaca layanan/berkas sebelum menampilkan data.
        $this->authorize('read layanan/berkas');

        // Mengembalikan tampilan tabel data berkas menggunakan BerkasDataTable.
        return $dataTable->render('layanan.mahasiswa.file.file');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $documents = Document::all();
        $berka = new File(); // Instantiate a new File model object

        return view('layanan.mahasiswa.file.file-action', compact('categories', 'documents', 'berka'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, File $berka)
    {
        $request->validate([
            'kategori' => 'required',
            'jenis_file_1' => 'required_if:kategori,1', // Adjust this based on your validation rules
            'jenis_file_2' => 'required_if:kategori,2', // Adjust this based on your validation rules
            'bukti_file' => 'required',
            'keterangan' => 'required_if:status,Validasi', // Adjust this based on your validation rules
            'status' => 'required_if:keterangan,Validasi', // Adjust this based on your validation rules
        ], [
            'kategori.required' => 'Kategori harus dipilih.',
            'jenis_file_1.required_if' => 'Jenis Pengembangan harus dipilih.',
            'jenis_file_2.required_if' => 'Jenis Non Pengembangan harus dipilih.',
            'bukti_file.required' => 'Bukti File tidak boleh kosong.',
            'keterangan.required_if' => 'Keterangan tidak boleh kosong jika status adalah Validasi.',
            'status.required_if' => 'Status harus dipilih jika keterangan adalah Validasi.',
        ]);
        // Ambil peran pengguna yang sedang masuk
        $userRole = auth()->user()->role;

        // Ambil entri terakhir pengguna yang sedang masuk
        $lastEntry = File::where('user_id', auth()->id())->latest()->first();

        if ($lastEntry) {
            // Periksa apakah kategori yang dipilih sama dengan kategori entri terakhir
            if ($lastEntry->kategori != $request->kategori) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda hanya bisa memilih kategori yang sama.'
                ]);
            }

            // Periksa apakah jenis file yang dipilih sudah digunakan sebelumnya dalam kategori yang sama
            $existingJenisFile = File::where('user_id', auth()->id())
                ->where('kategori', $request->kategori)
                ->where('status', '!=', 'File Tidak Bisa Dibuka')
                ->where('status', '!=', 'Tidak Valid')
                ->where(function ($query) use ($request) {
                    $query->where('jenis_file', $request->jenis_file_1)
                        ->orWhere('jenis_file', $request->jenis_file_2);
                })
                ->exists();

            if ($existingJenisFile) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Anda sudah memiliki entri dengan jenis file yang sama dalam kategori yang dipilih. Harap pilih jenis file yang berbeda.'
                ]);
            }
        }

        // Jika validasi berhasil, lanjutkan dengan menyimpan data baru
        $berka = new File();
        $berka->user_id = auth()->id(); // Set user_id dengan ID pengguna yang sedang masuk
        $berka->kategori = $request->kategori; // Set kategori berdasarkan input pengguna

        // Atur jenis_file berdasarkan kategori yang dipilih
        if ($request->kategori == '1') {
            $berka->jenis_file = $request->jenis_file_1;
        } elseif ($request->kategori == '2') {
            $berka->jenis_file = $request->jenis_file_2;
        }

        $berka->bukti_file = $request->bukti_file; // Set bukti_file dengan data dari input pengguna
        $berka->status = 'Belum Validasi'; // Set status awal menjadi 'Belum Validasi'
        $berka->save(); // Simpan entri baru ke dalam database

        // Kembalikan respons JSON dengan status sukses
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
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
        $documents = Document::all();
        $berka = File::findOrFail($id);

        return view('layanan.mahasiswa.file.file-detail', compact('documents', 'berka'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $berka)
    {
        $documents = Document::all();
        $categories = Category::all();
        return view('layanan.mahasiswa.file.file-action', compact('documents', 'categories', 'berka'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $berka)
    {
        $berka->user_id = auth()->id();
        $berka->kategori = $request->kategori;
        $berka->jenis_file = $request->jenis_file;
        $berka->bukti_file = $request->bukti_file;
        $berka->keterangan = $request->keterangan;
        $berka->status = $request->status;
        $berka->save();

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
    public function destroy(File $berka)
    {
        $berka->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
