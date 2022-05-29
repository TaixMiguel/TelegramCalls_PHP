# TelegramCalls_PHP
Llamadas vía Telegram con la librería MadelineProto

Aún no es posible realizar llamadas, por eso se envía el contenido como mensaje

# Instalación
Es necesario pasar por http://IP:80/install.php?user=username para grabar una sesión de MadelineProto

# Uso
Se puede realizar una llamada con la url http://IP:80/?user=username&msg=Hola+mundo

# Docker-compose
```
version: "2"

services:
  telegram-call-php:
    image: omikel8/telegram_call_php:latest
    container_name: TelegramCallPHP
    hostname: telegram-call-php
    volumes:
      - ~/docker/telegram-calls-php/resources:/var/www/html/resources/:rw
    restart: always
    network_mode: bridge
    ports:
      - 80:80
```

El dueño de la carpeta `~/docker/telegram-calls-php/resources` debería ser `www-data`.