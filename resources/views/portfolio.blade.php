@extends('layouts')
@section('title-block')
    Portfolio Page
@endsection
@section('content')
<div class="project">
    <div class="header">
        <div class="header_container container">
            <div class="menu_item" id="menu_item_projects" data-aos="zoom-in" data-aos-duration="1500">
                <h5 class="menu_item_content">
                    <a href="#">PROJECTS</a>
                </h5>
            </div>
            <div class="menu_item" id="menu_item_statistics" data-aos="zoom-in" data-aos-duration="1500">
                <h5 class="menu_item_content">
                    <a href="#">STATISTICS</a>
                </h5>
            </div>
            <div class="menu_item" id="menu_item_contacts" data-aos="zoom-in" data-aos-duration="1500">
                <h5 class="menu_item_content">
                    <a href="#">CONTACTS</a>
                </h5>
            </div>
        </div>
    </div>
    <div class="projects_container mb-5">
        <div class="w-75 mx-auto">
            <div>
                <div class="text-center projects_container_title" data-aos="fade-right" data-aos-duration="1500">
                    <h1>My Portfolio</h1>
                </div>
                <div class="text-center w-50 mx-auto mt-3 projects_container_info" data-aos="fade-left"
                     data-aos-duration="1500">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                </div>
            </div>
            <div class="project_container d-flex">
                @foreach($projects as $project)
                    <div class="project_block" data-aos="zoom-in" data-aos-duration="1500">
                        <div class="project_main_image">
                            @php
                                $filteredImage = array_filter($project->image->toArray(), function($item) {
                                    return $item['status'] == 1;
                                });

                                $main_image = null;
                                foreach ($project->image as $image){
                                    if($image["status"]){
                                        $main_image = $image;
                                    }
                                }

                            @endphp
                            <img class="w-100" src="{{asset('storage/uploads/'.$main_image["image_path"])}}"
                                 alt="">
                        </div>
                        <div class="project_block_info">
                            <div class="title">{{$project->title}}</div>
                            <div class="short_description">{{$project->short_description}}</div>
                            <div class="languages">
                                @foreach($project->lang as $lang)
                                    <span>{{$lang->name}}</span>
                                @endforeach
                            </div>
                            <div class="more_info_project mx-2">
                                <button class="more_info_project_button" role="button">
                                    <a href="{{route("get-project", $project->id)}}">Read more</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="stats_wrapper">
        <div class="stats_bg d-flex align-items-center"
             style="background-image: linear-gradient(0deg, rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url({{asset('storage/images/stats.jpg')}});">
            <div class="stats_info d-flex mx-auto" data-aos="fade-up" data-aos-duration="1500">
                <div class="d-flex mx-3 align-items-center">
                    <span class="stats_number">3</span>
                    <span class="stats_text">Coder Degrees</span>
                </div>
                <div class="d-flex mx-3 align-items-center">
                    <span class="stats_number">25</span>
                    <span class="stats_text">Project Completed</span>
                </div>
                <div class="d-flex mx-3 align-items-center">
                    <span class="stats_number">100</span>
                    <span class="stats_text">Satisfied Clients</span>
                </div>
                <div class="d-flex mx-3 align-items-center">
                    <span class="stats_number">4K</span>
                    <span class="stats_text">Coffee Cups</span>
                </div>
            </div>
        </div>
    </div>
    <div class="contact_wrapper">
        <div class="contact_container w-75 mx-auto d-flex">
            <div class="contact_info" data-aos="fade-right" data-aos-duration="1500">
                <div>
                    <div class="contact_mail">
                        <a class="text-white" href="mailto:info@gmail.com">info@gmail.com</a>
                    </div>
                    <div class="contact_mail">
                        <a class="text-white" href="mailto:hr@gmail.com">hr@gmail.com</a>
                    </div>
                </div>
                <div class="mt-3 follow_us">
                    <span>Follow us</span>
                </div>
                <div class="d-flex mt-3 contact_icon justify-content-center gap-4">
                    <div>
                        <a href="https://www.facebook.com/">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                    <div>
                        <a href="https://twitter.com/">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </div>
                    <div>
                        <a href="https://www.linkedin.com/">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                    <div>
                        <a href="https://www.instagram.com/">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-3 copyright">
                    <span>©2023 Privacy policy</span>
                </div>
            </div>
            <div class="contact_form" data-aos="zoom-in" data-aos-duration="1500">
                <div class="contact_me">
                    <span>Contact Me</span>
                </div>
                <div>
                    <input type="text" placeholder="Enter your Name" required>
                </div>
                <div>
                    <input type="text" placeholder="Enter a valid email address" required>
                </div>
                <div>
                    <textarea placeholder="Enter your message" required></textarea>
                </div>
                <div>
                    <button class="contact_form_button" role="button">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();


    $("#menu_item_projects").click(function () {
        $('html,body').animate({
                scrollTop: $(".project_container").offset().top - 100
            },
            'fast');
    });

    $("#menu_item_statistics").click(function () {
        $('html,body').animate({
                scrollTop: $(".stats_wrapper").offset().top - 100
            },
            'fast');
    });

    $("#menu_item_contacts").click(function () {
        $('html,body').animate({
                scrollTop: $(".contact_container").offset().top - 100
            },
            'fast');
    });
</script>

@endsection


