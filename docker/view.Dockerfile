FROM node:lts-alpine
WORKDIR /var/www/src
EXPOSE 5173
ENTRYPOINT [ "npm",  "--ignore-platform-reqs"]
