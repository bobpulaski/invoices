<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Partner;

class Search extends Component
{
    public $searchTerm;
    public $partners;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->partners = Partner::where('id', 'LIKE', $searchTerm)->get();
        return view('livewire.search');
    }
}
