@if (request()->routeIS('shoes.collection') || 
     request()->routeIS('checkout.main') || 
     request()->routeIS('checkout.detail'))
    @include('layouts.header.designshoes')
    @yield('content')
    @include('layouts.footer.designshoes')

@elseif (request()->routeIS('patina') || request()->routeIS('shoescare'))
    @include('layouts.header.patina')
    @yield('content')
    @include('layouts.footer.patina')

@elseif (request()->routeIS('patinadetail'))
    @include('layouts.header.patinadetail')
    @yield('content')
    @include('layouts.footer.patinadetail')

@elseif (request()->routeIS('designidea'))
    @include('layouts.header.designidea')
    @yield('content')

@elseif (request()->routeIS('designerShoes'))
    @include('layouts.header.patinadetail')
    @yield('content')

@elseif (Route::currentRouteName()=='women.designidea')
    @include('layouts.header.designidea')
    @yield('content')
@endif