<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class RecipeDesign extends Component
{

    public $clinic_name;
    public $header_info;
    public $address;
    public $footer_info;
    public $phone;
    public $whatsapp;
    public $logo;
    public $drugs;

    public $watermark;

    // recipe design
    public $recipe_design_current_card_settings = 'clinic_name_settings';

    public $clinic_name_top_position;
    public $header_info_top_position;
    public $address_top_position;
    public $footer_info_top_position;
    public $phone_top_position;
    public $whatsapp_top_position;
    public $logo_top_position;
    public $drugs_top_position;

    public $clinic_name_left_position;
    public $header_info_left_position;
    public $address_left_position;
    public $footer_info_left_position;
    public $phone_left_position;
    public $whatsapp_left_position;
    public $logo_left_position;
    public $drugs_left_position;

    public $clinic_name_font_size;
    public $header_info_font_size;
    public $address_font_size;
    public $footer_info_font_size;
    public $phone_font_size;
    public $whatsapp_font_size;
    public $logo_size;
    public $drugs_font_size;

    public $clinic_name_color;
    public $header_info_color;
    public $address_color;
    public $footer_info_color;
    public $phone_color;
    public $whatsapp_color;
    public $drugs_color;

    public $clinic_name_font;
    public $header_info_font;
    public $address_font;
    public $footer_info_font;
    public $phone_font;
    public $whatsapp_font;
    public $drugs_font;

    public $recipe_template;

    public $recipe_items;


    function mount(){

        $this->recipe_items = [
            'clinic_name' ,
            'header_info',
            'footer_info',
            'phone',
            'address',
            'whatsapp',
            'drugs',
        ];

        $this->clinic_name = Setting::find('clinic_name')->value ?? null;
        $this->header_info = Setting::find('header_info')->value?? null;
        $this->address = Setting::find('address')->value?? null;
        $this->footer_info = Setting::find('footer_info')->value?? null;
        $this->phone = Setting::find('phone')->value?? null;
        $this->whatsapp = Setting::find('whatsapp')->value?? null;
        $this->logo = Setting::find('logo')->value?? null;
        $this->watermark = Setting::find('watermark')->value?? null;
        $this->drugs = "R\ Drug 1 <br/>R\ Drug 2 <br/>R\ Drug 3 <br/>R\ Drug 4 <br/>";

        // recipe design
        $this->clinic_name_top_position = Setting::find('clinic_name_top_position')->value ?? 10;
        $this->header_info_top_position = Setting::find('header_info_top_position')->value?? 20;
        $this->address_top_position = Setting::find('address_top_position')->value?? 80;
        $this->footer_info_top_position = Setting::find('footer_info_top_position')->value?? 70;
        $this->phone_top_position = Setting::find('phone_top_position')->value?? 60;
        $this->whatsapp_top_position = Setting::find('whatsapp_top_position')->value?? 60;
        $this->logo_top_position = Setting::find('logo_top_position')->value?? 50;
        $this->drugs_top_position = Setting::find('drugs_top_position')->value?? 500;

        $this->clinic_name_font_size = Setting::find('clinic_name_font_size')->value ?? 100;
        $this->header_info_font_size = Setting::find('header_info_font_size')->value?? 140;
        $this->address_font_size = Setting::find('address_font_size')->value?? 130;
        $this->footer_info_font_size = Setting::find('footer_info_font_size')->value?? 130;
        $this->phone_font_size = Setting::find('phone_font_size')->value?? 130;
        $this->whatsapp_font_size = Setting::find('whatsapp_font_size')->value?? 130;
        $this->logo_size = Setting::find('logo_size')->value?? 50;
        $this->drugs_font_size = Setting::find('drugs_font_size')->value?? 50;

        $this->clinic_name_left_position = Setting::find('clinic_name_left_position')->value ?? 50;
        $this->header_info_left_position = Setting::find('header_info_left_position')->value?? 60;
        $this->address_left_position = Setting::find('address_left_position')->value?? 70;
        $this->footer_info_left_position = Setting::find('footer_info_left_position')->value?? 80;
        $this->phone_left_position = Setting::find('phone_left_position')->value?? 90;
        $this->whatsapp_left_position = Setting::find('whatsapp_left_position')->value?? 10;
        $this->logo_left_position = Setting::find('logo_left_position')->value?? 10;
        $this->drugs_left_position = Setting::find('drugs_left_position')->value?? 10;

        $this->clinic_name_color = Setting::find('clinic_name_color')->value ?? null;
        $this->header_info_color = Setting::find('header_info_color')->value?? null;
        $this->address_color = Setting::find('address_color')->value?? null;
        $this->footer_info_color = Setting::find('footer_info_color')->value?? null;
        $this->phone_color = Setting::find('phone_color')->value?? null;
        $this->whatsapp_color = Setting::find('whatsapp_color')->value?? null;
        $this->drugs_color = Setting::find('drugs_color')->value?? null;

        $this->clinic_name_font = Setting::find('clinic_name_font')->value ?? null;
        $this->header_info_font = Setting::find('header_info_font')->value?? null;
        $this->address_font = Setting::find('address_font')->value?? null;
        $this->footer_info_font = Setting::find('footer_info_font')->value?? null;
        $this->phone_font = Setting::find('phone_font')->value?? null;
        $this->whatsapp_font = Setting::find('whatsapp_font')->value?? null;
        $this->drugs_font = Setting::find('drugs_font')->value?? null;

        $this->recipe_template = Storage::disk('public')->url("recipe_templates/1.png");
    }

    public function render()
    {
        return view('livewire.recipe-design');
    }

    public function updated($name, $value)
    {
        if($name == "recipe_design_current_card_settings"){
            return;
        }

        $setting = Setting::find($name);
        if ($setting) {
            $setting->update(['value' => $value, 'user_id' => Auth::user()->id]);
        } else {
            $setting = Setting::create(['key' => $name,'value' => $value, 'user_id' => Auth::user()->id]);
        }
    }
}
