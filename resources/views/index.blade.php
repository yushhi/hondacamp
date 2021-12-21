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

            <div class="container m-auto">
                {{-- <div class="relative mt-4" uk-slider="finite: true">

                    <div class="uk-slider-container pb-3">

                        <ul class="uk-slider-items uk-child-width-1-1@m uk-child-width-1-1@s uk-child-width-1-1 uk-grid-small uk-grid">

                            <li>
                                <a href="#" >
                                    <div class="market-list">
                                        <div class="item-media"> <img src="assetsuser/images/product/1.jpg" alt=""></div>
                                    </div>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#">
                                    <div class="market-list">
                                        <div class="item-media"> <img src="assetsuser/images/product/1.jpg" alt=""></div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="market-list">
                                        <div class="item-media"> <img src="assetsuser/images/product/1.jpg" alt=""></div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <div class="market-list">
                                        <div class="item-media"> <img src="assetsuser/images/product/1.jpg" alt=""></div>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>

                        <a class="-left-5 absolute bg-white bottom-1/4 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i> </a>
                        <a class="-right-5 absolute bg-white bottom-1/4 flex h-11 items-center justify-center mb-8 p-2 rounded-full shadow text-2xl w-11 z-10 dark:bg-gray-800 dark:text-white" href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>
                    </div>
                </div>  --}}
                @php $sliders = DB::table('sliders')->orderBy('created_at', 'desc')->get(); @endphp
                @foreach($sliders as $slider)
                    <div class="item-media"> 
                        <img 
                        style="width: 100%;height: 20rem; border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(92, 92, 92, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" 
                        src="{{ url('/images/'.$slider->file) }}" alt="">
                    </div>
                @endforeach
                
                @php $groups = DB::table('posts')->orderBy('created_at', 'desc')->get(); @endphp
                <div class="my-3 grid lg:grid-cols-4 grid-cols-2 gap-3 hover:text-yellow-700 uk-link-reset">
                    @foreach($groups as $post)
                    <div>
                        <div class="bg-gray-50 border-b border-gray-100 flex items-baseline justify-between py-4 px-6 dark:bg-gray-800 dark:border-gray-700">
                            <h2 class="font-semibold text-lg">{{ $post->title }}</h2>
                        </div>
                        <div style="background-color: white; padding: 12px" class="grid grid-cols-1 gap-3 ">
                            <div
                            class="bg-red-500 max-w-full h-32 rounded-lg relative overflow-hidden uk-transition-toggle">
                            <a href="/group/{{ $post->id }}" uk-toggle>
                                <img src="/images/{{ $post->file }}" class="w-full h-full">
                            </a>
                        </div>
                        </div>
                    </div>
                    @endforeach
                </div>
 

            </div>

        </div>

    </div>


    @include('includes.user.script')
</body>

</html>