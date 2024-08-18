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
        $this->authorize('read layanan/berkas');
        return $dataTable->render('layanan.mahasiswa.file.file');
    }

    public function create()
    {
        $categories = Category::all();
        $documents = Document::all();
        $berka = new File();

        return view('layanan.mahasiswa.file.file-action', compact('categories', 'documents', 'berka'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'jenis_file_1' => 'required_if:kategori,1',
            'jenis_file_2' => 'required_if:kategori,2',
            'bukti_file' => 'required|url',
            'keterangan' => 'required_if:status,Validasi',
            'status' => 'required_if:keterangan,Validasi',
        ], [
            'kategori.required' => 'Kategori harus dipilih.',
            'jenis_file_1.required_if' => 'Jenis Pengembangan harus dipilih.',
            'jenis_file_2.required_if' => 'Jenis Non Pengembangan harus dipilih.',
            'bukti_file.required' => 'Bukti File tidak boleh kosong.',
            'keterangan.required_if' => 'Keterangan tidak boleh kosong jika status adalah Validasi.',
            'status.required_if' => 'Status harus dipilih jika keterangan adalah Validasi.',
        ]);

        $kategori = $request->kategori;
        $jenisFile = $request->kategori == '1' ? $request->jenis_file_1 : $request->jenis_file_2;

        // Ambil entri terakhir pengguna
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

        // Create a new entry
        $berka = new File();
        $berka->user_id = auth()->id();
        $berka->kategori = $kategori;
        $berka->jenis_file = $jenisFile;
        $berka->bukti_file = $request->bukti_file;
        $berka->status = 'Belum Validasi';
        $berka->is_active = true; // Set is_active to true
        $berka->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function show($id)
    {
        $documents = Document::all();
        $berka = File::findOrFail($id);

        return view('layanan.mahasiswa.file.file-detail', compact('documents', 'berka'));
    }

    public function edit(File $berka)
    {
        $documents = Document::all();
        $categories = Category::all();
        return view('layanan.mahasiswa.file.file-action', compact('documents', 'categories', 'berka'));
    }

    public function update(Request $request, File $berka)
    {
        $request->validate([
            'kategori' => 'required',
            'jenis_file' => 'required',
            'bukti_file' => 'required',
            'keterangan' => 'required',
            'status' => 'required',
        ], [
            'kategori.required' => 'Kategori harus dipilih.',
            'jenis_file.required' => 'Jenis File tidak boleh kosong.',
            'bukti_file.required' => 'Bukti File tidak boleh kosong.',
            'keterangan.required' => 'Keterangan tidak boleh kosong.',
            'status.required' => 'Status tidak boleh kosong.',
        ]);

        $berka->kategori = $request->kategori;
        $berka->jenis_file = $request->jenis_file;
        $berka->bukti_file = $request->bukti_file;
        $berka->keterangan = $request->keterangan;
        $berka->status = $request->status;
        // is_active tetap true jika sudah aktif sebelumnya
        $berka->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui'
        ]);
    }

    public function destroy(File $berka)
    {
        $berka->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
