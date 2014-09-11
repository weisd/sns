<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>重设密码</h2>

		<div>
			点击链接重设密码: {{ URL::to('/reset-password', array($token)) }}.
		</div>
	</body>
</html>
