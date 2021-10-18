<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $model = \App\Models\Product::class;

    public function index()
    {
        //
        return response()->json($this->model::with("category")->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $store = $this->model::create(["name" => $request->name, "category_id" => $request->category_id]);
        if($store) {
            return json_encode(["success" => true, "message" => "Cadastrado com sucesso"]);
        }
        return json_encode(["success" => false, "message" => "Problema ao cadastrar"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json($this->model::with("category")->where("id", $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = $this->model::where(["id" => $id])->update(["name" => $request->name, "category_id" => $request->category_id]);
        if($update) {
            return json_encode(["success" => true, "message" => "Atualizado com sucesso"]);
        }
        return json_encode(["success" => false, "message" => "Problema ao Atualizar"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $destroy = $this->model::destroy($id);
        if($destroy) {
            return json_encode(["success" => true, "message" => "Excluído com sucesso"]);
        }
        return json_encode(["success" => false, "message" => "Problema ao Excluir"]);
    }
}
