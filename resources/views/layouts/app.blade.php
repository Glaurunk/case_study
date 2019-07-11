<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  @include('layouts.head')

    <body>
        <div id="app" class="wrapper">

          @include('layouts.nav')

          @include('layouts.nav-menu')

          @include('layouts.messages')

          <main class="py-4">
              @yield('content')
          </main>

          @include('layouts.footer')

          @yield('footer')

        </div>
    </body>
</html>
