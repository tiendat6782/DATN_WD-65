<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styleClient.css') }}">
</head>
<body>
    <div class="text-end mt-3 me-5">
        @guest
            <a href="{{ route('showLoginForm') }}">Login</a>
        @endguest
        @auth
            <div class="profile-container ">
                <div class="round-image-container">
                    <img src="{{ asset("storage/".Auth::user()->image) }}" alt="Avatar" id="avatar" data-toggle="popover" tabindex="0" class="image" />
                </div>
                <div class="menu" id="menu" >
                    <div class="text-center">
                        @if (Auth::user()->role_id == 0)
                            <a href="{{ route('admin.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @endif
                            <a href="{{ route('showProfile') }}"><i class="fa-regular fa-user fa-lg"></i>  My profile </a>
                            <a href="#"><i class="fa-solid fa-cart-shopping fa-lg"></i>  Cart</a>
                            <a href="{{ route('logout') }}"><i class="fa-solid fa-power-off fa-lg"></i>  Log out</a>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</body>
</html>
<script src="{{ asset('js/script.js') }}"></script>