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

Asociación con cliente: nombre, apellidos, documento de identidad, correo y teléfono.

Validaciones inteligentes: campos protegidos con reglas, por ejemplo:

Año de fabricación entre 1900 y el actual.

Solo números en teléfono y documento.

Interfaz responsive: optimizada para dispositivos móviles, basada en Bootstrap 5.

Estilos corporativos VIP2CARS: Rojo, blanco y gris claro, con un diseño moderno y limpio.

Modal de detalles: ver información del vehículo sin salir de la tabla.

DataTables: tabla interactiva con búsqueda, ordenamiento y paginación fluida.

SweetAlert: confirmaciones y alertas personalizadas para mejor experiencia de usuario.

Mensajes visuales de éxito/error con diseño unificado.

Seguridad en formularios con tokens CSRF y validaciones backend.

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
