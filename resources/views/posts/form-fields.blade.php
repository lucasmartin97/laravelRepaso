<label for="title">Titulo</label><br>
{{-- Si no existe old(title) muestra el 2do parametro old(post->title) --}}
<input type="text" name="title" id="title" value="{{old('title', $post->title)}}"> <br>
@error('title')
    <span style="color: red;">{{$message}}</span> <br>
@enderror
<label for="body">Contenido</label><br>
<textarea name="body" id="body" cols="30" rows="10">{{old('body', $post->body)}}</textarea><br>
@error('body')
    <span style="color: red;">{{$message}}</span> <br>
@enderror
<button type="submit">Guardar</button>