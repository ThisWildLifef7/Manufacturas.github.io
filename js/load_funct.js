//Funcion para cargar contenido principal
function cargarContenidoPrincipal() {
    $("#contenido-principal").load("../layout/contenido_principal.php");
}
//Funcion para cargar agregar productos
function cargarAddProductos() {
    $("#contenido-principal").load("../layout/form_add_producto.php");
}
//Funcion para cargar gestion de pedidos
function cargarGestionUsuarios() {
    $("#contenido-principal").load("../layout/gestion_usuarios.php");
}
//Funcion para cargar estadisticas
function cargarEstadisticas() {
    $("#contenido-principal").load("../layout/estadisticas.php");
}
//Funcion para cargar configuracion
function cargarConfiguracion() {
    $("#contenido-principal").load("../layout/configuracion.php");
}