<table class="table table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Volume</th>
            <th>% Volume</th>
            <th>Num of Trx</th>
            <th>% Trx</th>
        </tr>
    </thead>
    @if (count($results) == 0)
        <tbody>
            <tr>
                <td colspan="5"
                    class="no-records-available">
                    {{ trans('app.no_records_available') }}
                </td>
            </tr>
        </tbody>
    @else
        <tbody>
            @foreach ($results['transactions'] as $key => $result)
                <tr>
                    <td>
                        {{ $key }}
                    </td>
                    <td>
                        {{ $result['volume'] }} USD
                    </td>
                    <td>
                        {{ $result['percentVolumn'] }}%
                    </td>
                    <td>
                        {{ $result['numOfTrax'] }}
                    </td>
                    <td>
                        {{ $result['numOfTraxPercent'] }}%
                    </td>
                </tr>
            @endforeach
        </tbody>
        <thead>
            <tr>
                <th></th>
                <th>Volume</th>
                <th>% Volume</th>
                <th>Num of Trx</th>
                <th>% Trx</th>
            </tr>
        </thead>
    @endif
</table>