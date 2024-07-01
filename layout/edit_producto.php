<?php
require ('../php/conexion.php');

// Verificar si se ha recibido el ID del producto
if (isset($_GET['producto_id'])) {
    $producto_id = $_GET['producto_id'];

    // Preparar la consulta para obtener los datos del producto
    $sql = "SELECT nombre, descripcion, precio, stock, categoria_id, imagen FROM productos WHERE producto_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);
    $stmt->execute();
    $stmt->bind_result($nombre, $descripcion, $precio, $stock, $categoria_id, $imagen);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "No se recibió el ID del producto.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/edit.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar producto</h2>
        <form action="../tools/editar_producto.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre del producto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio" value="<?php echo $precio; ?>"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $stock; ?>"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="categoria">Categoría</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <option selected>Escoge una categoría</option>
                        <?php
                        $sql = "SELECT categoria_id, nombre FROM Categorias";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($row['categoria_id'] == $categoria_id) ? 'selected' : '';
                            echo "<option value='{$row['categoria_id']}' $selected>{$row['nombre']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                        required><?php echo $descripcion; ?></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="imagen">Imagen del producto</label>
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
                    <img src="../../ups/<?php echo $imagen; ?>" alt="Imagen del producto" width="100">
                    <input type="hidden" name="imagen_actual" value="<?php echo $imagen; ?>">
                </div>
            </div>
            <a href="../Screens/dashboard.php" class="btn btn-secondary">Atrás</a>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>

</html>

