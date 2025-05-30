# 📘 Laboratorio 3 - Tarea Grupal

## 👥 Integrantes

- Gustavo Emanuel Rivas Avalos - `u20230321`  
- Dalia Melissa Araujo Rivas - `u20230620`  
- Merlyn Nicole Rajo Reyes - `u20230976`  
- Carlos Eduardo Lobos Soriano - `u20220190`  

## 📝 Descripción

Este proyecto fue desarrollado utilizando **Laravel** y **MongoDB** como parte del **Laboratorio 3**. El objetivo es aplicar conocimientos prácticos de desarrollo web con tecnologías modernas en un entorno grupal.

## ⚙️ Requisitos Previos

- PHP 8.x  
- Composer  
- Node.js y npm  
- MongoDB  
- Laravel CLI  

## 🚀 Pasos para ejecutar el proyecto

1️⃣ Clonar el repositorio con:

```bash
git clone url_repositorio
cd nombre_del_proyecto

2️⃣ Configurar variables de entorno copiando el archivo .env.example y renombrándolo a .env. Luego, edita el archivo .env y configura las credenciales de tu base de datos:

DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=27017
DB_DATABASE=nombre_de_tu_base
DB_USERNAME=
DB_PASSWORD=

3️⃣ Instalar dependencias con:

composer install
npm install

4️⃣ Generar la clave de la aplicación ejecutando:

php artisan key:generate

5️⃣ Ejecutar migraciones con:

php artisan migrate
