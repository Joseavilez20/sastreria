<form method="post" class="w-50 m-auto pt-5" >
<div class="mb-3">
  <label for="inputUsuario" class="form-label">Usuario</label>
  <input type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Nombre de usuario">
</div>
<div class="mb-3">
  <label for="inputPass" class="form-label">Password</label>
  <input type="text" class="form-control" id="inputPass" name="inputPass" placeholder="Contraseña">

</div>
<button type="submit" class="btn btn-primary">Iniciar sesion</button>

<?php 
include "../modelos/usuario.modelo.php";
    ModeloUsuario::ingresar();
    
?>
</form>
