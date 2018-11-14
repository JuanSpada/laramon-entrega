@extends('Template.basic')

@section('content')
<div class="content">

    <section>
        <article>
        <form class="" action="{{ route('pokemon.actualizar', $pokemon->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <input class="form-control" name="name" type="text" value="{{$pokemon->name}}">
            </div>
            <div class="form-group">
                    <input class="form-control" name="weight" type="text" value="{{$pokemon->weight}}">
            </div>
            <div class="form-group">
                    <input class="form-control" name="height" type="text" value="{{$pokemon->height}}">
            </div>
            <div class="form-group">
                <select name="type_id">
                    @foreach (App\Type::all() as $type)
                     @if ($pokemon->type_id == $type->id)
                        <option value="{{$type->id}}"selected>{{$type->name}}</option>
                     @endif
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Editar</button>
            </form>

        </article>
    </section>
</div>
@endsection