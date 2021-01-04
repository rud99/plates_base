<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // доступ к главной странице
    /** @test */
    public function main_page_can_see()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Login');
        $response->assertSee('Register');
    }

    // просмотр списка пластинок
    /** @test */
    public function plates_list_page_can_see()
    {
        $response = $this->get('/plates');
        $response->assertStatus(200);
//        $response->assertSee($post->title);
//        $response->assertSee($post->text);
//        $response->assertSee($post->user->name);
//        $response->assertSee('Go Back <');
        $response->assertSee('Каталог пластинок');
    }
}
