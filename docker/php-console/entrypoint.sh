#!/usr/bin/env bash
set -e

# Wait for composer vendor
if [ ! -f vendor/autoload.php ]; then
    echo "Run 'composer install' command to continue."
fi
while [ ! -f vendor/autoload.php ]; do
    sleep 1
done
echo "Composer vendor found, processing."

# Wait for application cache
if [ ! -f var/cache/dev/appDevDebugProjectContainer.php ]; then
    echo "Run './bin/console cache:warmup' command to continue."
fi
while [ ! -f var/cache/dev/appDevDebugProjectContainer.php ]; do
    sleep 1
done
echo "Application cache found, processing."

exec "$@"
