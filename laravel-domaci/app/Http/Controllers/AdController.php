<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::all();
        return $ads;
    }

    public function show(Ad $ad)
    {
        // $ad = Ad::find($id);
        return new AdResource($ad);
    }
}