<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
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
    public function update(ProfileUpdateRequest $request, User $user)
    {
        try {
            $array = array(
                'password' => Hash::make($request->newPassword_confirmation),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $_user = Auth::user();

            User::profileUpdate($_user->id,$array);

            $request->session()->flash('sucesso',"Senha atualizada com sucesso!");
            return redirect()->route('admin.profile.index');
        } catch (Exception $e) {
            $request->session()->flash('erro',"Erro ao atualizar a senha!");
            return redirect()->route('admin.profile.index');
        }
    }
}
