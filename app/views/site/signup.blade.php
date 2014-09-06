{{Form::open()}}
	<h4>username:</h4>
	<input name="username" value="{{Input::old('username')}}" placehoder="用户名" required autofocus>
	{{$errors->first('username', '<strong>:message</strong>')}}
	<h4>email:</h4>
	<input type="email" name="email" value="{{Input::old('email')}}" placehoder="邮箱" required>
	{{$errors->first('email', '<strong>:message</strong>')}}
	<h4>password:</h4>
	<input type="password" name="password" placehoder="密码" required >
	{{$errors->first('password', '<strong>:message</strong>')}}
	<h4>re-password:</h4>
	<input type="password" name="password_confirmation" placehoder="确认密码"  required><br>
	{{ Form::token()}}
	<input type="submit" value="注册" />
{{Form::close()}}