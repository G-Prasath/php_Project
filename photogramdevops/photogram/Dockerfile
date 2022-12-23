FROM ubuntu:latest
ARG DEBIAN_FRONTEND=nonintractive
RUN apt update  -y
RUN apt upgrade -y
RUN apt install apache2 -y
RUN apt install -y php libapache2-mod-php php-mysql
RUn apt install -y nano git 
RUN rm /var/www/html/index.html
COPY ./data/ /var/www/html/
# VOLUME ["/var/www/html"]
CMD 
