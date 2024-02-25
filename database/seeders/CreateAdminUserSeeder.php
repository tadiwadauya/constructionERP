<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $user = User::create([
            'name'                           => 'tadiwa', 
            'paynumber'                      => '28',
            'first_name'                     => 'Tadiwa',
            'last_name'                      => 'Dauya',
            'job_title'                      => 'Software Developer',
            'address'                        => '24753 Unit N ext Seke Chitungwiza',
            'email'                          => 'tadiwa@gmail.com',
            'mobile'                         => '0773418009',
            'extension'                      => '264',
            'department'                     => 'I.T.',
            'password'                       => bcrypt('makanakamwari'),
            'activated'                      => true,
            'account_created_by'             => 'Root',
        ]);
      
        $role = Role::create(['name' => 'Admin']);
       
        $permissions = Permission::pluck('id','id')->all();
     
        $role->syncPermissions($permissions);
       
        $user->assignRole([$role->id]);
    
    }
}
