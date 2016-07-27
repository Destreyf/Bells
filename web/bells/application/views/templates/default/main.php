<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>ClassroomSmart Bell Scheduler | <?=$title;?></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<!-- include font awesome fonts so we have some icons -->
<link href="<?=URL::site('resources/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
<?php foreach($styles as $style){ ?>
<link href="<?=URL::site('resources/css/'.$style);?>" rel="stylesheet" type="text/css" />
<?php } ?>
<script type="text/javascript" language="javascript">var baseurl='<?=URL::base(true);?>';</script>
<?php foreach($scripts as $script){ ?>
<script src="<?=URL::site('resources/js/'.$script);?>" type="text/javascript" language="javascript"></script>
<?php } ?>
</head>
<body>
<div id="modal" title="Placeholder"></div>
<div id="outer">
	<div id="header">
		<h1><a href="<?=URL::site();?>">Bell Scheduler</a></h1>
		<h2>powered by ClassroomSmart</h2>
	</div>
	<div id="menu">
		<ul>
			<li class="first" style="color:white;">Logged in as: <a href="#" accesskey="1" title=""><?php echo $user; ?></a></li>
			<li><a href="<?=URL::site('audio');?>" accesskey="2" title="">Manage Audio Files</a></li>

			<li><a href="<?=URL::site('schedule/create');?>" accesskey="3" title="">Create New Schedule</a></li>

			<li><a href="<?=URL::site('bulk');?>" accesskey="3" title="">Bulk Schedule</a></li>
		</ul>
	</div>
	<div id="content">
		<div id="tertiaryContent">
		</div>
		<div id="primaryContentContainer">
			<div id="primaryContent">
				<?php echo $body; ?>
			</div>
		</div>
		<div id="secondaryContent">
			<?php echo $sidebar; ?>
			<div class="xbg"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<p>Copyright &copy; ClassroomSmart.</p>
	</div>
</div>
</body>
</html>
