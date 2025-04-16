# Proyecto de Aplicación Captcha con PHP , Docker y Docker Compose

Este proyecto utiliza Docker y Docker Compose para desplegar una aplicación web con una base de datos MySQL y una interfaz de administración phpMyAdmin en caso que se requiera.

## Requisitos Previos

Docker instalado en tu máquina.
Docker Compose instalado en tu máquina.

## Estructura del Proyecto


├── Dockerfile<br>
├── docker-compose.yml<br>
├── fonts<br>
│   └── arial.ttf<br>
├── html<br>
│   └── (archivos de la aplicación web)<br>
└── README.md<br>

## Instrucciones de Ejecución

## 1. Clonar el Repositorio

<p>Clona este repositorio en tu máquina local:</p>

`mkdir <nombre_del_directorio> `<br>
`cd <nombre_del_directorio> `<br>
`git clone https://github.com/nicolaspj/captchaV1.git` <br>

## 2. Construir y Ejecutar los Contenedores

<p>Utiliza Docker Compose para construir y ejecutar los contenedores:</p>


` $ docker-compose up --build `

<p> Esto hará lo siguiente:</p>
<ul>
     <li>Construirá la imagen del contenedor web utilizando el Dockerfile.</li>
     <li>Levantará un contenedor MySQL con la base de datos.</li>
     <li>Levantará un contenedor phpMyAdmin para administrar la base de datos.</li>
</ul>

## 3. Acceder a la Aplicación

<p>
-Aplicación Web: Accede a http://localhost:5000 en tu navegador.<br>
-phpMyAdmin: Accede a http://localhost:8081 en tu navegador. Usa las siguientes credenciales para iniciar sesión en caso que las pida:<br>
-Servidor: db<br>
-Usuario: root<br>
-Contraseña: rootpassword<br>
</p>

## 4. Detener los Contenedores
Para detener los contenedores, utiliza el siguiente comando:

`$ docker-compose down `

## Configuración del Dockerfile
<h3>El Dockerfile configura un contenedor basado en la imagen php:7.4-apache y realiza las siguientes tareas:</h3>
<p>
Crea el directorio para las sesiones de PHP.
<br>Instala las dependencias necesarias para los captcha.
<br>Copia el código de la aplicación al contenedor.
<br>Copia la fuente TTF al contenedor.
<br>Configura el DocumentRoot de Apache.
<br>Instala las extensiones de PHP necesarias.
<br>Expone el puerto 80 para Apache.
<br>Copia el contenido del directorio html al contenedor.
<br>Configuración del docker-compose.yml
<br>El archivo docker-compose.yml define los servicios necesarios para la aplicación:
</p>
     <ul>
     <li>web: Construye la imagen del contenedor web utilizando el Dockerfile y expone el puerto 5000.</li>
     <li>db: Utiliza la imagen mysql:5.7 y configura la base de datos pdfdb.</li>
     <li>phpmyadmin: Utiliza la imagen phpmyadmin/phpmyadmin para administrar la base de datos.</li>
     <li>Volúmenes : El archivo docker-compose.yml también define un volumen para persistir los datos de la base de datos en db_data.</li>
     <ul>
