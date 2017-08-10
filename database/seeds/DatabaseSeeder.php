<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ThanhVienTableSeeder');
    }
}

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('bcd')->insert([
            array('phoneNumber'=>124334,'name'=>'quan ngan'),
            array('phoneNumber'=>124334,'name'=>'quan dui'),
            array('phoneNumber'=>124334,'name>'=>'quan dai'),
            array('phoneNumber'=>124334,'name'=>'quan thun'),
            array('phoneNumber'=>124334,'name'=>'quan sip')
        ]);
    }
}

class JoinTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('newTable')->insert([
            ['name'=>'tu','title'=>'ok'],
            ['name'=>'bich','title'=>'title2']
        ]);
    }
}

class OldTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('oldTable')->insert([
            ['sodienthoai'=>546436,'price'=>1],
            ['sodienthoai'=>5255354,'price'=>2],
            ['sodienthoai'=>5255354,'price'=>2],
            ['sodienthoai'=>5255354,'price'=>3],
            ['sodienthoai'=>5255354,'price'=>4]
        ]);
    }
}

class ImagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('table')->insert([
            ['name'=>'hinh vuong', 'product_id'=> 2],
            ['name'=>'hinh quat', 'product_id'=> 2],
            ['name'=>'hinh tron', 'product_id'=> 2],
            ['name'=>'hinh chu nhat', 'product_id'=> 2],
            ['name'=>'hinh vuong', 'product_id'=> 4],
            ['name'=>'hinh quat', 'product_id'=> 4],
            ['name'=>'hinh tron', 'product_id'=> 4],
            ['name'=>'hinh chu nhat', 'product_id'=> 4]
        ]);
    }
}

class ThanhVienTableSeeder extends Seeder
{
    public function run ()
    {
        DB::table('createthanhvien')->insert([
            ['user' => 'tu1', 'pass' => Hash::make(1234), 'level' => 1],
            ['user' => 'tu2', 'pass' => Hash::make(1234), 'level' => 2],
            ['user' => 'tu3', 'pass' => bcrypt(1234), 'level' => 3]
        ]);
        // Hash::make() hoac bcrypt -> ma hoc password
    }
}