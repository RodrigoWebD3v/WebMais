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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->input('data');

        $productId = $data['id'];

        $comments = $data['comments'];

        return $data;

//        if ($comments) {
//            foreach ($comments as $comment) {
//                $inserted = false;
//
//                if (!ProductReviews::where('comment', $comment)->where('product_id', $productId)->exists()) {
//                    while (!$inserted) {
//                        try {
//                            $resposta = ProductReviews::create(["product_id" => $productId, "comment" => $comment]);
//                            error_log("passando no loop");
//                            $inserted = true;
//                            return $resposta;
//
//                        } catch (\Exception $exception) {
//
//                        }
//                    }
//                }
//            }
//
//        }
        //  return response()->json(['message' => 'Comments received successfully'], 200);
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
