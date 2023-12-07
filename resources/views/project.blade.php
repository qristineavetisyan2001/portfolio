@extends('layouts')
@section('title-block')
    Project Page
@endsection
@section('content')
    <style>

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper {
            width: 65%;
            height: 300px;
        }

        .swiper-slide {
            background-size: cover;
            background-position: center;
        }

        .mySwiper2 {
            height: 79vh;
            width: 65%;
        }

        .mySwiper {
            box-sizing: border-box;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 25%;
            height: 100%;
            opacity: 0.4;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .swiper-button-next, .swiper-button-prev {
            width: fit-content;
        }

        .swiper-button-next:after {
            font-size: 50px;
            transform: translateX(-30px);
        }

        .swiper-button-prev:after {
            font-size: 50px;
            transform: translateX(30px);
        }

        .info_project{
            border:2px solid white;
            box-shadow: 0 0 10px white;
            color:white;
            width: 75%;
            margin: 0 auto;
            margin-top: 50px;
            text-align: center;
            font-size: 25px;
        }

    </style>

        <div class="mt-5">
            <!-- Swiper -->
            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                <div class="swiper-wrapper">

                @foreach($project->image as $image)
                        <div class="swiper-slide">
                            <img src="{{asset("storage/uploads/".$image->image_path)}}"/>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach($project->image as $image)
                        <div class="swiper-slide">
                            <img src="{{asset("storage/uploads/".$image->image_path)}}"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="info_project">
            <div>
                <h1>{{$project->title}}</h1>
            </div>
            <div class="d-flex description mt-4 justify-content-center">
                <span>About Projects :</span>
                <p class="mx-2">{{$project->description}}</p>
            </div>
            <div class="d-flex worked_by_me mt-3 justify-content-center">
                <span>The work I did on the project :</span>
                <p class="mx-2">{{$project->worked_by_me}}</p>
            </div>
        </div>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    </script>

@endsection


