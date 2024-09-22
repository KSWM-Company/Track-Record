<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Category;
use App\Models\Permission_Category;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=UserPermissionSeeder
     * @return void
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        // app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $user = Permission_Category::create(['name'=>'User']);
        $role = Permission_Category::create(['name'=>'Role']);
        $permission = Permission_Category::create(['name'=>'Permission']);
        $permissionCategory = Permission_Category::create(['name'=>'Permission Category']);
       
        // create role
        Permission::create(['name' => 'Role View','permission_category_id'=>$role->id]);
        Permission::create(['name' => 'Role Create','permission_category_id'=>$role->id]);
        Permission::create(['name' => 'Role Edit','permission_category_id'=>$role->id]);
        Permission::create(['name' => 'Role Delete','permission_category_id'=>$role->id]);
        // create permissions
        Permission::create(['name' => 'Permission View','permission_category_id'=>$permission->id]);
        Permission::create(['name' => 'Permission Create','permission_category_id'=>$permission->id]);
        Permission::create(['name' => 'Permission Edit','permission_category_id'=>$permission->id]);
        Permission::create(['name' => 'Permission Delete','permission_category_id'=>$permission->id]);

        // create permissions
        Permission::create(['name' => 'Permission Category View','permission_category_id'=>$permissionCategory->id]);
        Permission::create(['name' => 'Permission Category Create','permission_category_id'=>$permissionCategory->id]);
        Permission::create(['name' => 'Permission Category Edit','permission_category_id'=>$permissionCategory->id]);
        Permission::create(['name' => 'Permission Category Delete','permission_category_id'=>$permissionCategory->id]);
        // create user
        Permission::create(['name' => 'User View','permission_category_id'=>$user->id]);
        Permission::create(['name' => 'User Create','permission_category_id'=>$user->id]);
        Permission::create(['name' => 'User Edit','permission_category_id'=>$user->id]);
        Permission::create(['name' => 'User Delete','permission_category_id'=>$user->id]);
      
        $RoleManager = Role::create(['name' => 'Manager','role_type'=>'Manager']); //as super-admin

        // Lets give all permission to Super-Admin role.x
        $allPermissionNames = Permission::pluck('name')->toArray();
        $RoleManager->givePermissionTo($allPermissionNames);
        // Let's Create User and assign Role to it.
        $Manager = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'cs_id' => 'Admin3',
            'role_id' => $RoleManager->id,
            'name' => 'Manager',
            'branch_default' => 1,
            'sex' => '1',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin2023'),
        ]);
        $Manager->assignRole($RoleManager);
    }
}
