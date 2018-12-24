# Build command:
# docker build -f docker/xdebug/Dockerfile -t php-docker-xdebug .
# Run command:
# docker run -td --name php_docker_xdebug php-docker-xdebug
# You can use FROM your own built image
FROM        moriorgames/motba-battle
MAINTAINER  MoriorGames "moriorgames@gmail.com"

# Install xdebug
RUN          pecl install xdebug-beta && docker-php-ext-enable xdebug
