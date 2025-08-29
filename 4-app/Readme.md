# Ejemplo de docker-compose con Dockerfile para una app MVC
Ejecutamos el primer comando para construir el contenedor y usando el modo detach lo dejamos en segundo plano:
```bash
docker-compose up --build -d
```
En caso de querer detener el compose y que se borren los contenedores podemos ejecutar:
```bash
docker-compose down -v
```
Para levantar el contenedor, sin cambios:
```bash
docker-compose up -d
```
En caso de querer detener el compose:
```bash
docker-compose down
```