<?php

namespace App\Http\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Utils
{

    public static function  getModels(): Collection
    {
        $models = collect(File::allFiles(app_path("Models")))
            ->map(function ($item) {
                return Str::snake($item->getFilenameWithoutExtension());
            });

        return $models->values();
    }

    public static function getRoles()
    {
        $models = Utils::getModels();

        $roles = [];

        foreach ($models as $model) {
            if ($model == "patient_card") {
                continue;
            }
            if ($model == "setting") {
                $roles[] = 'change_' . $model;
                $roles[] = 'view_' . $model;
                continue;
            }
            if ($model == "role") {
                $roles[] = 'change_' . $model;
                $roles[] = 'view_' . $model;
                continue;
            }

            $roles[] = 'create_' . $model;
            $roles[] = 'view_' . $model;
            $roles[] = 'delete_' . $model;
        }

        return $roles;
    }
}
