<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal </title>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modal-crear-producto" tabindex="-1" aria-labelledby="modal-crear-productoLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modal-crear-productoLabel">Crear Producto</h1>
        </div>
        <div class="modal-body">
        <form id="create-product-form" action="/php/insertar_producto.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre del articulo</label>
                <input type="text" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" name="nombre_articulo" id="nombre_articulo" pattern="[A-Za-z]+" title="Solo se permiten letras" placeholder="Solo se permiten letras" required maxlength="30">
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Descripción</label>
                <input type="text" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" name="descripcion" id="descripcion" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios en blanco" placeholder="Solo se permiten letras y espacios en blanco" required maxlength="30">
            </div>


            <div class="row g-2">
                <div class="col-md-8">
                <label for="recipient-name" class="col-form-label">Precio</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">$</span>
                    <input type="number" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" name="precio" id="precio" aria-describedby="basic-addon1" pattern="^\d+(\.\d+)?$" title="Solo se permiten números enteros y flotantes" placeholder="Solo se permiten números enteros y flotantes" required min="145">
                </div>
                </div>
                <div class="col-md-4">
                <label for="recipient-name" class="col-form-label">Categoría</label>
                    <select class="form-select" name="categoria" id="categoria" required>
                        <option value="" selected="selected" disabled>Categoria</option>
                        <option value="Promociones">Promociones</option>
                        <option value="Básicos">Básicos</option>
                        <option value="Blusas">Blusas</option>
                        <option value="Bluson">Bluson</option>
                        <option value="Vestidos">Vestidos</option>
                        <option value="Conjuntos">Conjuntos</option>
                        <option value="Novedades">Novedades</option>
                        <option value="iTEMPORADA DE VERANO!">iTEMPORADA DE VERANO!</option>
                    </select>
                </div>
            </div>

            <div class="row g-2">
                <div class="col-md">
                <label for="recipient-name" class="col-form-label">Color</label>
                    <input type="text" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" id="color" name="color" pattern="[A-Za-z]+" title="Solo se permiten letras" placeholder="Solo se permiten letras" required>
                </div>
                <div class="col-md">
                <label for="recipient-name" class="col-form-label">Talla</label>
                    <select class="form-select" id="talla" name="talla" required>
                        <option value="" disabled selected>Elige una opción</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="X">X</option>
                        <option value="XL">XL</option>
                    </select>
                </div>
                <div class="col-md">
                <label for="recipient-name" class="col-form-label">Stock</label>
                    <input type="text" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" id="stock" name="stock" pattern="\d+" title="Solo se permiten números enteros" placeholder="Solo se permiten enteros" required>
                </div>
            </div>


            <div class="row g-2">
                <div class="col-md-8">
                    <label for="recipient-name" class="col-form-label">Imagen</label>
                    <input type="text" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" id="imagen" name="imagen" placeholder="Inserte un link o la ruta relativa de la imagen" required>
                </div>
                <div class="col-md-4">
                    <label for="recipient-name" class="col-form-label">Descuento</label>
                    <input type="text" oninvalid="setCustomValidity('Se deben completar todos los campos obligatorios')" class="form-control" id="descuento" name="descuento" pattern="^0+(\.\d+)?$" title="Solo se permiten números flotantes" required>
                </div>
            </div>

           

            <div class="">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
            </div>
        </form>
        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
    </div>
</body>
</html>


