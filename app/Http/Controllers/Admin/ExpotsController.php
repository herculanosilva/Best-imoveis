<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\CitiesExport;
use App\Exports\FinalitiesExport;
use App\Exports\ImmobilesExport;
use App\Exports\TypiesExport;
use App\Exports\UsersExport;
use App\Exports\AccessLogExport;
use App\Exports\ActionLogExport;
use App\Models\Immobile;

class ExpotsController extends Controller
{
    public function UserPDF(Request $request){
        $ExportUser = new UsefulController();
        $users = $ExportUser->ExportUser($request->search);

        $pdf = PDF::loadView('admin.user.pdf', compact('users'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Usuarios.pdf');
    }

    public function UserSpreadsheet(Request $request){
        return Excel::download(new UsersExport($request->search), 'Usuarios.xlsx');
    }

    public function TypePDF(Request $request){
        $ExportType = new UsefulController();
        $typies = $ExportType->ExportType($request->search);

        $pdf = PDF::loadView('admin.type.pdf', compact('typies'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Tipos.pdf');
    }

    public function TypeSpreadsheet(Request $request){
        return Excel::download(new TypiesExport($request->search), 'Tipo.xlsx');
    }

    public function ImmobilePDF(Request $request){
            dd($request->search);
            $Exportmmobile = new UsefulController();
            $immobiles = $Exportmmobile->ExportImmobile($request->search);

            $pdf = PDF::loadView('admin.immobile.pdf', ['immobiles' => $immobiles]);
            $pdf->setPaper('a4', 'landscape');
            return $pdf->download('Imoveis.pdf');
    }

    public function ImmobileSpreadsheet(Request $request){
        return Excel::download(new ImmobilesExport($request->city_id, $request->title), 'Imoveis.xlsx');
    }

    public function FinalityPDF(Request $request){
        $ExportFinality = new UsefulController();
        $finalities = $ExportFinality->ExportFinality($request->search);

        $pdf = PDF::loadView('admin.finality.pdf', compact('finalities'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Finalidades.pdf');
    }

    public function FinalitySpreadsheet(Request $request){
        return Excel::download(new FinalitiesExport($request->search), 'Finalidade.xlsx');
    }

    public function CityPDF(Request $request){
        $ExportCity = new UsefulController();
        $cities = $ExportCity->ExportCity($request->search);

        $pdf = PDF::loadView('admin.city.pdf', compact('cities'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('Cidades.pdf');
    }

    public function CitySpreadsheet(Request $request){
        return Excel::download(new CitiesExport($request->search), 'Cidades.xlsx');
    }

    public function ActionLogPDF(Request $request){
        dd('Em manutenção');
        // $ExportCity = new UsefulController();
        // $cities = $ExportCity->ExportCity($request->search);

        // $pdf = PDF::loadView('admin.city.pdf', compact('cities'));
        // $pdf->setPaper('a4', 'landscape');

        // $title = 'Lista de logs de ação';
        // return $pdf->download('Logs de ações.pdf');
    }

    public function ActionLogSpreadsheet(Request $request){
        return Excel::download(new ActionLogExport($request->search), 'Logs de ação.xlsx');
    }

    public function AccessLogPDF(Request $request){
        dd('Em manutenção');
    }

    public function AccessLogSpreadsheet(Request $request){
        return Excel::download(new AccessLogExport($request->search), 'Log de acesso.xlsx');
    }

}
