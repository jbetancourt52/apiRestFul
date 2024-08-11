<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API RESTful para Gestión de Productos y Categorías en Laravel

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
| GET         | `/api/products`           | Obtiene una lista de productos con opciones de filtrado y paginación |
| GET         | `/api/products/{id}`       | Obtiene un producto específico por ID           |
| POST        | `/api/products`           | Crea un nuevo producto                          |
| PUT         | `/api/products/{id}`       | Actualiza un producto por ID                   |
| DELETE      | `/api/products/{id}`       | Elimina un producto por ID                     |

## Consultas Avanzadas para Productos

El endpoint `/api/products` admite consultas avanzadas para personalizar la respuesta:

### Paginación

Para obtener productos paginados, puedes utilizar los parámetros `page` y `per_page`:

- **Ejemplo**: `/api/products?page=2&per_page=10`

### Filtros

Puedes filtrar productos por nombre y categoría utilizando los parámetros `name` e `id_category`:

- **Ejemplo**: `/api/products?name=galleta&id_category=1`

### Ordenación

Puedes ordenar los productos por diferentes campos utilizando los parámetros `sort_by` y `sort_order`:

- **sort_by**: Campo por el cual ordenar (por ejemplo, `name`, `cost`, `id_category`, `created_at`).
- **sort_order**: Orden de la consulta (`asc` para ascendente o `desc` para descendente).

- **Ejemplo**: `/api/products?sort_by=name&sort_order=asc`



### Categorías

| Método HTTP | Endpoint         | Descripción                     |
|-------------|------------------|---------------------------------|
| GET         | `/api/category`  | Obtiene una lista de categorías |
| POST        | `/api/category`  | Crea una nueva categoría        |


