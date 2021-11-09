<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;



class MainPage extends Component
{
    public function render()
    {
        return view('livewire.main-page');
    }

    public $name;
    public $email;

    protected $rules = [
        'email' => 'required|email:filter|unique:patients,email',
        'name' => 'required',
    ];


    public function create(){

        $this->validate();

        if (Auth::check()) {
            $patient = Patient::create([
            'name' => $this-> name,
            'email' => $this-> email,
        ]);

        $this->name='';
        $this->email = '';
        session()->flash('message', 'New Patient successfully created.');
    }else {
        session()->flash('message', 'You must login to perform this action.');
    }
    }

}
