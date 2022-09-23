<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class Recipes extends Component
{
    use Funcs;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 50;
    public $orderBy = 'created_at';
    public $order = 'desc';
    public $search = '';

    public $deleteId;

    // settings
    public $delete_dialog;


    protected $listeners = ['stored'];

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];


    public function stored(){
        $this->success();
        //$this->render();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.recipes' , ['recipes' => Recipe::with('patient' , 'appointment')->where('id',  $this->search)->orderBy($this->orderBy , $this->order)->paginate($this->perPage)]);
    }

    function deleteId($id){
        $this->deleteId = $id;
    }

    function delete(){
        Recipe::find($this->deleteId)->delete();
        $this->success();
        $this->deleteId = null;
    }
}
