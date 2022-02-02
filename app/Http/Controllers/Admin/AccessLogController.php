<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AccessLogExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LogAccess;

class AccessLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(){

        $logs = LogAccess::orderBy('id', 'ASC');
        $logs = $logs->paginate(env('PAGINATION'))->withQueryString();

<<<<<<< Updated upstream
        // $logs = LogAccess::orderBy('id','DESC')->paginate(15);
        return view('admin.logs.access', compact('logs'));
=======
        // retornando o conteudo da pequisa para preencher o input
        $search = $request->search;

        return view('admin.logs.access', compact('logs','search'));
    }

    public function export(Request $request){
        return Excel::download(new AccessLogExport($request->search), 'Log de acesso.xlsx');
    }

    public function exporttopdf()
    {
        $logs = LogAccess::all();
        $pdf = PDF::loadView('admin.logs.pdf', ['logs' => $logs]);
        return $pdf->download('Logs de acesso.pdf');
>>>>>>> Stashed changes
    }
}
