# Proyecto de Aplicación con Docker y Docker Compose

Este proyecto utiliza Docker y Docker Compose para desplegar una aplicación web con una base de datos MySQL y una interfaz de administración phpMyAdmin.

## Requisitos Previos

Docker instalado en tu máquina.
Docker Compose instalado en tu máquina.

## Estructura del Proyecto

```sh
├── Dockerfile
├── docker-compose.yml
├── fonts
│   └── arial.ttf
├── html
│   └── (archivos de la aplicación web)
└── README.md
```sh
# Instrucciones de Ejecución

## 1. Clonar el Repositorio

Clona este repositorio en tu máquina local:

```sh
git clone <URL_del_repositorio>
cd <nombre_del_directorio>

##2. Construir y Ejecutar los Contenedores
Utiliza Docker Compose para construir y ejecutar los contenedores:
```sh
docker-compose up --build

#Esto hará lo siguiente:

-Construirá la imagen del contenedor web utilizando el Dockerfile.
-Levantará un contenedor MySQL con la base de datos.
-Levantará un contenedor phpMyAdmin para administrar la base de datos.
##3. Acceder a la Aplicación
-Aplicación Web: Accede a http://localhost:5000 en tu navegador.
-phpMyAdmin: Accede a http://localhost:8081 en tu navegador. Usa las siguientes credenciales para iniciar sesión:
-Servidor: db
-Usuario: root
-Contraseña: rootpassword
##4. Detener los Contenedores
Para detener los contenedores, utiliza el siguiente comando:
```sh 
docker-compose down

##Configuración del Dockerfile
-El Dockerfile configura un contenedor basado en la imagen php:7.4-apache y realiza las siguientes tareas:

-Crea el directorio para las sesiones de PHP.
-Instala las dependencias necesarias para los captcha.
-Copia el código de la aplicación al contenedor.
-Copia la fuente TTF al contenedor.
-Configura el DocumentRoot de Apache.
-Instala las extensiones de PHP necesarias.
-Expone el puerto 80 para Apache.
-Copia el contenido del directorio html al contenedor.
-Configuración del docker-compose.yml
-El archivo docker-compose.yml define los servicios necesarios para la aplicación:

     -web: Construye la imagen del contenedor web utilizando el Dockerfile y expone el puerto 5000.
     -db: Utiliza la imagen mysql:5.7 y configura la base de datos pdfdb.
     -phpmyadmin: Utiliza la imagen phpmyadmin/phpmyadmin para administrar la base de datos.
     -Volúmenes
El archivo docker-compose.yml también define un volumen para persistir los datos de la base de datos en db_data.
