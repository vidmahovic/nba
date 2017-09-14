@extends('welcome')

@section('content')
    @if(count($players))
        <h3>List of NBA Players</h3>
        @component('components.table', ['table_id' => 'players', 'header_class' => 'thead-inverse', 'table_class' => 'table-striped'])
            @slot('headers')
                <th>Name</th>
                <th>Team</th>
                <th>State</th>
            @endslot

            @foreach($players as $player)
                <tr>
                    <td><a href="{{ url('players/'.$player->present()->id) }}">{{ $player->present()->name }}</a></td>
                    <td>{{ $player->currentTeam()->present()->nameWithAbbr }}</td>
                    <td>{{ $player->currentTeam()->present()->location }}</td>
                </tr>
            @endforeach
        @endcomponent
            <div class="d-flex justify-content-center">
            {{  $players->links('vendor.pagination.simple-bootstrap-4') }}
            </div>
    @else
        <h1 class="display-4 text-center">No players to display...</h1>
    @endif
@endsection
