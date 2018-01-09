FROM nexylan/php-dev:7.1-alpine

COPY entrypoint.sh /
RUN chmod u+x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

WORKDIR /code

CMD ["tail", "-f", "/dev/null"]
