<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Delivery_note;
use App\Invoice;
use App\Invoice_lines;
use App\Contain_art_invlines;
use App\Delivery_note_lines;
use Validator;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $successStatus = 200;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'order_id' => 'required',
            'num' => 'required',
            'issue_date' => 'required',
            'articlesId' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $delivery_note = Delivery_note::where('order_id',$input['order_id'])->first();

        if(empty($delivery_note)){
            return response()->json(['Sin resultados' => 'No se encontraron facturas'], 401); 
        }

        $invoice = array(
            'num' => $input['num'],
            'issue_date' => $input['issue_date'],
            'delivery_note_id' => $delivery_note['id'],
            'deleted' => 0
        );

        Invoice::create($invoice);

        $invoice = Invoice::where('delivery_note_id',$delivery_note['id'])->first();
        $delivery_notes_lines = Delivery_note_lines::where('delivery_note_id',$delivery_note['id'])->first();
        
        $invoice_lines = array(
            'invoice_id' => $invoice['id'],
            'delivery_lines_id' =>$delivery_notes_lines['id'],
            'invoice_lines_num' => $input['num'],
            'issue_date' => $input['issue_date'],
            'deleted' => 0,
        );

        Invoice_lines::create($invoice_lines);

        $invoice_lines = Invoice_lines::where('invoice_id',$invoice['id'])->first();

        $articles = explode(',',$input['articlesId']);

        for($i = 0; $i < count($articles); $i++){
            $contain_art_invlines = array(
                'article_id' => $articles[$i],
                'invoice_line_id' => $invoice_lines['id'],
            );
            Contain_art_invlines::create($contain_art_invlines);
        }

        return response()->json(['Factura' => $invoice->toArray()], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::whereId($id)->first();
        return response()->json(['Factura' => $invoice], $this->successStatus);
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
            'order_id' => 'required',
            'num' => 'required',
            'issue_date' => 'required',
            'articlesId' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);       
        }

        $invoice = Invoice::whereId($id)->first();

        if(empty($invoice)){
            return response()->json(['Sin resultados' => 'No se encontraron facturas'], 401); 
        }

        Invoice::whereId($id)
        ->update(
            ['num'=>$input['num']],
            ['issue_date'=>$input['issue_date']],
        );

        $delivery_note_lines = Delivery_note_lines::where('delivery_note_id',$invoice['delivery_note_id'])->first();

        Invoice_lines::where('invoice_id',$invoice['id'])
        ->update(
            ['issue_date'=>$input['issue_date']],
        );

        $invoice_lines = Invoice_lines::where('invoice_id',$invoice['id'])->first();

        $articles = explode(',',$input['articlesId']);

        for($i = 0; $i < count($articles); $i++){
            Contain_art_invlines::where('invoice_line_id',$invoice_lines['id'])
            ->update(
                ['article_id' => $articles[$i]],
            );
        }

        return response()->json(['Factura' => $invoice->toArray()], $this->successStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoice::whereId($id)
        ->update(['deleted'=>1]);

        $invoice = Invoice::whereId($id)->first();

        Invoice_lines::where('invoice_id',$invoice['id'])
        ->update(['deleted'=>1]);

        $invoice_lines = Invoice_lines::where('invoice_id',$invoice['id'])->first();

        Contain_art_invlines::where('invoice_line_id',$invoice_lines['id'])->delete();

        return response()->json(['Factura' => Invoice::whereId($id)->first()], $this->successStatus);
    }
}

