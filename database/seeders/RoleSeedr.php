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
    
            $permission = Permission::create(['name' =>'read role']);
            $permission = Permission::create(['name' =>'create role']);
            $permission = Permission::create(['name' =>'update role']);
            $permission = Permission::create(['name' =>'delete role']);

            $role_admin->givePermissionTo('read role');
            $role_admin->givePermissionTo('create role');
            $role_admin->givePermissionTo('update role');
            $role_admin->givePermissionTo('delete role');
    
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
