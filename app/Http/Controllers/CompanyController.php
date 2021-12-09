<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Companies;
use App\User;
use App\Delivery_terms;
use App\Transports;
use App\Payment_terms;
use App\Families;
use App\Bank_entity;
use App\Discount;
use App\Products;
use PDF;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Companies::where('id','=',auth()->user()->company_id)->first();
        $delivery_terms = Delivery_terms::all();
        $transports = Transports::all();
        $payment_terms = Payment_terms::all();
        $bank_entities = Bank_entity::all();
        $discounts = Discount::all();

        return view('empresa.datosEmpresa',compact('company','delivery_terms','transports','payment_terms','bank_entities','discounts'));
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
        $delivery_term = Delivery_terms::where('description','=',$request['delivery_terms'])->first();
        $transport = Transports::where('price','=',$request['transports_price'])->first();
        $bank_entity = Bank_Entity::where('name','=',$request['bank_entity'])->first();
        $payment_term = Payment_terms::where('description','=', $request['payment_terms'])->first();
        $discount = Discount::where('discount','=', $request['discount'])->first();

        $company = array(
            'name' => $request['company_name'],
            'address' => $request['company_address'],
            'city' => $request['company_city'],
            'cif' => $request['company_cif'],
            'email' => $request['company_email'],
            'phone' => $request['company_phone'],
            'del_term_id' => $delivery_term['id'],
            'transport_id' => $transport['id'],
            'payment_term_id' => $payment_term['id'],
            'bank_entity_id' => $bank_entity['id'],
            'discount_id' => $discount['id']
        );

        Companies::whereId($id)->update($company);
        return redirect('/company')->with('message','Datos de la compañía actualizados con éxito');
    }

    public function downloadResources()
    {
        $company = Companies::select('companies.name', 'companies.address', 'companies.city', 
        'companies.cif', 'companies.email', 'companies.phone','delivery_terms.description as dt_desc',
        'discount.name as d_name','transports.price','bank_entity.name as be_name','payment_terms.description as pt_desc')
        ->join('delivery_terms', 'companies.del_term_id','=','delivery_terms.id')
        ->join('discount','companies.discount_id','=','discount.id')
        ->join('transports','companies.transport_id','=','transports.id')
        ->join('bank_entity','companies.bank_entity_id','=','bank_entity.id')
        ->join('payment_terms','companies.payment_term_id','=','payment_terms.id')
        ->where('companies.id','=',auth()->user()->company_id)->get();

        $products = Products::select('products.id as p_id','families.name as f_name','articles.name as a_name','articles.description as a_desc','products.price as p_price', 'articles.color_name as a_color','articles.weight as a_weight','articles.size as a_size')
        ->join('articles','products.article_id', '=', 'articles.id')
        ->join('families','products.family_id','=','families.id')
        ->join('companies','products.company_id','=','companies.id')
        ->where('products.company_id','=', auth()->user()->company_id)->get();

        $pdf1 = PDF::loadView('content.fichaEmpresa', ['company' => $company])
        ->save(public_path().'/ficha_empresa.pdf');;

        $pdf2 = PDF::loadView('content.catalogo', ['products' => $products, 'company' => $company])
        ->save(public_path().'/catalogo.pdf');
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
