<?php

namespace App\Http\Controllers\mahasiswa;

use App\Http\Controllers\Controller;

use App\DataTables\JilidDataTable;
use App\Models\Jilid;
use App\Models\Pengumpulan;
use Illuminate\Http\Request;

class JilidController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:create layanan/jilid')->only('create');
    }

    public function index(JilidDataTable $dataTable)
    {
        $this->authorize('read layanan/jilid');
        return $dataTable->render('layanan.mahasiswa.jilid.jilid');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengumpulan = Pengumpulan::all();
        $jilid = new Jilid();
        return view('layanan.mahasiswa.jilid.jilid-action', compact('pengumpulan', 'jilid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Jilid $jilid)
    {
        $userRole = auth()->user()->role;
        $existingEntry = Jilid::where('user_id', auth()->id())
            ->where('jenis_pengumpulan', $request->jenis_pengumpulan)
            ->where('status', '!=', 'File Tidak Bisa Dibuka')
            ->where('status', '!=', 'Tidak Disetujui')
            ->first();
        if ($existingEntry) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah memiliki entri dengan jenis pengumpulan ini.'
            ]);
        }

        $jilid = new Jilid();
        $jilid->user_id = auth()->id();
        $jilid->jenis_pengumpulan = $request->jenis_pengumpulan;
        $jilid->judul = $request->judul;
        $jilid->page_berwarna = $request->page_berwarna;
        $jilid->page_hitamPutih = $request->page_hitamPutih;
        $jilid->exemplar = $request->exemplar;
        $jilid->soft_jilid = $request->soft_jilid;
        $jilid->hard_jilid = $request->hard_jilid;
        $jilid->total = $request->total;
        $jilid->bukti_pembayaran = null;
        $jilid->file = $request->file;
        $jilid->keterangan = $request->keterangan;
        $jilid->status = 'Belum Validasi';
        $jilid->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    public function submitPaymentProof(Request $request, $id)
    {
        $jilid = Jilid::findOrFail($id);

        // Update the payment proof link
        $jilid->bukti_pembayaran = $request->bukti_pembayaran;
        $jilid->save();

        return redirect()->route('jilid.index')->with([
            'status' => 'success',
            'message' => 'Payment proof link submitted successfully',
        ]);
    }



    public function show($id)
    {
        // Ambil data jilid berdasarkan ID
        $jilid = Jilid::findOrFail($id);

        // Kirim data ke view untuk ditampilkan
        return view('layanan.mahasiswa.jilid.jilid-detail', compact('jilid'));
    }


    public function edit(Jilid $jilid)
    {
        // Ambil semua data pengumpulan
        $pengumpulan = Pengumpulan::all();

        // Kirim data pengumpulan dan data jilid yang akan diedit ke view
        return view('layanan.mahasiswa.jilid.jilid-action', compact('pengumpulan', 'jilid'));
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
        $userRole = auth()->user()->role; // Ganti 'role' dengan nama kolom aktual di model User Anda

        // Periksa apakah pengguna sudah memiliki entri dengan jenis_pengumpulan 'TA' atau 'PKL'
        $existingEntry = Jilid::where('user_id', auth()->id())
            ->whereIn('jenis_pengumpulan', [1, 2])
            ->where('id', '!=', $jilid->id) // Excluding the current entry from the check for update
            ->first();
        if ($existingEntry) {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda sudah memiliki entri dengan jenis pengumpulan TA atau PKL.'
            ]);
        }

        $jilid->user_id = auth()->id();
        $jilid->jenis_pengumpulan = $request->jenis_pengumpulan;
        $jilid->judul = $request->judul;
        $jilid->page_berwarna = $request->page_berwarna;
        $jilid->page_hitamPutih = $request->page_hitamPutih;
        $jilid->exemplar = $request->exemplar;
        $jilid->soft_jilid = $request->soft_jilid;
        $jilid->hard_jilid = $request->hard_jilid;
        $jilid->total = $request->total;
        $jilid->bukti_pembayaran = $request->bukti_pembayaran;
        $jilid->file = $request->file;
        $jilid->keterangan = $request->keterangan;
        $jilid->status = $request->status;
        $jilid->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Create data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jilid $jilid)
    {
        $jilid->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
