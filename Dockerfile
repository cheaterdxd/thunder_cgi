FROM php:7.4-apache

WORKDIR /var/www/html
COPY ./src .
# chown to help server can write to upload
RUN chown root:www-data /var/www/html/upload 
 
# add permission for Group also can write
RUN chmod g+w /var/www/html/upload

RUN apt-get update
RUN apt-get -y install python3 
RUN apt-get -y install libapache2-mod-python 
# # enable cgid for apache
# RUN a2enmod cgid
# config for run cgi on upload folder
COPY ./python_load.conf /etc/apache2/conf-available/
RUN a2enconf python_load
# RUN service apache2 restart

