<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Funcs;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
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


    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => ''],
        'order' => ['except' => ''],
        'orderBy' => ['except' => ''],
    ];


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.users', ['users' => User::where('id', $this->search)->orWhere('name', 'like', '%' . $this->search . '%')->orderBy($this->orderBy, $this->order)->paginate($this->perPage)]);
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    function delete()
    {

        $user = User::find($this->deleteId);
        
        // if ($user()->email == "admin") {
        //     $this->error("all.cannot_delete_the_main_admin");
        //     $this->deleteId = null;
        //     return;
        // }


        if (User::count() <= 1) {
            $this->error("all.cannot_delete_last_user");
            $this->deleteId = null;
            return;
        }

        $user->delete();

        $this->success();

        $this->deleteId = null;
    }
}
