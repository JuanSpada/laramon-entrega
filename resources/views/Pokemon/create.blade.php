@extends('Template.basic')

@section('content')
<div class="content">
    <section>
        <article>
            <h5>Cargar Pokemon</h5>
        </article>
        <article>
            
            <form action="{{ route('pokemon.guardar') }}" method="post" name="cargar-pokemon" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre Pokemon</label>
                    <input class="{{ $errors->has('name') ? ' name Invalido' : '' }} form-control" type="text" id="name" value="{{ old('name') }}" name="name">
                        @if ($errors->has('name'))
                            <span>
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input class="form-control" name="weight" class="{{ $errors->has('weight') ? ' weight Invalido' : '' }}" type="text" id="weight" value="{{ old('weight') }}" weight="weight">
                        @if ($errors->has('weight'))
                            <span>
                                <strong>{{ $errors->first('weight') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <label for="height">Height</label>
                    <input class="form-control" name="height" class="{{ $errors->has('height') ? ' height Invalido' : '' }}" type="text" id="height" value="{{ old('height') }}" height="height">
                        @if ($errors->has('height'))
                            <span>
                                <strong>{{ $errors->first('height') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group">
                    <label for="type_id">Tipo de Pokemon</label>
                    <select class="form-control" name="type_id">
                        @foreach (App\Type::all() as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select><br>
                </div>

                <button class="btn btn-primary" type="submit">Cargar Pokemon</button>
            </form>
        </article>
    </section>
</div>
@endsection