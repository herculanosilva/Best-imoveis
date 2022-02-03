<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ActionLogExport;
use App\Http\Controllers\Controller;
use App\Models\LogAction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class ActionLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // listando todas os logs
        $logs = LogAction::orderBy('id', 'DESC');
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
        return view('admin.logs.action', compact('logs','search'));

    }

    public function export(Request $request){
        return Excel::download(new ActionLogExport($request->search), 'Log de ação.xlsx');
    }

    public function exporttopdf()
    {
        $logs = LogAction::all();
        $title = 'Lista de logs de ação';
        $pdf = PDF::loadView('admin.logs.pdf', ['logs' => $logs], ['title' => $title]);

        return $pdf->download('Logs de ação.pdf');
    }

}

