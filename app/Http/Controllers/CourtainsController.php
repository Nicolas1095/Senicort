<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

use Illuminate\Http\Request;

use App\Models\Modelo;
use App\Models\Courtain;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use DB;

class CourtainsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Modelo::latest('updated_at')->Paginate();
        return view('cortinas.modelos', compact('models'));
    }
    public function description(Modelo $element)
    {
        $routeName='modelos';
        return view('cortinas.description', compact('element', 'routeName'));
    }
    public function store(Request $request)
    {
        $fields = request()->validate([
            'title' => 'required',
            'img' => 'required',
        ],[
            'img.required' => 'El modelo necesita una imagen',
            'title.required' => 'El modelo necesita un titulo',
        ]);

        $path = '/'.date('Y-m-d');
        $fileExt = trim($request->file('img')->getClientOriginalExtension());
        $uploadPath = Config::get('filesystems.disk.uploads.root');
        $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
        $fileName = date('Y-m-d-h').'-'.$name.'.';

        $url = Str::slug($request->get('title'), '-');

        $modelo = new Modelo;
        $modelo->title = $request->get('title');
        $modelo->url = $url;
        $modelo->img = $fileName."webp";
        $modelo->pathImg = date('Y-m-d');

        if ($modelo->save()) {
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
            return redirect()->route("cortinas.description", $modelo->url)->with("message","El modelo se creo con exito");
        }
    }
    public function update(Modelo $model, Request $request)
    {
        $fields = $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'El modelo necesita un titulo',
        ]);

        if ($request->img){
            $path = '/'.date('Y-m-d');
            $fileExt = trim($request->file('img')->getClientOriginalExtension());
            $uploadPath = Config::get('filesystems.disk.uploads.root');
            $name = Str::slug(str_replace($fileExt, '', $request->file('img')->getClientOriginalName()));
            $fileName = date('Y-m-d-h').'-'.$name.'.';
            $pathImg = date('Y-m-d');
            File::delete('img/uploads/'.$model->pathImg.'/'.$model->img);
        }
        else{
            $fileName = $model->img;
            $pathImg = $model->pathImg;
        }


        $url = Str::slug($request->get('title'), '-');

        $model->update([
            'title' => $request->get('title'),
            'description' => $request->get('ckeditor'),
            'url' => $url,
            'img' => $fileName."webp",
            'pathImg' => $pathImg,
        ]);
        if ($model->update()) {
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
            return redirect()->back()->with('message', 'El modelo se actualizo correctamente');
        }
    }
    public function delete(Modelo $model, Request $request)
    {
        $pathImg = $model->pathImg;
        $fileName = $model->img;
        File::delete('img/uploads/'.$pathImg.'/'.$fileName);
        $model->delete();
        return redirect()->route("cortinas.modelos")->with('message', 'El modelo se elimino correctamente');
    }
}
