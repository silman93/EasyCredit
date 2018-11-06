# EasyCredit
Proyecto demo habilidades con Laravel, javascript, jquery

# Aplicación de solicitud de créditos

Esta aplicación permite iniciar sesión a cualquier persona que entre al sistema, si no se encuentra dada de alta, se crea un usuario automáticamente.
Permite también capturar datos para solicitar un crédito monetario y ver el estatus de los créditos solicitados anteriormente y su historial.

# Pasos para crear ambiente de ejecución

- En este documento se explican los pasos para instalar la aplicación y su prerrequisitos para una ejecución completa de todos los componentes.
- Descomprimir archivo “credito.zip”.
- De la carpeta Scripts, copiar los archivos “SCRIPT.cmd” y “autorizar.sql” y pegarlos en el directorio “C:/”.
- Instalar PHP 7.x.
- Instalar servidor MySQL
- Crear o modificar el usuario root, el cual es el que tendrá acceso al procedimiento almacenado y la aplicación para crear la conexión, cambiar la contraseña a ‘ruben123’.
- En la carpeta script hay, ejecutar en mysql el archivo nombrado “Base de datos.sql” para crear las tablas, insertar los registros necesarios y crear el procedimiento necesario para la autorización automatizada por una tarea de windows.
- Abrir el “Programador de tareas” de windows, importar el archivo “Autorizar Creditos.xml” que se encuentra en la carpeta “Scripts”.
- Dentro del archivo "SCRIPT.cmd" de la carpeta Scripts se encuentra el usuario y contrasña, modificar en caso de ser necesario el usuario y/o contraseña de dicho archivo.
- En la raiz de nuestro proyecto se encuentra un archivo llamado ".env" el cual contiene usuario y contraseña a base de datos que pueden ser cambiados en cualuiqer momento. Definido de la siguiente manera: 
    DB_USERNAME=root
    DB_PASSWORD=ruben123
- Abrir la consola de comandos, desplazarse a la carpeta raíz del proyecto y correr el comando siguiente:
    php artisan serve
- Entrar a la siguiente url desde su navegador:
    http://localhost:8000/login/create
- Seguir la demo que se adjunta en el video para hacer las pruebas necesarias.
