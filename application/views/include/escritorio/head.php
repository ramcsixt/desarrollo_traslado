<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url("Public/system/css/bootstrap.css")?>">
	<link href="<?php echo base_url("Public/fonts/all.css")?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link href="<?php echo base_url("Public/system/css/toastr.css")?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
	<script src="<?php echo base_url("Public/system/js/toastr.min.js")?>"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

	<title>Dashboard</title>
</head>

<style>
	.bg-light {
		background-color: #ffffff !important;
	}
	.navbar-dark .navbar-nav .nav-link {
		color: inherit;
	}
	.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
		color: inherit;
	}
	.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
		border-bottom: #0083ff 3px solid;
		color: inherit;
		background: rgba(0,112,210,0.1);

	}
	.bg-dark {
		background-color: #484848 !important;
		color: white;
	}
	.navbar-dark .navbar-nav .show > .nav-link, .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .nav-link.active {
		border-top: #0083ff 3px solid;
		color: inherit;
		background: rgba(0,112,210,0.1);
	}
	body {
		font-size: 12px;
		background-color: #e8e8e8;
	}
</style>
<body>

