<!--
Muestra todas las secciones de la tabla secciones
-->

<div class="home">
<p><strong>Listado de Seccones:</strong></p>
<table style='width:100%'>
  <tr>
<?php foreach($sections as $sections) { ?>

 <p>
 	<td>
 <?php echo $sections->tema; ?>
</td>
<td>
 <a class="ver" href='?controller=sections&action=show&id=<?php echo $sections->id; ?>'>Ver
contenido</a>
</td>
<td>
 <a href='?controller=sections&action=delete&id=<?php echo $sections->id; ?>' class='btn btn-danger delete-object'>Borrar</a>
  <a href='?controller=sections&action=modificar&id=<?php echo $sections->id; ?>' class='btn btn-info'>Update</a>
</td>
</tr>
 </p>

<?php } ?>
