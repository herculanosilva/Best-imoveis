<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Exibi as informações do Usuário
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }
    /**
     * Salvar as atualizações
     *
     * @param  \Illuminate\Http\Requests\ProfileUpdateRequest $request
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request){
        try{
            $array = array(
                'password' => Hash::make($request->newPassword_confimation),
                'updated_at' => date('Y-m-d H:i:s')
            );
            $_user = Auth::user();
            User::updateProfile($_user, $array);

            $request->session()->flash('sucesso',"Senha atualizada com sucesso!");
            return redirect()->route('admin.profile.index');
        } catch (Exception $e){
            $request->session()->flash('erro',"Erro ao atualizar a senha!");
            return redirect()->route('admin.profile.index');
        }
    }
}
