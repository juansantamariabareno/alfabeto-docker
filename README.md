# alfabeto-docker
Prueba Alfabeto Docker

1. Realice un docker pull a las siguientes imagenes
    - docker pull jsantamariab/php_apache:v1
    - docker pull jsantamariab/basedatos_mysql:v1
    
    Estas imagenes contienen los contenedores del servidor en php con apache y de la base de datos

2. Edite las etiquetas de volumen en el docker-compose.yaml con la ruta en la cual ha clonado este directorio
 ```
    app:
        image: jsantamariab/php_apache:v1
        ports:
        - 9090:80
        volumes:
        - E:/DIR:/var/www/html
    mysql:
        image: jsantamariab/basedatos_mysql:v1
        volumes:
        - E:/DIR/database:/var/lib/mysql
``` 
3. Ejecute el compose
    docker-compose up -d

4. Edite el archivo Config.php para cambiar la variable $NombreServidor el nombre del contenedor dado a la base de datos al momento de subir la imagen

5. Pruebe ingresando a localhost:9090 y envie el parámetro Numero con un número entre en 1 y el 27
    http://localhost:9090/?Numero=28
    
