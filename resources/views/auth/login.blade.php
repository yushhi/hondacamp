<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.user.style')
</head>

<body class="bg-gray-100">


    <div id="wrapper" class="flex flex-col justify-between h-screen">

        <!-- header-->
        <div class="bg-white py-4 shadow dark:bg-gray-800">
            <div class="max-w-6xl mx-auto">


                <div class="flex items-center lg:justify-between justify-around">

                    <a href="trending.html">
                        <img src="assets/images/logo.png" alt="" class="w-32">
                    </a>

                    <div class="capitalize flex font-semibold hidden lg:block my-2 space-x-3 text-center text-sm">
                        <a href="login" class="py-3 px-4">Login</a>
                        <a style="background-color: #9b1919" href="register" class="pink-500 px-6 py-3 rounded-md shadow text-white">Register</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content-->
        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold  mb-6"> Log in</h1>
                <p class="mb-2 text-black text-lg"> Email or Username</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input name="email" type="text" placeholder="example@mydomain.com" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="password" type="password" placeholder="***********" class="bg-gray-200 mb-2 shadow-none dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <div class="flex justify-between my-4">
                        <a href="#"> Forgot Your Password? </a>
                    </div>
                    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Login</button>
                    <div class="text-center mt-5 space-x-2">
                        <p class="text-base"> Not registered? <a href="register" class=""> Create a account </a></p>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Footer -->

        <div class="lg:mb-5 py-3 uk-link-reset">
            <div class="flex flex-col items-center justify-between lg:flex-row max-w-6xl mx-auto lg:space-y-0 space-y-3">
                <div class="flex space-x-2 text-gray-700 uppercase">
                    <a href="#"> About</a>
                    <a href="#"> Help</a>
                    <a href="#"> Terms</a>
                    <a href="#"> Privacy</a>
                </div>
                <p class="capitalize"> © copyright 2021 by Muslim Go Online</p>
            </div>
        </div>

    </div>


    @include('includes.user.script')
</body>

</html>