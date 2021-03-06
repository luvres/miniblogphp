<div class="container">
<div class="row">
<div class="col-sm-8 blog-main">
	<!-- Mensagem -->
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
			<p style="text-align:justify"><?=$post['texto']?></p>
			<!--<a href="< ?=$post['idpost']?>">Leia Mais</a>-->
			<!-- Editar Post -->
			<p>
			<a href="index.php?m=updatePost&idpost=<?=$post["idpost"]?>" onclick="" >
	    	<i class="glyphicon glyphicon-edit" style="color:#428bca"></i>
	    </a>
			<!-- Excluir Post -->
			<a href="index.php?m=deletePost&idpost=<?=$post["idpost"]?>" onclick="return confirm('Excluir Post?')" >
	      <i class="glyphicon glyphicon-trash" style="color:#fa5858"></i>
	    </a>
			<br>
			<!-- Comentários -->
			<label class="comment">Comentários</label>
			<?php if($tpl["id"] == $post["idpost"]) { ?>
				<div class="alert <?=$tpl["dados"]["classe_coment"]?>">
			    <strong><?=$tpl["dados"]["msg_coment"]?></strong>
			  </div>
			<?php } ?>
			<form class="" action="index.php?m=sendComment&idpost=<?=$post["idpost"]?>&idcomentario=<?=$coments["idcomentario"]?>" method="post">
				<div class="form-group">
					<textarea name="commentbox" rows="3" cols="60" style="font-size:14px" placeholder="Adicionar um comentário" required=""></textarea>
				</div>
				<input type="submit" value="Salvar" class="btn btn-default">
			</form>
			<!-- Conteúdo do comentário - Texto -->
			<div class="media">
			<?php foreach($tpl["inicial"]["coments"] as $coments)
				if($coments["idpost"] == $post["idpost"]){ ?>
					<p style="text-align:justify">
						<?=$coments["texto_coment"]?>
					</p>
					<div class="comment-meta">
						<!--
						<a href="#" style="color:#0000ff; font-size:14px">editar</a>
					-->
						<a href="index.php?m=deleteComment&idpost=<?=$post["idpost"]?>&idcomentario=<?=$coments["idcomentario"]?>" style="color:#ff0000; font-size:14px">excluir</a>
					</div>
					<br>
			<?php } ?>
			</div> <!-- /.media -->
  	</div><!-- /.blog-post -->
	<?php } ?>

		<!-- Paginação -->
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<li>
				<?php
					$ultimo = $tpl['pageTotal'];
					if(!$ultimo){
						// Voltar (primeira página)
						echo "<a href=\"?page=1\">Voltar</a>";
					}else{
						// Primeira página
				 		echo "<a href=\"?page=1\">Primeira</a>";
						// Paginação
						for ($i=1; $i <= $tpl["pageTotal"] ; $i++) {
							echo "<a href=\"?page=$i\">$i</a>";
						}
						// Última página
						echo "<a href=\"?page=$ultimo\">Última</a>";
					}
				 ?>
				</li>
			</ul>
		</nav>

</div><!-- /.blog-sidebar -->
</div><!-- /.row -->
</div><!-- /.container -->
