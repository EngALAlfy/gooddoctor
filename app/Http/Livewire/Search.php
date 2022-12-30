<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 50;
    public $orderBy = 'order';
    public $order = 'asc';
    public $query = '';


    protected $queryString = [
        'query' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];

    public function updatingQuery()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search', ['appointments' => Appointment::whereRelation('patient' , 'name' , 'LIKE' , '%' . $this->query . '%')->orWhere('id', 'LIKE', '%' . $this->query . '%')->orderBy('date', 'desc')->orderBy($this->orderBy, $this->order)->paginate($this->perPage)]);
    }


}
