<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Partner;

class Search extends Component
{
    public $searchTerm;
    public $partners;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->partners = Partner::where('name', 'LIKE', $searchTerm)->where('user_id', Auth::id ())->get();
        //$partner_id = Partner::where('id', 'LIKE', $searchTerm)->get();

        return view('livewire.search')/*->with ('user_id', $partner_id)*/;
    }
}
