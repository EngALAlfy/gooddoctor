<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Settings extends Component
{
    public $tab = "app";

    public $fixed_navbar;
    public $dark_mode;
    public $delete_dialog;
    public $daily_backup;
    public $collaps_sidebar;
    public $font;
    public $notification_sound;

    public $appointment_expected_time;
    public $age_unit;
    public $start_time;
    public $appointment_expected_time_unit;

    public $clinic_name;
    public $header_info;
    public $address;
    public $footer_info;
    public $phone;
    public $whatsapp;
    public $logo;

    public $watermark;

    public function mount()
    {
        $this->daily_backup = filter_var(Setting::find('daily_backup')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->delete_dialog = filter_var(Setting::find('delete_dialog')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->dark_mode = filter_var(Setting::find('dark_mode')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->fixed_navbar = filter_var(Setting::find('fixed_navbar')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->collaps_sidebar = filter_var(Setting::find('collaps_sidebar')->value ?? 0, FILTER_VALIDATE_BOOLEAN);
        $this->font = Setting::find('font')->value ?? 'sans-serif';
        $this->notification_sound = Setting::find('notification_sound')->value ?? 'no_sound';
        $this->appointment_expected_time_unit = Setting::find('appointment_expected_time_unit')->value ?? 'minute';
        $this->age_unit = Setting::find('age_unit')->value ?? 'year';
        $this->start_time = Setting::find('start_time')->value ?? '12:15:00';
        $this->appointment_expected_time = Setting::find('appointment_expected_time')->value ?? 30;

        $this->clinic_name = Setting::find('clinic_name')->value ?? null;
        $this->header_info = Setting::find('header_info')->value?? null;
        $this->address = Setting::find('address')->value?? null;
        $this->footer_info = Setting::find('footer_info')->value?? null;
        $this->phone = Setting::find('phone')->value?? null;
        $this->whatsapp = Setting::find('whatsapp')->value?? null;
        $this->logo = Setting::find('logo')->value?? null;
        $this->watermark = Setting::find('watermark')->value?? null;

    }

    public function updated($name, $value)
    {
        $setting = Setting::find($name);
        if ($setting) {
            $setting->update(['value' => $value, 'user_id' => Auth::user()->id]);
        } else {
            $setting = Setting::create(['key' => $name,'value' => $value, 'user_id' => Auth::user()->id]);
        }
    }

    public function render()
    {
        return view('livewire.settings');
    }
}
