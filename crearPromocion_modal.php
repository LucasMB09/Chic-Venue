<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal </title>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="modal-crear-promocion" tabindex="-1" aria-labelledby="modal-crear-promocionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="modal-crear-productoLabel">Crear Promoción</h1>
        </div>
        <div class="modal-body">
        <form id="create-product-form" action="/php/insertar_promocion.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Nombre de la promocion</label>
                <input type="text" class="form-control" name="nombre_promocion" id="nombre_promocion" pattern="[A-Za-z]+" title="Solo se permiten letras" required>
            </div>

            <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Descripción</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" pattern="[A-Za-z\s]+" title="Solo se permiten letras y espacios en blanco" required>
            </div>

            <div class="row g-2">
                <div class="col-md">
                <label for="recipient-name" class="col-form-label">Descuento</label>
                    <input type="text" class="form-control" id="descuento" name="descuento" pattern="^0+(\.\d+)?$" title="Solo se permiten números flotantes" required>
                </div>
                
                <?php 
                $dia = date(format:'d'); 
                $mes = date(format:'m'); 
                $año = date(format:'Y'); 
                ?>

                <div class="col-md">
                <label for="recipient-name" class="col-form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $año."-".$mes."-".$dia; ?>" min="<?php echo $año."-".$mes."-".$dia; ?>" required>
                </div>

                <div class="col-md">
                <label for="recipient-name" class="col-form-label">Fecha Final</label>
                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" required>
                </div>

            </div>

            <div class="">
                <br>
                <button type="submit" class="btn btn-primary" id="">Crear</button>
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


