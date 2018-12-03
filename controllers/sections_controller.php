<?php
//Objecte que porta totes les funcions de les seccions
class SectionController {
//Mostra el formulari per fer insert
 public function sections() {
 // Guardamos todos los posts en una variable
 require_once('views/posts/formSections.php');
 }
//Executa la funcio per fer insert i torna a mostrar totes les seccions
 public function sectionInsert() {
 // Guardamos todos los sections en una variable
 	Section::insertar();
 	call('sections','index');
 }
//Muestra la lista con todas las secciones
  public function index() {
 // Guardamos todas las secciones en una variable
 $sections = Section::all();
 require_once('views/posts/indexSection.php');
 }
 //Borra una sección 
function delete(){
	Section::delete();
	call('sections','index');
} 
//Muestra el formulario para modificar una sección
public function modificar(){
	 // utilizamos el id para obtener el post correspondiente

	 $section = Section::find($_GET['id']);
	 require_once('views/posts/updateSection.php');
 }
 //Modifica los campos seleccionados
 public function updateSection(){

	 // utilizamos el id para obtener el post correspondiente
	 Section::modificar();
		call('sections','index');

 }
//Muestra una sección
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
