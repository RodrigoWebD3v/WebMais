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
        // Recupera todos os produtos com seus detalhes relacionados
        $products = Product::with('details')->get();

        // Retorna a view listando os produtos
        return view('app.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retorna a view para criar um novo produto
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
        // Regras de validação para os campos do formulário de criação
        $rule = [
            'name' => 'required|min:3|max:40|unique:products',
            'id' => 'required|min:1|max:2000|unique:products',
            'height' => 'required|numeric',
            'width'  => 'required|numeric',
            'depth'  => 'required|numeric',
            'value'  => 'required|numeric',
        ];

        // Mensagens de feedback para as regras de validação
        $feedback = [
            // Mensagens de erro específicas para cada regra
            'name.required' => 'O campo Nome é obrigatório',
            'id.required' => 'O campo Código é obrigatório',
            'name.unique' => 'Este Nome ja esta sendo usado',
            'id.unique' => 'Este Código ja esta sendo usado',
            'height.required' => 'O campo Altura é obrigatório',
            'width.required' => 'O campo Largura é obrigatório',
            'depth.required' => 'O campo Profundidade é obrigatório',
            'value.required' => 'O campo Valor é obrigatório',
            'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'id.min' => 'O campo Código deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo Nome do Produto deve ter no máximo 40 caracteres',
            'id.max'=>'O campo Código  deve ter no maximo 2000 caracteres',
            'comment.max' => 'O campo Comentario deve ter no máximo 2000 caracteres',
            'height.numeric' =>  'O campo Altura permite apenas numeros',
            'width.numeric' =>  'O campo  Largura permite apenas numeros',
            'depth.numeric' =>  'O campo  Profundidade permite apenas numeros',
            'value.numeric' =>  'O campo  Valor permite apenas numeros',
        ];

        // Valida os dados do formulário de acordo com as regras e feedback definidos
        $request->validate($rule, $feedback);

        // Cria um novo produto
        Product::create(['name'=>request('name'),'id'=>request('id')]);

        // Cria os detalhes do produto
        ProductDetails::create([
            'product_id'=>request('id'),
            'height'=>request('height'),
            'width'=>request('width'),
            'depth'=>request('depth'),
            'value'=>request('value')
        ]);

        // Redireciona para a listagem de produtos após a criação bem-sucedida
        return redirect()->route('products.list');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Recupera o produto com seus detalhes e avaliações relacionadas para edição
        $product = Product::with(['details', 'reviews'])->find($id);

        // Retorna a view para editar o produto
        return  view('app.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        // Regras de validação para os campos do formulário de edição
        $rule = [
            'name' => 'required|min:3|max:40|',
            'height' => 'required|numeric',
            'width'  => 'required|numeric',
            'depth'  => 'required|numeric',
            'value'  => 'required|numeric',
        ];

        // Mensagens de feedback para as regras de validação
        $feedback = [
            // Mensagens de erro específicas para cada regra
            'name.required' => 'O campo Nome é obrigatório',
            'height.required' => 'O campo Altura é obrigatório',
            'width.required' => 'O campo Largura é obrigatório',
            'depth.required' => 'O campo Profundidade é obrigatório',
            'value.required' => 'O campo Valor é obrigatório',
            'name.min' => 'O campo Nome deve ter no mínimo 3 caracteres',
            'id.min' => 'O campo Código deve ter no mínimo 3 caracteres',
            'name.max' => 'O campo Nome do Produto deve ter no máximo 40 caracteres',
            'id.max'=>'O campo Código  deve ter no maximo 2000 caracteres',
            'comment.max' => 'O campo Comentario deve ter no máximo 2000 caracteres',
            'height.numeric' =>  'O campo Altura permite apenas numeros',
            'width.numeric' =>  'O campo  Largura permite apenas numeros',
            'depth.numeric' =>  'O campo  Profundidade permite apenas numeros',
            'value.numeric' =>  'O campo  Valor permite apenas numeros',
        ];

        // Valida os dados do formulário de acordo com as regras e feedback definidos
        $request->validate($rule, $feedback);

        // Atualiza o produto e seus detalhes com os novos dados fornecidos
        $product = Product::with('details')->find($id);
        $product->name = $request->get('name');
        $product->details->height = $request->get('height');
        $product->details->width = $request->get('width');
        $product->details->depth = $request->get('depth');
        $product->details->value = $request->get('value');
        $product->details->save();
        $product->save();

        // Redireciona para a listagem de produtos após a atualização bem-sucedida
        return redirect()->route('products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recupera o produto com seus detalhes e avaliações relacionadas para exclusão
        $product = Product::with(['details', 'reviews'])->find($id);

        // Verifica se o produto foi encontrado
        if (!$product) {
            return redirect()->route('products.list')->with('error', 'Produto não encontrado.');
        }

        // Exclui as avaliações relacionadas
        $product->reviews()->delete();

        // Exclui os detalhes relacionados
        $product->details()->delete();

        // Exclui o produto
        $product->delete();

        // Redireciona para a listagem de produtos após a exclusão bem-sucedida
        return redirect()->route('products.list')->with('success', 'Produto excluído com sucesso.');
    }
}
