<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Articles;
use Illuminate\Support\Facades\Hash;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $credential = [
            'email' => 'tmotasanchez14@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $response->assertSessionMissing('errors');
    }

    public function testRegistro(){
        $this->withoutExceptionHandling();

        $response = $this->post('/usuarios', [
            'firstname' => 'Juanma',
            'secondname' => 'Jimenez',
            'email' => 'tomasmotasanchez@gmail.com',
            'password' => '12345678',
            'company_id' => 2,
            'code' => null,
        ]);

        // Primero comprobamos que todo ha ido bien
        $response->assertStatus(200);
        //Cambiar el número '16' por el número de artículos que hay despues de eliminar este
        $this->assertCount(16, User::all());

        // Y comprobamos que sea el que acabamos de insertar
        $user = User::where('email', '=', 'tomasmotasanchez@gmail.com')->first();
        $this->assertEquals($user->firstname, 'Juanma');
        $this->assertEquals($user->secondname, 'Jimenez');
        $this->assertEquals($user->email, 'tomasmotasanchez@gmail.com');
        $this->assertEquals($user->company_id, 2);
    }

    public function testArticleInsert(){

        $this->withoutExceptionHandling();

        $response = $this->post('/articulosTest', [
            'name' => 'Sofá de IKEA',
            'price_min' => 50,
            'price_max' => 90,
            'color_name' => 'Negro',
            'weight' => 25,
            'size' => '30cm',
            'family_id' => 2,
            'description' => 'Nuevo sofa de Ikea',
        ]);

        $response->assertStatus(200);
        // Comprobamos que hay 1 registro en la BD (se ha insertado)
        $this->assertCount(11, Articles::all());

        // Y comprobamos que sea el que acabamos de insertar
        $article = Articles::where('name', '=', 'Sofá de IKEA')->first();
        $this->assertEquals($article->name, 'Sofá de IKEA');
        $this->assertEquals($article->price_min, 50);
        $this->assertEquals($article->price_max, 90);
        $this->assertEquals($article->color_name, 'Negro');
        $this->assertEquals($article->family_id, 2);
        $this->assertEquals($article->description, 'Nuevo sofa de Ikea');

    }

    public function testArticleDelete(){
        $this->withoutExceptionHandling();

        $article = factory(Articles::class)->create();

        $response = $this->delete('/articulos/' . $article->id);

        //Cambiar el número '10' por el número de artículos que hay despues de eliminar este
        $this->assertCount(11, Articles::all());

        $response->assertRedirect('/articulos');

    }


}