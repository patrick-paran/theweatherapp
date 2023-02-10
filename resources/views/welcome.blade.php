<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Weather App</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

        <div class="nav">
           <nav class="flex items-center justify-between flex-wrap bg-teal-500 p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
              <svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 54 54" xmlns="http://www.w3.org/2000/svg"><path d="M13.5 22.1c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05zM0 38.3c1.8-7.2 6.3-10.8 13.5-10.8 10.8 0 12.15 8.1 17.55 9.45 3.6.9 6.75-.45 9.45-4.05-1.8 7.2-6.3 10.8-13.5 10.8-10.8 0-12.15-8.1-17.55-9.45-3.6-.9-6.75.45-9.45 4.05z"/></svg>
              <span class="font-semibold text-xl tracking-tight">Weather Forecast</span>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">

             <div class="text-sm lg:flex-grow">
    
             </div>
              @if(Auth::check())
                <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Logout</a>
              @endif
              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                </form>
            </div>

      
        </nav>
        </div>
         @guest
        <div class="grid  place-items-center mt-8">
            <p>
                Welcome to weather forecast web application. Please login with your <br/> github user to use the application and view the weather in your city.
                
            </p>
            @if (Route::has('login'))
                <a href="{{ url('auth/github') }}" class="mt-4  bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                  Login
                </a>
           @endif

             
        </div>

        @else

         <div class="grid  place-items-center mt-8">
            <p>
                {{Auth::user()->name}} <br/> <a target= "_blank" class="hover:text-blue-500" href="https://github.com/{{Auth::user()->github_nick_name}}"> https://github.com/{{Auth::user()->github_nick_name}}</a>
                
            </p>
            <weather-component></weather-component>

             
        </div>


        @endguest

    
    </div>

  <script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>