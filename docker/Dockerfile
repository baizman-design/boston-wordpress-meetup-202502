FROM alpine:3.19

LABEL org.opencontainers.image.description="A container to deploy WordPress assets using WP CLI."

RUN apk update
RUN apk upgrade
RUN apk add --no-cache php82 php82-phar php82-mbstring php82-openssl openssh git curl bash zip php82-curl php82-simplexml php82-dom php82-tokenizer php82-xml php82-xmlwriter nodejs npm

# create (if needed) and change into /usr/local/bin.
WORKDIR /usr/local/bin

# download wp cli.
RUN wget -q -O wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar

# enable execute permission.
RUN chmod +x wp

ENTRYPOINT ["/bin/sh"]
