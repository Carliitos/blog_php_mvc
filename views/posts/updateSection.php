<LINK REL=StyleSheet HREF="style.css" TYPE="text/css" MEDIA=screen>
<link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC" rel="stylesheet">


<form action="?controller=sections&action=updatePost" method="post" enctype="multipart/form-data">
    
    <table class='table table-hover table-responsive table-bordered'>
        
        <input type="hidden" id="id" name="id" value= "<?php echo $section->id; ?>">
        <tr>
            <td>Tema</td>
            <td><input type='text' name='tema' class='form-control' value= "<?php echo $section->tema; ?>" /></td>
        </tr>
 
        <tr>
            <td>Tipus</td>
            <td>
            <select name="tipus" selected="$section->tipus">
              <option  value="foto">Foto</option>
              <option  value="article">Article</option>
              <option  value="other">Altres</option>
            </select>
        </td>
 
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Modificar Seccions</button>
            </td>
        </tr>
 
    </table>
</form>
