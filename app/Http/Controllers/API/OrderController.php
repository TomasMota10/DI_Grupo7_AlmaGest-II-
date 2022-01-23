<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_lines;
use App\Contain_art_orderlines;
use Validator;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $successStatus = 200;

    public function index() {
        $pedidos = Order::all();
        return response()->json(['Pedidos' => $pedidos->toArray()], $this->successStatus);
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
    public function store(Request $request) {
        
        $input = $request->all();

        $validator = Validator::make($input, [
            'num' => 'required',
            'issue_date' => 'required',
            'origin_company_id' => 'required',
            'target_company_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $order = array(
            'num' => $input['num'],
            'issue_date' => $input['issue_date'],
            'origin_company_id' => $input['origin_company_id'],
            'target_company_id' => $input['target_company_id'],
            'deleted' => 0
        );

        Order::create($order);

        $order = Order::where('num',$input['num'])->first();

        $order_lines = array(
            'order_id' => $order['id'],
            'order_line_num' => $order['id'],
            'issue_date' => $input['issue_date'],
            'deleted' => 0,
        );

        Order_lines::create($order_lines);

        $contain_art_orderlines = array(
            'article_id' => 1,
            'order_line_id' => $order['id'],
            'deleted' => 0
        );

        Contain_art_orderlines::create($contain_art_orderlines);

        return response()->json(['Pedido' => $order->toArray()], $this->successStatus);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::whereId($id)->first();
        return response()->json(['Pedido' => $order], $this->successStatus);
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
        $input = $request->all();

        $validator = Validator::make($input, [
            'num' => 'required',
            'issue_date' => 'required',
            'origin_company_id' => 'required',
            'target_company_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $order = array(
            'num' => $input['num'],
            'issue_date' => $input['issue_date'],
            'origin_company_id' => $input['origin_company_id'],
            'target_company_id' => $input['target_company_id'],
            'deleted' => 0
        );

        Order::whereId($id)->update($order);

        $order = Order::where('num',$input['num'])->first();

        $order_lines = array(
            'order_id' => $order['id'],
            'order_line_num' => $order['id'],
            'issue_date' => $input['issue_date'],
            'deleted' => 0,
        );

        Order_lines::whereId($id)->update($order_lines);

        $contain_art_orderlines = array(
            'article_id' => 1,
            'order_line_id' => $order['id'],
            'deleted' => 0
        );

        Contain_art_orderlines::where('order_line_id',$order['id'])->update($contain_art_orderlines);

        return response()->json(['Pedido' => $order->toArray()], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::whereId($id)
        ->update(['deleted'=>1]);

        $order_lines = Order_lines::where('order_id',$order['id'])
        ->update(['deleted'=>1]);

        $contain_art_orderlines = Contain_art_orderlines::where('order_line_id',$order['id'])
        ->update(['deleted'=>1]);

        return response()->json(['Pedido' => $order], $this->successStatus);

    }
}
