<?php
/**
 * 初如化用户数据
 */
class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(['username'=>'dada', 'email'=>'weishidavip@163.com', 'password'=>'sdfsdf', 'actived'=>true]);
    }

}
?>