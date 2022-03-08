<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //super-admin = all admin = see list and users

        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);
        $guest = Role::create(['name' => 'guest']);

        //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //users
        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //abouts
        Permission::create(['name' => 'abouts.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'abouts.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'abouts.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'abouts.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'abouts.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'abouts.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'abouts.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //notices
        Permission::create(['name' => 'notices.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'notices.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'notices.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'notices.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'notices.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'notices.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'notices.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //categories
        Permission::create(['name' => 'categories.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'categories.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'categories.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'categories.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'categories.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'categories.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'categories.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //services
        Permission::create(['name' => 'services.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'services.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'services.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'services.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'services.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'services.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'services.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //types
        Permission::create(['name' => 'types.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'types.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'types.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'types.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'types.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'types.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'types.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //modalities
        Permission::create(['name' => 'modalities.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'modalities.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'modalities.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'modalities.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'modalities.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'modalities.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'modalities.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //contact
        Permission::create(['name' => 'contacts.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'contacts.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'contacts.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'contacts.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'contacts.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'contacts.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'contacts.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //families
        Permission::create(['name' => 'responsable-family.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'responsable-family.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'responsable-family.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'responsable-family.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'responsable-family.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'responsable-family.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'responsable-family.destroy'])->syncRoles([$admin]);

         //permission = dahsboard view, index, create, store, show, edit, update, destroy
        //responsable families
        Permission::create(['name' => 'families.index'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'families.show'])->syncRoles([$admin, $manager, $guest]);
        Permission::create(['name' => 'families.create'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'families.store'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'families.edit'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'families.update'])->syncRoles([$admin, $manager]);
        Permission::create(['name' => 'families.destroy'])->syncRoles([$admin]);

    }
}
