<header>
    <div class="header_inner">
        <div class="left-side">
            <!-- Logo -->
            <div id="logo" class=" uk-hidden@s">
                <a href="home.html">
                    <img src="assetsuser/images/logo-mobile.png" alt="">
                    <img src="assetsuser/images/logo-mobile-light.png" class="logo_inverse">
                </a>
            </div>

            <div class="triger" uk-toggle="target: #wrapper ; cls: sidebar-active">
                <i class="uil-bars"></i>
            </div>

            <div class="header_search">
                <input type="text" placeholder="Search..">
                <div class="icon-search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>

        </div>
        <div class="right-side lg:pr-4">
             <!-- upload -->

            <!-- profile -->

            <a href="#">
                <img src="assetsuser/images/avatars/avatar-2.jpg" class="header-avatar" alt="">
            </a>
            <div uk-drop="mode: click;offset:9" class="header_dropdown profile_dropdown border-t">
                <ul>
                    @if(Auth::user()-> role == "admin")
                    <li><a href="/dashboard"> Dashboard </a> </li>
                    @endif
                    <li><a href="/profile"> Profile </a></li>
                    <li><a href="#"> Log Out</a></li>
                </ul>
            </div>

        </div>
    </div>
</header>