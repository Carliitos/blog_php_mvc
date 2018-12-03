<?php
//Objecte que porta totes les funcions del posts
class PostsController {
//Funcio que mostra la pagina principal
 public function index() {
 // Guardamos todos los posts en una variable
 $posts = Post::all();
 require_once('views/posts/index.php');
 }
//Truca a la pagina de fe insert
  public function insert() {
 // Guardamos todos los posts en una variable
 //$posts = Post::all();
 require_once('views/pages/insert.php');
 }
 //Truca a la funcio de l'objecte post per insertar un post
 public function insertar() {
 	post::insertar();
 }
//Truca la funcio de posts per eliminar l'insert
function delete(){
	post::delete();
	call('posts','index');
} 
//Truca la pàgina del formulari per modificar
public function modificar(){
	 // utilizamos el id para obtener el post correspondiente

	 $post = Post::find($_GET['id']);
	 require_once('views/posts/updateForm.php');
 }
//Truca la funcio per fer update
public function updatePost(){

	 // utilizamos el id para obtener el post correspondiente
	 Post::updatePost();
		call('posts','index');

 }

//Mostra 1 post
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
