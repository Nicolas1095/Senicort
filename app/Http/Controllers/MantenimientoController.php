<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::latest('updated_at')->paginate();
        return view('mantenimiento', compact('mantenimientos'));
    }
    public function description(Mantenimiento $element)
    {
        $routeName='mantenimiento';
        return view('cortinas.description', compact('element', 'routeName'));
    }
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'img' => 'required',
        ],[
            'title.required' => 'El elemento necesita un titulo',
            'img.required' => 'El elemento necesita una imagen',
        ]);


        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img')->getClientOriginalExtension());
        $uploadPath = Config::get('filesystems.disk.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
        $fileName = date('Y-m-d-h-m-s').'-'.$name.'.';

        $url = Str::slug($request->get('title'), '-');

        $mantenimiento = new Mantenimiento;
        $mantenimiento->title = $request->get('title');
        $mantenimiento->description = $request->get('ckeditor');
        $mantenimiento->url = $url;
        $mantenimiento->img = $fileName."webp";
        $mantenimiento->pathImg = date('Y-m-d');

        if ($mantenimiento->save()) {
            if ($request->hasFile('img')) {
                $fl = $request->img->storeAs($path, $fileName.$fileExt, 'uploads');

                $estampa = imagecreatefrompng(asset('img/marca_agua.png'));
                $im = imagecreatefromjpeg(asset('img/uploads/'.date('Y-m-d').'/'.$fileName.$fileExt));

                $margen_dcho = 10;
                $margen_inf = 10;
                $sx = imagesx($estampa);
                $sy = imagesy($estampa);
                imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 50);

                imagewebp($im, 'img/uploads/'.date('Y-m-d').'/'.$fileName."webp", 40);

                imagedestroy($im);
            }
            return redirect()->back()->with('message', 'El elemento se creo correctamente');
        }
    }
    public function update(Mantenimiento $element, Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'El elemento necesita un titulo',
        ]);


        if ($request->img){
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $uploadPath = Config::get('filesystems.disk.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
            $fileName = date('Y-m-d-h-m-s').'-'.$name.'.';
            $pathImg = date('Y-m-d');
            File::delete('img/uploads/'.$element->pathImg.'/'.$element->img);
        }
        else{
            $fileName = $element->img;
            $pathImg = $element->pathImg;
        }

        $url = Str::slug($request->get('title'), '-');
        $element->update([
            'title' => request('title'),
            'description' => request('ckeditor'),
            'url' => $url,
            'img' => $fileName."webp",
            'pathImg' => $pathImg,
        ]);
        if ($element->update()) {
            if ($request->img){
                if ($request->hasFile('img')) {
                    $fl = $request->img->storeAs($path, $fileName.$fileExt, 'uploads');
                    $estampa = imagecreatefrompng(asset('img/marca_agua.png'));
                    $im = imagecreatefromjpeg(asset('img/uploads/'.date('Y-m-d').'/'.$fileName.$fileExt));

                    $margen_dcho = 10;
                    $margen_inf = 10;
                    $sx = imagesx($estampa);
                    $sy = imagesy($estampa);
                    imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 50);

                    imagewebp($im, 'img/uploads/'.date('Y-m-d').'/'.$fileName."webp", 40);

                    imagedestroy($im);
                    }
            }
            return redirect()->back()->with('message', 'El elemento se actualizo correctamente');
        }
    }
    public function delete(Mantenimiento $element, Request $request)
    {
        $pathImg = $element->pathImg;
        $fileName = $element->img;
        File::delete('img/uploads/'.$pathImg.'/'.$fileName);
        $element->delete();
        return redirect("mantenimiento")->with('message', 'El elemento se elimino correctamente');
    }
}
