# Prueba Técnica

## Descripción
En esta solución se optó por utilizar el framework de Laravel, ya que facilita tareas como el enrutamiento, la validación y la gestión de endpoints. Se agregó un endpoint como un parámetro opcional en el endpoint de consulta general de productos.

## Requisitos
Para el correcto funcionamiento de este proyecto, es necesario contar con:
- PHP con su CLI instalado. (Version 8.4.0)
- Composer para gestionar las dependencias. (Version 2.8.3)

En caso de no contar con estas herramientas, puedes consultarlas en el siguiente enlace: [Instalación de PHP y Composer](https://laravel.com/docs/10.x)

![Comando instalacion](https://i.ibb.co/b5N3btRk/1.png)

Además, es indispensable tener instalado MySQL para incorporar la base de datos.

## Pasos para ejecutar el proyecto
1. Crear una base de datos nueva en MySQL e importar los datos que se encuentran en el archivo `catalogo-productos.sql`.
2. Ubicar la terminal en el directorio del proyecto actual y ejecutar el comando:
   ```bash
   composer install
   ```
Esto instalará todas las dependencias necesarias.

![Ejemplo dependencias](https://i.ibb.co/whhLBTBM/2.png)

3. Copiar el archivo `.env.example` con el nombre `.env` y modificarlo incluyendo los datos de conexión a la base de datos.

Ejecutar el siguiente comando para iniciar el servidor:
```bash
   php artisan serve
```
El comando mostrará la dirección de las APIs disponibles.

## Comprobación
Para verificar que la ejecución sea satisfactoria, puedes acceder a la ruta `/api/products/1` (partiendo de la URL proporcionada por el servidor). Por ejemplo:

```bash
http://127.0.0.1:8000/api/products/1
```

## Modelo base de datos
![Modelo base de datos](https://i.ibb.co/FbyhF977/3.png)
