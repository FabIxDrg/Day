<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index() {
        $noticias_leidas = \App\Noticia::where('Estado', '=', 1)->get();
        $noticias_no_leidas = \App\Noticia::where('Estado', '=', 0)->get();

        /*\App\Noticia::where('id', '>', 0)->update([
            'Estado' => 0
        ]);*/
        return view('index', [
            'leidos' => $noticias_leidas,
            'no_leidos' => $noticias_no_leidas
        ]);
    }

    public function leido(Request $request) {
        
        if($request->get('id')){
            \App\Noticia::where('id', '=', $request->get('id'))->update([
                'Estado' => 1
            ]);
        }
       
    }

    public function ver(Request $request) {
        
        if($request->get('id')){
            $noticia = \App\Noticia::where('id', '=', $request->get('id'))->first();
            return response()->json($noticia);
        }
       
    }
}
