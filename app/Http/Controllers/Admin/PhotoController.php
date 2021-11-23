<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Immobile;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($immobileId)
    {
        $immobile = Immobile::find($immobileId);
        $photos = Photo::where('immobileId', $immobileId)->get();

        return view('admin.immobile.photo.index', compact('immobile','photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($immobileId)
    {
        $immobile = Immobile::find($immobileId);
        return view('admin.immobile.photo.form', compact('immobile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $immobileId)
    {
        //verificando se há foto (nome do input)
        if($request->hasFile('photo')){
            //verificando se houve erro no upload da foto
            if($request->photo->isValid()){
                //armazenando o arquivo no disco publico e retornando a url (caminho) do arquivo
                $photoURL = $request->photo->store("immobiles/$immobileId",'public');
                //store "requisição" metodo comunica-se com o file store do Laravel e armazena
                //'local','disco'

                //armazenando o caminho no bd
                $photoURL = new Photo();
                $photo->url = $photoURL;
                $photo->immobile_id = $immobileId;

                return view('admin.immobile.photo.index', compact(''));

            }
        }
        dd('upload ok?');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
