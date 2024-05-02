<?php

namespace App\Http\Controllers;

use App\DataTables\MahasiswaDataTable;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create master/mahasiswa')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MahasiswaDataTable $dataTable)
    {
        $this->authorize('read master/mahasiswa');
        return $dataTable->render('master.mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::all();
        $roles = Role::pluck('name','name')->all();
        $mahasiswa = new Mahasiswa();
        return view('master.mahasiswa.mahasiswa-action', compact('roles','prodis', 'mahasiswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswaData = $request->all();

        $userData = [
            'name' => $mahasiswaData['nama'], 
            'email' => $mahasiswaData['email'], 
            'password' => bcrypt('password'), 
        ];

        $user = User::create($userData);
        $user->assignRole($request->input('roles'));

        $mahasiswaData['user_id'] = $user->id;

        Mahasiswa::create($mahasiswaData);

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
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodis = Prodi::all();
        return view('master.mahasiswa.mahasiswa-action', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
