<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('admin.user.store');
        return view('admin.user.form', compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $request->session()->flash('sucesso',"O usuário $request->name foi incluido com sucesso!");
        return redirect()->route('admin.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $action = route('admin.user.update', $user->id);
        return view('admin.user.form', compact('user','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        $user = User::find($id);
        $user->update($request->all());
        $user->save();

        $request->session()->flash('sucesso',"O usuário $request->name foi editado com sucesso!");
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        User::destroy($id);
        $request->session()->flash('sucesso', "Usuário excluido com sucesso!");
        return redirect()->route('admin.user.index');
    }

    public function export(){
        return Excel::download(new UsersExport, 'Usuarios.xlsx');
    }

    public function exporttopdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.user.pdf', ['users' => $users]);
        return $pdf->download('Usuarios.pdf');
    }
}
