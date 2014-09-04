<?php 
/**
* 主页
*/
class SiteController extends BaseController
{
	
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
		return 'show signup view';
	}

	/**
	 * 注册信息提交
	 */
	public function postSignup()
	{
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