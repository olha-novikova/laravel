@include('layouts.header')
<div class="parallax-container">
    <div class="parallax"><img src="{{ URL::asset('images/computer-820281_1920.jpg') }}"></div>
</div>
<div class="container" id ="news_page">
    @yield('breadcrumbs')
    <div class="row">
        <div class="col s12 m9 l9">
            <div  class="teaser-content">
                <h1 class="page-title">
                    <span>@yield('page_name')</span>
                </h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m9 l9">
            @yield('content')
        </div>
        <div class="col s12 m3 l3">
            @include('layouts.searchform')
            @yield('most_commented')
            @yield('last_comment')
        </div>
    </div>
</div>
@include('layouts.footer')