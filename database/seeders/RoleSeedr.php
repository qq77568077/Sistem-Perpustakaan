<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use Psy\Exception\ThrowUpException;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Throwable;

class RoleSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();

        try {

            $admin = User::create(array_merge([
                'email' => 'admin@stiki.ac.id',
                'name'  => 'admin'
            ], $default_user_value));

            $perpustakaan = User::create(array_merge([
                'email' => 'perpustakaan@stiki.ac.id',
                'name'  => 'perpustakaan'
            ], $default_user_value));

            $mahasiswa1 = User::create(array_merge([
                'email' => 'farel@stiki.ac.id',
                'name'  => 'farel',
            ], $default_user_value));

            $mahasiswa2 = User::create(array_merge([
                'email' => 'ramadhan@stiki.ac.id',
                'name'  => 'ramadhan',
            ], $default_user_value));

            $mahasiswa3 = User::create(array_merge([
                'email' => 'abid@stiki.ac.id',
                'name'  => 'abid',
            ], $default_user_value));

            $mahasiswa4 = User::create(array_merge([
                'email' => 'yusan@stiki.ac.id',
                'name'  => 'yusan',
            ], $default_user_value));

            $prodid3 = User::create(array_merge([
                'email' => 'prodid3si@stiki.ac.id',
                'name'  => 'Prodi D3 SI'
            ], $default_user_value));

            $proditi = User::create(array_merge([
                'email' => 'proditi@stiki.ac.id',
                'name'  => 'Prodi TI'
            ], $default_user_value));

            $prodisi = User::create(array_merge([
                'email' => 'prodisi@stiki.ac.id',
                'name'  => 'Prodi SI'
            ], $default_user_value));

            $prodidkv = User::create(array_merge([
                'email' => 'prodidkv@stiki.ac.id',
                'name'  => 'Prodi DKV'
            ], $default_user_value));

            $koorLab = User::create(array_merge([
                'email' => 'koorLab@stiki.ac.id',
                'name'  => 'koorLab'
            ], $default_user_value));

            $role_perpustakaan = Role::create(['name' => 'perpustakaan']);
            $role_mahasiswa = Role::create(['name' => 'mahasiswa']);
            $role_prodi = Role::create(['name' => 'prodi']);
            $role_koorLab = Role::create(['name' => 'koorLab']);
            $role_admin = Role::create(['name' => 'admin']);

            //master role
            $permission = Permission::create(['name' => 'read master']);
            $permission = Permission::create(['name' => 'read master/roles']);
            $permission = Permission::create(['name' => 'create master/roles']);
            $permission = Permission::create(['name' => 'update master/roles']);
            $permission = Permission::create(['name' => 'delete master/roles']);

            //master permission
            $permission = Permission::create(['name' => 'read master/permissions']);
            $permission = Permission::create(['name' => 'create master/permissions']);
            $permission = Permission::create(['name' => 'update master/permissions']);
            $permission = Permission::create(['name' => 'delete master/permissions']);

            $permission = Permission::create(['name' => 'read master/prices']);
            $permission = Permission::create(['name' => 'create master/prices']);
            $permission = Permission::create(['name' => 'update master/prices']);
            $permission = Permission::create(['name' => 'delete master/prices']);

            $permission = Permission::create(['name' => 'read master/prodi']);
            $permission = Permission::create(['name' => 'create master/prodi']);
            $permission = Permission::create(['name' => 'update master/prodi']);
            $permission = Permission::create(['name' => 'delete master/prodi']);

            $permission = Permission::create(['name' => 'read master/users']);
            $permission = Permission::create(['name' => 'create master/users']);
            $permission = Permission::create(['name' => 'update master/users']);
            $permission = Permission::create(['name' => 'delete master/users']);

            $permission = Permission::create(['name' => 'read master/mahasiswa']);
            $permission = Permission::create(['name' => 'create master/mahasiswa']);
            $permission = Permission::create(['name' => 'update master/mahasiswa']);
            $permission = Permission::create(['name' => 'delete master/mahasiswa']);

            $permission = Permission::create(['name' => 'read master/term']);
            $permission = Permission::create(['name' => 'create master/term']);
            $permission = Permission::create(['name' => 'update master/term']);
            $permission = Permission::create(['name' => 'delete master/term']);

            //layanan Plagiarism mhs
            $permission = Permission::create(['name' => 'read layanan']);
            $permission = Permission::create(['name' => 'read layanan/plagiarism']);
            $permission = Permission::create(['name' => 'create layanan/plagiarism']);
            $permission = Permission::create(['name' => 'update layanan/plagiarism']);
            $permission = Permission::create(['name' => 'delete layanan/plagiarism']);
            $permission = Permission::create(['name' => 'keterangan layanan/plagiarism']);
            $permission = Permission::create(['name' => 'hasil layanan/plagiarism']);
            $permission = Permission::create(['name' => 'detail layanan/plagiarism']);
            $permission = Permission::create(['name' => 'status layanan/plagiarism']);

            //layanan Plagiarism mhs
            $permission = Permission::create(['name' => 'read layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'create layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'update layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'delete layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'keterangan layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'hasil layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'detail layanan/pengajuan-plagiarism']);
            $permission = Permission::create(['name' => 'status layanan/pengajuan-plagiarism']);

            //layanan BerkasTA mhs
            $permission = Permission::create(['name' => 'read layanan/berkas']);
            $permission = Permission::create(['name' => 'create layanan/berkas']);
            $permission = Permission::create(['name' => 'update layanan/berkas']);
            $permission = Permission::create(['name' => 'delete layanan/berkas']);
            $permission = Permission::create(['name' => 'keterangan layanan/berkas']);
            $permission = Permission::create(['name' => 'detail layanan/berkas']);
            $permission = Permission::create(['name' => 'status layanan/berkas']);

            //layanan BerkasTA mhs
            $permission = Permission::create(['name' => 'read layanan/file']);
            $permission = Permission::create(['name' => 'create layanan/file']);
            $permission = Permission::create(['name' => 'update layanan/file']);
            $permission = Permission::create(['name' => 'delete layanan/file']);
            $permission = Permission::create(['name' => 'keterangan layanan/file']);
            $permission = Permission::create(['name' => 'detail layanan/file']);
            $permission = Permission::create(['name' => 'status layanan/file']);

            //layanan jilid laporan
            $permission = Permission::create(['name' => 'read layanan/jilid']);
            $permission = Permission::create(['name' => 'create layanan/jilid']);
            $permission = Permission::create(['name' => 'update layanan/jilid']);
            $permission = Permission::create(['name' => 'delete layanan/jilid']);
            $permission = Permission::create(['name' => 'keterangan layanan/jilid']);
            $permission = Permission::create(['name' => 'detail layanan/jilid']);
            $permission = Permission::create(['name' => 'status layanan/jilid']);

            //layanan jilid laporan
            $permission = Permission::create(['name' => 'read layanan/pengajuan-jilid']);
            $permission = Permission::create(['name' => 'create layanan/pengajuan-jilid']);
            $permission = Permission::create(['name' => 'update layanan/pengajuan-jilid']);
            $permission = Permission::create(['name' => 'delete layanan/pengajuan-jilid']);
            $permission = Permission::create(['name' => 'keterangan layanan/pengajuan-jilid']);
            $permission = Permission::create(['name' => 'detail layanan/pengajuan-jilid']);
            $permission = Permission::create(['name' => 'status layanan/pengajuan-jilid']);

            //role admin

            //give permission roles
            $role_admin->givePermissionTo(['read master/roles', 'read master']);
            $role_admin->givePermissionTo('create master/roles');
            $role_admin->givePermissionTo('update master/roles');
            $role_admin->givePermissionTo('delete master/roles');

            //give permission permission
            $role_admin->givePermissionTo('read master/permissions');
            $role_admin->givePermissionTo('create master/permissions');
            $role_admin->givePermissionTo('update master/permissions');
            $role_admin->givePermissionTo('delete master/permissions');

            $role_admin->givePermissionTo('read master/prices');
            $role_admin->givePermissionTo('create master/prices');
            $role_admin->givePermissionTo('update master/prices');
            $role_admin->givePermissionTo('delete master/prices');

            $role_admin->givePermissionTo('read master/prodi');
            $role_admin->givePermissionTo('create master/prodi');
            $role_admin->givePermissionTo('update master/prodi');
            $role_admin->givePermissionTo('delete master/prodi');

            $role_admin->givePermissionTo('read master/users');
            $role_admin->givePermissionTo('create master/users');
            $role_admin->givePermissionTo('update master/users');
            $role_admin->givePermissionTo('delete master/users');

            $role_admin->givePermissionTo('read master/mahasiswa');
            $role_admin->givePermissionTo('create master/mahasiswa');
            $role_admin->givePermissionTo('update master/mahasiswa');
            $role_admin->givePermissionTo('delete master/mahasiswa');

            $role_admin->givePermissionTo('read master/term');
            $role_admin->givePermissionTo('create master/term');
            $role_admin->givePermissionTo('update master/term');
            $role_admin->givePermissionTo('delete master/term');

            $role_perpustakaan->givePermissionTo('read master/term');
            $role_perpustakaan->givePermissionTo('create master/term');
            $role_perpustakaan->givePermissionTo('update master/term');
            $role_perpustakaan->givePermissionTo('delete master/term');

            $role_perpustakaan->givePermissionTo('read master');
            $role_perpustakaan->givePermissionTo('create master/prices');
            $role_perpustakaan->givePermissionTo('read master/prices');
            $role_perpustakaan->givePermissionTo('update master/prices');


            //give permission layanan plagiarism

            $role_admin->givePermissionTo(['read layanan/pengajuan-plagiarism', 'read layanan']);
            $role_admin->givePermissionTo('create layanan/pengajuan-plagiarism');
            $role_admin->givePermissionTo('update layanan/pengajuan-plagiarism');
            $role_admin->givePermissionTo('delete layanan/pengajuan-plagiarism');
            $role_admin->givePermissionTo('hasil layanan/pengajuan-plagiarism');
            $role_admin->givePermissionTo('keterangan layanan/pengajuan-plagiarism');
            $role_admin->givePermissionTo('detail layanan/pengajuan-plagiarism');
            $role_admin->givePermissionTo('status layanan/pengajuan-plagiarism');


            //give permission layanan berkasTa mhs

            // $role_admin->givePermissionTo('read layanan/berkas');
            // $role_admin->givePermissionTo('create layanan/berkas');
            // $role_admin->givePermissionTo('update layanan/berkas');
            // $role_admin->givePermissionTo('delete layanan/berkas');
            // $role_admin->givePermissionTo('keterangan layanan/berkas');
            // $role_admin->givePermissionTo('detail layanan/berkas');
            // $role_admin->givePermissionTo('status layanan/berkas');

            //give permission layanan berkasTa perpustakaan

            $role_admin->givePermissionTo('read layanan/file');
            $role_admin->givePermissionTo('create layanan/file');
            $role_admin->givePermissionTo('update layanan/file');
            $role_admin->givePermissionTo('delete layanan/file');
            $role_admin->givePermissionTo('keterangan layanan/file');
            $role_admin->givePermissionTo('detail layanan/file');
            $role_admin->givePermissionTo('status layanan/file');

            //give permission layanan Jilid

            $role_admin->givePermissionTo('read layanan/pengajuan-jilid');
            $role_admin->givePermissionTo('create layanan/pengajuan-jilid');
            $role_admin->givePermissionTo('update layanan/pengajuan-jilid');
            $role_admin->givePermissionTo('delete layanan/pengajuan-jilid');
            $role_admin->givePermissionTo('keterangan layanan/pengajuan-jilid');
            $role_admin->givePermissionTo('detail layanan/pengajuan-jilid');
            $role_admin->givePermissionTo('status layanan/pengajuan-jilid');

            //role mahasiswa
            //give permission layanan plagiarism

            $role_mahasiswa->givePermissionTo(['read layanan/plagiarism', 'read layanan']);
            $role_mahasiswa->givePermissionTo('create layanan/plagiarism');
            $role_mahasiswa->givePermissionTo('update layanan/plagiarism');
            $role_mahasiswa->givePermissionTo('delete layanan/plagiarism');
            $role_mahasiswa->givePermissionTo('detail layanan/plagiarism');

            //give permission layanan berkasTa

            $role_mahasiswa->givePermissionTo('read layanan/berkas');
            $role_mahasiswa->givePermissionTo('create layanan/berkas');
            $role_mahasiswa->givePermissionTo('update layanan/berkas');
            $role_mahasiswa->givePermissionTo('delete layanan/berkas');
            $role_mahasiswa->givePermissionTo('detail layanan/berkas');

            //give permission layanan Jilid

            $role_mahasiswa->givePermissionTo('read layanan/jilid');
            $role_mahasiswa->givePermissionTo('create layanan/jilid');
            $role_mahasiswa->givePermissionTo('update layanan/jilid');
            $role_mahasiswa->givePermissionTo('delete layanan/jilid');
            $role_mahasiswa->givePermissionTo('detail layanan/jilid');


            //role perpustakaan
            //give permission layanan plagiarism

            $role_perpustakaan->givePermissionTo(['read layanan/pengajuan-plagiarism', 'read layanan']);
            $role_perpustakaan->givePermissionTo('update layanan/pengajuan-plagiarism');
            $role_perpustakaan->givePermissionTo('hasil layanan/pengajuan-plagiarism');
            $role_perpustakaan->givePermissionTo('keterangan layanan/pengajuan-plagiarism');
            $role_perpustakaan->givePermissionTo('status layanan/pengajuan-plagiarism');
            $role_perpustakaan->givePermissionTo('detail layanan/pengajuan-plagiarism');

            //give permission layanan berkasTa

            $role_perpustakaan->givePermissionTo('read layanan/file');
            $role_perpustakaan->givePermissionTo('update layanan/file');
            $role_perpustakaan->givePermissionTo('keterangan layanan/file');
            $role_perpustakaan->givePermissionTo('status layanan/file');
            $role_perpustakaan->givePermissionTo('detail layanan/file');

            //give permission layanan Jilid

            $role_perpustakaan->givePermissionTo('read layanan/pengajuan-jilid');
            $role_perpustakaan->givePermissionTo('update layanan/pengajuan-jilid');
            $role_perpustakaan->givePermissionTo('keterangan layanan/pengajuan-jilid');
            $role_perpustakaan->givePermissionTo('status layanan/pengajuan-jilid');
            $role_perpustakaan->givePermissionTo('detail layanan/pengajuan-jilid');


            //give permission layanan berkasTa

            // $role_prodi->givePermissionTo('read layanan/berkas', 'read layanan');
            // $role_koorLab->givePermissionTo('read layanan/berkas', 'read layanan');

            $role_prodi->givePermissionTo('read layanan/file', 'read layanan');
            $role_koorLab->givePermissionTo('read layanan/file', 'read layanan');



            //role
            $perpustakaan->assignRole('perpustakaan');
            $mahasiswa1->assignRole('mahasiswa');
            $mahasiswa2->assignRole('mahasiswa');
            $mahasiswa3->assignRole('mahasiswa');
            $mahasiswa4->assignRole('mahasiswa');
            $prodid3->assignRole('prodi');
            $proditi->assignRole('prodi');
            $prodisi->assignRole('prodi');
            $prodidkv->assignRole('prodi');
            $koorLab->assignRole('koorLab');
            $admin->assignRole('admin');

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            // dd('Seeder failed: ' . $th->getMessage(), $th->getTraceAsString());
            Log::error('Seeder failed: ' . $th->getMessage());
            Log::error($th->getTraceAsString());
        }
    }
}
