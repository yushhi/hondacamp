<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'nomer_wa' => '08123456789',
            'password' => Hash::make('admin123'),
            'category_id' => '1',
            'subcategory_id' => '1',
            'nomer_angka' => '123123123',
            'nomer_mesin' => '121212',
            'alamat' => 'jl malaka',
            'role' => 'admin',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user@gmail.com',
            'nomer_wa' => '08123456789',
            'password' => Hash::make('user123'),
            'category_id' => '1',
            'subcategory_id' => '1',
            'nomer_angka' => '123123123',
            'nomer_mesin' => '121212',
            'alamat' => 'jl malaka',
            'role' => 'pending',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'nomer_wa' => '08123456789',
            'password' => Hash::make('user123'),
            'category_id' => '1',
            'subcategory_id' => '1',
            'nomer_angka' => '123123123',
            'nomer_mesin' => '121212',
            'alamat' => 'jl malaka',
            'role' => 'pending',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@gmail.com',
            'nomer_wa' => '08123456789',
            'password' => Hash::make('user123'),
            'category_id' => '1',
            'subcategory_id' => '1',
            'nomer_angka' => '123123123',
            'nomer_mesin' => '121212',
            'alamat' => 'jl malaka',
            'role' => 'pending',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'name' => 'user4',
            'email' => 'user4@gmail.com',
            'nomer_wa' => '08123456789',
            'password' => Hash::make('user123'),
            'category_id' => '1',
            'subcategory_id' => '1',
            'nomer_angka' => '123123123',
            'nomer_mesin' => '121212',
            'alamat' => 'jl malaka',
            'role' => 'pending',
            'created_at' => \Carbon\Carbon::now(),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);

        // DB::table('posts')->insert([
        //     'title' => 'judul1',
        //     'body' => 'asdasdasdasdasdasdasd',
        //     'created_at' => \Carbon\Carbon::now(),
        // ]);

        DB::table('artikels')->insert([
            'judul' => 'artikel 1',
            'slug' => 'artikel-1',
            'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'file' => '/logohondacamp.jpg',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('artikels')->insert([
            'judul' => 'artikel 2',
            'slug' => 'artikel-2',
            'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'file' => '/logohondacamp.jpg',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('artikels')->insert([
            'judul' => 'artikel 3',
            'slug' => 'artikel-3',
            'keterangan' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry',
            'file' => '/logohondacamp.jpg',
            'created_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('sliders')->insert([
            'judul' => 'slider',
            'file' => '/logohondacamp.jpg',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
