<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="index.php?r=user/login_pro" method="post">
		<table>
		<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
			<tr>
				<td>用户名：</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input type="password" name="pwd"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="登录"></td>
			</tr>
		</table>
	</form>
</body>
</html>