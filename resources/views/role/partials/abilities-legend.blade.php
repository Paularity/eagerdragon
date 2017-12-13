<div class="col-md-4">
    <div class="card">
        <div class="card-block">  
            <div class="card-title-block">
                <h3 class="title"> Abilities </h3>
            </div>          
            <div class="table-responsive">                
                <table class="table">                    
                    <tbody>
                        @foreach($abilities as $key => $ability)
                            <tr>
                                <th scope="row">{{ strtoupper($key) }}</th>
                                <td>{{ ucfirst($ability) }}</td>
                            </tr>
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>