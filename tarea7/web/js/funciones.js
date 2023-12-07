/**
 * Funciones auxiliares de javascripts 
 */
function confirmarBorrar(nombre, id) {
  if (confirm("¿Quieres eliminar el usuario:  " + nombre + "?")) {
    document.location.href = "?orden=Borrar&id=" + id;
  }
}


function mostrarclave() {
  //var x = document.getElementById('clave_id').value;
  var campoClave = document.getElementById('clave_id');
      var mostrarCheckbox = document.getElementById('mostrarCheckbox');

      // Cambiar el tipo de campo de contraseña según el estado del checkbox
      campoClave.type = mostrarCheckbox.checked ? 'text' : 'password';
  }


