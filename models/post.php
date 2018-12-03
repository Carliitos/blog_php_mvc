<?php
class Post {
 // definimos tres atributos
 // los declaramos como públicos para acceder directamente $post->author
 public $id;
 public $author;
 public $content;
 public $creacio;
 public $modificacio;
 public $image;
 public $title;
 public function __construct($id, $author, $content, $creacio, $modificacio, $image, $title) {
 $this->id = $id;
$this->author = $author;
$this->content = $content;
$this->creacio = $creacio;
$this->modificacio = $modificacio;
$this->image = $image;
$this->title = $title;
 }
 //Función utilizada para mostrar todos los posts
 public static function all() {
 $list = [];
 $db = Db::getInstance();
 $req = $db->query('SELECT * FROM posts');

 // creamos una lista de objectos post y recorremos la respuesta de la consulta
 foreach($req->fetchAll() as $post) {
 $list[] = new Post($post['id'], $post['author'], $post['content'], 
 	$post['creacio'], $post['modificacio'], $post['image'], $post['title']);
 }
 return $list;
 }
 //Clase que devueve todos los campos de una tabla pasando el id
 public static function find($id) {
 $db = Db::getInstance();
 // nos aseguramos que $id es un entero
 $id = intval($id);
 $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
 // preparamos la sentencia y reemplazamos :id con el valor de $id
 $req->execute(array('id' => $id));
 $post = $req->fetch();
 return new Post($post['id'], $post['author'], $post['content'],
 	$post['creacio'], $post['modificacio'], $post['image'], $post['title']);
 }
//Inserta los parametros del formulario
 public function insertar() {
    //Toma los parámetros escogidos en el formulario y los guarda en variables
    $author=$_POST['author'];
    $content=$_POST['content'];
    $title=$_POST['title'];
    $creacio=date('Y-m-d');
    $db = Db::getInstance();


$foto=htmlspecialchars(strip_tags($_FILES['image']['tmp_name'])); 
     
    $foto=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";

        //Prepara la consulta
    $req = $db->prepare("INSERT into posts(author,content, creacio, image, title) VALUES (:author, :content,:creacio,:image,:title)");
    $req->bindParam(':author', $author);
    $req->bindParam(':content', $content);
    $req->bindParam(':creacio', $creacio);
    $req->bindParam(':title', $title);
    $req->bindParam(':image', $foto);   

    //Si realiza la consulta entonces guarda la imagen en la carpeta uploads
    if($req->execute()){
        echo "<div class='alert alert-success'>S'ha creat el POST</div>";

        // try to upload the submitted file
        // uploadPhoto() method will return an error message, if any.
        //echo uploadPhoto();
        
        $result_message="";
 
        // now, if image is not empty, try to upload the image
        if($foto){

            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $foto;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // error message is empty
            $file_upload_error_messages="";
            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
            // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
            }

            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['image']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
            }

            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }
                    // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }

            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }

                }

                echo $result_message;
    }
 
    // if unable to create the product, tell the user
    else{
        echo "<div class='alert alert-danger'>No s'ha pogut crear el producte</div>";
    }
 }
//Realiza lo mismo que en la función update pero en la consulta hace un "UPDATE"
public static function updatePost() {
    $author=$_POST['author'];
    $content=$_POST['content'];
    $title=$_POST['title'];
    $creacio=date('Y-m-d');

    $id=$_POST['id'];

    $db = Db::getInstance();


$foto=htmlspecialchars(strip_tags($_FILES['image']['tmp_name'])); 
     
    $foto=!empty($_FILES["image"]["name"])
        ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";


    $req = $db->prepare("Update posts set author = :author, content = :content, creacio=:creacio, image=:image, title=:title where id=:id");
    $req->bindParam(':author', $author);
    $req->bindParam(':content', $content);
    $req->bindParam(':creacio', $creacio);
    $req->bindParam(':title', $title);
    $req->bindParam(':image', $foto);   
    $req->bindParam(':id', $id);

    if($req->execute()){
        echo "<div class='alert alert-success'>S'ha creat el POST</div>";

        // try to upload the submitted file
        // uploadPhoto() method will return an error message, if any.
        //echo uploadPhoto();
        
        $result_message="";
 
        // now, if image is not empty, try to upload the image
        if($foto){

            // sha1_file() function is used to make a unique file name
            $target_directory = "uploads/";
            $target_file = $target_directory . $foto;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            // error message is empty
            $file_upload_error_messages="";
            // make sure that file is a real image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check!==false){
            // submitted file is an image
            }else{
                $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
            }

            // make sure certain file types are allowed
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
            }

            // make sure file does not exist
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
            }

            // make sure submitted file is not too large, can't be larger than 1 MB
            if($_FILES['image']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
            }

            // make sure the 'uploads' folder exists
            // if not, create it
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }
                    // if $file_upload_error_messages is still empty
            if(empty($file_upload_error_messages)){
                // it means there are no errors, so try to upload the file
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    // it means photo was uploaded
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                        $result_message.="<div>Unable to upload photo.</div>";
                        $result_message.="<div>Update the record to upload photo.</div>";
                    $result_message.="</div>";
                }
            }

            // if $file_upload_error_messages is NOT empty
            else{
                // it means there are some errors, so show them to user
                $result_message.="<div class='alert alert-danger'>";
                    $result_message.="{$file_upload_error_messages}";
                    $result_message.="<div>Update the record to upload photo.</div>";
                $result_message.="</div>";
            }

                }

                echo $result_message;
    }
else{
        echo "<div class='alert alert-danger'>No s'ha pogut crear el producte</div>";
    }
 }

//Elimina un post
 public static function delete() {
    //Conecta a la base
        $db = Db::getInstance();
        //Prepara la consulta
        $req = $db->prepare('DELETE FROM posts WHERE id = '.$_GET['id']);
        //Realiza la consulta
        return $req->execute();
    }
 
}

?>