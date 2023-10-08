@extends('layouts.master')
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="assets/images/video.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Lorem ipsum dolor sit amet</h6>
            <h2>Taste the love at our <em>Restaurant</em></h2>
            <div class="main-button">
                <a href="book-table.html">Book a table</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
<!-- ***** Cars Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Our <em>Events</em></h2>
                    <img src="assets/images/line-dec.png" alt="">
                    <p>Updating..</p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="assets/images/other-1-720x480.jpg" alt="">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>$</sup>1500.00 - <sup>$</sup>3500.00
                        </span>

                        <h4>Weddings</h4>

                        <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                        <ul class="social-icons">
                            <li><a href="book-table.html">+ Book a table</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="assets/images/other-2-720x480.jpg" alt="">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>$</sup>1500.00 - <sup>$</sup>3500.00
                        </span>

                        <h4>Birthdays</h4>

                        <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                        <ul class="social-icons">
                            <li><a href="book-table.html">+ Book a table</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="assets/images/other-3-720x480.jpg" alt="">
                    </div>
                    <div class="down-content">
                        <span>
                            <sup>$</sup>1500.00 - <sup>$</sup>3500.00
                        </span>

                        <h4>Anniversaries</h4>

                        <p>Nullam nibh mi, tincidunt sed sapien ut, rutrum hendrerit velit. Integer auctor a mauris sit amet eleifend.</p>

                        <ul class="social-icons">
                            <li><a href="book-table.html">+ Book a table</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
        </div>

        <br>

        <div class="main-button text-center">
            <a href="menu.html">View our Menu</a>
        </div>
    </div>
</section>
<!-- ***** Cars Ends ***** -->
@endsection