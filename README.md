# Acerca de este proyecto

Este proyecto se hizo como parte de un proceso de seleccion, para utilizarlo en windows se necesita: 

- PHP (Personalmete utilice el que viene con XAMPP) <a href="https://www.apachefriends.org/es/index.html">Link</a>  
- Composer <a href="https://getcomposer.org/download/">Link</a>

## Los pasos para levantar el servicio a manera de desarrollo son los siguientes: 

1. Instalar XAMPP
1. Instalar Composer
1. Asegurarse que la variable PATH contenga la ruta bin de php de modo que el CMD reconozca el comando 'php'
~~~
php --version
~~~

## Clonar el Repositorio
~~~
git clone https://github.com/fedoral10/YTest.git
~~~

## Instalar dependencias
Una vez instalado Composer nos ubicamos en la raiz del proyecto y ejecutamos.
~~~
composer install
~~~

Este proceso toma algo de tiempo en dependencia de la velocidad de conexion de internet.

## Establecer las Variables de Entorno del proyecto (.env)

En la raiz del proyecto se encuentra un archivo llamado **.env** en el que se encuentran los datos de la conexion, por ende se deben de modificar conforme a tu servidor de bases de datos.

Las variables a modificar son las siguientes:

~~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ytest
DB_USERNAME=root
DB_PASSWORD=123
~~~~

## Crear la estructura de la base de datos y los registros inciales

Si la conexion a la base de datos esta correcta, ejecuta el siguiente comando para crear el esquema y agrega los registros iniciales.

> **Nota:** Asegurate que exista la base de datos que escribiste en **DB_DATABASE** del archivo **.env**

~~~
php artisan migrate --seed
~~~

## Ejecutar el servicio
Una vez instaladas las dependencias ejecutamos el servicio haciendo uso del Artisan(CLI de Laravel)

~~~
php artisan serve
~~~

Luego debera aparecer un mensaje parecido a este
~~~
Laravel development server started: http://127.0.0.1:8000
[Sun Mar  8 14:01:45 2020] PHP 7.4.3 Development Server (http://127.0.0.1:8000) started
~~~

Si es asi el servicio esta coriendo y puede ser accedido en el **localhost:8000**.

## Iniciar sesion
Habiando terminado los pasos anteriores puedes iniciar sesion en el navegador accediendo a localhost:8000.

Puedes ingresar usando el usuario por default:
> **Correo:** admin@admin.com   
> **Contraseña:** 123456
