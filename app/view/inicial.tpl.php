<div class="container">
	<div class="row">
		<div class="col-sm-8 blog-main">

<?php foreach($tpl["inicial"]["posts"] as $post) { ?>

  	<div class="blog-post">
			<h2 class="blog-post-title"><?=$post["titulo"]?></h2>
			<p class="blog-post-meta">Autor: <?=$post['nome']?></p>
			<p><?=$post['texto']?></p>
  	</div><!-- /.blog-post -->

<?php } ?>

		</div><!-- /.blog-sidebar -->
	</div><!-- /.row -->
</div><!-- /.container -->
