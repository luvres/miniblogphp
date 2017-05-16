<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">

<?php foreach($tpl["inicial"]["posts"] as $post) { ?>

  	<div class="blog-post">
			<h2 class="blog-post-title"><?=$post["titulo"]?></h2>
			<p class="blog-post-meta">Autor: <?=$post['nome']?></p>
			<p><pre><?=$post['texto']?></pre></p>
			<a href="index.php?m=updatePost" onclick="" >
	    	<i class="glyphicon glyphicon-edit" style="color:#428bca"></i>
	    </a>
			<a href="index.php?m=deletePost" onclick="return confirm('Excluir Usuario?')" >
	      <i class="glyphicon glyphicon-trash" style="color:#fa5858"></i>
	    </a>
  	</div><!-- /.blog-post -->

<?php } ?>

		</div><!-- /.blog-sidebar -->
	</div><!-- /.row -->
</div><!-- /.container -->
