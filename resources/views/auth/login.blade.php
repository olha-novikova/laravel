<div class="middle-valign">
    <form class="col s12" method="POST" action="{{ url('auth/login')}}" >
        {!! csrf_field() !!}
        <div class="row">
            <div class="input-field col s12">
                <input id="email" type="email" class="validate" name="email" value="">
                <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="password" id="password">
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input type="checkbox"  name="remember" id="remember"  />
                <label for="remember">Remember Me</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class="btn waves-effect waves-light pretty_green" type="submit" name="action">Login </button>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <a class="collection-item" href="{{ url('auth/register')}}">Registration</a>
            </div>
        </div>
    </form>
    <div class="input-field col s2">
        <a class="waves-effect waves-light btn fb-login-button" href="{{ url('auth/fb_login')}}">LogIn</a>
    </div>
    <div class="input-field col s2">
        <a class="waves-effect waves-light btn vk-login-button" href="{{ url('auth/vk_login')}}">LogIn</a>
    </div>
</div>
