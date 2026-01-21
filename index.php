<?php
include 'conexion.php';
include 'obtener_datos_iniciales.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styles.css">
    <title>Formulario de Productos</title>
</head>
<body>
    
    <div class="contenedor_formulario">
        <h1>Fomulario de Producto</h1>
        <form id="formulario_productos" name="formulario_productos" action="ingreso_productos.php" method="POST">
            <div class="mi-formulario-row">
                <div class="mi-formulario-grupo">
                    <label for="codigo_producto">Codigo</label>
                    <input type="text" id="codigo_producto" name="codigo">
                </div>
                <div class="mi-formulario-grupo">
                    <label for="nombre_producto">Nombre</label>
                    <input type="text" id="nombre_producto" placeholder="Ingresar el nombre completo del producto." />
                </div>
            </div>
            <div class="mi-formulario-row">
                <div class="mi-formulario-grupo">
                    <label for="select_bodega">Bodega</label>
                    <select name="bodega" id="select_bodega">
                        <option value="0"> </option>
                        <?php foreach ($bodegas as $b): ?>
                            <option value="<?php echo $b['id']; ?>"><?php echo $b['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mi-formulario-grupo">
                    <label for="select_sucursal">Sucursal</label>
                    <select name="sucursal" id="select_sucursal">
                        <option value="0"> </option>
                    </select>
                </div>
            </div>
            <div class="mi-formulario-row">
                <div class="mi-formulario-grupo">
                    <label for="select_moneda">Moneda</label>
                    <select name="moneda" id="select_moneda">
                        <option value="0"> </option>
                        <?php foreach ($monedas as $m): ?>
                            <option value="<?= $m['id'] ?>"><?= $m['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mi-formulario-grupo">
                    <label for="precio_producto">Precio</label>
                    <input type="text" id="precio_producto" >
                </div>
            </div>     
            <div class="mi-formulario-box">
                <label>Materiales del Producto</label>
                <div class="checkbox-grupo">
                    <label><input name="material[]" type="checkbox">Plástico</label>
                    <label><input name="material[]" type="checkbox">Metal</label>
                    <label><input name="material[]" type="checkbox">Madera</label>
                    <label><input name="material[]" type="checkbox">Vidrio</label>
                    <label><input name="material[]" type="checkbox">Textil</label>
                </div>
            </div>
            <div class="mi-formulario-descripcion">
                <label>Descripcion</label>
                <textarea name="descripcion_producto" id="descripcion_producto"></textarea>
            </div>
            <button type="submit" class="btn-guardar">Guardar Producto</button>




        </form>
    </div>
    <script src="style/script.js"></script>
</body>
</html>