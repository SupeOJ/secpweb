<?php
api_expose('add_user');
function add_user($params){
	$username = $params['username'];
	$rs = DB::table('users')->where('username', $username)->value('id');
	if($rs){
		return false;
	}
	$data = [
		'username'  =>$params['username'],
		'email'     =>$params['email'],
		'last_name' =>$params['name'],
		'password'  =>bcrypt($params['password']),
	];
	$isok= DB::table('users')->insert($data);
	return $isok;
}
