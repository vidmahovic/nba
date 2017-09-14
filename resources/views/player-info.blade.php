@extends('welcome')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            <h2>{{ $player->present()->name }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3 style="margin-bottom: 20px;">Player Details</h3>
                    @component('components.table')
                        <tr>
                            <td>Date of Birth</td>
                            <td>{{ $playerDetails['date_of_birth']->toDateString() }}</td>
                        </tr>
                        <tr>
                            <td>School</td>
                            <td>{{ $playerDetails['school_name'] ?? 'Unknown' }}</td>
                        </tr>
                        <tr>
                            <td>Weight</td>
                            <td>{{ $playerDetails['weight'] }}</td>
                        </tr>
                        <tr>
                            <td>Height</td>
                            <td>{{ $playerDetails['height'] }}</td>
                        </tr>
                        <tr>
                            <td>Position</td>
                            <td>{{ $playerDetails['position'] }}</td>
                        </tr>
                        <tr>
                            <td>Current Team</td>
                            <td>{{ $playerDetails['team_name'] }}</td>
                        </tr>

                    @endcomponent
                </div>
                <div class="col-md-6">
                    <h3 style="margin-bottom: 20px;">All time Stats</h3>
                    @component('components.table')
                        <tr>
                            <td>Games Played</td>
                            <td>{{ $careerStats['games_played'] }}</td>
                        </tr>
                        <tr>
                            <td>Points Scored</td>
                            <td>{{ $careerStats['points'] }}</td>
                        </tr>
                        <tr>
                            <td>Number of Blocks</td>
                            <td>{{ $careerStats['blocks'] }}</td>
                        </tr>
                        <tr>
                            <td>Ball Steals</td>
                            <td>{{ $careerStats['steals'] }}</td>
                        </tr>
                        <tr>
                            <td>Number of Fouls</td>
                            <td>{{ $careerStats['fouls'] }}</td>
                        </tr>
                        <tr>
                            <td>Efficiency Rating</td>
                            <td>{{ $careerStats['efficiency_rating'] ?? 'Unknown'}}</td>
                        </tr>
                    @endcomponent
                </div>
            </div>

        </div>
    </div>
@endsection
