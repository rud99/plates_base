@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>Редактируем пластинку #{{ $plate->id }}.
                            <b>{{ $plate->artist_name }}</b></h4></div>
                    <div class="card-body">
                        <form action="{{  route('plates.update', $plate) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="artist_name">Артист</label>
                                <input type="text" class="form-control" name="artist_name" id="artist_name"
                                       value="{{ $plate->artist_name }}">
                            </div>
                            <div class="form-group">
                                <label for="album_title">Название альбома</label>
                                <input type="text" class="form-control" name="album_title" id="album_title"
                                       value="{{ $plate->album_title }}">
                            </div>
                            <div class="form-group">
                                <label for="duration">Продолжительность звучания</label>
                                <input type="number" min="0" step="1" class="form-control" name="duration" id="duration"
                                       value="{{ $plate->duration }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Цена</label>
                                <input type="number" step="0.01" class="form-control" name="price" id="price"
                                       value="{{ $plate->price }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                            <a class="btn btn-secondary" href="{{ route('plates.index') }}" role="button">Вернуться в каталог</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
