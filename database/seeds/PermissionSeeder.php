<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'create-posts',
            'update-posts',
            'delete-posts',
            'update-users',
            'delete-users',
            'update-comments',
            'delete-comments',
            'categories',
            'roles',
            'permissions'
        ];

        foreach ($data as $name) {
            factory(Permission::class)->create([
                'name' => $name
            ]);
        }
    }
}
