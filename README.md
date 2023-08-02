# CRUD em Laravel

## Criando projeto
```
composer create-project laravel/laravel laravel-crud
```

## Configurar acesso ao banco de dados
* deve colocar as credenciais de acesso no .env

### Testando a conexão
```
php artisan tinker
DB::connection()->getPdo();
```
Tem que retornar um PDO:

```
PDO {#6220
    inTransaction: false,
    attributes: {
      CASE: NATURAL,
      ERRMODE: EXCEPTION,
      AUTOCOMMIT: 1,
      PERSISTENT: false,
      DRIVER_NAME: "mysql",
      SERVER_INFO: "Uptime: 345083  Threads: 5  Questions: 397  Slow queries: 0  Opens: 1527  Flush tables: 3  Open tables: 91  Queries per second avg: 0.001",
      ORACLE_NULLS: NATURAL,
      CLIENT_VERSION: "mysqlnd 8.1.10",
      SERVER_VERSION: "8.0.30",
      STATEMENT_CLASS: [
        "PDOStatement",
      ],
      EMULATE_PREPARES: 0,
      CONNECTION_STATUS: "127.0.0.1 via TCP/IP",
      DEFAULT_FETCH_MODE: BOTH,
    },
  }
```

## Criar controller Home
```
php artisan make:controller HomeController
```

## Criar controller User
```
php artisan make:controller UserController --resource
```

## Criar Model
```
php artisan make:model User -m
```

## Seed
Criar
```
php artisan make:seeder UserSeeder
```

Exemplo
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'uuid' => Str::uuid(),
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
```

Executar
```
php artisan db:seed
 
php artisan db:seed --class=UserSeeder
```
```
php artisan migrate:fresh --seed
 
php artisan migrate:fresh --seed --seeder=UserSeeder
```
```
php artisan db:seed --force
```

## Criar request User
```
php artisan make:request UserRequest
```

* Controller (task)
* Model
* Observer (para criar/incrementar UUID)
* tailwind
## Outros comandos
### Recriar todo banco de dados
```
php artisan migrate:fresh
```

### Listar rotas
```
php artisan route:list
```

### Criar observer
```
php artisan make:observer UserObserver --model=User
```
Alterar observer:
```php
namespace App\Observers;

use Illuminate\Support\Str;

use App\Models\User;

class UserObserver
{
    public function creating(User $task)
    {
        $task->uuid = Str::uuid();
    }
}
```
Incluir no app\Providers\AppServiceProvider.php:

```php
...
    use App\Models\User;
    use App\Observers\UserObserver;
    ...
    public function boot(): void
    {
        User::observe(UserObserver::class);
    }
    ...
```
### Criar request
```
php artisan make:request TaskRequest
```

### Instalar laravel collective
```
composer require laravelcollective/html
```
