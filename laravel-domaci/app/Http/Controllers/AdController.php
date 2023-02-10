<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use Database\Seeders\AdSeeder;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::all();
        return AdResource::collection($ads);
    }

    public function show($id)
    {
        $ad = Ad::find($id);
        return $ad;
    }

    public function store(Request $request)
    {
        $ad = Ad::create([
            'id' => $request->id,
            'naslov' => $request->naslov,
            'cena' => $request->cena,
            'opis' => $request->opis,
            'pregledi' => $request->pregledi,
            'type_id' => $request->type_id,
            'user_id' => $request->user_id
        ]);
        return $ad;
    }

    public function destroy($ad_id)
    {
        Ad::destroy($ad_id);
    }

    public function update($ad_id, Request $request)
    {
        $ad = Ad::find($ad_id);
        foreach ($request->all() as $key => $value) {
            $ad[$key] = $value;
        }
        $ad->save();
        return $ad;
        
    }
}