# Gestor de Tareas (To-Do App)

Aplicación web para la gestión de tareas personales, desarrollada con **Laravel 12**, **PHP 8.2** y **MySQL**.

---

## 📋 Descripción

Permite a los usuarios:

* Registrarse e iniciar sesión
* Recuperar y cambiar su contraseña
* Crear, visualizar, editar y eliminar tareas
* Marcar tareas como completadas y diferenciarlas de las activas

La interfaz se construyó con **Blade**, **Tailwind CSS** y **Alpine.js**, ofreciendo una experiencia sencilla e intuitiva.

---

## 🚀 Características

* **Autenticación**: Laravel Breeze para registro, login, recuperación y cambio de contraseña.
* **CRUD de Tareas**: Operaciones completas sobre tareas con validación y mensajes flash.
* **Separación de Tareas**: Listados separados de tareas activas y completadas.
* **Estilos Modernos**: Blade + Tailwind para diseño responsive y limpio.
* **Interactividad**: Alpine.js para pequeñas mejoras UX.

---

## 📦 Tecnologías

* PHP 8.2
* Laravel 12
* MySQL
* Composer
* Blade
* Tailwind CSS
* Alpine.js
* XAMPP (o entorno local equivalente)

---

## 🔧 Instalación y Configuración

1. Clona el repositorio:

   ```bash
   git clone https://github.com/tuusuario/repositorio.git
   cd repositorio
   ```
2. Instala dependencias PHP con Composer:

   ```bash
   composer install
   ```
3. Copia el archivo de entorno y genera la clave de aplicación:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configura la base de datos en `.env`:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=to_do_db
   DB_USERNAME=root
   DB_PASSWORD=
   ```
5. Ejecuta migraciones:

   ```bash
   php artisan migrate
   ```
6. (Opcional) Ajusta el driver de sesiones en `.env`:

   ```env
   SESSION_DRIVER=file
   ```

---

## 🚲 Uso

1. Levanta el servidor local de Laravel:

   ```bash
   php artisan serve
   ```
2. Abre tu navegador en `http://127.0.0.1:8000`.
3. Regístrate o inicia sesión.
4. Accede a **Mis Tareas**, crea y gestiona tus tareas.

---

## 📂 Estructura de Carpetas

```
/app
├─ Http/Controllers/TaskController.php
├─ Models/Task.php
/resources
├─ views/layouts/app.blade.php
├─ views/tasks/index.blade.php
├─ views/tasks/create.blade.php
└─ views/tasks/edit.blade.php
/routes/web.php
```

## 📄 Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

