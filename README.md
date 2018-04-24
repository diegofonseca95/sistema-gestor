# sistema-gestor

##Web.php

###Routes/web.php

Este archivo es llamado en cada petición.
Decide dependiendo de la ruta a que controlador y que metodo de este llamar.
Notar que distingue en si el llamado se hizo con post o get.

##UsuariosControlador.php

###App/HTTP/Controllers/UsuariosControlador.php

Contiene todas las funciones necesarias para manejar los eventos que tengan que ver
con el usuario.

##SesionControlador.php
###App/HTTP/Controllers/SesionControlador.php
Contiene todas las funciones necesarias para manejar los eventos de inicio de sesion.


##Sobre los request

Para Iniciar Sesion llamar obtenerUsuario(post, correo, contrasena):
	Recibes Json
	Si status = OK entonces
		llamar /iniciarSesion(post, correo, contrasena))
	De lo contrario
		imprimir error

Para ir a vista de Agregar Usuario llamar /agregarUsuario(get):
	Redirigido a formulario

Para agregar usuario llamar /agregarUsuario(post, correo, nombre, apellidoPaterno, apellidoMaterno, telefono, contrasena):
	Recibes Json
	Si status = Ok entonces
		llamar /(get)
	De lo contrario
		imprimir error