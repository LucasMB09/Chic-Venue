<!DOCTYPE html>
<html lang="en">
<head>
  <script src="/docs/5.3/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
      <br><br>
    </div>
  </nav>

  <br>

  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="display: flex; align-items: center;">
      <img src="/assets/logo.jpg" class="rounded mx-3" alt="" width="82" height="70" style="margin: 0;">
      <h1 style="margin: 0;">Administrador</h1>
    </a>
  </div>

  <br><br>

  <div class="container">
    <div class="row">
      <div class="col">
        <ul class="nav nav-tabs" id="admin-tabs">
          <li class="nav-item">
            <a class="nav-link active" id="products-tab" data-bs-toggle="tab" href="#products">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="promotions-tab" data-bs-toggle="tab" href="#promotions">Promociones</a>
          </li>
        </ul>

        <!-- Registros existentes  asd,jasdhj,aj,dhasjhd-->
        <div class="col">
        <br>
          <!-- Crear producto -->
        <div class="tab-content products-create">
          <div class="tab-pane fade show active" id="products">
            <h2>Crear producto</h2>
            <form id="create-product-form" action="/php/insertar_producto.php" method="post">
              <input type="text" placeholder="Nombre del producto" name="nombre_articulo" id="nombre_articulo">
              <input type="text" placeholder="Descripción" name="descripcion" id="descripcion">
              <input type="text" placeholder="Precio" name="precio" id="precio">
              <input type="text" placeholder="Imagen" name="imagen" id="imagen">
              <!--AÑADIDO-->
              <input type="text" placeholder="Color" name="color" id="color">
              <input type="text" placeholder="Talla" name="talla" id="talla">
              <input type="text" placeholder="Stock" name="stock" id="stock">
              <select name="categoria" id="categoria">
                  <option value="" selected="selected">Categoria</option>
                  <option value="Blusa bordado simple">Blusa bordado simple</option>
                  <option value="Blusa doble bordado">Blusa doble bordado</option>
                  <option value="Blusa triple bordados">Blusa triple bordado</option>
                  <option value="Bluson">Bluson</option>
                  <option value="Vestido corto">Vestido corto</option>
                  <option value="Juego">Juego</option>
              </select>
              <button type="submit" class="btn btn-secondary" id="btn-crear-product" disabled>Crear</button>
              
            </form>
          </div>
        </div>

          <!-- Crear promo --> 
          <div class="tab-content promotions-create">
          <div class="tab-pane fade show active" id="promotions">
            <h2>Crear promoción</h2>
            <form id="create-promotion-form" action="/php/insertar_promocion.php" method="post">
            <input type="text" placeholder="Nombre de la promoción" name="nombre_promocion" id="nombre_promocion">
            <input type="text" placeholder="Descripción" name="descripcion" id="descripcion">
            <input type="text" placeholder="Descuento" name="descuento" id="descuento">
            <input type="text" placeholder="Fecha de inicio" name="fecha_inicio" id="fecha_final">
            <input type="text" placeholder="Fecha de fin" name="fecha_final" id="fecha_final">
            <button type="submit" class="btn btn-secondary" id="btn-crear-promotion">Crear</button>
              
            </form>
          </div>
          </div>
           
            <h2>Registros existentes</h2>
            <div class="input-group mb-3">
              <form action="buscar.php" method="post">
                <input type="text" id="search-input" class="form-control mr-sm-2" placeholder="Buscar">
              </form>
                <button class="btn btn-primary" type="button" id="search-button">Buscar</button>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <!-- Columna de productos-->
                        <th class="product-columns">ID</th>
                        <th class="product-columns">Nombre</th>
                        <th class="product-columns">Descripción</th>
                        <th class="product-columns">Precio</th>
                        <th class="product-columns">Categoría</th>
                        <th class="product-columns">Color</th>
                        <th class="product-columns">Talla</th>
                        <th class="product-columns">Stock</th>
                        <th class="product-columns">Imagen</th>
                        <!-- Columna de promociones-->
                        <th class="promotion-columns">ID</th>
                        <th class="promotion-columns">Nombre</th>
                        <th class="promotion-columns">Descripcion</th>
                        <th class="promotion-columns">Descuento</th>
                        <th class="promotion-columns">Fecha inicio</th>
                        <th class="promotion-columns">Fecha final</th>
                        <th colspan="2">Acciones</th> 
                    </tr>
                </thead>
                <tbody id="table-body">
                    <!-- Filas de productos o promociones se agregarán dinámicamente aquí -->
                    <?php
                      $cnx = mysqli_connect("localhost","root","","chicvenue");
                      $query_productos = "SELECT id_articulo, nombre_articulo, descripcion, precio, categoria, color, talla, stock, imagen FROM articulo ORDER BY id_articulo asc";
                      $result1 = mysqli_query($cnx,$query_productos);

                      $query_promociones = "SELECT id_promocion, nombre_promocion, descripcion, descuento, fecha_inicio, fecha_final FROM promocion ORDER BY id_promocion asc";
                      $result2 = mysqli_query($cnx,$query_promociones);
                    ?>  
                    <?php
                      // Mostrar los registros de la tabla 1
                      if ($result1->num_rows > 0) 
                      {
                          while ($row = $result1->fetch_assoc()) 
                          {
                          ?>
                              <tr>
                                <td class="product-columns"> <?php echo $row["id_articulo"] ?> </td>
                                <td class="product-columns"> <?php echo $row["nombre_articulo"] ?> </td>
                                <td class="product-columns"> <?php echo $row["descripcion"] ?> </td>
                                <td class="product-columns"> <?php echo $row["precio"] ?> </td>
                                <td class="product-columns"> <?php echo $row["categoria"] ?> </td>
                                <td class="product-columns"> <?php echo $row["color"] ?> </td>
                                <td class="product-columns"> <?php echo $row["talla"] ?> </td>
                                <td class="product-columns"> <?php echo $row["stock"] ?> </td>
                                <td class="product-columns"> <img src = <?php echo $row["imagen"] ?> height="200" width="175"> </td>
                                <td class="product-columns">
                                  <a href="editarProducto_CRUD.php?
                                  id_articulo=<?php echo $row["id_articulo"] ?> &
                                  nombre_articulo=<?php echo $row["nombre_articulo"] ?> &
                                  descripcion=<?php echo $row["descripcion"] ?> &
                                  precio=<?php echo $row["precio"] ?> &
                                  categoria=<?php echo $row["categoria"] ?> &
                                  color=<?php echo $row["color"] ?> &
                                  talla=<?php echo $row["talla"] ?> &
                                  stock=<?php echo $row["stock"] ?> &
                                  imagen=<?php echo $row["imagen"] ?>">
                                      <button class="btn btn-primary product-columns" id="btn-abrir-modal">Editar</button>
                                  </a>
                                </td>
                                <td class="product-columns">
                                  <?php
                                    echo "<a href='/php/eliminar_producto.php?id_articulo=".$row['id_articulo']."'><button class='btn btn-danger product-columns' onclick='return confirmacionEliminar()'>Eliminar</button></a>"
                                  ?>
                                </td>
                              <tr>
                          <?php } ?>
                      <?php } ?> 
                    <?php
                      // Mostrar los registros de la tabla 1
                      if ($result2->num_rows > 0) 
                      {
                          while ($row = $result2->fetch_assoc()) 
                          {
                          ?>
                              <tr>
                                  <td class="promotion-columns"> <?php echo $row["id_promocion"] ?> </td>
                                  <td class="promotion-columns"> <?php echo $row["nombre_promocion"] ?> </td>
                                  <td class="promotion-columns"> <?php echo $row["descripcion"] ?> </td>
                                  <td class="promotion-columns"> <?php echo $row["descuento"] ?> </td>
                                  <td class="promotion-columns"> <?php echo $row["fecha_inicio"] ?> </td>
                                  <td class="promotion-columns"> <?php echo $row["fecha_final"] ?> </td>
                                  <td class="promotion-columns">
                                  <a href="editarPromocion_CRUD.php?
                                  id_promocion=<?php echo $row["id_promocion"] ?> &
                                  nombre_promocion=<?php echo $row["nombre_promocion"] ?> &
                                  descripcion=<?php echo $row["descripcion"] ?> &
                                  descuento=<?php echo $row["descuento"] ?> &
                                  fecha_inicio=<?php echo $row["fecha_inicio"] ?> &
                                  fecha_final=<?php echo $row["fecha_final"] ?>">
                                      <button class="btn btn-primary promotion-columns" id="btn-abrir-modal">Editar</button>
                                  </a>
                                  </td>
                                  <td class="promotion-columns">
                                  <?php
                                    echo "<a href='/php/eliminar_promocion.php?id_promocion=".$row['id_promocion']."'><button class='btn btn-danger promotion-columns' onclick='return confirmacionEliminar()'>Eliminar</button></a>"
                                  ?>
                                  </td>
                                </tr>
                          <?php } ?>
                      <?php } ?>
                </tbody>
            </table>
        </div>
<!-- Registros existentes -->


</div>
</div>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/editar_producto.js"></script>
<script src="/js/confirmaciones_TEMPORAL.js"></script>
<script src="/js/activar_boton.js"></script>

<footer class="container">
    <p>&copy; 2023 Chic Venue, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Términos</a></p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
    // Función para mostrar u ocultar las columnas según la pestaña seleccionada
    function toggleColumns() {
      const productsColumns = document.getElementsByClassName("product-columns");
      const promotionColumns = document.getElementsByClassName("promotion-columns");
       // Mostrar las columnas de productos y ocultar las de promociones
  if (document.getElementById("products-tab").classList.contains("active")) {
    for (let i = 0; i < productsColumns.length; i++) {
      productsColumns[i].style.display = "table-cell";
    }
    for (let i = 0; i < promotionColumns.length; i++) {
      promotionColumns[i].style.display = "none";
    }
  }
  // Mostrar las columnas de promociones y ocultar las de productos
  else if (document.getElementById("promotions-tab").classList.contains("active")) {
    for (let i = 0; i < productsColumns.length; i++) {
      productsColumns[i].style.display = "none";
    }
    for (let i = 0; i < promotionColumns.length; i++) {
      promotionColumns[i].style.display = "table-cell";
    }
  }
}

// Asignar el evento de cambio de pestaña
document.getElementById("admin-tabs").addEventListener("shown.bs.tab", toggleColumns);

// Llamar a la función toggleColumns al cargar la página para mostrar las columnas iniciales
toggleColumns();

// Agregar evento de clic a los botones de eliminación
const deleteButtons = document.getElementsByClassName("delete-button");
for (let i = 0; i < deleteButtons.length; i++) {
deleteButtons[i].addEventListener("click", function() {
// Obtener la fila padre del botón de eliminación
const row = this.parentNode.parentNode;
// Eliminar la fila
row.parentNode.removeChild(row);
});
}
</script>

</body>
</html>