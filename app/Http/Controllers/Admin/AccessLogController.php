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

        $logs = LogAccess::orderBy('id', 'DESC');
        $logs = $logs->paginate(env('PAGINATION'))->withQueryString();
    
        return view('admin.logs.access', compact('logs'));
    }
}
