@extends('Template.basic')

@section('content')

<div class="container-fluid">
  <div class="row">
    <div class="col-12 d-flex justify-content-center">
          <article class="poke {{ $poke->name }} ">
              <a href="/pokemon/{{$poke->id}}/editar">
              <img src="{{ asset('poke-img/images/poke-'.$poke->id.'.jpg') }}" alt="Icono de {{ $poke->name }}">
              <h3>{{ $poke->name }}</h3>
              </a>
              <h4>{{ $poke->weight }}</h4>
              <h4>{{ $poke->height }}</h4>
            <h4>{{ $poke->evolves }}</h4>
        
            @foreach (App\Type::all() as $type)
                @if ($poke->type_id == $type->id)
                <h4>{{$type->name}}</h4>    
                @endif
            @endforeach
          </article>
  
    </div>
  </div>
</div>
@endsection