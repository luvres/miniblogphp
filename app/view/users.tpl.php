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
    <p><p>
    <a href="index.php?m=createUser" class="btn btn-primary btn-large" style="font-size:100%; background-color:#428bca">Cadastrar novo usuário</a>

		<table class="table table-striped table-bordered table-hover marginTop">
			<thead>
				<tr>
					<th width="40">ID</th>
					<th>Nome</th>
					<th width="40"></th>
					<th width="40"></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach($tpl["users"]["user"] as $user) { ?>

				<tr>
					<td><?=$user["idusuario"]?></td>
					<td><?=$user["nome"]?></td>
					<td>
						<a href="index.php?m=updateUser&idusuario=<?=$user["idusuario"]?>" class="btn btn-primary">Alterar</a>
					</td>
					<td>
						<a href="index.php?m=deleteUser&idusuario=<?=$user["idusuario"]?>" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir o registro?')">Excluir</a>
					</td>
				</tr>

				<?php } ?>
			</tbody>

		</table>

  </div>
	</div>
  </div>

</body>
</html>
