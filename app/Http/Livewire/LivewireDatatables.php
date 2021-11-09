<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;
use illuminate\Support\Str;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;




class LivewireDatatables extends LivewireDatatable
{
    // public function render()
    // {
    //     return view('livewire.livewire-datatables');
    // }
    public $model = Patient::class;
    function columns() {
        return [
            NumberColumn::name('id')->label('ID')->sortBy('id'),
            Column::name('name')->label('Name'),
            Column::name('email')->label('Email'),
        ];
    }

}
