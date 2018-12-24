# Build command:
# docker build -t moriorgames/motba-battle .
# Run command:
# docker run -td --name motba_battle moriorgames/motba-battle
FROM        php:7.3.0-cli-stretch
MAINTAINER  MoriorGames "moriorgames@gmail.com"

# Update and install basic dependencies
RUN         apt-get update && apt-get install -y git vim zip unzip

# Create Application directory
RUN         mkdir -p /app
COPY        . /app
WORKDIR     /app

# Composer variables
ENV         COMPOSER_HOME /app

# Build project
RUN         php /app/phars/composer.phar install --optimize-autoloader

CMD         ["php", "bin/console", "app:move-hero", "aaa-bbb-4cc-ddd", "2", "3"]
