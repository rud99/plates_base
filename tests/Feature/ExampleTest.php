<?php

namespace Tests\Feature;

use App\Models\Plate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

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
        $response->assertSee('Каталог пластинок');
    }


    // просмотр пластинки на редактирование
    /** @test */
    public function plate_edit_page_can_see()
    {
        $plate =  Plate::factory()->create();
        $response = $this->get('/plates/'.$plate->id.'/edit');
        $response->assertStatus(200);
        $response->assertSee($plate->artist_name);
        $response->assertSee($plate->album_title);
        $response->assertSee($plate->duration);
        $response->assertSee($plate->price);
        $response->assertSee('Вернуться в каталог');
    }

    // редактирование пластинки
    /** @test */
    public function plate_update_route_test()
    {
        $plate =  Plate::factory()->create();
        $data = [
            'id' => $plate->id,
            'artist_name' => 'Updated_artist_name',
            'album_title' => 'Updated_album_title',
            'duration' => 90,
            'price' => 5555.55
        ];

        $response = $this->put('/plates/'.$data['id'], $data);
        $response->assertStatus(302);
        $response->assertRedirect('/plates');
    }

    // удаление пластинки
    /** @test */
    public function plate_destroy_route_test()
    {
        $plate =  Plate::factory()->create();
        $response = $this->delete('/plates/'.$plate->id);
        $response->assertStatus(302);
        $response->assertRedirect('/plates');
    }
}
