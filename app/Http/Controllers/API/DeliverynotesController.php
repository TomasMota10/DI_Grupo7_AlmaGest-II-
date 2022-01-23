<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Delivery_note;
use App\Delivery_note_lines;
use App\Contain_art_delivlines;
use App\Contain_art_orderlines;
use App\Order;
use App\Order_lines;
use Validator;

class DeliverynotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $successStatus = 200;

    public function index()
    {
        $delivery_notes = Delivery_note::all();
        return response()->json(['Albaranes' => $albaranes->toArray()], $this->successStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'order_id' => 'required',
            'issue_date' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $order = Order::whereId($input['order_id'])->first();

        if(empty($order)){
            return response()->json(['Sin resultados' => 'No se encontraron pedidos'], 401); 
        }

        $delivery_note = array(
            'num' => $order['num'],
            'issue_date' => $input['issue_date'],
            'order_id' => $order['id'],
            'deleted' => 0
        );

        Delivery_note::create($delivery_note);

        $delivery_note = Delivery_note::where('order_id',$order['id'])->first();

        $order_lines = Order_lines::where('order_id',$order['id'])->first();

        $delivery_note_lines = array(
            'delivery_note_id' => $delivery_note['id'],
            'delivery_note_line_num' =>$order['num'],
            'order_line_id' => $order_lines['id'],
            'issue_date' => $input['issue_date'],
            'deleted' => 0,
        );

        Delivery_note_lines::create($delivery_note_lines);
        
        $delivery_note_lines = Delivery_note_lines::where('delivery_note_id',$delivery_note['id'])->first();

        $contain_art_orderlines = Contain_art_orderlines::where('order_line_id',$order['id'])->get();

        foreach ($contain_art_orderlines as $c_a_orderline) {

            $contain_art_delivlines = array(
                'article_id' => $c_a_orderline['article_id'],
                'delivery_lines_id' => $delivery_note_lines['id'],
                'deleted' => 0
            );

            Contain_art_delivlines::create($contain_art_delivlines);
            
        }

        return response()->json(['Albarán' => $delivery_note->toArray()], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $delivery_note = Delivery_note::whereId($id)->first();
        return response()->json(['Albarán' => $delivery_note], $this->successStatus);
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
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $delivery_note = Delivery_note::whereId($id)->first();

        if(empty($delivery_note)){
            return response()->json(['Sin resultados' => 'No se encontraron albaranes'], 401); 
        }

        Delivery_note::whereId($id)
        ->update(
            ['num' => $input['num']], 
            ['issue_date' => $input['issue_date']],
        );

        Delivery_note_lines::where('delivery_note_id', $delivery_note['id'])
        ->update(
            ['num' => $input['num']], 
            ['issue_date' => $input['issue_date']],
        );

        $delivery_note_lines = Delivery_note_lines::where('delivery_note_id', $delivery_note['id'])->first();

        $articles = explode(',',$input['articlesId']);

        for($i = 0; $i < count($articles); $i++){
            Contain_art_delivlines::where('delivery_lines_id',$delivery_note_lines['id'])
            ->update(
                ['article_id' => $articles[$i]],
            );
        }
        
        return response()->json(['Albarán' => $delivery_note], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Delivery_note::whereId($id)
        ->update(['deleted'=>1]);

        $delivery_note = Delivery_note::whereId($id)->first();

        Delivery_note_lines::where('delivery_note_id',$delivery_note['id'])
        ->update(['deleted'=>1]);

        $delivery_note_lines = Delivery_note_lines::where('delivery_note_id', $delivery_note['id'])->first();

        Contain_art_delivlines::where('delivery_lines_id',$delivery_note_lines['id'])
        ->update(['deleted'=>1]);

        return response()->json(['Pedido' => Delivery_note::whereId($id)->first()], $this->successStatus);
    }
}
