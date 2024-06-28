<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            margin-bottom: 30px;
        }

        .form-group img {
            max-width: 150px;
            margin-top: 10px;
            border-radius: 10px;
        }

        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-center form-title">Editar Producto</h2>
                <form action="../php/alter_producto.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="producto_id" value="<!-- ID del producto aquí -->">
                    <div class="form-row align-items-center">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre del Producto</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio" step="0.01" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categoria_id">Categoría</label>
                            <select class="form-control" id="categoria_id" name="categoria_id" required>
                                <!-- Opciones de categoría aquí -->
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
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4"
                                required></textarea>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="imagen">Imagen del Producto</label>
                            <input type="file" class="form-control-file" id="imagen" name="imagen">
                            <!-- Mostrar la imagen actual si existe -->
                            <img src="ruta_de_la_imagen_actual" alt="Imagen del Producto">
                        </div>
                        <div class="form-group col-md-6 text-center">
                            <label>Imagen Actual</label>
                            <img src="ruta_de_la_imagen_actual" alt="Imagen del Producto">
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-secondary" onclick="location.href='../Screens/dashboard.php'">Atrás</button>
                        <button type="submit" class="btn btn-custom">Actualizar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>