<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Title of our website -->
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->
		
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<!-- body_class() injects classes that are built in to Wordpress -->
<body <?php body_class(); ?> >

<!-- Wrap the entire front end and a wrapper -->
<div id="site-wrapper">

<header>
	<h1><?php bloginfo('name'); ?></h1>	
</header>