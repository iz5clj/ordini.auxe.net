<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function __construct() {
        $this->middleware(['role:Super Admin']);
    }
    
    public function index() {

        $logs = Activity::paginate(5);

        return view('log.index')->with([
            'logs' => $logs,
        ]);
    }
}
