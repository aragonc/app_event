<?php

namespace App\Http\Controllers;


use App\Inc\Exports;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function exportPeoples(){
        return Excel::download(new Exports(), 'peoples.xlsx');
    }
}
