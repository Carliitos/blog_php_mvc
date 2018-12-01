<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC" rel="stylesheet">


<form action="?controller=posts&action=updatePost" method="post" enctype="multipart/form-data">
    
    <table class='table table-hover table-responsive table-bordered'>
        
        <input type="hidden" id="id" name="id" value= "<?php echo $post->id; ?>">

        <tr>
            <td>Title</td>
            <td><input type='text' name='title' class='form-control' value= "<?php echo $post->title; ?>" /></td>
        </tr>
 
        <tr>
            <td>Autor</td>
            <td><input type='text' id='author' name='author' class='form-control' value= "<?php echo $post->author; ?>"/></td>
        </tr>
 
        <tr>
            <td>Post</td>
            <td><textarea name='content' id='content' class='form-control' value= "<?php echo $post->content; ?>"></textarea></td>
        </tr>
         <tr>
            <td>Image</td>
            <td><input type="file" id="image" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Modificar</button>
            </td>
        </tr>
 
    </table>
</form>
