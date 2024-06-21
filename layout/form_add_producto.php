
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crear nuevo producto</h1>
    </div>
    <form action="../php/add_producto.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" rows="3" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group" id="src-file1">
            <label for="photo" class="form-label">Imagen</label>
            <input type="file" class="form-control-file" id="photo" name="photo" required>
        </div>
        <div class="form-group">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option selected>Escoge una categoría</option>
                <?php
                // Conectar a la base de datos
                require '../php/conexion.php'; // Ajusta la ruta según tu estructura
                $result = mysqli_query($conn, "SELECT * FROM categorias");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['categoria_id']}'>{$row['nombre']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Añadir producto</button>
    </form>
</div>
</body>
</html>
