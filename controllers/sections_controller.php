<?php
class SectionController {

 public function sections() {
 // Guardamos todos los posts en una variable
 require_once('views/posts/formSections.php');
 }

 public function sectionInsert() {
 // Guardamos todos los posts en una variable
 	Section::insertar();
 	call('sections','index');
 }
  public function index() {
 // Guardamos todos los posts en una variable
 $sections = Section::all();
 require_once('views/posts/indexSection.php');
 }
function delete(){
	Section::delete();
	call('sections','index');
} 
public function modificar(){
	 // utilizamos el id para obtener el post correspondiente

	 $section = Section::find($_GET['id']);
	 require_once('views/posts/updateSection.php');
 }
 public function updatePost(){

	 // utilizamos el id para obtener el post correspondiente
	 Section::modificar();
		call('sections','index');

 }

  public function show() {
 // esperamos una url del tipo ?controller=posts&action=show&id=x
 // si no nos pasan el id redirecionamos hacia la pagina de error, el id tenemos
//que buscarlo en la BBDD
if (!isset($_GET['id'])) {
        return call('pages', 'error');
     }
 // utilizamos el id para obtener el post correspondiente
 $sections = Section::find($_GET['id']);
 require_once('views/posts/showSections.php');
 }


}

?>
