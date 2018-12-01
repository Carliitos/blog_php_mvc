<?php
class PostsController {
 public function index() {
 // Guardamos todos los posts en una variable
 $posts = Post::all();
 require_once('views/posts/index.php');
 }
  public function insert() {
 // Guardamos todos los posts en una variable
 //$posts = Post::all();
 require_once('views/pages/insert.php');
 }
 public function insertar() {
 	post::insertar();
 }

function delete(){
	post::delete();
	call('posts','index');
} 
public function modificar(){
	 // utilizamos el id para obtener el post correspondiente

	 $post = Post::find($_GET['id']);
	 require_once('views/posts/updateForm.php');
 }

public function updatePost(){

	 // utilizamos el id para obtener el post correspondiente
	 Post::updatePost();
		call('posts','index');

 }


 public function show() {
 // esperamos una url del tipo ?controller=posts&action=show&id=x
 // si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos
//que buscarlo en la BBDD
if (!isset($_GET['id'])) {
        return call('pages', 'error');
     }
 // utilizamos el id para obtener el post correspondiente
 $post = Post::find($_GET['id']);
 require_once('views/posts/show.php');
 }

}

?>
