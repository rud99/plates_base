<?php

namespace Tests\Feature;

use App\Models\Plate;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
//    use RefreshDatabase;

    // доступ к главной странице неавторизованным пользователем
    /** @test */
    public function main_page_can_see_unauthorized()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Войти');
        $response->assertSee('Регистрация');
    }

    // доступ к главной странице авторизованным пользователем
    /** @test */
    public function main_page_can_see_authorized()
    {
        $response = $this->actingAs(User::factory()->create())->get('/');
        $response->assertStatus(200);
        $response->assertSee('Вы вошли в систему');
        $response->assertSee('Каталог пластинок');
    }

    // просмотр списка пластинок неавторизованным пользователем
    /** @test */
    public function plates_list_page_can_not_see_unauthorized()
    {
        $response = $this->get('/plates');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    // просмотр списка пластинок авторизованным пользователем
    /** @test */
    public function plates_list_page_can_see_authorized()
    {
        $response = $this->actingAs(User::factory()->create())->get('/plates');
        $response->assertStatus(200);
        $response->assertSee('Каталог пластинок');
    }


    // просмотр пластинки на редактирование неавторизованным пользователем
    /** @test */
    public function plate_edit_page_cannot_see_unauthorized()
    {
        $plate =  Plate::factory()->create();
        $response = $this->get('/plates/'.$plate->id.'/edit');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    // просмотр пластинки на редактирование авторизованным пользователем
    /** @test */
    public function plate_edit_page_can_see_authorized()
    {
        $plate =  Plate::factory()->create();
        $response = $this->actingAs(User::factory()->create())->get('/plates/'.$plate->id.'/edit');
        $response->assertStatus(200);
        $response->assertSee($plate->artist_name);
        $response->assertSee($plate->album_title);
        $response->assertSee($plate->duration);
        $response->assertSee($plate->price);
        $response->assertSee('Вернуться в каталог');
    }

    // редактирование пластинки неавторизованным пользователем
    /** @test */
    public function plate_update_route_unauthorized()
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
        $response->assertRedirect('/login');
    }


    // редактирование пластинки авторизованным пользователем
    /** @test */
    public function plate_update_route_authorized()
    {
        $plate =  Plate::factory()->create();
        $data = [
            'id' => $plate->id,
            'artist_name' => 'Updated_artist_name',
            'album_title' => 'Updated_album_title',
            'duration' => 90,
            'price' => 5555.55
        ];

        $response = $this->actingAs(User::factory()->create())->put('/plates/'.$data['id'], $data);
        $response->assertStatus(302);
        $response->assertRedirect('/plates');
    }

    // удаление пластинки неавторизованным пользователем
    /** @test */
    public function plate_destroy_route_unauthorized()
    {
        $plate =  Plate::factory()->create();
        $response = $this->delete('/plates/'.$plate->id);
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    // удаление пластинки авторизованным пользователем
    /** @test */
    public function plate_destroy_route_authorized()
    {
        $plate =  Plate::factory()->create();
        $response = $this->actingAs(User::factory()->create())->delete('/plates/'.$plate->id);
        $response->assertStatus(302);
        $response->assertRedirect('/plates');
    }

}
