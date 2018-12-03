<!--
Formulario para crear una nueva sección
-->

<form action="?controller=sections&action=sectionInsert" method="post" enctype="multipart/form-data">
    <div class="home">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <p><strong>Insertar Tema/Section
            </strong></p>
        </tr>
        <tr>
            <td>Tema</td>
            <td><input type='text' name='tema' class='form-control' /></td>
        </tr>
 
        <tr>
            <td>Tipus</td>
            <td>
            <select name="tipus">
              <option  value="foto">Foto</option>
              <option  value="article">Article</option>
              <option  value="other">Altres</option>
            </select>
        </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Create Section</button>
            </td>
        </tr> 
    </table>
</div>
</form>
