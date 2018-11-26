
<form action="?controller=posts&action=insertar" method="post">
 
    <table class='table table-hover table-responsive table-bordered'>
 
        <tr>
            <td>Title</td>
            <td><input type='text' name='title' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Autor</td>
            <td><input type='text' id='author' name='author' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Post</td>
            <td><textarea name='content' id='content' class='form-control'></textarea></td>
        </tr>
         <tr>
            <td>Image</td>
            <td><input type="file" name="image" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create</button>
            </td>
        </tr>
 
    </table>
</form>
