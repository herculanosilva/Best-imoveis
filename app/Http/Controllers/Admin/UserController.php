<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // listando todos os usuarios
        $users = User::orderBy('name', 'asc');
        //verificando se ha pesquisa
        if($request->search){
            //substitui todas as ocorrencias da string de procura com a string de substituição
            // $request->search = str_replace(['.','-','/'],'', $request->search);
            $users->where('name','ILIKE', "%{$request->search}%")
                    ->orWhere('email','ILIKE',"%{$request->search}%")
                    ->get();
        }
        $users = $users->paginate(env('PAGINATION'))->withQueryString();

        // retornando o conteudo da pequisa para preencher o input
        $search = $request->search;

        return view('admin.user.index', compact('users','search'));
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
            'type' => $request->type,
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
    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $data = $request->except(['_token','_method']);
            // $data['name'] = strtoupper($data['name']);
            $user->update($data);

            $request->session()->flash('sucesso',"O usuário $request->name foi editado com sucesso!");
            return redirect()->route('admin.user.index');
        } catch (Exception $e) {

        $request->session()->flash('erro',"Erro ao tentar editar o usuario $request->name");
        return redirect()->route('admin.user.index');
        }
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

    // public function export(Request $request){
    //     return Excel::download(new UsersExport($request->search), 'Usuarios.xlsx');
    // }

    // public function exporttopdf($search)
    // {

    //     if ($search == null){
    //         return User::all();
    //     }else{
    //         $search =  User::where('name','ILIKE', "%{$search}%")
    //                    ->orWhere('email','ILIKE', "%{$search}%")
    //                    ->get();
    //     }

    //     $users = $search;
    //     $pdf = PDF::loadView('admin.user.pdf', compact('users'));
    //     $pdf->setPaper('a4', 'portrait');
    //     return $pdf->download('Usuarios.pdf');
    // }
}
