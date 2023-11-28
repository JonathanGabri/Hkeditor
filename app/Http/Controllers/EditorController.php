<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{
    // Esta es una función que se encarga de almacenar los datos de una solicitud HTTP
    public function store(Request $request){
        // Esta función muestra todos los datos de la solicitud y termina la ejecución del script
        dd($request->all());
    }

    // Esta es una función se encarga de subir la imagen que insertemos en CKEditor
    public function uploadimage(Request $request) {
    // Esta condicion verifica si la solicitud tiene un archivo llamado 'upload'
    if($request->hasFile('upload')) {
        // Esta variable almacena el nombre original del archivo
        $originName = $request->file('upload')->getClientOriginalName();
        // Esta variable almacena el nombre del archivo sin la extension
        $fileName = pathinfo($originName, PATHINFO_FILENAME);
        // Esta variable almacena la extension del archivo
        $extension = $request->file('upload' )->getClientOriginalExtension();
        // Esta variable almacena el nuevo nombre del archivo, incluye la hora para evitar duplicados
        $fileName = $fileName . '_' . time() . '.' . $extension;

        // Esta funcion mueve el archivo a la carpeta public/media
        $request->file('upload')->move(public_path('media'), $fileName);

        // Esta variable almacena la URL del archivo, que se genera usando la función asset, devuelve la ruta completa del archivo
        $url = asset('media/' . $fileName);
        // Esta función devuelve una respuesta JSON con el nombre del archivo, un indicador de exito y la URL del archivo
        return  response()->json(['fileName' => $fileName, 'uploaded'=>1,'url' =>$url]);

    }
}
}
