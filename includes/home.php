<section id=" " class="hero d-flex  " style="padding: 0px !important;">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            foreach ($sliders as $slidersKey => $slider) {
            ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $slidersKey ?>" <?= $slidersKey === 0 ? 'class="active" aria-current="true" ' :  null ?> aria-label="Slide <?= $slidersKey + 1 ?>"></button>
            <?php } ?>

        </div>
        <div class="carousel-inner">
            <?php

            foreach ($sliders as $sliderKey1 => $slider1) {
            ?>
                <div class="carousel-item  <?= $sliderKey1 === 0 ? 'active' :  null ?>">
                    <img src="<?= $slider1->background_image ? $get->assets_url . '/' . $slider1->background_image : './assets/img/NewTemp/slider-2.webp' ?>" class="slidermob img-responsive" alt="">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-lg-5 slider-content" style="margin-top: 40px;">
                                <h1 class="slider-title" data-aos="fade-down"><?= $slider1->title ?> </h1>
                                <p><?= $slider1->content ?></p>
                                <div class="ebt">
                                    <a style="font-weight: 700; padding-left: 30px; padding-right: 30px;" class="btn btn-getstarted btn-light"
                                    href="<?= $get->login_url ?>">Invest Now</a>
                                    
                                    <a class="btn-getstarted btn btn-success  btn-green scrollto" href="<?= $get->register_url ?>" 
                                    style="font-weight: 700; padding-left: 30px;padding-right: 30px;
                                    ">Open Account</a>
                                </div>
                            </div>
                            <?php if ($slider1->image) { ?>
                                <div class="col-lg-7 slider-media">
                                    <img src="<?= $get->assets_url . '/' . $slider1->image  ?>" loading="lazy" decoding="async" class="img-fluid" class="lazy loading" data-aos="fade-left">
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                </div>
            <?php } ?>


        </div>
</section>

<!-- ======= About Section ======= -->
<?php
    if ($get->home_image_about_us &&  $get->home_about_us) {

        echo '    <section class="about" id="about">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5 order-lg-1 order-sm-0 order-0">
                    <div class="block-head"><span class="block-subtitle text-uppercase">ABOUT US</span>
                        ' . $get->home_about_us . '

                    </div>


                </div>
                <div class="col-lg-7  order-lg-0 order-sm-1 order-1 mt-5">
                    <img src="' . $get->assets_url . '/' . $get->home_image_about_us . '" class="img-fluid" alt="Responsive image" data-aos="zoom-in">
                </div>
            </div>
        </div>
    </section>';
    }
    ?>

    <!-- End About Section -->

<main id="main">
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="row aligns-items-center">
                <div class="col-lg-7 col-md-9 order-md-0   order-sm-1 order-1">
                    <div class="testimonials-slider swiper  ">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item m-5">
                                    <div class="row d-flex align-items-center">
                                        <?php foreach ($cards as $card) { ?>
                                            <div class="col-12 col-md-6 <?= $card->row_column <= 3 ? 'col-lg-6' : "col-lg-6 " ?>">
                                                <div class="card m-2">
                                                    <div class="card-body">
                                                        <?php if ($card->icon) { ?>
                                                            <div class="icon-box__icon bg-light-orange">
                                                                <div style="text-align:center; width:79px;">
                                                                    <?= $card->icon ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                        <h6 class="card-subtitle mt-3"> <?= $card->title ?> </h6>
                                                        <p class="card-text mt-3"> <?= $card->content ?> </p>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-3 order-sm-0 order-0 d-flex align-content-center align-items-center">
                    <div class="block-head"><span class="block-subtitle text-uppercase">WHY SHOULD YOU START</span>
                        <h2 class="block-title"> <?= $get->title ?><br>
                            <?= count($cards) ?> reasons to start your investments with
                        </h2>
                    </div>

                </div>
            </div>
    </section><!-- End Testimonials Section -->

    

    <!-- ======= Convenient Section ======= -->
    <section class="convenient" id="convenient">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 mt-5  pt-3 col-lg-6 col-sm-12 order-sm-0 order-0 ">
                    <div class="block-head">
                        <span class="block-subtitle text-uppercase">METATRADER IS THE NUMBER 1 TOOL FOR INVESTORS WORLDWIDE! </span>
                        <h2 class="block-title"> CONVENIENT PLATFORM OPTIONS </h2>
                    </div>
                    <div class="col-lg-8">

                        <div class="card mt-5">
                            <div class="icon-box__icon icon-box__icon-border bg-light-green" style="margin:-9% 40%">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="44" height="44" viewBox="0 0 44 44">
                                    <defs>
                                        <clipPath id="a">
                                            <rect width="44" height="44" fill="none">
                                            </rect>
                                        </clipPath>
                                    </defs>
                                    <g transform="translate(0)">
                                        <g transform="translate(0)">
                                            <g clip-path="url(#a)">
                                                <path d="M9.748,72.327s1.16-4.7,7.043-6.412l-.5-1.51S-.361,66.172,2.456,79.85l.036.08c-.119.084-.238.169-.352.263A5.452,5.452,0,0,0,1,87.64a5.052,5.052,0,0,0,7.2.579c3.267,3.151,7.706,5.069,12.731.864,0,0-13.091-8.976-11.186-16.756M7.769,87.455c-.061.05-.124.093-.186.139a4.177,4.177,0,0,1-5.861-.563,4.523,4.523,0,0,1,.942-6.177c.066-.054.134-.1.2-.151a4.174,4.174,0,0,1,5.845.575,4.524,4.524,0,0,1-.942,6.177" transform="translate(0 -47.505)" fill="#4eb8a1">
                                                </path>
                                                <path d="M74.987,92.116s-4.57,1.141-8.786-3.424l-1.061,1.16s9.3,14.363,19.7,5.4l.052-.071c.128.069.256.138.391.2a5.106,5.106,0,0,0,6.91-2.446,5.386,5.386,0,0,0-2.87-6.835c1.172-4.453.739-9.4-5.214-12.015,0,0-1.568,16.137-9.124,18.037m13.885-5.27c.071.032.137.07.206.1a4.457,4.457,0,0,1,2.258,5.608A4.236,4.236,0,0,1,85.6,94.589c-.077-.035-.15-.075-.224-.114a4.456,4.456,0,0,1-2.241-5.6,4.236,4.236,0,0,1,5.732-2.029" transform="translate(-48.573 -54.64)" fill="#4eb8a1">
                                                </path>
                                                <path d="M55.837,15.155s3.509,3.231,2.266,9.4l1.528.242S65.792,8.74,52.731,5.01l-.085,0c-.018-.148-.036-.3-.064-.444C52.007,1.55,49.375-.454,46.7.088c-2.639.535-4.328,3.351-3.818,6.322-4.216,1.537-7.913,4.716-6.615,11.257,0,0,13.757-7.844,19.568-2.511m-12.1-8.789c-.015-.078-.023-.156-.034-.234a4.4,4.4,0,0,1,3.188-5.105,4.312,4.312,0,0,1,4.877,3.712c.016.085.025.17.037.254a4.4,4.4,0,0,1-3.191,5.085,4.313,4.313,0,0,1-4.877-3.712" transform="translate(-26.848 0)" fill="#4eb8a1">
                                                </path>
                                            </g>
                                        </g><text transform="translate(16.624 29.148)" fill="#4eb8a1" font-size="15" font-family="TitilliumWeb-Bold, Titillium Web" font-weight="700">
                                            <tspan x="0" y="0">4
                                            </tspan>
                                        </text>
                                    </g>
                                </svg>
                            </div>
                            <div class="card-body">

                                <h6 class="card-subtitle mt-3 text-center">
                                    Download <span style="color:#3daee6">
                                        MT5</span>
                                </h6>
                                <div class="col-lg-12 mt-3">
                                    <div class="d-grid gap-2 col-12 mx-auto">

                                        <a href="<?= $get->download_app ?>" aria-label="download ios" rel="noopener" target="_blank" class="btn btn-outline-dark btn-block" >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="19.297" height="24.075" viewBox="0 0 19.297 24.075">
                                                <g transform="translate(-3.381)">
                                                    <path d="M22.679,17.682c-.064.183-.126.379-.2.572A14.869,14.869,0,0,1,19.9,22.628a5.614,5.614,0,0,1-.708.7,2.779,2.779,0,0,1-1.741.71,3.456,3.456,0,0,1-1.442-.266c-.335-.138-.665-.293-1-.418a4.447,4.447,0,0,0-3.284.082c-.391.157-.777.329-1.175.465a2.78,2.78,0,0,1-1.429.127,2.766,2.766,0,0,1-1.144-.539,6.487,6.487,0,0,1-1.127-1.127,15.465,15.465,0,0,1-3.184-6.685A12.285,12.285,0,0,1,3.4,12.433,7.757,7.757,0,0,1,4.473,8.743,5.8,5.8,0,0,1,8.189,6.016a4.68,4.68,0,0,1,2.845.224q.732.283,1.467.561a1.825,1.825,0,0,0,1.352,0q.75-.29,1.5-.574a5.976,5.976,0,0,1,1.584-.389,5.888,5.888,0,0,1,2.389.3A5.239,5.239,0,0,1,22,8.126c.018.026.038.055.051.076a5.334,5.334,0,0,0-2.532,4.934A5.237,5.237,0,0,0,22.679,17.682ZM13.125,5.569A3.6,3.6,0,0,0,14.576,5.3a5.345,5.345,0,0,0,3.2-4.857c0-.14-.012-.279-.018-.441-.218.033-.417.049-.608.1A5.32,5.32,0,0,0,13.623,2.77a4.647,4.647,0,0,0-.635,2.67C12.993,5.542,13.029,5.568,13.125,5.569Z" transform="translate(0)">
                                                    </path>
                                                </g>
                                            </svg> <span>App
                                                Store</span>
                                        </a>
                                        <!-- <button class="btn btn-primary" type="button">
                                <img src="./assets/img/NewTemp/icon/googleplayicon.svg" alt="">
                                GOOGLE PLAY</button>  -->
                                        <a href="<?= $get->download_google ?>" aria-label="download android" rel="noopener" target="_blank" class="btn btn-outline-dark btn-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20.946" height="22.343" viewBox="0 0 20.946 22.343">
                                                <g transform="translate(-16.014 0)">
                                                    <g transform="translate(17.423 0)">
                                                        <g transform="translate(0 0)">
                                                            <path d="M51.071.358A2.837,2.837,0,0,0,48.3.365l10.18,9.391,3.42-3.42Z" transform="translate(-48.302 0)">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g transform="translate(16.014 1.325)">
                                                        <g transform="translate(0)">
                                                            <path d="M16.4,30.365a2.6,2.6,0,0,0-.391,1.364V48.69a2.612,2.612,0,0,0,.364,1.331L26.615,39.784Z" transform="translate(-16.014 -30.365)">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g transform="translate(28.629 7.038)">
                                                        <g transform="translate(0)">
                                                            <path d="M312.029,163.077l-3.262-1.8-3.665,3.664,4.492,4.143,2.437-1.345a2.639,2.639,0,0,0,0-4.663Z" transform="translate(-305.102 -161.277)">
                                                            </path>
                                                        </g>
                                                    </g>
                                                    <g transform="translate(17.377 11.691)">
                                                        <g transform="translate(0)">
                                                            <path d="M57.511,267.9,47.246,278.166a2.831,2.831,0,0,0,2.815.027L61.7,271.768Z" transform="translate(-47.246 -267.901)">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg> <span>Google
                                                Play</span> </a>


                                        <a href="<?= $get->download_windows ?>" aria-label="download microsoft" rel="noopener" class="btn btn-outline-dark btn-block" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="21.946" height="21.946" viewBox="0 0 21.946 21.946">
                                                <path d="M0,258.023l8.995,1.24v-8.586H0Z" transform="translate(0 -239.097)">
                                                </path>
                                                <path d="M0,47.235H8.995V38.544L0,39.784Z" transform="translate(0 -36.764)">
                                                </path>
                                                <path d="M216.129,259.392l11.962,1.648V250.674H216.129Z" transform="translate(-206.145 -239.094)">
                                                </path>
                                                <path d="M216.132,1.649v8.823h11.962V0Z" transform="translate(-206.148)">
                                                </path>
                                            </svg>
                                            <span>Windows</span>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-6"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="./assets/img/NewTemp/convenient.jpg" class="img-fluid  convenientimg " alt="Responsive image" data-aos="zoom-in">

                </div>


            </div>
        </div>
    </section> <!-- End Convenient Section -->


    <?php
        if (isset($questions)&& !empty($questions)) {   ?>
    <section id="faq" class="faq mb-5">
            <div class="container aos-init aos-animate" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-5 faqimgmob col-sm-12 order-sm-1 order-1">
                        <img src="./assets/img/NewTemp/accordion.jpg" class="img-fluid" alt="Responsive image">

                    </div>
                    <div class="col-lg-7 col-sm-12 order-sm-0 order-0 ">
                        <div class="content px-xl-5">
                            <div class="block-head">
                                <h2 class="block-title"> WHY <?= $get->title ?></span>
                                    </h2><h2>
                                    <p class="fw-bold">
                                    We provide our investors with continuous improvement, new opportunities to explore financial markets and the opportunity to work with a recognized leader in the financial industry.
                                    </p>
                            </h2></div>
                        </div>

                        <div class="accordion accordion-flush px-xl-5" id="faqlist">
                        <?php $questId=0;  foreach ($questions as $quest) {   ?>
														
													
                            <div class="accordion-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                <h3 class="accordion-header">
                                    <button class="accordion-button collapsed accordionitem" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo $questId ?>">
                                        <div class="icon-box__iconaccordion bg-light-orange">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16">
                                                <g>
                                                    <path d="M15.68 27.432v1.142h1.045v-1.046h1.045v-1.572a1.57 1.57 0 00-1.568-1.568.523.523 0 01-.523-.523v-.523h.523a.523.523 0 01.523.523v.523h1.045v-.523a1.566 1.566 0 00-1.045-1.472v-1.137H15.68v1.045h-1.045v1.568a1.57 1.57 0 001.568 1.568.523.523 0 01.523.523v.523h-.523a.523.523 0 01-.523-.523v-.523h-1.045v.519a1.566 1.566 0 001.045 1.476z">
                                                    </path>
                                                    <path d="M31.361 17.075h-9.67l3.92-5.227h-2.09V6.621H19.34v5.228h-2.091l3.92 5.227h-4.443V8.189c0-1.492-3.919-1.568-4.7-1.568-.261 0-.872.01-1.568.076v-4.78C10.454.425 6.535.349 5.75.349s-4.7.076-4.7 1.568v15.158A1.046 1.046 0 000 18.12v13.59a1.046 1.046 0 001.045 1.045h30.316a1.046 1.046 0 001.045-1.045V18.12a1.046 1.046 0 00-1.045-1.045zm-10.976-4.181V7.667h2.091v5.227h1.045l-2.091 2.787-2.09-2.787zM8.363 17.075v-1.547a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v1.547zm-6.272-4.683a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v2.087a15.2 15.2 0 01-1.568.079 7.546 7.546 0 01-3.659-.618zm0-3.136a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v2.088a15.2 15.2 0 01-1.568.08 7.546 7.546 0 01-3.659-.618zm13.59 1.975a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618V9.256a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5zm0 3.136a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618v-1.975a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5zm-.142-6.178a9.132 9.132 0 01-3.517.523 9.134 9.134 0 01-3.517-.523 9.132 9.132 0 013.517-.523 9.134 9.134 0 013.517.523zm-8.221 0v.443a15.051 15.051 0 01-1.568.079 7.546 7.546 0 01-3.659-.618V6.119a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v.721c-1.091.204-2.091.596-2.091 1.349zM2.091 2.983a12.171 12.171 0 003.659.5 12.171 12.171 0 003.659-.5v1.975a7.546 7.546 0 01-3.659.618 7.546 7.546 0 01-3.659-.618zM5.75 1.394a9.134 9.134 0 013.517.523 9.134 9.134 0 01-3.517.523 9.134 9.134 0 01-3.517-.523 9.134 9.134 0 013.517-.523zM2.091 15.528a12.171 12.171 0 003.659.5c.538 0 1.069-.026 1.568-.075v1.12H2.091zM1.045 31.71V18.12h30.316v13.59z">
                                                    </path>
                                                    <path d="M2.091 19.165v11.5h28.225v-11.5zm3.083 1.045a2.622 2.622 0 01-2.038 2.038V20.21zm-2.038 7.37a2.622 2.622 0 012.038 2.038H3.136zm3.095 2.039a3.661 3.661 0 00-3.094-3.094v-3.22a3.661 3.661 0 003.094-3.095h6.677a5.736 5.736 0 000 9.408zm9.973-9.408a4.7 4.7 0 11-4.7 4.7 4.709 4.709 0 014.7-4.701zm11.029 9.408a2.622 2.622 0 012.038-2.038v2.038zm2.038-7.37a2.622 2.622 0 01-2.038-2.038h2.038zm-3.094-2.038a3.661 3.661 0 003.094 3.094v3.22a3.661 3.661 0 00-3.094 3.094h-6.678a5.736 5.736 0 000-9.408zM26.135 10.802h4.182V5.576h2.091L28.226 0l-4.182 5.576h2.091zm2.091-9.06l2.091 2.788h-1.046v5.227H27.18V4.53h-1.045z">
                                                    </path>
                                                </g>
                                            </svg>
                                        </div>
                                        <?= $quest->title ?>
                                    </button>
                                </h3>
                                <div id="faq-content-<?php echo $questId ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <div class="accordion-body">
                                    <?= $quest->content ?>
                                    </div>
                                </div>
                            </div><!-- # Faq item-->
                            <?php $questId++; } ?>
                          

                           

                        </div>

                    </div>
                </div>
            </div>
        </section>
<?php } ?>
    <section id="testimonialsother" class="testimonialsother">

        <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators mb-0">
                <?php
                foreach ($comments as $comentKey => $coment) {
                ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="<?= $comentKey ?>" <?= $comentKey === 0 ? 'class="active" aria-current="true" ' :  null ?> aria-label="Slide <?= $comentKey + 1 ?>"></button>
                <?php } ?>

            </div>
            <div class="col-lg-12 text-center mt-5">
                <img src="./assets/img/NewTemp/icon/testimonialsicons.png" alt="" class="img-fluid rounded">
                <span>Over 500 Happy Investors</span>
            </div>
            <div class="carousel-inner pb-5 mt-5 col-lg-12">

                <?php
                foreach ($comments as $comentKey => $coment) {
                ?>
                    <div class=" text-center carousel-item  <?= $comentKey === 0 ? 'active' :  null ?> ">
                    
                        <div class="yorumlar">

                            <h2 class="heroheading"> <?= $coment->title ?> </h2>
                            <p class=" "> <?= $coment->content ?> </p>

                        </div>
                    </div>
                    
                <?php } ?>
                
            </div>

        </div>
    </section>






    <!-- End Testimonials Section -->

    <section class="clientnew">
        <div class="row justify-content-center text-center">
            <?php
            if ($companies) {
                foreach ($companies as $companie) {
                    echo '              <div class="col-sm-4 col-md-2 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                <a href="' . $companie->url . ' ">
                    <img class="img-fluid" src="' . $get->assets_url . '/' . $companie->image . '" alt="' . $companie->title . '" />
                </a>
            </div>';
                }
            }
            ?>


        </div>
    </section>


    <section class="registerform">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">

                    <div class="row ">
                        <div class="col-lg-5 registerformtopmargin m-lg-4">
                            <div class="block-head"><span class="block-subtitle text-uppercase color-black"> ARE YOU READY TO EARN WITH <?= $get->brand_name ?>?</span>
                                <h2 class="block-title color-white"> We will call you </h2>
                            </div>
                            <p>Step into the world's largest trading volume market in few minutes; easily and securely.</p>
                        </div>
                        <div class="col-lg-6" id="register">
                            <form method="post" action="./register/" novalidate id="jsd">
                                <input type="hidden" name="language" value="en">
                                <div class="sliderForm">
                                    <div class="row g-5 mt-lg-1">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control form-control-lg mb-2" name="firstname" placeholder="Ad">
                                            <span class="inputerrormessage msgFirstName"></span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="text" class="form-control form-control-lg mb-2" name="lastname" placeholder="Soyad">
                                            <span class="inputerrormessage msgLastName"></span>
                                        </div>
                                    </div>
                                    <div class="row g-5 mt-1">
                                        <div class="col-lg-6 col-sm-12">
                                            <input type="email" class="form-control form-control-lg emailz mb-2" name="email" placeholder="Email" aria-describedby="emailHelp">
                                            <span class="inputerrormessage msgEmail"></span>
                                        </div>
                                        <div class="col-lg-6 col-sm-12 ">
                                            <input name="inputPhoneId" type="tel" placeholder="Phone" class="form-control form-control-lg mb-2" inputmode="tel" required disabled>
                                        </div>
                                    </div>


                                    <input type="hidden" name="campaign" value="swissbase-website" /><input type="hidden" name="affiliate" value="lylc" /><input type="hidden" name="current_url" value="" /><input type="hidden" name="currency" value="USD" /><input type="hidden" name="language" value="tr" /><input type="hidden" name="platform_type" value="MT5" /><input type="hidden" name="aid" value="bitcoin" /><input type="hidden" name="partner_id" value="" /><input type="hidden" name="description" value="" />

                                    <div class="d-grid gap-2 my-4">
                                        <button class="btn btnregister" type="submit">REGISTER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->