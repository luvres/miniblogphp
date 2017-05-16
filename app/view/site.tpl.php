<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="app/view/blog.css">
    <title><?=$tpl['titulo']?></title>
  </head>
  <body>

    <header>
      <?php include "topo.php"; ?>
    </header>

  <div class="container">
    <div class="blog-header">
      <h1 class="blog-title">Mini Blog PHP</h1>
      <p class="lead blog-description">Modelo de criação de um mini blog com o Bootstrap.</p>
      <hr>
    </div>

  <div class="row">

  <div class="col-sm-8 blog-main">

  <?php include($tpl['pagina'].".tpl.php"); ?>

  </div><!-- /.blog-main -->

  <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
      <h4>Buscar Post</h4>

      <div class="container">
  	    <div class="row">
	        <div class="col-sm-3">
            <div class="input-group custom-search-form">
              <input type="text" class="form-control">
              <span class="input-group-btn">
              <button class="btn btn-primary" type="button">
              <span class="glyphicon glyphicon-search"></span>
             </button>
             </span>
           </div><!-- /input-group -->
         </div>
  	    </div>
      </div>

    </div>
  </div><!-- /.blog-sidebar -->


  </body>
</html>
