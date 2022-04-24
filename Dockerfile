FROM php:7.4-apache

WORKDIR /var/www/html
COPY ./src .
RUN ls -la
# chown to help server can write to upload
RUN chown root:www-data /var/www/html/upload  
# add permission for Group also can write
RUN chmod g+w /var/www/html/upload

# enable cgid for apache
RUN a2enmod cgid
# config for run cgi on upload folder
COPY ./upload_cgi.conf /etc/apache2/conf-available/
RUN a2enconf upload_cgi
# RUN service apache2 restart

