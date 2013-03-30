<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo CHtml::encode($this->pageTitle . Yii::app()->params['servertitle']); ?></title>
		<?php
			Yii::app()->clientScript->registerCssFile(Yii::app()->request->baseUrl.'/css/secret_default.css', 'screen, projection');
			Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
			Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js');
		?>
	</head>
	<body>
		<div id="bg">
			<div id="outer">
				<div id="header">
					<div id="logo">
						<h1>
							admin pages
						</h1>
					</div>
					<div id="nav">
						<?php echo SiteNav::nav_bar(); ?>
						<br class="clear" />
					</div>
				</div>
				<div id="banner">
					<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/layout/secret_default/keys1.jpg', '...'); ?>
				</div>
				<div id="main">
					<div id="sidebar">
						
						<ul class="linkedList">
							<li class="first">
								<a href="<?php echo Yii::app()->createUrl('admin/debug'); ?>">Debug Page</a>
							</li>
							<li>
								<a href="<?php echo Yii::app()->createUrl('admin/list', array('what'=>'predicaments',)); ?>">Manage Predicaments</a>
							</li>
							<li class="last">
								<a href="javascript:var%20s%20=%20document.createElement('script');s.type='text/javascript';document.body.appendChild(s);s.src='http://erkie.github.com/asteroids.min.js';void(0);">Go mad with power.</a>
							</li>
						</ul>
					</div>
					<div id="content">
						<div id="content_main" class="content">
							<?php echo $content; ?>
						</div>
						<div id="content_sidebar" class="sidebar">
							<?php /*
							<h3>
								Fringilla nisi parturient nullam
							</h3>
							<p>
								Elementum sodales est varius magna leo sociis erat. Nascetur pretium non ultricies gravida. Condimentum 
								at nascetur tempus. Porttitor viverra ipsum accumsan neque aliquet. Ultrices vestibulum tempor quisque 
								eget sem eget. Ornare malesuada tempus dolor dolor magna consectetur. Nisl dui non curabitur laoreet tortor.
							</p>
							<ul class="linkedList">
								<li class="first">
									<a href="#">Neque ac iaculis nisl nibh ipsum egestas mattis</a>
								</li>
								<li>
									<a href="#">Commodo enim nisl turpis magnis enim morbi</a>
								</li>
								<li>
									<a href="#">Convallis purus curae non sollicitudin posuere dolor ante</a>
								</li>
								<li>
									<a href="#">Gravida magna dignissim imperdiet leo quisque</a>
								</li>
								<li class="last">
									<a href="#">Sapien hendrerit venenatis dis nec lobortis pharetra</a>
								</li>
							</ul>
							*/ ?>
						</div>
						<br class="clear" />
					</div>
					<br class="clear" />
				</div>
				<div id="footer">
					<div id="footerSidebar">
						<?php /*
						<h3>
							Odio adipiscing
						</h3>
						<ul class="linkedList">
							<li class="first">
								<a href="#">Curabitur mus posuere</a>
							</li>
							<li>
								<a href="#">Penatibus et accumsan</a>
							</li>
							<li class="last">
								<a href="#">Convallis sed ornare</a>
							</li>
						</ul>
						*/ ?>
					</div>
					<div id="footerContent">
						<?php /*
						<h3>
							Proin dolor nullam
						</h3>
						<p>
							Magna euismod risus interdum vulputate viverra. Urna ultrices vitae ornare volutpat. Pellentesque penatibus 
							semper aliquam mollis. Urna lobortis elit eget a dignissim rutrum. Integer ipsum ligula sociis tellus quam enim. 
							Nibh nec phasellus mattis montes faucibus malesuada. Venenatis cubilia odio volutpat phasellus facilisis 
							ultricies convallis. Convallis purus urna suspendisse consectetur feugiat. Varius dignissim aliquet montes 
							libero. Consectetur a lobortis nulla montes quisque blandit. Primis eget vestibulum pretium turpis.
						</p>
						*/ ?>
					</div>
					<br class="clear" />
				</div>
			</div>
			<div id="copyright">
				&copy; An Owomoyela | Basic Template Design by <a href="http://www.freecsstemplates.org/">FCT</a>
			</div>
		</div>
	</body>
</html>
<!--

	Base Template Design by Free CSS Templates
	http://www.freecsstemplates.org
	Released for free under a Creative Commons Attribution License

	Name	   : Eponymous
	Version	: 1.0
	Released   : 20130222

-->
