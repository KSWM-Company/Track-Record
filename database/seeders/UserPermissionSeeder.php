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
        $permissionBranch = Permission_Category::create(['name'=>'Branch']);
        $permissionLocationCode = Permission_Category::create(['name'=>'Location Code']);
        $permissionBusinessType = Permission_Category::create(['name'=>'Business Type']);
        $Category = Permission_Category::create(['name'=>'Category']);
        $SubCategory = Permission_Category::create(['name'=>'Sub Category']);
        $Survey = Permission_Category::create(['name'=>'Survey']);
        $Customer = Permission_Category::create(['name'=>'Customer']);
        $Agreement = Permission_Category::create(['name'=>'Agreement']);
        $Staff = Permission_Category::create(['name'=>'Staff']);
        $ExchangeRate = Permission_Category::create(['name'=>'Exchange Rate']);
        $PaymentType = Permission_Category::create(['name'=>'Payment Type']);
        $Company = Permission_Category::create(['name'=>'Company']);
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
        // create Branch
        Permission::create(['name' => 'Branch View','permission_category_id'=>$permissionBranch->id]);
        Permission::create(['name' => 'Branch Create','permission_category_id'=>$permissionBranch->id]);
        Permission::create(['name' => 'Branch Edit','permission_category_id'=>$permissionBranch->id]);
        Permission::create(['name' => 'Branch Delete','permission_category_id'=>$permissionBranch->id]);
        // create Location Code
        Permission::create(['name' => 'Location Code View','permission_category_id'=>$permissionLocationCode->id]);
        Permission::create(['name' => 'Location Code Create','permission_category_id'=>$permissionLocationCode->id]);
        Permission::create(['name' => 'Location Code Edit','permission_category_id'=>$permissionLocationCode->id]);
        Permission::create(['name' => 'Location Code Delete','permission_category_id'=>$permissionLocationCode->id]);
        // create Business Type
        Permission::create(['name' => 'Business Type View','permission_category_id'=>$permissionBusinessType->id]);
        Permission::create(['name' => 'Business Type Create','permission_category_id'=>$permissionBusinessType->id]);
        Permission::create(['name' => 'Business Type Edit','permission_category_id'=>$permissionBusinessType->id]);
        Permission::create(['name' => 'Business Type Delete','permission_category_id'=>$permissionBusinessType->id]);
        // create Category
        Permission::create(['name' => 'Category View','permission_category_id'=>$Category->id]);
        Permission::create(['name' => 'Category Create','permission_category_id'=>$Category->id]);
        Permission::create(['name' => 'Category Edit','permission_category_id'=>$Category->id]);
        Permission::create(['name' => 'Category Delete','permission_category_id'=>$Category->id]);
        // create Sub Category
        Permission::create(['name' => 'Sub Category View','permission_category_id'=>$SubCategory->id]);
        Permission::create(['name' => 'Sub Category Create','permission_category_id'=>$SubCategory->id]);
        Permission::create(['name' => 'Sub Category Edit','permission_category_id'=>$SubCategory->id]);
        Permission::create(['name' => 'Sub Category Delete','permission_category_id'=>$SubCategory->id]);
        // create Survey
        Permission::create(['name' => 'Survey View','permission_category_id'=>$Survey->id]);
        Permission::create(['name' => 'Survey Create','permission_category_id'=>$Survey->id]);
        Permission::create(['name' => 'Survey Edit','permission_category_id'=>$Survey->id]);
        Permission::create(['name' => 'Survey Delete','permission_category_id'=>$Survey->id]);
        // create Survey
        Permission::create(['name' => 'Customer View','permission_category_id'=>$Customer->id]);
        Permission::create(['name' => 'Customer Create','permission_category_id'=>$Customer->id]);
        Permission::create(['name' => 'Customer Edit','permission_category_id'=>$Customer->id]);
        Permission::create(['name' => 'Customer Delete','permission_category_id'=>$Customer->id]);
        // create Agreement
        Permission::create(['name' => 'Agreement View','permission_category_id'=>$Agreement->id]);
        Permission::create(['name' => 'Agreement Create','permission_category_id'=>$Agreement->id]);
        Permission::create(['name' => 'Agreement Edit','permission_category_id'=>$Agreement->id]);
        Permission::create(['name' => 'Agreement Delete','permission_category_id'=>$Agreement->id]);
        // create Staff
        Permission::create(['name' => 'Staff View','permission_category_id'=>$Staff->id]);
        Permission::create(['name' => 'Staff Create','permission_category_id'=>$Staff->id]);
        Permission::create(['name' => 'Staff Edit','permission_category_id'=>$Staff->id]);
        Permission::create(['name' => 'Staff Delete','permission_category_id'=>$Staff->id]);
        // create Exchange Rate
        Permission::create(['name' => 'Exchange Rate View','permission_category_id'=>$ExchangeRate->id]);
        Permission::create(['name' => 'Exchange Rate Create','permission_category_id'=>$ExchangeRate->id]);
        Permission::create(['name' => 'Exchange Rate Edit','permission_category_id'=>$ExchangeRate->id]);
        Permission::create(['name' => 'Exchange Rate Delete','permission_category_id'=>$ExchangeRate->id]);
        // create Payment Type
        Permission::create(['name' => 'Payment Type View','permission_category_id'=>$PaymentType->id]);
        Permission::create(['name' => 'Payment Type Create','permission_category_id'=>$PaymentType->id]);
        Permission::create(['name' => 'Payment Type Edit','permission_category_id'=>$PaymentType->id]);
        Permission::create(['name' => 'Payment Type Delete','permission_category_id'=>$PaymentType->id]);
        // create Payment Type
        Permission::create(['name' => 'Company View','permission_category_id'=>$Company->id]);
        Permission::create(['name' => 'Company Create','permission_category_id'=>$Company->id]);
        Permission::create(['name' => 'Company Edit','permission_category_id'=>$Company->id]);
        Permission::create(['name' => 'Company Delete','permission_category_id'=>$Company->id]);

        // Create Roles
        $staffRole = Role::create(['name' => 'Staff','role_type'=>'Staff']);
        $RoleManager = Role::create(['name' => 'Manager','role_type'=>'Manager']); //as super-admin

        // Lets give all permission to Super-Admin role.x
        $allPermissionNames = Permission::pluck('name')->toArray();
        $RoleManager->givePermissionTo($allPermissionNames);

        $User = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'cs_id' => 'Admin1',
            'role_id' => $staffRole->id,
            'name' => 'My Sey',
            'sex' => '1',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Admin2023'),
            'branch_default' => 1,
        ]);
        $User->assignRole($staffRole);
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
