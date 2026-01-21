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
        <form id="formulario_productos">
            <div class="mi-formulario-row">
                <div class="mi-formulario-grupo">
                    <label for="codigo_producto">Codigo</label>
                    <input type="text" id="codigo_producto" name="codigo">
                </div>
                <div class="mi-formulario-grupo">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre_producto" name="nombre" placeholder="Ingresar el nombre completo del producto." />
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
                    <label for="precio">Precio</label>
                    <input type="text" id="precio" >
                </div>
            </div>     
            <div class="mi-formulario-box">
                <label>Materiales del Producto</label>
                <div class="checkbox-grupo">
                    <label><input name="material[]" type="checkbox" value="Plástico" >Plástico</label>
                    <label><input name="material[]" type="checkbox" value="Metal" >Metal</label>
                    <label><input name="material[]" type="checkbox" value="Madera" >Madera</label>
                    <label><input name="material[]" type="checkbox" value="PlástVidrioico" >Vidrio</label>
                    <label><input name="material[]" type="checkbox" value="Textil" >Textil</label>
                </div>
            </div>
            <div class="mi-formulario-descripcion">
                <label>Descripcion</label>
                <textarea name="descripcion" id="descripcion_producto"></textarea>
            </div>
            <button type="submit" class="btn-guardar">Guardar Producto</button>




        </form>
    </div>
    <script src="style/script.js"></script>
</body>
</html>