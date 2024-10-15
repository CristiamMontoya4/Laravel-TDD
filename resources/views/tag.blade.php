<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Importaci´on librerias Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Etiquetas</title>

    </head>
    <body class="bg-gray-200 py-10">
        <div class="max-w-lg bg-white mx-auto p-5 rounded shadow">
            @if ($errors->all())
            <ul class="list-none p-4 mb-4 bg-red-100 text-red-500">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            
              
                    <h1>{{$tag->name}}</h1> 
               
                <tr>
                    <td>
                    <form action="{{ route('tag.update', $tag->slug) }}" method="POST">
                        @csrf
                        @method('PUT')
          

                        <label class="uppercase text-gray-700 text-s">Nombre</label>
                        <span class="text-xs text-red-600 text-bold">
                            @error('name') {{ $message }} @enderror
                        </span>

                        <input type="text" name="name" class="rounded border-gray-200 w-full mb-4" value="{{ old('name', $tag->name) }}">

                        <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
                    </form>

                    </td>

                    <td class="border px-4 py-2">
                        <a href="/" class="text-indigo-600">Volver</a>
                    </td>
                </tr>
              
            </table>
        </div>  
    </body>
</html>
