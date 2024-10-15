<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testStore()
    {
        $this
            ->post('tags', ['name' => 'PHP'])
            ->assertRedirect('/');
        
        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function testUpdate()
{
    // Crear una etiqueta de prueba
    $tag = Tag::factory()->create();

    // Datos para la actualización
    $newName = 'New Tag Name';

    // Simular una solicitud PUT a la ruta de actualización
    $this->put("tag/{tag:slug}", ['name' => $newName])
         ->assertRedirect('/'); // Verificar que se redirija después de la actualización

    // Verificar que los datos se hayan actualizado correctamente en la base de datos
    $this->assertDatabaseHas('tags', [
        'id' => $tag->id,
        'name' => $newName,
        'slug' => Str::slug($newName) // Verificar el slug también
    ]);
}

    public function testDestroy()
    {
        $tag = Tag::factory()->create();

        $this
            ->delete("tags/$tag->id")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }
    public function testValidate()
    {
        $this
            ->post('tags', ['name' => ''])
            ->assertSessionHasErrors('name');

    }
}
