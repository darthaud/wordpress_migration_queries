# wordpress_migration_queries

Provides an script that generate sqls for database migrations

## What's inside

* [Nginx](http://nginx.org/)
* [PHP-FPM](http://php-fpm.org/)

## Requirements

* [Docker Engine](https://docs.docker.com/installation/)
* [Docker Compose](https://docs.docker.com/compose/)
* [Dnsmasq](https://help.ubuntu.com/community/Dnsmasq)

## Setup
- Linux (or a VM)
- Get [docker](https://docker.com)
- Get [docker-compose](https://github.com/docker/compose)
- Get dnsmasq (for Ubuntu ```sudo apt-get install dnsmasq```)
- Create a dnsmasq config file:
  - Put the following content in /etc/dnsmasq.d/docker_dns.conf
  ```
  address=/dev/127.0.0.1
  ```
- Run the following comand (only after installing docker)

  ```
  docker run -d -t --restart=always -p 80:80 -v /var/run/docker.sock:/tmp/docker.sock:ro --name=nginx-domain-proxy jwilder/nginx-proxy
  ```

  ```
  docker network create -d bridge my-network
  ```

  ```
  docker network connect my-network nginx-domain-proxy
  ```

- reboot

# Running

```sh
$ docker-compose up
```

## License

Copyright &copy; 2016 [Daniel Dias Branco Arthaud](http://github.com/darthaud). Licensed under the terms of the [MIT license](LICENSE.md).
