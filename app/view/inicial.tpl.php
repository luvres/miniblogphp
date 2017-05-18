<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">

			<div class="alert <?=$tpl["dados"]["classe"]?>">
        <strong><?=$tpl["dados"]["msg"]?></strong>
      </div>
			
<?php foreach($tpl["inicial"]["posts"] as $post) { ?>

  	<div class="blog-post">
			<!-- Título do Post -->
			<h5 class="blog-post-title"><?=$post["titulo"]?></h5>
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

<!-- Paginação
<nav aria-label="Page navigation">
	<ul class="pagination">
		<li>
			<a href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#">5</a></li>
		<li>
			<a href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav> Paginação -->

		</div><!-- /.blog-sidebar -->
	</div><!-- /.row -->
</div><!-- /.container -->
