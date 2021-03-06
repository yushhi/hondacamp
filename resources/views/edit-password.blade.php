<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.user.style')
</head>

<body>
    
    
        <div id="wrapper">
    
			@include('includes.user.sidebar')

        <div class="main_content">

            @include('includes.user.header')
    
            <div class="container pro-container m-auto">
                <!-- profile-cover-->
                <div class="flex lg:flex-row flex-col items-center lg:py-8 lg:space-x-8">

                    <div>
                        <div class="bg-gradient-to-tr from-yellow-600 to-pink-600 p-1 rounded-full m-0.5 mr-2  w-56 h-56 relative overflow-hidden uk-transition-toggle">  
                            <img src="/images/{{Auth::user()->avatar}}" class="bg-gray-200 border-4 border-white rounded-full w-full h-full dark:border-gray-900">

                            <div class="absolute -bottom-3 custom-overly1 flex justify-center pt-4 pb-7 space-x-3 text-2xl text-white uk-transition-slide-bottom-medium w-full">
                                <a href="#" class="hover:text-white">
                                    <i class="uil-camera"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="lg:w/8/12 flex-1 flex flex-col lg:items-start items-center"> 
                        
                        <h2 class="font-semibold lg:text-2xl text-lg mb-2"> {{Auth::user()->name}} </h2>
                        <p class="lg:text-left mb-2 dark:text-gray-100">{{Auth::user()->alamat}}</p>

                            <div class="flex font-semibold mb-3 space-x-2  dark:text-gray-10">
                                <a href="#">{{Auth::user()->nomer_wa}}</a> , <a href="#">{{Auth::user()->email}}</a> 
                            </div>

                            
                            <div class="capitalize flex font-semibold space-x-3 text-center text-sm my-2">
                                <a href="#" class="bg-gray-300 shadow-sm p-2 px-6 rounded-md dark:bg-gray-700"> Jenis Mobil</a>
                                <a href="#" class="bg-pink-500 shadow-sm p-2 pink-500 px-6 rounded-md text-white hover:text-white hover:bg-pink-600"> Tipe Mobil</a>
                                <div>
                                    
                                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base dark:bg-gray-900" uk-drop="mode: click">
                              
                                  <ul class="space-y-1">
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-user-minus mr-2"></i>Unfriend
                                        </a> 
                                    </li>
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-eye-slash  mr-2"></i>Hide Your Story
                                        </a> 
                                    </li>
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-700">
                                         <i class="uil-share-alt mr-2"></i> Share This Profile
                                        </a> 
                                    </li>
                                    <li>
                                      <hr class="-mx-2 my-2  dark:border-gray-700">
                                    </li>
                                    <li> 
                                        <a href="#" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                         <i class="uil-stop-circle mr-2"></i> Block
                                        </a> 
                                    </li>
                                  </ul>
                              
                                </div>

                                </div>

                            </div>

                            <div class="divide-gray-300 divide-transparent divide-x grid grid-cols-2 lg:text-left lg:text-lg mt-3 text-center w-full dark:text-gray-100">
                                <div class="flex lg:flex-row flex-col"> Nomer Angka <strong class="lg:pl-2">{{Auth::user()->nomer_angka}}</strong></div>
                                <div class="lg:pl-4 flex lg:flex-row flex-col"> Nomer Mesin <strong class="lg:pl-2">{{Auth::user()->nomer_mesin}}</strong></div>
                            </div>
                            
                    </div>

                    <div class="w-20"></div>

                </div>

				<div class="container m-auto"> 

					<h1 class="text-2xl leading-none text-gray-900 tracking-tight mt-3"> Setting </h1>
                    <ul class="mt-3 -mr-3 flex-nowrap lg:overflow-hidden overflow-x-scroll uk-tab">
                        <li><a href="/profile">Edit Profile</a></li>
                        <li class="uk-active"><a href="#">Edit Password</a></li>
                    </ul>

                    <form method="POST" action="{{ route('user.password.update') }}" enctype="multipart/form-data">
                        @method('patch')
                        @csrf
                        <div class="grid lg:grid-cols-1 mt-12 gap-12">
                            <div class="bg-white rounded-md lg:shadow-lg shadow col-span-2">
                                <div class="grid grid-cols-2 gap-3 lg:p-6 p-4">
                                        <div class="col-span-2">
                                            <label for=""> Password Lama</label>
                                            <input id="current_password" type="password" name="current_password" required autocomplete="current_password" class="shadow-none bg-gray-100 form-control @error('current_password') is-invalid @enderror">
											@error('current_password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>

										<div class="col-span-2">
                                            <label for=""> Password Baru</label>
                                            <input id="password" type="password" name="password" required autocomplete="new-password" class="shadow-none bg-gray-100 form-control @error('current_password') is-invalid @enderror">
											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>

										<div class="col-span-2">
                                            <label for=""> Konfirmasi Password</label>
                                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="shadow-none bg-gray-100 form-control @error('current_password') is-invalid @enderror">
                                     		@error('password-confirm')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
                                </div> 
                                    <div class="bg-gray-10 p-6 pt-0 flex justify-end space-x-3">
                                        {{-- <button class="p-2 px-4 rounded bg-gray-50 text-red-500"> Cancel </button> --}}
                                        <button type="submit" class="button bg-blue-700"> Save </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
	
				</div>
            </div>

        </div>

    </div>
    @include('includes.user.script')
    @if(Session::has('statusEditPassword'))
    <script>
        swal("Berhasil","{!! Session::get('statusEditPassword') !!}", "success", {
        button:"OK",
        });
    </script>
    @endif
</body>

</html>