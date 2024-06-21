<?php
require '../tools/count_users.php'; // Ajusta la ruta según tu estructura
;
?>
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
                <h5 class="card-title"><?php echo $total_usuarios; ?></h5>
                <a href="#" class="btn btn-primary" onclick="cargarListaUsuarios()">Ver Detalles</a>
            </div>
        </div>
    </div>
</div>
<script>
    var ctx = document.getElementById("ventasChart").getContext("2d");
    var ventasChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun"],
            datasets: [
                {
                    label: "Ventas",
                    data: [150, 220, 180, 300, 250, 400],
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                yAxes: [
                    {
                        ticks: {
                            beginAtZero: true,
                        },
                    },
                ],
            },
        },
    });
</script>