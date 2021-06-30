FROM nginx:latest

RUN useradd -m -s /bin/bash -u 1000 meidaimae && \
#nginx.conf
sed -i 's/user\ \ nginx\;/user\ \ meidaimae\;/g' /etc/nginx/nginx.conf

ADD ./vhost.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www
