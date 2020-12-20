<?php
    require 'config/config.php'; 
	include 'includes/header.html';  
	include 'includes/nav.php';  


?>

<main class="container ">


<div class="row">
<div class="col-md-12">
<div class="well well-sm">
<form action="PHPMailer.php" id="form" name="form" class="form-horizontal " method="post">
<fieldset>
<legend class="text-center header">Contactenos</legend>

<div class="form-group">
<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
<div class="col-md-8">
<input id="nombre" name="nombre" type="text" placeholder="Nombre" class="form-control" required pattern="(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,16})+$" title="Ingresa un nombre valido">
</div>
</div>
<div class="form-group">
<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
<div class="col-md-8">
<input id="apellido" name="apellido" type="text" placeholder="Apellido" class="form-control" required pattern="(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,16})+$" title="Ingresa un apellido valido" >
</div>
</div>

<div class="form-group">
<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
<div class="col-md-8">
<input id="email" name="email" type="text" placeholder="Direccion de email" class="form-control"required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingrese un email correcto. Ej: prueba@prueba.com">
</div>
 </div>

<div class="form-group">
<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
<div class="col-md-8">
<input id="telefono" name="telefono" placeholder="Telefono" class="form-control" required type="number" title="Ingrese solo numeros" >
</div>
</div>

<div class="form-group">
<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
<div class="col-md-8">
<input id="asunto" name="asunto" type="text" placeholder="Asunto" class="form-control" required pattern="(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,30})+$" title="El asunto no debe tener mas de 15 caracteres">
</div>

<div class="form-group">
<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
<div class="col-md-8">
<textarea  class="form-control" id="mensaje" name="mensaje" placeholder="Dejenos su mensaje, trataremos de responderle lo antes posible" rows="7" required maxlength="120" title="El mensaje debe tener un  maximo de 120 caracteres">  </textarea>
</div>
</div>

<div class="form-group">
<div class="col-md-12 text-center">

<input type="submit" id="enviar" class="btn btn-secondary" value="Enviar ">
</div>
</div>
</fieldset>
</form>
</div>
</div>
</div>

</main>







<script>
    function validar() {
        var formulario = document.form;
        var ok = true;
        if (!/(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,16})+$/.test(formulario.nombre.value)) {
            formulario.nombre.style.backgroundColor = "red";
            ok = false;
        }
        if (!/(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,16})+$/.test(formulario.apellido.value)) {
            formulario.apellido.style.backgroundColor = "red";
            ok = false;
        }
        if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formulario.email.value)) {
            formulario.email.style.backgroundColor = "red";
            ok = false;
        }
        if (!/^\(?([\d]{3})\)?[-.]?([\d]{3})[-.]?([\d]{3})$/.test(formulario.telefono.value)) {
            ok = false;
            formulario.telefono.style.backgroundColor = "red";
        }
        if (!/(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,16})+$/.test(formulario.asunto.value)) {
            ok = false;
            formulario.asunto.style.backgroundColor = "red";
        }
        if (!/(^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{3,130})+$/.test(formulario.mensaje.value)) {
            ok = false;
            formulario.mensaje.style.backgroundColor = "red";
        }





        if (ok){
            document.getElementById("formulario").submit();
        }
    }

</script>



<?php  include 'includes/footer.php';  ?>