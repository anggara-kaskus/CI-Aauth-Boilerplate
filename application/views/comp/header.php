<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title><?php echo SITE_TITLE . (isset($title) ? ' - ' . $title : ''); ?></title>
	<?php $this->load->view('load/load_css'); ?>
	<script src="<?php echo site_url(JS_PATH . 'jquery-3.4.1.min.js?v='. JS_VERSION);?>"></script>
</head>
<body>
