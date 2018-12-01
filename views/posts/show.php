<div class="home">
<p><strong>Post #<?php echo $post->id; ?></strong></p>
<p><strong>Autor: </strong><?php echo $post->author; ?></p>
<p><strong>Post: </strong><?php echo $post->content; ?></p>
<p><strong>Creacio: </strong><?php echo $post->creacio; ?></p>
<p><strong>Modificacio: </strong><?php echo $post->modificacio; ?></p>
<p><strong>Title: </strong><?php echo $post->title; ?></p>
<p><strong>Foto: </strong><?php echo $post->image ? "<img src='uploads/{$post->image}' style='width:300px;' />" : "No image found."; ?></p>
</div>