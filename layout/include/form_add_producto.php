
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../styles/product.css"> -->
</head>
<body>
<div class="container">
    <h2 class="my-4">Agregar nuevo producto</h2>
    <form method="post" action="../../php/add_producto.php" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" rows="5" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group" id="src-file1">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control-file" id="image" name="image" required>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option selected>Escoge una categoría</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <?php
                // Conectar a la base de datos
                require '../../php/conexion.php'; // Ajusta la ruta según tu estructura
                $result = mysqli_query($conn, "SELECT * FROM categorias");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['categoria_id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
