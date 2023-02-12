@extends('layouts.main')

@section('page-title', trans('app.main.home'))

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
            <h1>Sports Tournament Made Easier With GoPodium</h1>
            <h2 style="width: 70vw">GoPodium is an online sports tournament management system that helps you organize, manage
                and run
                tournaments on the go.</h2>
            <a class="btn-get-started scrollto">Get Started</a>
            <img src="{{ asset('assets/img/multisports2.jpg') }}" class="img-fluid hero-img" alt="" data-aos="zoom-in"
                data-aos-delay="150">
        </div>

    </section><!-- End Hero -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row no-gutters">
                <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="content">
                        <h3>Fast, Easy to use and Intuitive!</h3>
                        <p>
                            GoPodium is a tournament management system for sports. It provides a one-stop center for
                            coaches, team managers to view their schedules, events and results from any device with internet
                            access.
                        </p>
                        {{-- <a href="#" class="about-btn">About us <i class="bx bx-chevron-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-mobile"></i>
                                <h4>Responsive Design</h4>
                                <p>Our website is mobile friendly and has responsive design, so you can use it on any
                                    device</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-trophy"></i>
                                <h4>View Schedule & Result</h4>
                                <p>We provides an easy way to view tournament schedule and results</p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-run"></i>
                                <h4>Various Type of Event</h4>
                                <p>Organizer can choose to hold various type of event such as Individual or Team and Matchup
                                    or Heat
                                </p>
                            </div>
                            <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-paint"></i>
                                <h4>Personalization</h4>
                                <p>Upload your tournament and team logo to make your events look more intresting</p>
                            </div>
                        </div>
                    </div><!-- End .content-->
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" data-aos="fade-up">
        <div class="container">

            <div class="section-title">
                <h2>Features</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                    sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
                    <img src="{{ asset('main/img/features-1.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
                    <h3>Create a tournament</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                        <li><i class="bi bi-check"></i> Ullam est qui quos consequatur eos accusamus.</li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                    <img src="{{ asset('main/img/features-2.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                    <h3>Personalize your tournament</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right">
                    <img src="{{ asset('main/img/features-3.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5" data-aos="fade-left">
                    <h3>Invite team managers</h3>
                    <p>Cupiditate placeat cupiditate placeat est ipsam culpa. Delectus quia minima quod. Sunt saepe
                        odit aut quia voluptatem hic voluptas dolor doloremque.</p>
                    <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.
                        </li>
                        <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
                    <img src="{{ asset('main/img/features-4.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
                    <h3>Organize your tournament</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Pricing</h2>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="box">
                        <h3>Rookie</h3>
                        <h4><sup>RM</sup>20<span></span></h4>
                        <ul>
                            <li>3 Teams</li>
                            <li>5 Athletes per Team</li>
                            <li>10 Events</li>
                            <li>7 Days Tournament</li>
                            <li class="na">Invite Team Managers</li>
                            <li class="na">Personalization</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box featured">
                        <h3>All-Star</h3>
                        <h4><sup>RM</sup>35<span></span></h4>
                        <ul>
                            <li>4 Teams</li>
                            <li>20 Athletes per Team</li>
                            <li>20 Events</li>
                            <li>14 Days Tournament</li>
                            <li>Invite Team Managers</li>
                            <li>Personalization</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="box">
                        <h3>MVP</h3>
                        <h4><sup>RM</sup>50<span></span></h4>
                        <ul>
                            <li>Unlimited Teams</li>
                            <li>Unlimited Athletes per Team</li>
                            <li>Unlimited Events</li>
                            <li>30 Days Tournament</li>
                            <li>Invite Team Managers</li>
                            <li>Personalization</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Pricing Section -->

    @include('main.partial.faq')

    @include('main.partial.contact')
@endsection
