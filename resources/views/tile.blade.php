<x-dashboard-tile :position="$position">
    <h1>{{ $standings['competition']['name'] }}</h1>
    <table class="table-fixed border text-xs">
        <thead>
        <tr>
            <th>#</th>
            <th></th>
            <th>Team</th>
            <th>Points</th>
            <th>Goals</th>
        </tr>
        </thead>
        <tbody>

    @foreach($standings['standings'][0]['table'] as $rank)
            <tr>
                <td class="border">{{ $rank['position']}}</td>
                <td class="border"><img style="height: 20px;" src="{{ $rank['team']['crestUrl'] }}" alt="{{ $rank['team']['name']}}"></td>
                <td class="border">{{ $rank['team']['name']}}</td>
                <td class="border">{{ $rank['points']}}</td>
                <td class="border">{{ $rank['goalsFor'] . ' : ' . $rank['goalsAgainst'] }}</td>
            </tr>
    @endforeach

        </tbody>
    </table>

</x-dashboard-tile>