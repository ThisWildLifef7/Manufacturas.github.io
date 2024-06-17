function cargarGestionProductos() {
  var contenido = `
                <h1>Gestión de Productos</h1>
                <form method="post" action="procesar_agregar_producto.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre del producto:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                    </div>
                    <div class="form-group">
                        <label for="stock">Stock:</label>
                        <input type="number" class="form-control" id="stock" name="stock" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <!-- Aquí debes cargar las categorías desde tu base de datos -->
                            <option value="1">Categoría 1</option>
                            <option value="2">Categoría 2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen del producto:</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            `;
  $("#contenido-principal").html(contenido);
}
function cargarContenidoPrincipal() {
  var contenidoMain = `
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button class="btn btn-sm btn-outline-secondary">Exportar</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Gráfico de Ventas Mensuales
                            </div>
                            <div class="card-body">
                                <canvas id="ventasChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Últimos Pedidos
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Pedido #1234 - $150.00</li>
                                <li class="list-group-item">Pedido #1235 - $220.00</li>
                                <li class="list-group-item">Pedido #1236 - $180.00</li>
                                <li class="list-group-item">Pedido #1237 - $300.00</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Productos más Vendidos
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Ventas</th>
                                            <th>Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Producto A</td>
                                            <td>50 unidades</td>
                                            <td>$100.00</td>
                                        </tr>
                                        <tr>
                                            <td>Producto B</td>
                                            <td>30 unidades</td>
                                            <td>$80.00</td>
                                        </tr>
                                        <tr>
                                            <td>Producto C</td>
                                            <td>25 unidades</td>
                                            <td>$120.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                Usuarios Registrados
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Total: 1000</h5>
                                <a href="#" class="btn btn-primary">Ver Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
    `;
  $("#contenido-principal").html(contenidoMain);
}
