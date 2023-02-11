<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'naslov' => 'required|string|max:40',
            'cena' => 'required',
            'opis' => 'required|string|max:100',
            'pregledi' => 'required',
            'type_id' => 'required',


        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $ad = Ad::create([
            'id' => $request->id,
            'naslov' => $request->naslov,
            'cena' => $request->cena,
            'opis' => $request->opis,
            'pregledi' => $request->pregledi,
            'type_id' => $request->type_id,
            'user_id' => Auth::user()->id
        ]);
        //return $ad;
        return response()->json(['Ad is created successfully!', new AdResource($ad)]);
    }

    public function destroy($ad_id)
    {
        Ad::destroy($ad_id);
        return response()->json('Ad is deleted successfully!');
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