<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.79.0">
	<title><?= $title ?></title>
	<meta name="theme-color" content="#7952b3">
    
	<?= $this->include('_partial/css/custom_css') ?>
</head>
<body>
	<!-- Header -->
	<?= $this->include('_partial/header') ?>

	<div class="container-fluid">
	  <div class="row">

	  	<!-- Sidebar -->
	    <?= $this->include('_partial/sidebar') ?>

	    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

			<!-- Main Content -->
	      	<?= $this->renderSection('default') ?>

	    </main>
	  </div>
	</div>
  	<?= $this->include('_partial/js/custom_js') ?>

  	<script>
  		const menu = document.querySelector("ul.nav"),
  		CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
  		link = menu.getElementsByTagName("a");
  		Object.keys(link).forEach(key =>{
  			if(link[key].href === CURRENT_URL) {
  				link[key].classList.add('active')
  			} else {
  				link[key].classList.remove('active')
  			}
  		})
  	</script>
</body>
</html>