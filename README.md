# Directorio de usuarios

Prueba desarrollador php

## Getting Started

Estas instrucciones le proporcionarán una copia del proyecto en funcionamiento en su máquina local. Consulte la implementación para obtener notas sobre cómo implementar el proyecto en un entorno.

### Prerequisitos

Debe contat contar con un servidor web como apache o nginx, que cuente con version de php 7.1 o superior, mysql server en sus ultimas versiones.

### Instalación

Una vez clone este repositorio, crear un archivo ".env" y proporcione su configuración.

DATABASE_DRIVER=mysql
DATABASE_HOST=localhost
DATABASE_NAME=user_directory
DATABASE_USER=root
DATABASE_PASSWORD=

CUSTOMER_DATA_ENDPOINT=http://www.mocky.io/v2/5d9f39263000005d005246ae
COUNTRY_DATA_ENDPOINT=https://restcountries.eu/rest/v2/all

En la raiz del proyecto desde una terminal ejecutar "php install.php", este instalara las dependencias de composer y poblara la base de datos con paises y contactos del api dada.

## Corriendo

Desde la terminal ejecutar "php -S localhost:8000" u otro puerto que este disponible. Una vez ejecute correctamente ingresar a localhost:8000 desde su navegador.

## Authors

* **Cristian Paez** - (https://github.com/khryzpaez)

## License

This project is licensed under the MIT License

