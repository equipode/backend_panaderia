<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\inventory\supplies;
use Illuminate\Validation\ValidationException;
use App\Models\users\roles;

class suppliesController extends Controller
{
    private function validateRolUser($rol_user)
    {

        $tableRoles = roles::find($rol_user);
        if (is_null($tableRoles)) {
            return false;
        }

        $rol_userV = $tableRoles->tipo;

        return $rol_userV == 1 ? true : false;
    }

    public function index()
    {
        $supplies = supplies::orderBy('name_supply', 'asc')
            ->get();

        return response()->json($supplies);
    }

    public function search(Request $request)
    {
        $searchCod = $request->search;
        $searchNomb = $request->search;

        $supplies = supplies::query()
            ->where('name_supply', 'like', '%' . $searchNomb . '%')
            ->orWhere('cod_supply', 'like', '%' . $searchCod . '%')
            ->orderBy('name_supply', 'asc')
            ->get();

        return response()->json($supplies);
    }

    public function show($id = 0)
    {
        if ($id <= 0) {
            return response()->json([
                'error' => 'debe enviar el id del user'
            ], 404);
        }

        $supplie = supplies::find($id);
        if (is_null($supplie)) {
            return response()->json([
                'error' => 'no se pudo realizar correctamente con este id ' . $id . ''
            ], 404);
        }

        return response()->json($supplie);
    }

    public function create(Request $request)
    {
    }
}
