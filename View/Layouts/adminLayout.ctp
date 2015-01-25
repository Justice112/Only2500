<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('cake.generic','base'));
		//echo $this->Html->css(array('base'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>

<div id="container">
	<header class="navimenu cf" id="header">		
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
	<div id="content">

		<?php echo $this->Session->flash(); ?>

		<?php echo $this->fetch('content'); ?>
	</div>
	<footer id="footer">
		<div class="inner cf">
			<p>copyright @ MYV7.com 复格教育 提供技术支持</p>
		</div>
	</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
