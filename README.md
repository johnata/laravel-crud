# CRUD - Laravel

## Git Clone

```bash
git clone git@github.com:johnata/laravel-crud.git
```

## .env

```bash
cp .env.example .env
```

## Configurar acesso ao banco de dados

É recomendado que as credenciais de acesso estejam no .env, exemplo:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel-crud
DB_USERNAME=root
DB_PASSWORD=
```

## Composer

```bash
composer install
```

## Migrate and Seed

```bash
php artisan migrate:fresh --seed
```

## FakeUserSeeder

```bash
php artisan db:seed --class=FakeUserSeeder
```

## Server

```bash
php artisan serve
```

## Principais comandos

Aqui tem os principais comandos para criar um projeto em Laravel

### Criando projeto

```bash
composer create-project laravel/laravel laravel-crud
```

#### Testar a conexão com banco de dados

php artisan tinker
Para testar se as configurações estão corretaa, teste com o tinker:

```bash
php artisan tinker
DB::connection()->getPdo();
```

Tem que retornar um PDO:

```bash
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

### Criar controller

```bash
php artisan make:controller HomeController
```

#### Para criar com os metodos de um CRUD utilize:

```bash
php artisan make:controller UserController --resource
```

Será criado o controller com os métodos:
| Método | Ação | Uso |
|----------------|-----------------------------------|------------------------------------|
| `index()` | Exibir uma lista de recursos | Mostrar todos os usuários. |
| `create()` | Mostrar formulário de criação | Formulário para criar novo usuário. |
| `store()` | Salvar um recurso recém-criado | Processar e salvar os dados do novo usuário. |
| `show($id)` | Exibir um recurso específico | Mostrar detalhes de um usuário específico. |
| `edit($id)` | Mostrar formulário de edição | Formulário para editar um usuário existente. |
| `update($id)` | Atualizar um recurso específico | Processar e salvar mudanças feitas no usuário. |
| `destroy($id)` | Remover um recurso específico | Excluir um usuário. |

### Criar Model

```bash
php artisan make:model User -m
```

### Seed

Criar

```bash
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

```bash
php artisan db:seed

php artisan db:seed --class=UserSeeder
```

```bash
php artisan migrate:fresh --seed

php artisan migrate:fresh --seed --seeder=UserSeeder
```

```bash
php artisan db:seed --force
```

### Criar request User

```bash
php artisan make:request UserRequest
```

-   Controller (task)
-   Model
-   Observer (para criar/incrementar UUID)
-   tailwind

### Outros comandos

#### Recriar todo banco de dados

```bash
php artisan migrate:fresh
```

#### Listar rotas

```bash
php artisan route:list
```

#### Criar observer

```bash
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

#### Criar request

```bash
php artisan make:request TaskRequest
```

#### Instalar laravel collective

```bash
composer require laravelcollective/html
```

### Tailwind CSS

-   https://tailwindcss.com/docs/guides/laravel
