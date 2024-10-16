# DevStagram

## Clon Básico de Instagram

Este proyecto es un clon básico de Instagram construido con Laravel 11. Permite a los usuarios registrarse, iniciar sesión, subir imágenes, seguir a otros usuarios y visualizar publicaciones. También incluye manejo de archivos y sistema de autenticación con el sistema de usuarios de Laravel.

## Tecnologías Usadas

[![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Blade](https://img.shields.io/badge/blade-%23F55247.svg?style=for-the-badge&logo=blade&logoColor=white)](https://laravel.com/docs/11.x/blade)
[![Tailwind CSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
[![Eloquent](https://img.shields.io/badge/eloquent-%2300A7E1.svg?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/docs/11.x/eloquent)
[![Artisan](https://img.shields.io/badge/artisan-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/docs/11.x/artisan)

## Características del Proyecto

- Autenticación de usuarios (registro, inicio de sesión)
- Sistema de subida y manejo de archivos para fotos de perfil y publicaciones
- Interfaz construida con Blade y Tailwind CSS
- Base de datos relacional usando MySQL
- Sistema de ORM con Eloquent para interactuar con la base de datos
- Uso de comandos Artisan para migraciones y otros procesos administrativos

## Instrucciones para Ejecutar la Aplicación

### 1. Clonar el repositorio

Clona el repositorio en tu máquina local:

```bash
git clone https://github.com/usuario/nombre-del-repositorio.git
cd nombre-del-repositorio
```
### 2. Configuración del entorno
Copia el archivo .env.example a .env y configura las variables de entorno: 
```bash
cp .env.example .env
```
Genera la clave de la aplicación: 
```bash
php artisan key:generate
```
Instala las dependencias: 
```bash
composer install
npm install
```
Correr migracion en la base de datos: 
```bash
php artisan migrate
```
Iniciar la aplicacion: 
```bash
php artisan serve
```
