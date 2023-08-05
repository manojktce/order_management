<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        // Permission
        Permission::create(['name' => 'home']);
        Permission::create(['name' => 'adminHome']);
        Permission::create(['name' => 'table']);

        // Category Permissions
        Permission::create(['name' => 'create-category']);
        Permission::create(['name' => 'edit-category']);
        Permission::create(['name' => 'view-category']);
        Permission::create(['name' => 'delete-category']);

        // Product Permissions
        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'edit-product']);
        Permission::create(['name' => 'view-product']);
        Permission::create(['name' => 'delete-product']);

        // User Permissions
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'delete-user']);*/

        // User Permissions
        /*Permission::create(['name' => 'vendor.index']);
        Permission::create(['name' => 'vendor.create']);
        Permission::create(['name' => 'vendor.update']);
        Permission::create(['name' => 'vendor.show']);
        Permission::create(['name' => 'vendor.destroy']);*/
    
        $adminRole  = Role::create(['name' => 'Admin']);
        $vendorRole = Role::create(['name' => 'Vendor']);
        $userRole   = Role::create(['name' => 'User']);

        /*$adminRole->givePermissionTo([
            'adminHome',
            'table'
        ]);

        $vendorRole->givePermissionTo([
            'home',
        ]);

        $userRole->givePermissionTo([
            'home',
        ]);*/

        /*$vendorRole->givePermissionTo([
            'vendor.index',
            'vendor.create',
        ]);*/
    }
}
