# Deploy OnlyOffice Document Server using Docker Compose

# Deploy
`docker-compose.yaml`
```yaml
services:
  onlyoffice-documentserver:
    image: onlyoffice/documentserver:8.3.3
    container_name: onlyoffice-documentserver
    ports:
      - "8081:80"
    environment:
      # Uncomment strings below to enable the JSON Web Token validation.
      - JWT_ENABLED=true
      - JWT_SECRET=secret
      - JWT_HEADER=Authorization
      - JWT_IN_BODY=true
    volumes:
      - ./app/onlyoffice/DocumentServer/logs:/var/log/onlyoffice  
      - ./app/onlyoffice/DocumentServer/data:/var/www/onlyoffice/Data  
      - ./app/onlyoffice/DocumentServer/lib:/var/lib/onlyoffice 
      - ./app/onlyoffice/DocumentServer/rabbitmq:/var/lib/rabbitmq 
      - ./app/onlyoffice/DocumentServer/redis:/var/lib/redis 
      - ./app/onlyoffice/DocumentServer/db:/var/lib/postgresql
    restart: always
    stdin_open: true
```

1. create directory inside docker-compose.yaml file located
```bash
sudo mkdir -p ./app/onlyoffice/DocumentServer
sudo chmod -R 777 ./app/onlyoffice/DocumentServer
```

2. run docker compose
```bash
docker compose up -d
# or
docker-compose up -d
```

3. Wait arround 10-15 second, and then enter the container TTY
```bash
docker exec -it onlyoffice-documentserver bash
# or using sh
docker exec -it onlyoffice-documentserver /bin/sh
```

4. Update secure link
```bash
documentserver-update-securelink.sh
```

5. Test the nginx configuration
```bash
nginx -t
```

If configuration is correct the result should be these
```txt
nginx: the configuration file /etc/nginx/nginx.conf syntax is ok
nginx: configuration file /etc/nginx/nginx.conf test is successful
```

6. Restart the nginx service
```bash
service nginx restart
```

7. Restart onlyoffice document server service
```bash
supervisorctl restart all
```

---
### Optional for public access or remote access using domain
1. edit the ds.conf
```bash
nano /etc/nginx/conf.d/ds.conf
```

```txt
include /etc/nginx/includes/http-common.conf;
server {
  listen 0.0.0.0:80;
  listen [::]:80 default_server;
  server_tokens off;
  server_name yourdomain.com; # adjust to your domain

  set $secure_link_secret piFS6dtL1PKoHyfCjr04;
  include /etc/nginx/includes/ds-*.conf;
}
```

2. edit documentserver/default.json
```bash
nano /etc/onlyoffice/documentserver/local.json
```

find this section
```json
    ...
     "token": {
        "enable": {
          "request": {
            "inbox": true, # set this to be true
            "outbox": true # set this to be true
          },
          "browser": true # set this to be true
        },
    ...
```

3. Test nginx configuration
```bash
nginx -t
```

4. Restart the nginx service
```bash
service nginx restart
```

5. Update secure link
```bash
documentserver-update-securelink.sh
```

6. Restart onlyoffice document server service
```bash
supervisorctl restart all
```