<?php

namespace App\Traits;

trait MenuTrait
{
    /**
     * Método para gerar os itens do menu dinamicamente.
     *
     * @return array
     */
    public function getModuleMenuItems()
    {
        return [
            ['name' => 'Dashboard', 'url' => route('home')],
            ['name' => 'Users', 'url' => route('users.index')],
        ];
    }
}
