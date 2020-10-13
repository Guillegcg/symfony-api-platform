FROM rabbitmq:3-management

ARG UID
EXPOSE $UID

RUN adduser -u ${UID} --disabled-password --gecos "" caitox
RUN mkdir /home/caitox/.ssh
RUN chown -R caitox:caitox /home/caitox/
RUN echo "StrictHostKeyChecking no" >> /home/caitox/.ssh/config
RUN echo "export COLUMNS=300" >> /home/caitox/.bashrc

RUN apt-get update \
    && apt-get install -y vim mc

USER caitox