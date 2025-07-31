REALIZADO POR KORY OSMARA N. CANCINO ARIAS
--------------------------------------
VIP2CARS - Sistema CRUD de Vehículos
Sistema CRUD desarrollado en Laravel para gestionar vehículos y sus contactos, diseñado para la empresa automotriz VIP2CARS. Permite crear, leer, actualizar y eliminar registros de vehículos junto con los datos de sus clientes.

Tecnologías utilizadas
PHP 8.x
Laravel Framework 12.21.0
Bootstrap 5 (para estilos y modales)
FontAwesome
MySQL (base de datos)

Características
Registro y gestión de vehículos: placa, marca, modelo, año de fabricación.

Registro de datos del cliente: nombre, apellidos, documento, correo y teléfono.

Validación robusta para campos (ej. año de fabricación entre 1900 y el año actual).

Interfaz responsiva y moderna con colores corporativos VIP2CARS (rojo, negro, blanco).

Modal para visualización rápida de detalles sin salir de la lista.

Estilos sofisticados y claros.

Requisitos previos
PHP >= 8.0
Composer
MySQL o base de datos compatible
blade Laravel


Instalación y configuración
Clonar el repositorio
git clone https://github.com/tuusuario/vip2cars.git
cd vip2cars

Instalar dependencias de PHP
composer install

Configurar archivo .env
Copia el archivo de ejemplo
cp .env.example .env

Configura la conexión a base de datos en .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vip2cars_crud
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
Generar clave de aplicación

php artisan key:generate
Migrar la base de datos

correr el proyecto
php artisan migrate


******IMPORTANTE
Si sale No application encryption key has been specified.
correr el siguiente comando php artisan key:generate
