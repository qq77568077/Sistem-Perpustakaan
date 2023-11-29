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

        try{

            $admin = User::create(array_merge([
                'email' => 'admin@stiki.ac.id',
                'name'  => 'admin'
            ], $default_user_value));

            $perpustakaan = User::create(array_merge([
                'email' => 'perpustakaan@stiki.ac.id',
                'name'  => 'perpustakaan'
            ], $default_user_value));
    
            $mahasiswa = User::create(array_merge([
                'email' => 'mahasiswa@stiki.ac.id',
                'name'  => 'mahasiswa'
            ], $default_user_value));
    
            $prodi = User::create(array_merge([
                'email' => 'prodi@stiki.ac.id',
                'name'  => 'prodi'
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

            //konfigurasi role
            $permission = Permission::create(['name' =>'read konfigurasi']);
            $permission = Permission::create(['name' =>'read konfigurasi/roles']);
            $permission = Permission::create(['name' =>'create konfigurasi/roles']);
            $permission = Permission::create(['name' =>'update konfigurasi/roles']);
            $permission = Permission::create(['name' =>'delete konfigurasi/roles']);
            
            //konfigurasi permission
            $permission = Permission::create(['name' =>'read konfigurasi/permissions']);
            $permission = Permission::create(['name' =>'create konfigurasi/permissions']);
            $permission = Permission::create(['name' =>'update konfigurasi/permissions']);
            $permission = Permission::create(['name' =>'delete konfigurasi/permissions']);
            
            $permission = Permission::create(['name' =>'read konfigurasi/prices']);
            $permission = Permission::create(['name' =>'create konfigurasi/prices']);
            $permission = Permission::create(['name' =>'update konfigurasi/prices']);
            $permission = Permission::create(['name' =>'delete konfigurasi/prices']);

            //layanan Plagiarism
            $permission = Permission::create(['name' =>'read layanan']);
            $permission = Permission::create(['name' =>'read layanan/plagiarism']);
            $permission = Permission::create(['name' =>'create layanan/plagiarism']);
            $permission = Permission::create(['name' =>'update layanan/plagiarism']);
            $permission = Permission::create(['name' =>'delete layanan/plagiarism']);
            $permission = Permission::create(['name' =>'keterangan layanan/plagiarism']);
            $permission = Permission::create(['name' =>'hasil layanan/plagiarism']);
            $permission = Permission::create(['name' =>'status layanan/plagiarism']);

            //layanan BerkasTA
            $permission = Permission::create(['name' =>'read layanan/berkas']);
            $permission = Permission::create(['name' =>'create layanan/berkas']);
            $permission = Permission::create(['name' =>'update layanan/berkas']);
            $permission = Permission::create(['name' =>'delete layanan/berkas']);
            $permission = Permission::create(['name' =>'keterangan layanan/berkas']);
            $permission = Permission::create(['name' =>'detail layanan/berkas']);
            $permission = Permission::create(['name' =>'status layanan/berkas']);

            //layanan jilid laporan
            $permission = Permission::create(['name' =>'read layanan/jilid']);
            $permission = Permission::create(['name' =>'create layanan/jilid']);
            $permission = Permission::create(['name' =>'update layanan/jilid']);
            $permission = Permission::create(['name' =>'delete layanan/jilid']);
            $permission = Permission::create(['name' =>'keterangan layanan/jilid']);
            $permission = Permission::create(['name' =>'status layanan/jilid']);

            //role admin

            //give permission roles
            $role_admin->givePermissionTo(['read konfigurasi/roles','read konfigurasi']);
            $role_admin->givePermissionTo('create konfigurasi/roles');
            $role_admin->givePermissionTo('update konfigurasi/roles');
            $role_admin->givePermissionTo('delete konfigurasi/roles');

            //give permission permission
            // $role_admin->givePermissionTo('read konfigurasi/permissions');
            // $role_admin->givePermissionTo('create konfigurasi/permissions');
            // $role_admin->givePermissionTo('update konfigurasi/permissions');
            // $role_admin->givePermissionTo('delete konfigurasi/permissions');

            $role_admin->givePermissionTo('read konfigurasi/prices');
            $role_admin->givePermissionTo('create konfigurasi/prices');
            $role_admin->givePermissionTo('update konfigurasi/prices');
            $role_admin->givePermissionTo('delete konfigurasi/prices');

            $role_perpustakaan->givePermissionTo('read konfigurasi/prices');
            $role_perpustakaan->givePermissionTo('update konfigurasi/prices');


             //give permission layanan plagiarism

             $role_admin->givePermissionTo(['read layanan/plagiarism','read layanan']);
             $role_admin->givePermissionTo('create layanan/plagiarism');
             $role_admin->givePermissionTo('update layanan/plagiarism');
             $role_admin->givePermissionTo('delete layanan/plagiarism');
             $role_admin->givePermissionTo('hasil layanan/plagiarism');
             $role_admin->givePermissionTo('keterangan layanan/plagiarism');
             $role_admin->givePermissionTo('status layanan/plagiarism');


             //give permission layanan berkasTa

             $role_admin->givePermissionTo('read layanan/berkas');
             $role_admin->givePermissionTo('create layanan/berkas');
             $role_admin->givePermissionTo('update layanan/berkas');
             $role_admin->givePermissionTo('delete layanan/berkas');
             $role_admin->givePermissionTo('keterangan layanan/berkas');
             $role_admin->givePermissionTo('detail layanan/berkas');
             $role_admin->givePermissionTo('status layanan/berkas');

             //give permission layanan Jilid

             $role_admin->givePermissionTo('read layanan/jilid');
             $role_admin->givePermissionTo('create layanan/jilid');
             $role_admin->givePermissionTo('update layanan/jilid');
             $role_admin->givePermissionTo('delete layanan/jilid');
             $role_admin->givePermissionTo('keterangan layanan/jilid');
             $role_admin->givePermissionTo('status layanan/jilid');

             //role mahasiswa
             //give permission layanan plagiarism

             $role_mahasiswa->givePermissionTo(['read layanan/plagiarism','read layanan']);
             $role_mahasiswa->givePermissionTo('create layanan/plagiarism');
             $role_mahasiswa->givePermissionTo('update layanan/plagiarism');
             $role_mahasiswa->givePermissionTo('delete layanan/plagiarism');

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


             //role perpustakaan
             //give permission layanan plagiarism

             $role_perpustakaan->givePermissionTo(['read layanan/plagiarism','read layanan']);
             $role_perpustakaan->givePermissionTo('update layanan/plagiarism');
             $role_perpustakaan->givePermissionTo('hasil layanan/plagiarism');
             $role_perpustakaan->givePermissionTo('keterangan layanan/plagiarism');
             $role_perpustakaan->givePermissionTo('status layanan/plagiarism');

             //give permission layanan berkasTa

             $role_perpustakaan->givePermissionTo('read layanan/berkas');
             $role_perpustakaan->givePermissionTo('update layanan/berkas');
             $role_perpustakaan->givePermissionTo('keterangan layanan/berkas');
             $role_perpustakaan->givePermissionTo('status layanan/berkas');
             $role_perpustakaan->givePermissionTo('detail layanan/berkas');

             //give permission layanan Jilid

             $role_perpustakaan->givePermissionTo('read layanan/jilid');
             $role_perpustakaan->givePermissionTo('update layanan/jilid');
             $role_perpustakaan->givePermissionTo('keterangan layanan/jilid');
             $role_perpustakaan->givePermissionTo('status layanan/jilid');


             //give permission layanan berkasTa

             $role_prodi->givePermissionTo('read layanan/berkas', 'read layanan');
             $role_koorLab->givePermissionTo('read layanan/berkas', 'read layanan');

    

            //role
            $perpustakaan->assignRole('perpustakaan');
            $mahasiswa->assignRole('mahasiswa');
            $prodi->assignRole('prodi');
            $koorLab->assignRole('koorLab');
            $admin->assignRole('admin');

            DB::commit();
        }catch(Throwable $th){
            DB::rollBack();
        }



    }
}
