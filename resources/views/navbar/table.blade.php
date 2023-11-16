@extends('layouts.Master')
@section('content')
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
  <div class="container">
      <div class="row">
          <div class="col-lg-10 offset-lg-1">
              <div class="cta-content">
                  <br>
                  <br>
                  <h2>Feel free to <em>Book a table</em></h2>
                  <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
              </div>
          </div>
      </div>
  </div>
</section>

<section class="section">
  <div class="container">
      <br>
      <br>
      <div class="row">
          <div class="col-md-8">
              <div class="contact-form">
                  <form id="contact" action="" method="post">
                    <div class="row">

                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="date" type="text" id="date" placeholder="31.07.2020" required="">
                        </fieldset>
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="time" type="text" id="time" placeholder="20:30" required="">
                        </fieldset>
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <select>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                          </select>
                        </fieldset>
                      </div>

                      <div class="col-md-6 col-sm-12">
                        <fieldset>
                          <input name="name" type="text" id="name" placeholder="Name*" required="">
                        </fieldset>
                      </div>
                      
                      <div class="col-lg-12">
                        <fieldset>
                          <textarea name="notes" rows="6" id="notes" placeholder="Notes" required=""></textarea>
                        </fieldset>
                      </div>
                      <div class="col-lg-12">
                        <fieldset>
                          <button type="submit" id="form-submit" class="main-button">Check availability</button>
                        </fieldset>
                      </div>
                    </div>
                  </form>
              </div>

              <br>
          </div>

          <div class="col-md-4">
              <div class="tabs-content">
                  <label>Email</label>
                  <p><a href="#">contact@company.com</a></p>

                  <label>Phone</label>
                  <p><a href="#"> +1 333 4040 5566</a></p>

                  <label>Address</label>
                  <p> 212 Barrington Court New York, ABC 10001 United States of America</p>
              </div>

              <br>
          </div>
      </div>
  </div>
</section>
@endsection