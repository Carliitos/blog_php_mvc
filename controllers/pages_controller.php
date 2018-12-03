<?php
//Objecte on es guarden les funcions que controlen tot el que pasa
class PagesController {
//Funció que truca al fitxer home i mostra el missatge amb les variables declarades
 public function home() {
 // simulación de datos obtenidos de un modelo
 $first_name = 'Carlos';
 $last_name = 'Colado';
 require_once('views/pages/home.php');
 }
//Funció que mostra un missatge d'error per pantalla
 public function error() {
 require_once('views/pages/error.php');
 }
}
?>


