<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.user.style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
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
                        <a style="background-color: #9b1919" href="login" class="bg-pink-500 pink-500 px-6 py-3 rounded-md shadow text-white" >Login</a>
                        <a href="register" class="py-3 px-4">Register</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Content-->

        <div>
            <div class="lg:p-12 max-w-md max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
                <h1 class="lg:text-3xl text-xl font-semibold mb-6"> Register</h1>
                <p class="mb-2 text-black text-lg"> Register to manage your account </p>
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="name" type="text" placeholder="Nama" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="email" type="email" placeholder="Email" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="password" type="password" placeholder="Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="nomer_wa" type="number" placeholder="Nomer WA" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <div class="form-group">
                        <label for="category_id">Pilih Jenis Mobil:</label>
                        <select name="category_id" class="form-control" style="width:250px">
                            <option value="">--- Pilih Tipe Mobil ---</option>
                            @foreach ($jenismobils as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Pilih Tipe Mobil</label>
                        <select name="subcategory_id" class="form-control"style="width:250px">
                        <option>--Tipe Mobil--</option>
                        </select>
                    </div>
                    {{-- <input name="subcategory_id" type="text" placeholder="Tipe Mobil" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;"> --}}
                    <input name="nomer_angka" type="text" placeholder="Nomer Angka" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="nomer_mesin" type="text" placeholder="Nomer Mesin" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <input name="alamat" type="text" placeholder="Alamat" class="bg-gray-200 mb-2 shadow-none  dark:bg-gray-800" style="border: 1px solid #d3d5d8 !important;">
                    <button type="submit" class="bg-gradient-to-br from-pink-500 py-3 rounded-md text-white text-xl to-red-400 w-full">Daftar</button>
                    <div class="text-center mt-5 space-x-2">
                        <p class="text-base"> Do you have an account? <a href="/login"> Login </a></p>
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
    <script type="text/javascript">
    jQuery(document).ready(function ()
    {
            jQuery('select[name="category_id"]').on('change',function(){
               var countryID = jQuery(this).val();
               if(countryID)
               {
                  jQuery.ajax({
                     url : 'dropdownlist/gettipemobils/' +countryID,
                     type : "GET",
                     dataType : "json",
                     success:function(data)
                     {
                        console.log(data);
                        jQuery('select[name="subcategory_id"]').empty();
                        jQuery.each(data, function(key,value){
                           $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                     }
                  });
               }
               else
               {
                  $('select[name="subcategory_id"]').empty();
               }
            });
    });
    </script>
</body>

</html>