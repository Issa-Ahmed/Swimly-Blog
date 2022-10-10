<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Swimly</title>
  {{-- Google Font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen  font-poppins">
  {{-- Nav --}}
  <nav class="flex justify-between items-center px-6 h-16">
    {{-- Logo --}}
    <div class=" text-teal-700">
      <x-application-logo class="inline w-6 h-6 fill-current"></x-application-logo>
      <span class="text-lg font-bold px-2">Swimly</span>
    </div>
    {{-- Nav Items --}}
    <div>
      <ul class="flex space-x-10">
        <li><a href="#articles">Articles</a></li>
        <li>About Us</li>
        @if(auth()->user())
          <form class="cursor-pointer" method="POST" action="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
        @csrf
         {{ __('Log Out') }}
       </form>
        @else
          <li><a href="{{route('login')}}"><svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M352 96h64c17.7 0 32 14.3 32 32V384c0 17.7-14.3 32-32 32H352c-17.7 0-32 14.3-32 32s14.3 32 32 32h64c53 0 96-43 96-96V128c0-53-43-96-96-96H352c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-7.5 177.4c4.8-4.5 7.5-10.8 7.5-17.4s-2.7-12.9-7.5-17.4l-144-136c-7-6.6-17.2-8.4-26-4.6s-14.5 12.5-14.5 22v72H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H160v72c0 9.6 5.7 18.2 14.5 22s19 2 26-4.6l144-136z"/></svg></a></li>
        @endif
      </ul>
    </div>
  </nav>
  @yield('content')
 
  <section class="h-80 bg-gray-800 text-white mt-5 pt-14 text-center space-y-5">
    <h4 class="font-semibold text-3xl">Newsletter</h4>
    <p>You can trust us. we only send promo offers, not a single spam.</p>
    <form action="" >
      <input type="email" name="" class="w-60 h-8 rounded pl-2 text-sm text-black" placeholder="Your email">
      <button type="submit" class="pl-3 text-teal-400 hover:font-bold transition">Subscribe 
        <span><svg class="h-4 w-4 inline" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></span>
      </button>
    </form>
  </section>
</body>
</html>