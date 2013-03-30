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
		?>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="bg">
			<div id="outer">
				<div id="header">
					<div id="logo">
						<h1>
							enter.
						</h1>
					</div>
				</div>
				<div id="banner">
					<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/layout/enter/letters-header.jpg', 'splayed letters, from an unknown source'); ?>
					<?php echo $content; ?>
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
