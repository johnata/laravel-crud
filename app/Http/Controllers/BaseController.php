<?php

namespace App\Http\Controllers;

use App\Traits\MenuTrait;
use Illuminate\Support\Facades\Log;

class BaseController extends Controller
{
    use MenuTrait;

    /**
     * Construtor da classe BaseController.
     * Este construtor é chamado em todas as classes que estendem BaseController.
     * Ele carrega a tradução do menu para ser acessada em todas as views.
     *
     * @return void
     */
    public function __construct()
    {
        Log::info('BaseController __construct chamado');
        // Carregar a tradução do menu para ser acessada em todas as views
        view()->share('modulesMenu', $this->getModuleMenuItems()); // Compartilha a tradução com todas as views
    }
}
