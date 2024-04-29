<?php

namespace App\Http\Controllers\inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\inventory\supplies;
use App\Models\inventory\products;
use App\Models\production_cost\recipes;
use Illuminate\Validation\ValidationException;
use App\Models\users\roles;

class productsController extends Controller
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
        $products = products::orderBy('name_prod', 'asc')
            ->get();

        return response()->json($products);
    }

    public function search(Request $request)
    {
        $searchCod = $request->searchCod;
        $searchNomb = $request->searchNomb;

        $supplies = supplies::query()
            ->where('name_prod', 'like', '%' . $searchNomb . '%')
            ->orWhere('cod_prod', 'like', '%' . $searchCod . '%')
            ->orderBy('name_prod', 'asc')
            ->get();

        return response()->json($supplies);
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'cod_prod' => 'required|min:4|max:18',
                'name_prod' => 'required|min:6|max:60',
                'time' => 'required|integer',
                'production_cost' => 'required|integer',
                'cost_of_workers' => 'required|integer',
                'bills' => 'required|integer',
                'input_arrangement' => 'required',
                'rol_user' => 'required|integer',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        $rol_user = $request->rol_user;
        $rol = $this->validateRolUser($rol_user);

        if ($rol) {

            $product = new products();
            $product->cod_prod = $request->cod_prod;
            $product->name_prod = $request->name_prod;
            $product->time = $request->time;
            $product->production_cost = $request->production_cost;
            $product->cost_of_workers = $request->cost_of_workers;
            $product->bills = $request->bills;
            $product->save();


            foreach ($request->input_arrangement as $value) {
                $recipe = new recipes();
                $recipe->amount = $value['amount'];
                $recipe->fk_product = $product->pk_product;
                $recipe->fk_supply = $value['fk_supply'];
                $recipe->save();
            }

            return response()->json([
                'ok' => 'Product Created'
            ], 201);
        } else {
            return response()->json([
                'error' => 'Access prohibited'
            ], 403);
        }
    }
}
