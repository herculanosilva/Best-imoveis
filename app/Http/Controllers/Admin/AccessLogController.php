<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogAccess;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class AccessLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request){
         // listando todas os logs
         $logs = LogAccess::orderBy('id', 'DESC');
         if($request->search){
             //substitui todas as ocorrencias da string de procura com a string de substituição
            //  $request->search = str_replace(['.','-','/'],'', $request->search);
            $logs->where('action','ILIKE', "%{$request->search}%")
            ->orWhere('description','ILIKE',"%{$request->search}%")
            ->get();
        }

        $logs = $logs->paginate(env('LOGS_PAGINATION'))->withQueryString();

        // retornando o conteudo da pequisa para preencher o input
        $search = $request->search;

        return view('admin.logs.access', compact('logs','search'));
    }

    // public function export(Request $request){
    //     return Excel::download(new ?Export($request->search), 'Tipo.xlsx');
    // }

    public function exporttopdf()
    {
        $logs = LogAccess::all();
        $pdf = PDF::loadView('admin.logs.pdf', ['logs' => $logs]);
        return $pdf->download('Logs de acesso.pdf');
    }
}
