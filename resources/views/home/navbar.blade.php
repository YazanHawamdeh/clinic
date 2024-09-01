<nav class="navbar navbar-expand-lg mt-3 ">
        <div class="container-fluid">
            <div class="logo">
                <a href="Home.html">
                <img src="imgs/Group 89.png" alt="logo"></a>
            </div>
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link me-3" href="#">Contact</a>
                    </li>
                    <li class="nav-item ">
                        <button class="btn search-icon rounded-circle" id="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="grey"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </button>
                        <div id="overlay" class="overlay"></div>
                        <div id="search-bar" class="search-bar">
                            <input type="text" placeholder="Search" />
                        </div>
                    </li>


                @if(Auth::check())
                    <li class="nav-item">
                        <a href="" class="btn nav-icons rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="grey" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('show_cart') }}" class="btn nav-icons rounded-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="grey" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                            </svg>
                        </a>
                    </li>

                @else
                    <li class="nav-item mt-2">
                        <a href="{{ route('loginPage') }}" class="loginbtn"> Login </a>
                    </li>
                @endif
                </ul>



            </div>
        </div>
    </nav>