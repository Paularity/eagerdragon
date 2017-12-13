<div class="col-md-4">
    <div class="card">
        <div class="card-block">  
            <div class="card-title-block">
                <h3 class="title">
                    Add User Abilities <span class="required">*</span>
                </h3>
            </div>  
            @if ($errors->has('abilities.*'))                                    
                <div class="alert alert-danger fade in alert-dismissable">
                    Invalid Abilities
                </div>
            @endif   
            @if ($errors->has('abilities'))                                    
                <div class="alert alert-danger fade in alert-dismissable">
                    {{ $errors->first('abilities') }}
                </div>
            @endif         
            <div class="table-responsive">                
                <table class="table ed-compact-table">                    
                    <tbody>
                        @foreach($presetAbilities as $ability)
                            <tr>
                                <th scope="row">
                                    <label>
                                        <input class="checkbox all-ability user-{{ $ability }}"
                                            name="abilities[]" 
                                            value="{{ $ability }}" 
                                            type="checkbox"
                                            @if(is_array(old('abilities')) && 
                                                in_array($ability, old('abilities')) || 
                                                isset($userAbilities) &&
                                                in_array($ability, $userAbilities)
                                            )
                                                checked
                                            @endif
                                            >
                                        <span></span>
                                    </label>                                
                                </th>
                                <td>{{ ucwords(str_replace("-", " ", $ability)) }}</td>
                            </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>