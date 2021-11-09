<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class SelectPage extends Component
{
    public function render()
    {
        return view('livewire.select-page');
    }

    public $patientn;

    public function search(){
        $name=$this->patientn;

        $patient=Patient::where('name', '=', $name);

         $id=$patient->id;

        return view ('add-bp');
    }

}
