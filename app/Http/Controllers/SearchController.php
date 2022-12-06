<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

use App\Models\Modelo;
use App\Models\Mantenimiento;
use App\Models\Trabajos;
use App\Models\Galery;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $elements = [
                        Modelo::where("title", "LIKE", "%{$request->get('search')}%")->get(),
                        Mantenimiento::where("title", "LIKE", "%{$request->get('search')}%")->get(),
                        Trabajos::where("title", "LIKE", "%{$request->get('search')}%")->get(),
                        Galery::where("title", "LIKE", "%{$request->get('search')}%")->get(),
                    ];
        return view('search', compact('elements', 'request'));
    }
}
