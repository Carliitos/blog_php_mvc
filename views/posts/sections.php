
<?php 
class Section {
 // definimos tres atributos
 // los declaramos como públicos para acceder directamente $section->author
 public $id;
 public $tema;
 public $tipus;
 public $creacio;
 public $modificacio;

 public function __construct($id, $tema, $tipus, $creacio, $modificacio) {
 $this->id = $id;
$this->tema = $tema;
$this->tipus = $tipus;
$this->creacio = $creacio;
$this->modificacio = $modificacio;
 }
 //Función utilizada para mostrar todas las secciones
 public static function all() {
 $list = [];
 $db = Db::getInstance();
 $req = $db->query('SELECT * FROM section');

 // creamos una lista de objectos post y recorremos la respuesta de la consulta
 foreach($req->fetchAll() as $section) {
 $list[] = new Section($section['id'], $section['tema'], $section['tipus'], 
 	$section['creacio'], $section['modificacio']);
 }
 return $list;
 }
 //Función de devuelve todos los campos de una tabla pasando el id
 public static function find($id) {
 $db = Db::getInstance();
 // nos aseguramos que $id es un entero
 $id = intval($id);
 $req = $db->prepare('SELECT * FROM section WHERE id = :id');
 // preparamos la sentencia y reemplazamos :id con el valor de $id
 $req->execute(array('id' => $id));
 $section = $req->fetch();
 return new Section($section['id'], $section['tema'], $section['tipus'],
 	$section['creacio'], $section['modificacio']);
 }
//Inserta una nueva sección
public function insertar() {
    $tema=$_POST['tema'];
    $tipus=$_POST['tipus'];
    $creacio=date('Y-m-d');
    $db = Db::getInstance();

    $req = $db->prepare("INSERT into section(tema, tipus, creacio) VALUES (:tema, :tipus,:creacio)");
    $req->bindParam(':tema', $tema);
    $req->bindParam(':tipus', $tipus);
    $req->bindParam(':creacio', $creacio);
    
    $req->execute();

	}
	//Modifica una sección
	public function modificar() {
    $tema=$_POST['tema'];
    $tipus=$_POST['tipus'];
    $creacio=date('Y-m-d');
    $id=$_POST['id'];
    $db = Db::getInstance();

    $req = $db->prepare("UPDATE section set tema = :tema, tipus=:tipus WHERE id = :id");
    $req->bindParam(':tema', $tema);
    $req->bindParam(':tipus', $tipus);
    $req->bindParam(':id', $id);
    $req->execute();

	}
	//Borra una sección
	 public static function delete() {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM section WHERE id = '.$_GET['id']);
        return $req->execute();
    }
	
}



?>
