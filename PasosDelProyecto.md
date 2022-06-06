# LARAVEL - JETSTREAM - INERTIA - VUE

Para usar el instalador de Laravel ejecutamos lo siguiente:

```bash
$ composer global require laravel/installer
```

Una vez habilitado el instalador de laravel, vamos a poder instalarlo de la siguiente manera

* para que se instale laravel con Jetstream Inertia y Vue:

    ```bash
    $ laravel new nombre_proyecto --jet
        [0] Livewire
        [1] Inertia
    ```

_Seleccionamos la opcion "1"_

Ahora esperamos a que se instale.

Una vez instalado, probablemente debamos instalar las librerias de javascript que se van a utilizar
y a dejar funcional el proyecto, para esto el comando que vamos a ejecutar es:

```bash
$ npm install && npm run dev
```

Una vez instaladas las librerias, vamos a crear nuestro primer modelo con el siguiente comando:

```bash
$ php artisan make:model Note -rfm
```

Con este comando obtendremos una respuesta parecida a la siguiente:

```bash
Model created successfully.
Factory created successfully.
Created Migration: 2022_02_09_223823_create_notes_table
Controller created successfully.
```

Configuramos la migracion **_"2022_02_09_223823_create_notes_table"_** para que se generen los campos de la siguiente manera:

```php
Schema::create('notes', function (Blueprint $table) {
    $table->id();
    $table->string('excerpt');
    $table->text('content');
    $table->timestamps();
});
```

Una vez configurada la migracion, vamos a configurar el Factory de Note de la siguiente manera:
En el metodo "definition()" colocamos:

```php
return [
    'excerpt' => $this->faker->text(140),
    'content' => $this->faker->text(1200)
];
```

Por ultimo, configuramos el seeder de la siguiente manera:
En el archivo DatabaseSeeder.php, primero agregamos los modelos que vamos a usar

##### DatabaseSeeder.php

```php
use \App\Models\User;
use \App\Models\Note;
```

Y luego el metodo "run()" lo configuramos de la siguiente manera:

```php
User::factory()->create([
    'name' => 'Raul Chauvin',
    'email' => 'raul@buhoo.ec',
    'password' => bcrypt('12345678')
]);
Note::factory(30)->create();
```

De esa manera se creara un usuario con los datos antes ingresados, y 30 notas con datos aleatorios

Por ultimo, configuramos las credenciales a una base de datos en el archivo .env, y ejecutamos el
siguiente comando para crear las tablas y llenarlas de informacion:

```bash
$ php artisan migrate --seed
```

