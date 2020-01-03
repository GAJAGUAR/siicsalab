# SIICSALAB

Sistema de gestión de ensayos para el laboratorio de control de calidad de materiales de [Servicios Integrales de Ingeniería y Calidad, S. A. de C. V.](http://www.siicsa.net)

### Contenido

- [Pre requisitos](#pre-requisitos)
  * [Linux / Ubuntu 18.04 LTS](#linux---ubuntu-1804-lts)
    + [Web Server](#web-server)
    + [MariaDB](#mariadb)

## Pre requisitos

### Linux / Ubuntu 18.04 LTS

Lo primero es actualizar tu distro con los comandos:

```bash
sudo apt-get update
sudo apt-get upgrade
```

Posteriormente reiniciar el equipo.

#### Web Server

Para desarrollo no es necesario instalar [Apache](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04) o [Nginx](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04) ya que si se está utilizando PHP 5.4+ **Laravel** trae por defecto un servidor de desarrollo que se ejecuta usando:

```bash
php artisan serve
```

Con el parámetro `--host 0.0.0.0` puede ser accedido desde cualquier equipo de la red mediante la dirección IP del _host_ en el puerto (por defecto) `8000`, el cual puede ser cambiado con el parámetro `--port=`.

#### MariaDB

Una guía detallada puede ser encontrada [aquí](https://mariadb.com/kb/en/installing-mariadb-deb-files/). Para mejores resultados con paquetes DEB consultar la [Herramienta de Configuración de Repositorio](https://downloads.mariadb.org/mariadb/repositories/), en la que señala que para instalar MariaDB Server en Ubuntu 18.04 LTS es necesario correr:

```bash
sudo apt-get install software-properties-common
sudo apt-key adv --recv-keys --keyserver hkp://keyserver.ubuntu.com:80 0xF1656F24C74CD1D8
sudo add-apt-repository 'deb [arch=amd64,arm64,ppc64el] http://mirror.jaleco.com/mariadb/repo/10.4/ubuntu bionic main'
```

Once the key is imported and the repository added you can install MariaDB 10.4 from the MariaDB repository with:

```bash
sudo apt update
sudo apt install mariadb-server
```

