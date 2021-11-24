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
    public function index($idImobille)
    {
        $immobile = Immobile::find($idImobille);
        $photos = Photo::where('immobile_id', $idImobille)->get();

        return view('admin.immobile.photo.index', compact('immobile','photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idImobille)
    {
        $immobile = Immobile::find($idImobille);
        return view('admin.immobile.photo.form', compact('immobile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idImobille)
    {
        //verificando se há foto (nome do input)
        if($request->hasFile('photo')){
            //verificando se houve erro no upload da foto
            if($request->photo->isValid()){
                //armazenando o arquivo no disco publico e retornando a url (caminho) do arquivo
                $photoURL = $request->photo->store("immobiles/$idImobille",'public');
                //store "requisição" metodo comunica-se com o file store do Laravel e armazena
                //'local','disco'

                //armazenando o caminho no bd
                $photo = new Photo();
                $photo->url = $photoURL;
                // chave extrangeira recebe o id o imovel
                $photo->immobile_id = $idImobille;
                $photo->save();

            }
        }

        $request->session()->flash('sucesso','Foto incluida com sucesso');

        return redirect()->route('admin.immobile.photos.index', $idImobille);

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
