# HUB de transporte (compresion incluida)
- comprecion gracias a "LZ-string"
- almacenamiento gracias a "CROSS STORAGE"
## instalacion en laravel
### requiere
- laravel 5.6
- php 7

ingresar en `composer.json`
```
fge/hub
```
o ingresar en comando
```
composer require fge/hub
```
ingresa en tu terminal
```
composer update
```
registra los servicios en `config/app.php`
- CLIENTE
```
'providers'=>[
  fge/hub/client_sp::class
]
```
- SERVER
```
'providers'=>[
  fge/hub/server_sp::class
]
```
ingresar en terminal
```
php artisan vendor:publish --tag=public --force
```
generara en la carpeta `public` lacarpeta `fge_tok-hub/js/LSCD` y archivos
## espacios de nombre
una vezinstalado el paquete se registraran las siguientes rutas
- en el archivo .env se almacenara la variable con la url de servidor hub `URL_FGE-HUBS`
- en `public` se envontraran los archivos js requeridos para cliente y servidor `fge_tok-hub`
- `fge/tok`se refiere a el espacio de nombre de la API
## EJEMPLO
### URL del servidor
`*8001:fge_tok/hub`
### URL cliente1
`*8001:fge_tok/hubc1`
### URL cliente2
`*8001:fge_tok/hubc2`

<img src="https://i.imgur.com/qYLSrp5.gif">
