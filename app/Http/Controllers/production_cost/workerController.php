<?php

namespace App\Http\Controllers\production_cost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\production_cost\workers;

class workerController extends Controller
{
    public function index()
    {
        $workers = workers::orderBy('name_work', 'asc')
        ->get();

        return response()->json($workers);
    }
}
