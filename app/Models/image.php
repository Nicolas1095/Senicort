if ($request->img){
                if ($request->hasFile('img')) {
                    $fl = $request->img->storeAs($path, $fileName, 'uploads');
                    $estampa = imagecreatefrompng(asset('img/marca_agua.png'));
                    $im = imagecreatefromjpeg(asset('img/uploads/'.date('Y-m-d').'/'.$fileName));

                    $margen_dcho = 10;
                    $margen_inf = 10;
                    $sx = imagesx($estampa);
                    $sy = imagesy($estampa);
                    imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 50);

                    imagewebp($im, 'img/uploads/'.date('Y-m-d').'/'.$fileName, 50);

                    imagedestroy($im);
                    }
            }
