# Práctica: Hola Mundo en PHP conectado a MySQL con Docker Compose

Aplicación web "Hola Mundo" en PHP que se conecta a una base de datos MySQL. Los dos servicios se levantan con Docker Compose.

## Estructura

```
.
├── docker-compose.yml   # Servicios: app (PHP + Apache) y db (MySQL)
├── Dockerfile           # Imagen de PHP con la extensión pdo_mysql
├── db/
│   └── init.sql         # Crea la tabla "saludos" con un mensaje de prueba
└── src/
    └── index.php        # App Hola Mundo que lee el mensaje de la base de datos
```

## Servicios

| Servicio | Imagen | Puerto | Descripción |
|----------|--------|--------|-------------|
| `app` | `php:8.3-apache` (con pdo_mysql) | 8080 | Servidor de aplicación. `src` se monta en `/var/www/html` |
| `db` | `mysql:8.0` | 3306 | Base de datos `holamundo`. Ejecuta `db/init.sql` al iniciar por primera vez |

La app espera a que MySQL esté listo (healthcheck) antes de arrancar.

## Requisitos

- Docker Desktop instalado y en ejecución.

## Uso

```bash
docker compose up -d --build
```

Abrir http://localhost:8080 en el navegador. Debe mostrar "Hola Mundo", la versión de MySQL y el mensaje leído de la base de datos.

Para detenerlo:

```bash
docker compose down
```

Para detenerlo y borrar también los datos de la base de datos:

```bash
docker compose down -v
```
