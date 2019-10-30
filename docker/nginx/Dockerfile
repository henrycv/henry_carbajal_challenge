##
## Name: laravel-test-pokeapi
## Author: https://about.me/henrycv
##

FROM nginx:1.16.1

# # Root directory path
# ARG APP_DIR=$APP_DIR

# # Customization of the nginx user and group ids in the image. It's 101:101 in
# # the base image. Here we use 33 which is the user id and group id for www-data
# # on Ubuntu, Debian, etc.
# ARG NGINX_UID=33
# ARG NGINX_GID=33

# # The worker processes in the nginx image run as the user nginx with group
# # nginx. This is where we override their respective uid and guid to something
# # else that lines up better with file permissions.
# # The -o switch allows reusing an existing user id
# RUN usermod -u $NGINX_UID -o nginx && groupmod -g $NGINX_GID -o nginx