<?php

namespace App\Http\Controllers;

use App\ProductReviews;
use Illuminate\Http\Request;


class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        // Recupera os dados enviados na requisição
        $data = $request->input('data');

        // Obtém o ID do produto dos dados recebidos
        $productId = $data['id'];

        // Obtém os comentários dos dados recebidos
        $comments = $data['comments'];

        // Verifica se existem comentários para processar
        if ($comments) {
            foreach ($comments as $comment) {
                // Variável para controlar se o comentário foi inserido com sucesso
                $inserted = false;

                // Verifica se o comentário ainda não existe para o produto
                if (!ProductReviews::where('comment', $comment)->where('product_id', $productId)->exists()) {
                    // Loop até que o comentário seja inserido com sucesso
                    while (!$inserted) {
                        try {
                            // Tenta criar uma nova avaliação para o produto com o comentário fornecido
                            $resposta = ProductReviews::create(["product_id" => $productId, "comment" => $comment]);

                            // Define que o comentário foi inserido com sucesso e sai do loop
                            $inserted = true;

                        } catch (\Exception $exception) {
                            // Se ocorrer uma exceção durante a inserção, continua tentando até ter sucesso
                        }
                    }
                }
            }
        }

        // Retorna uma resposta JSON indicando que os comentários foram recebidos com sucesso
        return response()->json(['message' => 'Comments received successfully '. $comments], 200);
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
