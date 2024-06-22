document.querySelectorAll(".control-option").forEach((item) => {
  item.addEventListener("click", (event) => {
    let parent = item.parentElement;
    parent.classList.toggle("active");
  });
});

/*Funciones principales
Funcion para cargar contenido principal*/
function cargarContenidoPrincipal() {
  $("#contenido-principal").load("../layout/contenido_principal.php");
}
//Funcion para cargar agregar productos
function cargarListaProductos() {
  $("#contenido-principal").load("../layout/gestion_productos.php");
}
//Funcion para cargar gestion de pedidos
function cargarListaUsuarios() {
  $("#contenido-principal").load("../layout/gestion_usuarios.php");
}
function cargarListaPedidos() {
  $("#contenido-principal").load("../layout/gestion_pedidos.php");
}
function cargarListaDetalles() {
  $("#contenido-principal").load("../layout/gestion_detalles.php");
}
//Funcion para cargar configuracion
function cargarConfiguracion() {
  $("#contenido-principal").load("../layout/configuracion.php");
}

//Funciones secundarias
function cargarAddProductos() {
  $("#contenido-principal").load("../layout/form_add_producto.php");
}
function cargarAddCategorias() {
  $("#contenido-principal").load("../layout/form_add_categorias.php");
}
function cargarAddUsers() {
    $("#contenido-principal").load("../layout/form_add_users.php");
}
function cargarAddTallas() {
    $("#contenido-principal").load("../layout/form_add_tallas.php");
}

//Funciones terciarias
