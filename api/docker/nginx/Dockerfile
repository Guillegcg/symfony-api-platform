FROM nginx:1.19

ARG UID
EXPOSE ${UID}

RUN adduser -u ${UID} --disabled-password --gecos "" caitox

COPY default.conf /etc/nginx/conf.d/