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

  <div class="container marginTop=">
    <div class="row">
  		<div class="col-xs-12">
  			<div class="well well-small">
  				<h4><?=$tpl["dados"]["tituloform"]?></h4>
  			</div>
  		</div>
  	</div>

  	<form method="POST" action="index.php?m=createNewUser">

  		<div class="row marginTop">
  			<div class="col-xs-2">
					<strong>Nome:</strong>
  			</div>
  			<div class="col-xs-10">
					<input type="text" value="<?=$tpl["dados"]["nome"]?>" name="nome" class="col-xs-12 form-control" value="" autofocus required/>
  			</div>
  		</div>

  		<div class="row marginTop">
  			<div class="col-xs-2">
					<input type="submit" value="Cadastrar" class="btn btn-primary btn-large" />
  			</div>
  		</div>
  		<input type="hidden" value="<?=$tpl["dados"]["idusuario"]?>" name="idusuario" />
  	</form>
  </div>
</div>

</body>
</html>
