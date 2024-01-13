@extends('layouts.master')
@section('content')
    <!-- Preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
<!-- End Preloader -->
    <section class="tm-welcome-section">
        <div class="container tm-position-relative">
        <div class="tm-lights-container">
            <img src="source/img/light.png" alt="Light" class="light light-1">
            <img src="source/img/light.png" alt="Light" class="light light-2">
            <img src="source/img/light.png" alt="Light" class="light light-3">  
        </div>        
        <div class="row tm-welcome-content">
            <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="source/img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Contact Us&nbsp;&nbsp;<img src="source/img/header-line.png" alt="Line" class="tm-header-line"></h2>
            <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
            <p class="gray-text tm-welcome-description">Cafe House is free <span class="gold-text">responsive Bootstrap</span> v3.3.5 layout by <span class="gold-text">templatemo</span>. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
            <a href="#main" class="tm-more-button tm-more-button-welcome">Message Us</a>      
        </div>
        <img src="source/img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">            
        </div>      
    </section>
    <div class="tm-main-section light-gray-bg">
        <div class="container" id="main">
        <section class="tm-section row">
            <h2 class="col-lg-12 margin-bottom-30">Send us a message</h2>
            <form action="{{ route('admin.postContactMail') }}" method="post" class="tm-contact-form">
                @csrf
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" id="contact_name" class="form-control" placeholder="NAME" />
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="contact_email" class="form-control" placeholder="EMAIL" />
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" id="contact_subject" class="form-control" placeholder="SUBJECT" />
                        @error('subject')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea id="contact_message" name="message" class="form-control" rows="6" placeholder="MESSAGE"></textarea>
                        @error('message')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                    <button class="tm-more-button" type="submit" name="submit">Send message</button> 
                    </div>               
                </div>
                <div class="col-lg-6 col-md-6">
                    <div id="google-map">
                        <iframe src="https://maps.google.com/maps?q=31+Đống+Đa,+Đà+Nẵng&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div> 
            </form>
        </section>
        </div>
    </div>
@endsection