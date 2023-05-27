<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // Mostramos todos los elementos que estan en la bd.
    public function index(){
        $posts = Post::get();
        return view('/posts/index', ['posts' => $posts]);
    }

    // Mostramos el elemento recibido en el parametro. Recibimos un int, que es el id del elemento.
    // Colocando el Post antes del parametro se entiende que es un id y ya entra como el elemento.
    public function show(Post $post){
        return view('posts.show', ['post' => $post]);
    }

    // Mostramos la vista del formulario con create.
    public function create(){
        return view('posts.create', ['post' => new Post]);
    }

    // Guardamos el elemento del formulario en la bd con store.
    public function store(Request $request){
        // Los mensajes de validacion se obtienen de la carpeta lang/es, si se prefiere personalizar el msj, poner 2do parametro a validate.
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ], [
            'title.required' => 'Completar :attribute', // Aca personalizamos el msj de validacion para title.
        ]);

        // $post = new Post;
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save(); // Guardamos objeto en la bd.

        // Lo de abajo es lo mismo que lo que esta comentado arriba.
        // Si da error hay que colocar el $fillable en el Model. (Fijar en el model como).

        Post::create($validated); // Validated retorna el array con las claves y valores del formulario cuando esta validado.

        session()->flash('status', 'Post creado!'); // Crear un status para mostrar mensaje de que se creo correctamente.

        // return redirect()->route('posts.index'); Es lo mismo que abajo con menos caracteres.
        return to_route('posts.index');
    }

    // Mostramos el formulario de edicion.
    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    // Actualizamos el elemento en la bd.
    public function update(Request $request, Post $post){
        $validated = $request->validate([
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ], [
            'title.required' => 'Completar :attribute',
        ]);

        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->save(); // Guardamos objeto en la bd.

        $post->update($validated);

        // Crear un status para mostrar mensaje de que se creo correctamente.
        // session()->flash('status', 'Post actualizado!');
        // Lo de arriba podemos simplificarlo con el with en el return.

        return to_route('posts.show', $post)->with('status', 'Post actualizado!');
    }

    // Eliminar elemento de la bd.
    public function destroy(Post $post){
        $post->delete();
        return to_route('posts.index')->with('status', 'Post eliminado!');
    }
}
