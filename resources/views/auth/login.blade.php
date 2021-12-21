<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.user.style')
</head>

<body class="bg-gray-100">


    <div id="wrapper" class="flex flex-col justify-between h-screen">

        

        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Log in</h1>
                <p class="mb-2 text-black text-lg"> Email or Username</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input name="email" type="text" placeholder="example@mydomain.com" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="password" type="password" placeholder="***********" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Login</button>
                    <div class="text-center mt-5 space-x-2">
                        <p class="text-base"> Belum Mendaftar? <a href="register" class=""> Buat Akun Anda </a></p>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Footer -->

        <div class="lg:mb-5 py-3 uk-link-reset">
            <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                
                <p class="capitalize"> © copyright 2021 by Muslim Go Online</p>
            </div>
        </div>

    </div>


    @include('includes.user.script')
</body>

</html>