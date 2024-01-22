<!DOCTYPE html>
<html lang="en">
   <head>
      @include('including.homecss')
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('including.header')
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <h1 class="banner_taital">Game Space</h1>
                        <p class="banner_text">The Laravel Game Database is a web application built using the Laravel PHP framework. It serves as a platform to store and manage information about video games, including details about games, genres, producers.</p>
                        <div class="read_bt"><a href="{{ route('games.index') }}">View All Games</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Variety Of Games</h1>
            <p class="services_text">There are many variations of game genres to choose from such as Action, Shooter, Racing, Role-Playing and many more!</p>
            <div class="services_section_2">
               <div class="row">
                  <div class="col-md-4">
                     <div><img src="{{ asset('assets/images/img-1.jpeg') }}" class="services_img"></div>
                     <h2 style="text-align: center">Action Games</h2>
                  </div>
                  <div class="col-md-4">
                     <div><img src="{{ asset('assets/images/img-2.jpeg') }}" class="services_img"></div>
                     <h2 style="text-align: center">Racing Games</h2>
                  </div>
                  <div class="col-md-4">
                     <div><img src="{{ asset('assets/images/img-3.jpg') }}" class="services_img"></div>
                     <h2 style="text-align: center">Sport Games</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <h1 class="about_taital">About The Application</h1>
                     <p class="about_text">Laravel Game Database is a web application built using the Laravel PHP framework. The project serves as a platform for storing and managing video game data, including game details (game name, release year, producer, genre), genres, producers (name, year of creation), and user management. Also, users have the option to search for a game by its name, year or producer.</p>
                  </div>
               </div>
               <div class="col-md-6 padding_right_0">
                  <div><img src="{{ asset('assets/images/about-img.jpg') }}" class="about_img"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container">
            <div class="location_main">
               <div class="call_text"><a href="#">Made by Adriana Raykova</a></div>
               <div class="call_text"><a href="#">Specialty: Software Engineering</a></div>
            </div>
            <div class="social_icon">
               <ul>
                  <li><a href="#"><img src="{{ asset('assets/images/fb-icon.png') }}"></a></li>
                  <li><a href="#"><img src="{{ asset('assets/images/twitter-icon.png') }}"></a></li>
                  <li><a href="#"><img src="{{ asset('assets/images/linkedin-icon.png') }} "></a></li>
                  <li><a href="#"><img src="{{ asset('assets/images/instagram-icon.png') }} "></a></li>
               </ul>
            </div>
         </div>
      </div>   
   </body>
</html>
