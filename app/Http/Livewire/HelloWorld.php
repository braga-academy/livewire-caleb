<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Jelly';
    public $loud = false;
    public $greeting = ['Hello'];
    public $names = ['Jelly', 'Man', 'Chico'];

    public function resetName($name = 'Chico')
    {
        $this->name = $name;
    }

    public function mount(Request $request, $name)
    {
        $this->name = $request->input('name', $name);
    }

    public function hydrate()
    {
        $this->name = 'hydrated';
    }

    public function updatedName()
    {
        $this->name = strtoupper($this->name);
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
