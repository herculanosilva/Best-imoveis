<?php

namespace App\Http\Controllers\Admin;

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

        // $logs = LogAccess::orderBy('id','DESC')->paginate(15);
        return view('admin.logs.access', compact('logs'));
    }
}
