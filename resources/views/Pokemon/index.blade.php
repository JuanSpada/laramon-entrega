@extends('Template.basic')

@section('content')
<div class="content">
    <section>
        <article>
            <h5>Listado de Pokemons</h5>
            
            {{-- @dd($pokemons); --}}
            <table class="table" style="width:100%">
                <tr>
                  <th class="col">Name</th>
                  <th class="col">Weight</th> 
                  <th class="col">Height</th>
                  <th class="col">Type</th>
                  <th class="col"></th>
                </tr>

                @foreach ($pokemons as $pokemon) 
                <tr>
                <td><a href="/pokemon/{{$pokemon->id}}" >{{$pokemon->name}} </a></td>
                  <td>{{$pokemon->weight}}</td> 
                  <td>{{$pokemon->height}}</td>
                  <td>{{ App\Type::find($pokemon->type_id)->name }}</td>
                  <td>
                    <form action="{{ url('pokemon/'. $pokemon->id .'/delete')}}" method="post" name="" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </table>
        </article>
    </section>
</div>
@endsection