<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Record;

class ReportController extends Controller
{
    public function index() {
        return view('report');
    }

    public function report(Request $request) {

        $report = $request->validate([
            'report' => 'required|max:500'
        ]);
        $report += ['user_id' => Auth::user()->id];
        $db = Record::create($report);
        if($db){
            return redirect(route('client.home'));
        }
        else{
            return redirect(route('client.report'))->withErrors([
                'report' => 'Ошибка'
            ]);
        }
    }
}
