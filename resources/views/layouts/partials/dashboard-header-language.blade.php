<li class="profile dropdown">
    <a class="nav-link dropdown-toggle" 
        data-toggle="dropdown" 
        href="#" role="button" 
        aria-haspopup="true" 
        aria-expanded="false">         
        <span class="language">
            @if(Session::get('locale_image'))
            <img width="18.66" height="14" src="/resources/assets/flags/@if(Session::get('locale_image')){{Session::get('locale_image')}} @endif"/>
            @else
            <img width="22.66" height="16" src="/resources/assets/flags/america.png"/>
            @endif
        </span>         
    </a>
    <div class="dropdown-menu profile-dropdown-menu" 
        aria-labelledby="dropdownMenu1"> 
        <a v-for="language in languages" class="dropdown-item" :href="'/language/chooser_language/'+language.foldername">
            <img :src="'/resources/assets/flags/'+language.flag_name" width="18.66" height="14">
            @{{ language.languagename }}
        </a> 
    </div>
</li>