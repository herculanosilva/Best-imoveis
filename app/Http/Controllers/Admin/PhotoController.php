<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Immobile;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idImmobile)
    {
        $immobile = Immobile::find($idImmobile);
        $photos = Photo::where('immobile_id', $idImmobile)->get();

        return view('admin.immobile.photo.index', compact('immobile','photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idImmobile)
    {
        $immobile = Immobile::find($idImmobile);
        return view('admin.immobile.photo.form', compact('immobile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idImmobile)
    {
        //verificando se há foto (nome do input)
        if($request->hasFile('photo')){
            //verificando se houve erro no upload da foto
            if($request->photo->isValid()){

                //pegando o caminho e o nome do arquivo para salvar no disco
                $photoURL = $request->photo->hashName("imoveis/$idImmobile");

                //redimecionar a imagem
                $imagem = Image::make($request->photo)->fit(env('PHOTO_WIDTH'), env('PHOTO_HEIGHT'));
                // salvando no disco
                Storage::disk('public')->put($photoURL, $imagem->encode());

                // chave extrangeira recebe o id o imovel
                $photo = new Photo();
                $photo->url = $photoURL;
                $photo->immobile_id = $idImmobile;
                $photo->save();

            }
        }

        $request->session()->flash('sucesso','Foto incluida com sucesso');

        return redirect()->route('admin.immobile.photos.index', $idImmobile);

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
