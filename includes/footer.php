<footer class="text-muted bg-dark">
  <div class="container">


<div class="row">

    <div class="col-6 col-md">
      <h5>Horarios de atencion</h5>
      <ul class="list-unstyled text-small">
        <li> Lunes a Viernes:</li>
        <li><i class="text-muted fas fa-clock"></i> 09:00h a 20:00h</li>
        <hr>
        <li>Sabados:</a></li>
        <li><i class="text-muted fas fa-clock"></i> 10:00h a 16:00h</li>

      </ul>
    </div>

    <div class="col-6 col-md">
      <h5>Medios de Pago</h5>
      <ul class="list-unstyled text-small">
        <li><i class="text-muted fas fa-money-bill-wave"></i> Efectivo</li>
        <li><i class="text-muted fas fa-money-check-alt"></i> Mercado Pago</li>
        <li><i class="text-muted fas fa-university"></i> Transferencia Bancaria</li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5><a class="text-muted" href="categoria.php">Categorias</a></h5>
      <ul class="list-unstyled text-small">


        <li>
        	
<?php  
  $categoria = new categoria();
  $categorias = $categoria->listarCategorias();

            foreach ( $categorias as $categoria ):
?>   
<a class="text-muted" href="categoriaIndv.php?idCategoria=<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></a> <br>

<?php 
endforeach;
 ?>

        </li>
      </ul>
    </div>
    <div class="col-6 col-md">
      <h5>Contactenos</h5>
      <ul class="list-unstyled text-small">

 	<li> <i class="text-muted fab fa-instagram"></i><a class="text-muted" href="https://www.instagram.com/spicy.cakes/" target="_blank"  > Siguenos en Instagram</a></li>
    <li> <i class="text-muted fab fa-facebook"></i></i><a class="text-muted" href="#"> Danos like en Facebook</a></li>
    <li> <i class="text-muted far fa-envelope"></i><a class="text-muted" href="contacto.php"> Envianos un Email</a></li>

<li>
<a class="text-muted" href="https://api.whatsapp.com/send/?phone=541165955694&text=Hola%2C+me+gustar%C3%ADa+hacerte+unas+consultas+para+encargarte.&app_absent=0" target="_blank"><i class="text-muted fab fa-whatsapp"></i> Envianos un WhatsApp</a>

</li>

      </ul>

    </div>

  </div>
 






    <p class="float-right ">
      <a href="#" ><i class=" text-muted fas fa-arrow-up fa-2x"></i></a>
    </p>




    <div class="d-flex justify-content-center mt-5">
      <p class="d-block  text-muted">CharliiiB WebDesigner - &copy; Copyright-2020</p>
    </div>





  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>
