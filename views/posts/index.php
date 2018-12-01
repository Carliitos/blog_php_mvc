
<div class="home">
<p><strong>Listado de los posts:</strong></p>
<table style='width:100%'>
  <tr>
<?php foreach($posts as $post) { ?>

 <p>
 	<td>
 <?php echo $post->author; ?>
</td>
<td>
 <a class="ver" href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Ver
contenido</a>
</td>
<td>
 <a href='?controller=posts&action=delete&id=<?php echo $post->id; ?>' class='btn btn-danger delete-object'>Borrar</a>
  <a href='?controller=posts&action=modificar&id=<?php echo $post->id; ?>' class='btn btn-info'>Update</a>
</td>
</tr>
 </p>

<?php } ?>
