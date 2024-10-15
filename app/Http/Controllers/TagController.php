<?php

namespace App\Http\Controllers;

use App\Models\Tag;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class TagController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
    
        $slug = Str::slug($request->name); // Genera el slug a partir del nombre
    
        // $tag = $request->user()->posts()->create([
        //     'slug' => $slug // Asigna el slug al nuevo post
        // ]);
    
        // Crea una nueva etiqueta con el nombre y el slug
        Tag::create([
            'name' => $request->name,
            'slug' => $slug
        ]);
    
        return redirect('/');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/');
    }

    public function update(Tag $tag, Request $request)
    {
        // Validar los datos de la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Obtener el nuevo nombre de la etiqueta
    $newName = $request->name;

    // Verificar si el nuevo nombre es diferente del nombre anterior
    if ($tag->name !== $newName) {
        // Actualizar el nombre y el slug solo si el nombre ha cambiado
        $tag->name = $newName;
        $tag->slug = Str::slug($newName);
    }

    // Guardar los cambios en la base de datos
    $tag->save();

    return redirect('/');
        }
        
}