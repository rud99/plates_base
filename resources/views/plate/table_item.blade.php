<tr>
    <th scope="row"> {{ $plate->id }}</th>
    <td>
        <a href="{{ route('plates.edit', [$plate->id]) }}">{{ $plate->artist_name }}</a>
    </td>
    <td>{{ $plate->album_title }}</td>
    <td>{{ $plate->duration }} мин.</td>
    <td>{{ $plate->price }} руб.</td>
    <td>
        <a class="btn btn-primary btn-sm" href="{{ route('plates.edit', [$plate->id]) }}" role="button">Изменить</a>

        {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
           {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
            {{--{{ __('Logout') }}--}}
        {{--</a>--}}
        <a class="btn btn-danger btn-sm"
           onclick="if (confirm('Точно удаляем?')) {
               event.preventDefault();
               document.getElementById('delete_form_{{ $plate->id }}').submit();
               } else {
               return;
           }"
           href="#" role="button"> Удалить </a>
        <form id="delete_form_{{ $plate->id }}" action="{{ route('plates.destroy', [$plate->id]) }}" method="POST" class="d-none">
            @csrf
            @method('DELETE')
        </form>

</tr>