<?php 
/**
* 主页
*/
class SiteController extends BaseController
{
	
	// public function __construct()
	// {
	// 	$this->beforeFilter('csrf', ['on'=>'post']);
	// }

	/**
	 * 首页
	 */
	public function getIndex()
	{
		return View::make('hello');
	}

	/**
	 * 注册页
	 * @return [type] [description]
	 */
	public function getSignup()
	{
		return View::make('site.signup');
	}

	/**
	 * 注册信息提交
	 */
	public function postSignup()
	{
		// @todo 超过三次出验证码！
		
		// 验证数据
		$data = Input::all();
		// 验证规则  
		// @todo username:中文、英文、数字、下划线   email: unique
		$rules = ['username'=>'required|between:6,16', 'email'=>'required|email', 'password'=>'required|between:6,16|confirmed'];
		// 验证消息
		$messages = [
			'username.required'=>'请输入用户名',
			'username.between'=>'用户名长度请保持在:min到:max位之间',
			'email.required'=>'请输入邮箱地址',
			'email.email'=>'请输入正确的邮箱地址',
			'password.required'=>'请输入密码',
			'password.confirmed'=>'两次输入的密码不一致',
			'password.between'=>'密码长度请保持在:min到:max位之间',
		];

		// 开始验证
		$validator = Validator::make($data, $rules, $messages);
		// 如果验证失败... 要验证成功用passes()方法
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// 存用户信息
		// 生成验证连接
		// 发送验证邮件
		// 成功跳转主页
		// 
		

		dd('signup ok!');

		return 'did post signup';
	}

	/**
	 * 登陆页
	 */
	public function getSignin()
	{
		return 'show signin view';
	}

	/**
	 * 登陆提交
	 */
	public function postSignin()
	{
		return 'did post signin';
	}

	/**
	 * 激活
	 */
	public function getActivate()
	{
		return 'activate from email link';
	}


	// @todo 验证码  csrf
}
 ?>