<?php
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="ie6"><![endif]-->
<!--[if IE 7]><html class="ie7"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 9]><html class="ie8"><![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>上海工程技术大学 汽车工程学院考试系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<?php
	echo $this->Html->css('base');
	echo $this->Html->script('jquery-1.8.2.min');
	echo $this->Html->script('common');
	echo $this->Html->script('modernizr-2.7.1');
?>
</head>
<body>
<div id="wrap">
	<header id="header">
		<div class="inner">
			<h1 class="logo"><a href="/">上海工程技术大学 汽车工程学院考试系统</a></h1>
			<?php 
				if($this->Session->check('user_role')){
			?>
			<div class="top cf">	
				<a href="/users/logout" class="">退出系统</a>
				<p>欢迎<strong><?php echo $this->Session->read('user_name'); ?></strong>登录</p>
			</div>
			<?php 
				}
			?>
		</div>
		<?php echo $this->Session->flash(); ?>
	</header>
	<?php echo $this->fetch('content'); ?>
	<footer id="footer">
		<div class="inner cf">
			<p>copyright @ MYV7.com 复格教育 提供技术支持</p>
		</div>
	</footer>
    <?php echo $this->element('sql_dump'); ?>
</div>
</body>
</html>
	
