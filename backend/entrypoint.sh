#!/usr/bin/env bash
#php artisan migrate --seed
chown -R 33:1000 /var/www
#composer install
chown -R 33:1000 /var/www
tail -f /var/log/nginx/*log &
/usr/bin/supervisord -c /etc/supervisor/supervisord.conf
