<x-dashboard-tile :position="$position">
    <h1 class="underline">Live football results</h1>
    @if($liveresults['count'] === 0)
        <p class="text-xs">There are no live results right now !</p>
    @else
        <table class="text-xs border table-fixed">
            <thead>
            <tr>
                <th class="px-1">Home</th>
                <th class="px-1"></th>
                <th class="px-1">Away</th>
                <th class="px-1">Result</th>
            </tr>
            </thead>
            <tbody>

            @foreach($liveresults['matches'] as $match)
                <tr class="border">
                    <td class="px-1 text-right">{{ $match['homeTeam']['name']}}</td>
                    <td class="px-1"> : </td>
                    <td class="px-1 text-left">{{ $match['awayTeam']['name']}}</td>
                    <td class="px-1 text-center">{{ $match['score']['fullTime']['homeTeam']}} : {{$match['score']['fullTime']['awayTeam']}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif

</x-dashboard-tile>
