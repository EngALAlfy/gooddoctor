<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Install extends Component
{
    public $result = "";
    public $success = false;
    public $error = false;

    protected $listeners = ['createDatabase', 'migrate', 'seed', 'finish'];

    public function render()
    {
        return view('livewire.install');
    }

    function start()
    {
        $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-default-info fade show"> <span class="badge badge-pill badge-info">' . __('all.info') . '</span> <i class="icon fas fa-info"></i>starting the instalation</div>';
        $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-success fade show"> <span class="badge badge-pill badge-success">' . __('all.success') . '</span> <i class="icon fas fa-check"></i>loading data</div>';

        $this->emit('createDatabase');
        $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-success fade show"> <span class="badge badge-pill badge-success">' . __('all.success') . '</span> <i class="icon fas fa-check"></i>creating database</div>';
    }

    function createDatabase()
    {
        try {
            $db_name = env('db_database', 'gooddoctor');

            $charset = config('database.connection.mysql.charset', 'utf8mb4');
            $collection = config('database.connection.mysql.collection', 'utf8mb4_unicode_ci');

            $query = "CREATE DATABASE IF NOT EXISTS $db_name CHARACTER SET $charset COLLATE $collection;";

            DB::connection('mysql_no_db')->statement($query);
            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-success fade show"> <span class="badge badge-pill badge-success">' . __('all.success') . '</span> <i class="icon fas fa-check"></i>database created</div>';
            $this->emit('migrate');
            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-success fade show"> <span class="badge badge-pill badge-success">' . __('all.success') . '</span> <i class="icon fas fa-check"></i>start migrate</div>';

        } catch (Exception $th) {
            $this->error = true;

            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-danger fade show"> <span class="badge badge-pill badge-danger">' . __('all.error') . '</span> <i class="icon fas fa-close"></i>' . $th->getMessage() . '</div>';
        }
    }

    function migrate()
    {
        try {
            Artisan::call('migrate');
            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-default-info fade show"> <span class="badge badge-pill badge-info">' . __('all.info') . '</span> <i class="icon fas fa-info"></i>' . Artisan::output() . '</div>';
            $this->emit('seed');
            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-success fade show"> <span class="badge badge-pill badge-success">' . __('all.success') . '</span> <i class="icon fas fa-check"></i>start seed</div>';
        } catch (Exception $th) {
            $this->error = true;

            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-danger fade show"> <span class="badge badge-pill badge-danger">' . __('all.error') . '</span> <i class="icon fas fa-close"></i>' . $th->getMessage() . '</div>';
        }
    }

    function seed()
    {
        try {
            Artisan::call('db:seed');
            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-default-info fade show"> <span class="badge badge-pill badge-info">' . __('all.info') . '</span> <i class="icon fas fa-info"></i>' . Artisan::output() . '</div>';
            $this->emit('finish');
        } catch (Exception $th) {
            $this->error = true;

            $this->result .= '<div class="m-t-10 sufee-alert alert with-close alert-danger fade show"> <span class="badge badge-pill badge-danger">' . __('all.error') . '</span> <i class="icon fas fa-close"></i>' . $th->getMessage() . '</div>';
        }
    }

    function finish()
    {
        $this->success = true;
        $this->result .= '<a class="btn btn-block btn-success" href="' . route('home') . '">' . __('all.home') . '</a>';
    }
}
