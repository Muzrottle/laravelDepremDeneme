<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Donations;

class HomeComponent extends Component
{
    public $showModal = false;

    public function showModal()
    {
        $this->showModal = true;
    }

    public function render()
    {
        $donations = Donations::all();

        return view('livewire.home-component',['donations'=> $donations])->layout('layouts.base');
    }
}
