@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>Каталог пластинок</h4></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($plates && $plates->total() != 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Исполнитель</th>
                                    <th scope="col">Альбом</th>
                                    <th scope="col">Время звучания</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($plates as $plate)
                                    @include('plate.table_item', ['plate' => $plate])
                                @endforeach
                                </tbody>
                            </table>
                            <div class="">
                                {{ $plates->links('shared.paginate') }}
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Нет данных для отображения!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
