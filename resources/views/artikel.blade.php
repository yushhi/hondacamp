<!DOCTYPE html>
<html lang="en">


<head>
    @include('includes.user.style')
</head>

<body>

    <style>
        .carousel-item {
            height: 20rem;
            background: #777;
            color: white;
            /* position: relative; */
        }
        .container {
            /* position: absolute; */
            botton: 0;
            left: 0;
            right: 0;
            /* padding-bottom: 50px; */
        }
    </style>


    <div id="wrapper">
        @include('includes.user.sidebar')
        <div class="main_content">
            @include('includes.user.header')

            <div class="container m-auto">

                

                <div class="relative mt-4">
                    @foreach($sliders as $slider)
                    <div class="item-media"> 
                        <img
                        style="width: 100%;height: 20rem; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(92, 92, 92, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" 
                        src="{{ url('/images/'.$slider->file) }}" alt="">
                    </div>
                    @endforeach
                </div>
                <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mt-5 mb-2"> Artikel Terbaru </h1>

                <div class="lg:flex justify-center lg:space-x-10 lg:space-y-0 space-y-5">

                    <!-- left sidebar-->
                    <div class="space-y-5 flex-shrink-0 lg:w-7/12">

                        <!-- post 1-->
                        @foreach($artikels as $artikel)
                        <div class="bg-white shadow rounded-md dark:bg-gray-900 -mx-2 lg:mx-0">
    
                            <div>
                                <a href="/artikel/{{ $artikel->id }}">  
                                    <img style="height: 250px; width: 100%" src="{{ url('/images/'.$artikel->file) }}" alt="">
                                </a>
                            </div>

                            <!-- post header-->
                            <div class="flex justify-between items-center px-4 py-3">
                                <div class="items-center">
                                    <h2 style="font-size: 24px; padding-bottom: 10px" class="block capitalize font-semibold dark:text-gray-100"> {{ $artikel->judul }} </h2>
                                    <h2 style="font-size: 16px" class="dark:text-gray-100"> {!! \Illuminate\Support\Str::limit($artikel->keterangan, 160, '.....') !!} </h2>
                                </div>
                              <div>
                              </div>
                            </div>
                        </div>
                        @endforeach


                    </div>

                    <!-- right sidebar-->
                    <div class="lg:w-5/12">

                        <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden">
                            
                            <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                                <h2 class="font-semibold text-lg">Member Honda Camp</h2>
                            </div>
                            @php $users = DB::table('users')->orderBy('created_at', 'desc')->take(5)->get(); @endphp
                            <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                                @foreach($users as $user)
                                <div class="flex items-center justify-between py-3">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <a href="profile">
                                            <img src="/images/{{$user->avatar}}" class="bg-gray-200 rounded-full w-10 h-10">
                                        </a>
                                        <div class="flex flex-col">
                                            <span class="block capitalize font-semibold"> {{ $user->name }} </span>
                                            <span class="block capitalize text-sm"> {{ $user->name }} </span>
                                        </div>
                                    </div>
                                    <a href="#" class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-red-600 hover:text-white hover:border-red-600 dark:border-gray-800"> Profile </a>
                                </div>
                                @endforeach

                            </div>

                        </div>


                        {{---------------------- list group -----------------}}

                        <div class="bg-white dark:bg-gray-900 shadow-md rounded-md overflow-hidden mt-10">
                            
                            <div class="bg-gray-50 dark:bg-gray-800 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:border-gray-800">
                                <h2 class="font-semibold text-lg">List Group</h2>
                            </div>
                            @php $groups = DB::table('posts')->orderBy('created_at', 'desc')->take(5)->get(); @endphp
                            <div class="divide-gray-300 divide-gray-50 divide-opacity-50 divide-y px-4 dark:divide-gray-800 dark:text-gray-100">
                                @foreach($groups as $group)
                                <div class="flex items-center justify-between py-3">
                                    <div class="flex flex-1 items-center space-x-4">
                                        <div class="flex flex-col">
                                            <span class="block capitalize font-semibold"> {{ $group->title }} </span>
                                        </div>
                                    </div>
                                    <a href="#" class="border border-gray-200 font-semibold px-4 py-1 rounded-full hover:bg-red-600 hover:text-white hover:border-red-600 dark:border-gray-800"> Profile </a>
                                </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>               
          

            </div>

        </div>

    </div>
    @include('includes.user.script')
</body>

</html>