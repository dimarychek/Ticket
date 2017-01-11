<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Football Tickets</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Custom script -->
    <script src="{{ asset('js/site.js') }}"></script>
</head>
<body>
<div class="container">
    <h1 class="text-center">Покупка билетов онлайн</h1>
    <br>
    @if(Session::has('message'))
        <h3 class="text-center success">{{ Session::get('message') }}</h3><br>
    @endif
    <div class="row">

        @foreach($sectors as $sector)
            <div class="col-lg-4 sector">
                <h3 class="text-center">{{ $sector->sector_name }}</h3>
                <table class="table table-bordered text-center">
                    <tr class="warning">
                        <th class="text-center">Ряд</th>
                        <th class="text-center">Место</th>
                        <th class="text-center">Место</th>
                        <th class="text-center">Место</th>
                        <th class="text-center">Место</th>
                        <th class="text-center">Место</th>
                    </tr>
                    @foreach($rows as $row)
                        <tr>
                            <th class="text-center warning sector-row">{{ $row->row_number }}</th>
                            @foreach($places as $place)
                                @if(in_array($sector->id.'_'.$row->id.'_'.$place->id, $reservs))
                                    <td id="{{ $sector->id }}_{{ $row->id }}_{{ $place->id }}" class="place reserv">{{ $place->place_number }}</td>
                                @else
                                    <td id="{{ $sector->id }}_{{ $row->id }}_{{ $place->id }}" class="place">{{ $place->place_number }}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
                <p class="text-center link">Показать количество свободных мест</p>
            </div>
        @endforeach
    </div>
    <p class="text-center">Всего свободно мест: {{ $all }}</p>
    <div class="choose">
        <form id="make_choose" class="text-center" method="POST" action="{{ action('MainController@store') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn button">Забронировать</button>
        </form>
        <h4 class="text-center">Выберите место</h4>
    </div>
    <br>
</div>
</body>
</html>