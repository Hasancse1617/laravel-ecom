<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords = [
           [ 
            'id' => 1, 'name' => 'admin', 'type' => 'admin', 'mobile' => '0145352343', 'email'=> 'admin@gmail.com', 'password'=>'$2y$10$4/BBTiDmBO6IKGI1AOAJgOwr2TVytBZvGDIivPfbeNprjn7ea8oIm', 'image'=>'','status'=>1, 
           ],
           [
            'id' => 2, 'name' => 'humaira', 'type' => 'subadmin', 'mobile' => '0145352343', 'email'=> 'humaira@gmail.com', 'password'=>'$2y$10$4/BBTiDmBO6IKGI1AOAJgOwr2TVytBZvGDIivPfbeNprjn7ea8oIm', 'image'=>'','status'=>1, 
           ],
           [
            'id' => 3, 'name' => 'hasib', 'type' => 'admin', 'mobile' => '0145352343', 'email'=> 'hasib@gmail.com', 'password'=>'$2y$10$4/BBTiDmBO6IKGI1AOAJgOwr2TVytBZvGDIivPfbeNprjn7ea8oIm', 'image'=>'','status'=>1, 
           ],
           [
            'id' => 4, 'name' => 'hasan', 'type' => 'subadmin', 'mobile' => '0145352343', 'email'=> 'hasan@gmail.com', 'password'=>'$2y$10$4/BBTiDmBO6IKGI1AOAJgOwr2TVytBZvGDIivPfbeNprjn7ea8oIm', 'image'=>'','status'=>1, 
           ],
        ];

        DB::table('admins')->insert($adminRecords);
    }
}
