# Descripción General - Vacantes
Es una plataforma para publicar ofertas laborales, los reclutadores se registran y crean las vacantes. Además cuentan con un panel de administración para crear, editar, eliminar, activar y desactivar las vacantes. También pueden ver los perfiles de las personas que se han postulado para las vacantes.  Las vacantes se filtran por categorías, también se pueden buscar vacantes. La persona interesada puede postularse y enviar su información de contacto como su currículo vitae. Se implementó el paquete de autenticación de Laravel UI, se configuro y se hace uso de las notificaciones de Laravel. 

# Requerimientos
* PHP 7.4
* Laravel 7
* phpMyAdmin
* Instalado:
    * Composer
    * Node.js
    * npm

Notas: 
* Si usas un SGBD diferente, debes mirar la documentación oficial de Laravel y ajustar los nuevos parámetros de las credenciales en el archivo .env
[Leer más](https://laravel.com/docs/7.x/database "Ir a  documentación")

# Primeros pasos

### **Descarga o clona este repositorio**
```bash
git clone https://github.com/olmos-dev/vacantes.git
```

### **Instalar**
Instala la carpeta *vendor* para el proyecto
```bash
composer update
```

Instala *node modules*
```bash
npm install
```

### **Configurar la Base de Datos**

1. crea una nueva base de datos llamada vacantes

2. crea un nuevo archivo .env en la raíz del proyecto

3. Ahora ajusta los parámetros de las base de datos que utilizas en el archivo .env

    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=vacantes
    DB_USERNAME=root
    DB_PASSWORD=
    ```
4. También ajusta la configuración y las credenciales de **mailtrap** (debes de crear una cuenta o usar algún otro servicio) en el archivo .env

    ```bash
    MAIL_MAILER=smtp
    MAIL_HOST=sandbox.smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME="tu_username"
    MAIL_PASSWORD="tu_contraseña"
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS="vacantes@example.com"
    MAIL_FROM_NAME="${APP_NAME}"
    ```

5. Debes ejecutar las migraciones para crear la tablas en la base de datos 
    ```bash
    php artisan migrate
    ```
6. Debes ejecutar los *seeders* para poblar la base de datos 
    ```bash
    php artisan db:seed
    ```

### **Genera una llave**

Debes generar una nueva llave para la aplicación

```bash
php artisan key:generate
```

# Ejecutar el proyecto
Ejecuta el servidor de laravel
```bash
php artisan serve
```
Ejecuta el servidor de npm 
```bash
npm run watch
```
Ahora abre el proyecto y disfruta de la aplicación
```bash
http://127.0.0.1:8000/
```
Nota: hay tres perfiles para iniciar sesión disponibles o también puedes registar un nuevo usuario

|Correo|Contraseña|
|:-----|-------:|
|alberto@mail.com|123
|luis@mail.com|123

# Tecnologías y herramientas usadas
* Laravel 7
* Vue 3
* PHP 7.4
* Tailwind css
* phpMyAdmin 
* Javascript

# Documentación

## Diagrama entidad relación

![db](files/diagrama.png "Modelo entidad relación - Vacantes")

## Relaciones
* Tabla **users** tiene una relación uno a muchos con la tabla **vacantes** 

* Tabla **categorias** tiene una relación uno a uno con la tabla **vacantes**

* Tabla **salaries** tiene una relación uno a uno con la tabla **vacantes**

* Tabla **experiencias** tiene una relación uno a uno con la tabla **vacantes**

* Tabla **ubicacions** tiene una relación uno a uno con la tabla **vacantes**

* Tabla **vacantes** tiene una relación muchos a muchos con la tabla **skills**. La tabla terciaria es **skill_vacante**

* Tabla **canditados** tiene una relación uno a muchos con la tabla **vacantes**

* Tabla **notifications** se implemento el uso de las notificaciones de Laravel

## Laravel UI
Se utilizó el paquete de autenticación **Laravel UI**
* Inicio de sesión con correo electrónico
* Registro de usuarios
* Restablecimiento de contraseñas 
* Configuración de servidor SMTP (mailtrap) para envio de enlaces al correo para restablecer contraseñas y verificación del correo electrónico

## Screenshots
![imagen](files/1.png "Página principal")
![imagen](files/2.png "Se muestrán las nuevas vacantes")
![imagen](files/3.png "Acceder a la plataforma")
![imagen](files/4.png "Registar un reclutador")
![imagen](files/5.png "Restablecimiento de contraseñas")
![imagen](files/6.png "Panel de administración de las vacantes")
![imagen](files/7.png "Crear una nueva vacante")
![imagen](files/8.png "Crear una nueva vacante")
![imagen](files/9.png "Crear una nueva vacante")
![imagen](files/10.png "Editar una nueva vacante")
![imagen](files/11.png "Editar una nueva vacante")
![imagen](files/12.png "Editar una nueva vacante")
![imagen](files/13.png "Editar una nueva vacante")
![imagen](files/14.png "Vista previa de la vacante")
![imagen](files/15.png "Vista previa de la vacante")
![imagen](files/16.png "Filtro de categorias")
![imagen](files/17.png "Filtro de categorias")
![imagen](files/18.png "Postularse a una vacante")
