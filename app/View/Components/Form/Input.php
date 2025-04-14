<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $name,
        public $type = 'text',
        public $label = null,
        public $placeholder = null,
        public $value = null,
        public $class = 'input-class',
        public $required = false
    )
    {
        $this->label = $label ?? ucfirst($name);
        $this->placeholder = $placeholder ?? '';
        $this->required = $required ? 'required' : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
