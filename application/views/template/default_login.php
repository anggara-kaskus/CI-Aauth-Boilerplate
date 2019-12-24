<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?php echo SITE_TITLE . (isset($title) ? ' - ' . $title : ''); ?></title>
	<?php echo $this->load->view('load/load_css', null, true);?>
</head>
<body class="login-page">
	<?php echo $body;?>
</body>
</html>