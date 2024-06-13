<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
    <link rel="icon" type="image/png" href="../pics/logo-man.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/perfil.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Modificar Perfil
                    </div>
                    <div class="card-body">
                        <form action="procesar_modificacion.php" method="POST" enctype="multipart/form-data">
                            <!-- Imagen de perfil -->
                            <div class="text-center mb-3">
                                <img id="preview-img" src="../pics/default_person.jpg" alt="Imagen de perfil" class="profile-img">
                            </div>
                            <div class="form-group file-input">
                                <label>
                                    <input type="file" id="imagen_perfil" name="imagen_perfil" onchange="previewImage()">
                                    Seleccionar Imagen
                                </label>
                            </div>
                            <!-- Campos de texto -->
                            <div class="form-group">
                                <label for="nombre_completo">Nombre Completo</label>
                                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <textarea class="form-control" id="direccion" name="direccion" rows="3"></textarea>
                            </div>
                            <!-- Botones de acción -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>
                                <a href="dashboard.php" class="btn btn-secondary btn-block">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts opcionales para Bootstrap y JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function previewImage() {
            const file = document.querySelector('#imagen_perfil').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                document.querySelector('#preview-img').src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
