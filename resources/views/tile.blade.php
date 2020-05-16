<x-dashboard-tile :position="$position" refresh-interval="60">
    <h1>{{ $standings['competition']['name'] }}</h1>
    <table class="text-xs border table-fixed">
        <thead>
        <tr>
            <th class="px-1">#</th>
            <th class="px-1"></th>
            <th class="px-1">Team</th>
            <th class="px-1">Points</th>
            <th class="px-1">Goals</th>
        </tr>
        </thead>
        <tbody>

    @foreach($standings['standings'][0]['table'] as $rank)
            <tr class="{{ $rank['team']['id'] === $highlight ? 'bg-gray-200 font-semibold' : '' }}">
                <td class="px-1 text-center border">{{ $rank['position']}}</td>
                <td class="flex justify-center px-1 border"><img style="height: 20px;" src="{{ $rank['team']['crestUrl'] }}" alt="{{ $rank['team']['name']}}"></td>
                <td class="px-1 border">{{ $rank['team']['name']}}</td>
                <td class="px-1 text-center border">{{ $rank['points']}}</td>
                <td class="px-1 border">{{ $rank['goalsFor'] . ' : ' . $rank['goalsAgainst'] }}</td>
            </tr>
    @endforeach

        </tbody>
    </table>

</x-dashboard-tile>