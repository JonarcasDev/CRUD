## Cómo intalar el proyecto

- composer install

- npm install

- crear un nuevo archivo con el nombre ".env" luego copiar y pegar en ella el contenido de ".env.example". despues proceda a colocar el comando "php artisan key:generate"

- Importar la base de datos llamada "base-de-datos-prueba.sql" al mysql y nombrarla "prueba_tecnica_dev"

- dentro del archivo ".env" habrá un "DB_DATABASE=" al cual le colocaremos el nombre de la base de datos que es"prueba_tecnica_dev"

- php artisan migrate

- php artisan serve

