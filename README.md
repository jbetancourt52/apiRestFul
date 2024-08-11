<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API RESTful para Gestión de Productos y Categorías en Laravel 🤖

Este proyecto es una API RESTful desarrollada con Laravel, diseñada para facilitar la gestión de productos y categorías en una aplicación. La API permite realizar operaciones CRUD (Crear, Leer, Actualizar y Eliminar) sobre dos entidades principales: productos y categorías.

## Características 

- Gestión de Productos: Permite crear, leer, actualizar y eliminar productos. Cada producto está asociado a una categoría, lo que facilita su organización y filtrado
- Gestión de Categorías: Facilita la creación, lectura, actualización y eliminación de categorías, proporcionando una estructura para organizar los productos.
- Endpoints RESTful: La API está construida siguiendo principios RESTful, ofreciendo una interfaz intuitiva para interactuar con los datos.
- Autenticación: (Opcional) Puede incluir autenticación y autorización para proteger los recursos y garantizar que solo los usuarios autorizados puedan realizar ciertas acciones.

## Tecnologías Utilizadas

- Laravel: Un framework PHP para construir aplicaciones web robustas y escalables.
- MySQL: Sistema de gestión de bases de datos utilizado para almacenar los datos de productos y categorías.
- Composer: Herramienta para gestionar las dependencias de PHP.

## Endpoints de la API

A continuación se detallan los endpoints disponibles en la API, organizados por recurso y método HTTP:

### Productos

| Método HTTP | Endpoint                  | Descripción                                     |
|-------------|---------------------------|-------------------------------------------------|
| GET         | `/api/product`           | Obtiene una lista de productos con opciones de filtrado y paginación |
| GET         | `/api/product/{id}`       | Obtiene un producto específico por ID           |
| POST        | `/api/product`           | Crea un nuevo producto                          |
| PUT         | `/api/product/{id}`       | Actualiza un producto por ID                   |
| DELETE      | `/api/product/{id}`       | Elimina un producto por ID                     |

## Consultas Avanzadas para Productos

El endpoint `/api/product` admite consultas avanzadas para personalizar la respuesta:

### Paginación

Para obtener productos paginados, puedes utilizar los parámetros `page` y `per_page`:

- **Ejemplo**: `/api/product?page=2&per_page=10`

### Filtros

Puedes filtrar productos por nombre y categoría utilizando los parámetros `name` e `id_category`:

- **Ejemplo**: `/api/product?name=galleta&id_category=1`

### Ordenación

Puedes ordenar los productos por diferentes campos utilizando los parámetros `sort_by` y `sort_order`:

- **sort_by**: Campo por el cual ordenar (por ejemplo, `name`, `cost`, `id_category`, `created_at`).
- **sort_order**: Orden de la consulta (`asc` para ascendente o `desc` para descendente).

- **Ejemplo**: `/api/product?sort_by=name&sort_order=asc`

### Crear un nuevo producto

Para crear un nuevo producto, envía una solicitud `POST` al endpoint `/api/product` con el siguiente JSON en el cuerpo de la solicitud:

**Solicitud**

```bash
curl -X POST http://localhost/api/product \
     -H "Content-Type: application/json" \
     -d '{
           "name": "Nuevo Producto",
           "description": "Descripción del nuevo producto",
           "cost": "99.99",
           "quantity": 10,
           "id_category": "1",
           "status": true,
           "date": "2024-08-05"
         }'
```

### Actualizar un producto 

Para Actualizar un producto, envia una solicitud `PUT` al endpoint `api/product/{id}` con el siguiente JSON en el cuerpo de la solicitud:

**Solicitud**

```bash
curl -X PUT http://localhost/api/product/1 \
     -H "Content-Type: application/json" \
     -d '{
           "name": "pepsi",
           "description": "Producto actualizado",
           "cost": "99.99",
           "quantity": 10,
           "id_category": "1",
           "status": true,
           "date": "2024-08-05"
         }'
```
### Eliminar producto ☠️

Para Eliminar un producto, envia una solicitud `DELETE` al endpoint `api/product/{id}` 


### Categorías

| Método HTTP | Endpoint         | Descripción                     |
|-------------|------------------|---------------------------------|
| GET         | `/api/category`  | Obtiene una lista de categorías |
| POST        | `/api/category`  | Crea una nueva categoría        |


## Estructura de la Base de Datos

La base de datos utilizada en este proyecto está compuesta por las siguientes tablas principales:

### Tabla `product`

| Columna      | Tipo          | Descripción                          |
|--------------|---------------|--------------------------------------|
| `id`          | `unsignedBigInteger` | Identificador único del producto (PK) |
| `name`        | `string`       | Nombre del producto                  |
| `cost`        | `decimal`      | Costo del producto                   |
| `id_category` | `unsignedBigInteger` | Identificador de la categoría (FK)  |
| `created_at`  | `timestamp`    | Fecha de creación del producto       |
| `updated_at`  | `timestamp`    | Fecha de la última actualización     |

### Tabla `categories`

| Columna      | Tipo          | Descripción                           |
|--------------|---------------|---------------------------------------|
| `id`          | `unsignedBigInteger` | Identificador único de la categoría (PK) |
| `name`        | `string`       | Nombre de la categoría                |
| `created_at`  | `timestamp`    | Fecha de creación de la categoría     |
| `updated_at`  | `timestamp`    | Fecha de la última actualización      |

### Relaciones

- **Productos y Categorías**: Cada producto está asociado a una categoría a través del campo `id_category`, que es una clave foránea referenciando el campo `id` en la tabla `categories`.
