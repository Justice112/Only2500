
<div id="content" class="login">
	<div class="inner cf">
		<div class="loginbox">
			<h2 class="title">汽车工程学院考试系统登录</h2>
            <span class="error_info"><?php echo $this->Session->flash(); ?></span>
			<form method="post" action="/users/login" class="loginform">
				<div class="mb10"><label for="account" class="input_label">账号:</label><input id="account" type="text" class="input_text" maxlength="32" name="data[User][account]"></div>
				<div class="mb10"><label for="password" class="input_label">密码:</label><input id="password" type="password" class="input_text" maxlength="32" name="data[User][password]"></div>
				<div class="mb10 cf">
					<label class="input_radio"><input type="radio" checked="checked" name="data[User][role]" value="学生">学生</label>
					<label class="input_radio"><input type="radio" name="data[User][role]" value="教师">教师</label>
					<label class="input_radio"><input type="radio" name="data[User][role]" value="管理员">管理员</label>
				</div>
				<a href="##" class="btn1 submitForm">登录</a>
			</form>
		</div>
	</div>
	<script>
		$(document).ready(function(e) {
			$(window).resize(function(e) {
				$('.loginbox').css('margin-top',($('#content').height()-$('.loginbox').height())/3+'px');
			}).resize();
		});
	</script>
</div>