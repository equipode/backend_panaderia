<?php

namespace App\Http\Controllers\production_cost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\production_cost\bills;

class billsController extends Controller
{
    public function index()
    {
        $bills = bills::orderBy('name_spent', 'asc')
            ->get();

        return response()->json($bills);
    }
}