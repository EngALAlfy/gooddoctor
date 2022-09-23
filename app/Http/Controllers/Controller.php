<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Funcs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests , Funcs;


    function larafyTable(Request $request, $model, $query, array $filterByRelationName = null, array $filterByName = null)
    {
        $perPage = $request->has('perPage') ? $request->input('perPage') : 5;
        $order = $request->has('order') ? $request->input('order') : 'desc';
        $orderBy = $request->has('orderBy') ? $request->input('orderBy') : 'created_at';

        if ($query != null) {
            $items = $query;
        } else {
            $items = $model::query();
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $items = $items->where('name', 'LIKE', "%$search%");
        }

        $filtersRelation = [];
        if ($filterByRelationName != null) {
            // $filterItems = $model::with($filterBy)
            //     ->get()->pluck($filterBy)->groupBy(function($data){
            //         return $data->id.":".$data->name;
            //     })->keys();

            foreach ($filterByRelationName as $key => $value) {
                $filtersRelation[$value] = $model::select($value . "_id")->with($value)
                    ->groupBy($value . "_id")->get()->pluck($value);
            }


            //dd(json_decode($filterItems));
            if ($request->has('filterByRelation')) {
                $filterByRelation = $request->input('filterByRelation');

                foreach ($filterByRelation as $key => $value) {
                    $items = $items->where($key . "_id", $value);
                }
            }
        }

        session()->flash('filtersRelation', $filtersRelation);
        $items = $items->orderBy($orderBy, $order)->paginate($perPage);
        $request->flash();
        return $items;
    }


}
