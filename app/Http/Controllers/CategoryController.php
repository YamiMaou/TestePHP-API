<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $model = Category::class;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json($this->model::all());
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
        $store = $this->model::create(["name" => $request->name]);
        if($store) {
            return response()->json(["success" => true, "message" => "Cadastrado com sucesso"]);
        }
        return response()->json(["success" => false, "message" => "Problema ao cadastrar"]);
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
        return response()->json($this->model::where(['id' => $id])->first());
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
        $update = $this->model::where("id",$id)->update(["name" => $request->name]);
        if($update) {
            return response()->json(["success" => true, "message" => "Atualizado com sucesso"]);
        }
        return response()->json(["success" => false, "message" => "Problema ao Atualizar"]);
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
            return response()->json(["success" => true, "message" => "Excluído com sucesso"]);
        }
        return response()->json(["success" => false, "message" => "Problema ao Excluir"]);
    }
}
