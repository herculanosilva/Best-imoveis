<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileUpdateRequest $request, User $user)
    {
        try{
            $array = array(
                'password' => Hash::make($request->newPassword_confirmation),
                'updated_at' => date('Y-m-d H:i:s')
            );

            $user = Auth::user();

            User::profileUpdate($user->id,$array);

            $request->session()->flash('sucesso',"Senha atualizada com sucesso!");
            return redirect()->route('admin.profile.index');
        } catch (Exception $e){
            $request->session()->flash('erro',"Erro ao atualizar a senha!");
            return redirect()->route('admin.profile.index');
        }
    }

}
