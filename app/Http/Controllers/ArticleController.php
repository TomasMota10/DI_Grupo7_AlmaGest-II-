<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Families;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::where('deleted','=',0)->get();
        $priceMin = [];
        $priceMax = []; 

        for ($i=1; $i < 50; $i++) { 
            $priceMin[] = $i;
        }

        for ($i=2; $i < 100; $i++) { 
            $priceMax[] = $i;
        }

        $colores = ['Blanco','Azul','Amarillo','Rojo','Verde','Ocre','Violeta'];
        $peso = [0.25, 0.5, 1, 2, 5, 25];
        $valoresNum = ['Nº1', 'Nº2', 'Nº3'];
        $valoresSimples = ['3cm','5cm','10cm','20cm','30cm'];
        $valoresCompAnch = ['5cm','10cm','20cm','30cm','50cm','60cm'];
        $valoresCompAlt = ['0,25cm','0,5cm','1cm','2cm','5cm','25cm'];

        $families = Families::all();

        return view('articulos.listado', 
        compact('articles','priceMin','priceMax','colores','peso',
        'valoresNum','valoresSimples','valoresCompAnch','valoresCompAlt','families'));
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
        $family = Families::where('name',$request['family'])->first();
        $size = '';

        if($request['rb'] == 'valorNum'){
            $size = $request['size1'];
        }
        else if($request['rb'] == 'valorSimple'){
            $size = $request['size2'];
        }
        else if($request['rb'] == 'valorComp'){
            $size = $request['size3'].' x '.$request['size4'];
        }

        $article = Articles::create([
            'name' => $request['name'],
            'price_min' => $request['price_min'],
            'price_max' => $request['price_max'],
            'color_name' => $request['color_name'],
            'weight' => $request['weight'],
            'size' => $size,
            'family_id' => $family['id'],
            'description' => $request['description'],
        ]);

        return redirect('/articulos')->with('message','Artículo insertado correctamente');

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
        $family = Families::where('name',$request['family'])->first();
        $size = '';

        if($request['rb1'] == 'valorNum'.$id){
            $size = $request['size1'];
        }
        else if($request['rb1'] == 'valorSimple'.$id){
            $size = $request['size2'];
        }
        else if($request['rb1'] == 'valorComp'.$id){
            $size = $request['size3'].' x '.$request['size4'];
        }

        $article = array(
            'name' => $request['name'],
            'price_min' => $request['price_min'],
            'price_max' => $request['price_max'],
            'color_name' => $request['color_name'],
            'weight' => $request['weight'],
            'size' => $size,
            'family_id' => $family['id'],
            'description' => $request['description'],
        );

        Articles::whereId($id)->update($article);
        return redirect('/articulos')->with('message','Artículo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function softDelete($id){
        $article = Articles::where('id', $id)->first();

        /* Si no existe, redirige a la ruta principal */
        if (! $article)
            return redirect('/') ->with('message','El artículo no existe o ya ha sido eliminado');

        $article->deleted = 1;
        $article->save();

        return redirect('/articulos')->with('message','Artículo eliminado');
    }

    public function validateArticle(Request $request){

        $request->validate([
            'name' => 'required|max:25', // forums es la tabla dónde debe ser único
            'priceMin' => 'required',
            'priceMax' => 'required',
            'color' => 'required',
            'weight' => 'required',
            'size' => 'required',
            'description' => 'required'
        ],
        [
            'name.required' => __("El nombre es obligatorio"),
            'priceMin.required' => __("El precio mínimo es obligatorio"),
            'priceMax.required' => __("El precio máximo es obligatorio"),
            'color.required' => __("El color es obligatorio"),
            'weight.required' => __("El peso es obligatorio"),
            'size.required' => __("El tamaño es obligatorio"),
            'description.required' => __("La descripción es obligatoria")

        ]
        );  
    }
}
