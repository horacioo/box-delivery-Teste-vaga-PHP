<form action="{{url('filmes/cadastrar')}}" method='post'  enctype="multipart/form-data">
{{ csrf_field() }}
<select name="generos_id" id="">

   @foreach($gen as $g)
       <option value="{{$g->id}}">{{$g->genero}}</option>
   @endforeach

</select>
<p><input type="text" required="required" name="nome" placeholder="nome do filme"></p>
<p><input type="text" required="required"  name="ano" placeholder="ano do filme"></p>
<p><input type="file" required="required"  name="imagem" placeholder="imagem"></p>
<p><label for="">sinopse</label><textarea required="required"  name="sinopse" id="" cols="30" rows="10" ></textarea></p>
<p><input type="submit" value="criar"></p>
</form>