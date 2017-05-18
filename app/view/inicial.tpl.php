<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">

			<div class="alert <?=$tpl["dados"]["classe"]?>">
        <strong><?=$tpl["dados"]["msg"]?></strong>
      </div>

	<?php foreach($tpl["inicial"]["posts"] as $post) { ?>

	  	<div class="blog-post">
				<!-- Título do Post -->
				<h5 class="blog-post-title"><a href="#"><?=$post["titulo"]?><a></h5>
				<!-- Autor -->
				<p class="blog-post-meta">Autor: <?=$post['nome']?></p>
				<!-- Conteúdo - Texto -->
				<p><pre><?=$post['texto']?></pre></p>
				<!-- Editar Post -->
				<a href="index.php?m=updatePost&idpost=<?=$post["idpost"]?>" onclick="" >
		    	<i class="glyphicon glyphicon-edit" style="color:#428bca"></i>
		    </a>
				<!-- Excluir Post -->
				<a href="index.php?m=deletePost&idpost=<?=$post["idpost"]?>" onclick="return confirm('Excluir Post?')" >
		      <i class="glyphicon glyphicon-trash" style="color:#fa5858"></i>
		    </a>
	  	</div><!-- /.blog-post -->

	<?php } ?>

		<!-- Paginação -->
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
				<?php
				 	echo "<a href=\"?page=1\">Primeira</a>";
					for ($i=1; $i <= $tpl["pageTotal"] ; $i++) {
						echo "<a href=\"?page=$i\">$i</a>";
					}
						$ultimo = $tpl['pageTotal'];
						echo "<a href=\"?page=$ultimo\">Última</a>";
				 ?>
				</li>
			</ul>
		</nav>

		</div><!-- /.blog-sidebar -->
	</div><!-- /.row -->
</div><!-- /.container -->
