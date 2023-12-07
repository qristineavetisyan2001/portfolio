@extends('layouts')

@section('title-block')
    Admin Page
@endsection

@section('content')

<div class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{route('admin')}}" class="site_title"><i class="p-2 fa-solid fa-user"></i> <span>Admin Panel</span></a>
                </div>
                <div class="clearfix"></div>
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMAs5ccvwbSzUaljRkfqVguiDM5BOwjNhwmg&usqp=CAU"
                            alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                    </div>
                </div>
                <br/>
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li>
                                <a>
                                    <i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span>
                                </a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route('adminInsertForm')}}">Admin insert form</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{route("admin")}}">Tables</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                               data-toggle="dropdown" aria-expanded="false">
                                <img
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMAs5ccvwbSzUaljRkfqVguiDM5BOwjNhwmg&usqp=CAU"
                                    alt="">John Doe
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"> Profile</a>
                                <a class="dropdown-item" href="#">
                                    <span class="badge bg-red pull-right">50%</span>
                                    <span>Settings</span>
                                </a>
                                <a class="dropdown-item" href="#">Help</a>
                                <a class="dropdown-item" href="{{route('logOutAdmin')}}"><i
                                        class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                        </li>
                        <li role="presentation" class="nav-item dropdown open">
                            <a href="#" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown"
                               aria-expanded="false">
                                <i class="fa-regular fa-envelope"></i>
                                <span class="badge bg-green">2</span>
                            </a>
                            <ul class="dropdown-menu list-unstyled msg_list" role="menu"
                                aria-labelledby="navbarDropdown1">
                                <li class="nav-item">
                                    <a class="dropdown-item">
                                        <span class="image">
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMAs5ccvwbSzUaljRkfqVguiDM5BOwjNhwmg&usqp=CAU" alt="Profile Image"/>
                                        </span>
                                        <span>
                                            <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                        </span>
                                        <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="dropdown-item">
                                        <span class="image"><img
                                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMAs5ccvwbSzUaljRkfqVguiDM5BOwjNhwmg&usqp=CAU"
                                                alt="Profile Image"/></span>
                                        <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                        <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="right_col" id="right_col" role="main">
            @yield('admin-section')
        </div>
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
    </div>
</div>

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/date.js')}}"></script>
<script src="{{asset('js/custom.min.js')}}"></script>

<script>
    const addLanguage = () => {
        if ($("#language_input").val()) {

            const content = $("#language_input").val();
            $("#language_input").val("");

            const newLanguage = $(`<input name="langs[]" class="language_block" type="text" value="${content}" />`)

            $("#languages_container").append(newLanguage);
        }
    }

    $("#add_language_button").click(() => addLanguage());

    const addImage = () => {
            const newImage = $(`<input name="images[]" class="images_block mt-3" type="file" />`)

            $("#images_container").append(newImage);
    }

    $("#add_image_button").click(() => addImage());
</script>
</div>
@endsection

