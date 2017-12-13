<div class="card">
    <div class="card-block">
        <div class="card-title-block">
            <h3 class="title"> Current User Abilities </h3>
        </div>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    @foreach($userAbilities as $ability)
                        @if (in_array($ability, $presetAbilities))
                            <tr>
                                <td>
                                    {{ ucwords(str_replace("-", " ", $ability)) }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
