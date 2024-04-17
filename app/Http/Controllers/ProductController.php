<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.product.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|min:3|max:40|unique:products',
            'id' => 'required|min:3|max:2000|unique:products',
            'height' => 'required|numeric',
            'width'  => 'required|numeric',
            'depth'  => 'required|numeric',
        ];

        $feedback = [
            'name.required' => 'O campo Nome é obrigatório',
            'id.required' => 'O campo Código é obrigatório',
            'name.unique' => 'Este Nome ja esta sendo usado',
            'id.unique' => 'Este Código ja esta sendo usado',
            'height.required' => 'O campo Altura é obrigatório',
            'width.required' => 'O campo Largura é obrigatório',
            'depth.required' => 'O campo Profundidade é obrigatório',
            'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'id.min' => 'O campo Código deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo Nome do Produto deve ter no máximo 40 caracteres',
            'id.max'=>'O campo Código  deve ter no maximo 2000 caracteres',
            'comment.max' => 'O campo Comentario deve ter no máximo 2000 caracteres',
            'height.numeric' =>  'O campo Altura permite apenas numeros',
            'width.numeric' =>  'O campo  Largura permite apenas numeros',
            'depth.numeric' =>  'O campo  Profundidade permite apenas numeros',
        ];

        $request->validate($rule, $feedback);


        Product::create(['name'=>request('name'),'id'=>request('id')]);

        ProductDetails::create(['product_id'=>request('id'),
            'height'=>request('height'),
            'width'=>request('width'),
            'depth'=>request('depth')]);

        return redirect()->route('products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    }
}
