<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recipes.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {

        $recipe_items = [
            'clinic_name',
            'header_info',
            'footer_info',
            'phone',
            'address',
            'whatsapp',

        ];

        $clinic_name = Setting::find('clinic_name')->value ?? null;
        $header_info = Setting::find('header_info')->value ?? null;
        $address = Setting::find('address')->value ?? null;
        $footer_info = Setting::find('footer_info')->value ?? null;
        $phone = Setting::find('phone')->value ?? null;
        $whatsapp = Setting::find('whatsapp')->value ?? null;
        $logo = Setting::find('logo')->value ?? null;
        $watermark = Setting::find('watermark')->value ?? null;

        // recipe design
        $clinic_name_top_position = Setting::find('clinic_name_top_position')->value ?? 10;
        $header_info_top_position = Setting::find('header_info_top_position')->value ?? 20;
        $address_top_position = Setting::find('address_top_position')->value ?? 80;
        $footer_info_top_position = Setting::find('footer_info_top_position')->value ?? 70;
        $phone_top_position = Setting::find('phone_top_position')->value ?? 60;
        $whatsapp_top_position = Setting::find('whatsapp_top_position')->value ?? 60;
        $logo_top_position = Setting::find('logo_top_position')->value ?? 50;
        $drugs_top_position = Setting::find('drugs_top_position')->value ?? 50;

        $clinic_name_font_size = Setting::find('clinic_name_font_size')->value ?? 100;
        $header_info_font_size = Setting::find('header_info_font_size')->value ?? 140;
        $address_font_size = Setting::find('address_font_size')->value ?? 130;
        $footer_info_font_size = Setting::find('footer_info_font_size')->value ?? 130;
        $phone_font_size = Setting::find('phone_font_size')->value ?? 130;
        $whatsapp_font_size = Setting::find('whatsapp_font_size')->value ?? 130;
        $drugs_font_size = Setting::find('drugs_font_size')->value ?? 130;
        $logo_size = Setting::find('logo_size')->value ?? 50;

        $clinic_name_left_position = Setting::find('clinic_name_left_position')->value ?? 50;
        $header_info_left_position = Setting::find('header_info_left_position')->value ?? 60;
        $address_left_position = Setting::find('address_left_position')->value ?? 70;
        $footer_info_left_position = Setting::find('footer_info_left_position')->value ?? 80;
        $phone_left_position = Setting::find('phone_left_position')->value ?? 90;
        $whatsapp_left_position = Setting::find('whatsapp_left_position')->value ?? 10;
        $logo_left_position = Setting::find('logo_left_position')->value ?? 10;
        $drugs_left_position = Setting::find('drugs_left_position')->value ?? 10;

        $clinic_name_color = Setting::find('clinic_name_color')->value ?? null;
        $header_info_color = Setting::find('header_info_color')->value ?? null;
        $address_color = Setting::find('address_color')->value ?? null;
        $footer_info_color = Setting::find('footer_info_color')->value ?? null;
        $phone_color = Setting::find('phone_color')->value ?? null;
        $whatsapp_color = Setting::find('whatsapp_color')->value ?? null;
        $drugs_color = Setting::find('drugs_color')->value ?? null;

        $clinic_name_font = Setting::find('clinic_name_font')->value ?? null;
        $header_info_font = Setting::find('header_info_font')->value ?? null;
        $address_font = Setting::find('address_font')->value ?? null;
        $footer_info_font = Setting::find('footer_info_font')->value ?? null;
        $phone_font = Setting::find('phone_font')->value ?? null;
        $whatsapp_font = Setting::find('whatsapp_font')->value ?? null;
        $drugs_font = Setting::find('drugs_font')->value ?? null;

        $recipe_template = Storage::disk('public')->url("recipe_templates/1.png");

        return view('recipes.show', compact(
            'recipe',
            'recipe_items',
            'clinic_name',
            'header_info',
            'address',
            'footer_info',
            'phone',
            'whatsapp',

            'clinic_name_top_position',
            'header_info_top_position',
            'address_top_position',
            'footer_info_top_position',
            'phone_top_position',
            'whatsapp_top_position',
            'drugs_top_position',
            'drugs_left_position',
            'clinic_name_left_position',
            'header_info_left_position',
            'address_left_position',
            'footer_info_left_position',
            'phone_left_position',
            'whatsapp_left_position',
            'drugs_color',
            'clinic_name_color',
            'header_info_color',
            'address_color',
            'footer_info_color',
            'phone_color',
            'whatsapp_color',
            'drugs_font',
            'clinic_name_font',
            'header_info_font',
            'address_font',
            'footer_info_font',
            'phone_font',
            'whatsapp_font',
            'drugs_font_size',
            'clinic_name_font_size',
            'header_info_font_size',
            'address_font_size',
            'footer_info_font_size',
            'phone_font_size',
            'whatsapp_font_size',
            'recipe_template',
        ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
