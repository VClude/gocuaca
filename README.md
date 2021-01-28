## Instalasi :
- PHP 7.4 required + MySQL 5.6+ / MariaDB 10.4+
- git clone https://github.com/VClude/gocuaca.git
- cd gocuaca
- composer install
- php artisan key:generate
- import db data2.sql ke MySQL
- copy .env.example ke .env
- masukin db user password database
- tambah 1 variable API_WEATHER di .env
- php artisan serve / akses http://{address}/gocuaca/public/