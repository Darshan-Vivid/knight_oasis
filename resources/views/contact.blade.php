<x-header :title="'Contact-Us'" />

    <main>
        <!-- banner section start-->
        <section class="ko-banner" style="background-image: url('assets/images/cart-banner.webp');">
            <div class="ko-container">
                <div class="ko-banner-content">
                    <h2>Contact</h2>
                    <p>Stay updated with the latest happenings at our hotel! From exciting events and special offers to exclusive insights and behind-the-scenes stories.</p>
                    <nav>
                        <ol class="ko-banner-list">
                          <li><a href="#">Home</a></li>
                          <li class="active">Contact</li>
                        </ol>
                      </nav>
                </div>
            </div>
        </section>
        <!-- banner section end-->

        <!-- contact us form start -->
         <section class="ko-contact-us">
            <div class="ko-container">
                <div class="ko-contact-us-content">
                    <h3>Write a Message</h3>
                    <form action="#">
                        <div class="ko-col-6">
                            <div class="ko-form-group">
                                <label for="fname" class="ko-contact-label">First Name</label>
                                <input id="fname" class="ko-form-control" type="text" placeholder="First Name">
                            </div>
                        </div>
                        <div class="ko-col-6">
                            <div class="ko-form-group">
                                <label for="lname"class="ko-contact-label" >Last Name</label>
                                <input id="lname" class="ko-form-control" type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="ko-col-12">
                            <div class="ko-form-group">
                                <label for="email"class="ko-contact-label" >Email <span>*</span></label>
                                <input id="email" class="ko-form-control" type="email" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="ko-col-12">
                            <div class="ko-form-group">
                                <label for="fname" class="ko-contact-label" >Subject</label>
                                <input id="fname"  class="ko-form-control" type="text" placeholder="Subject">
                            </div>
                        </div>
                        <div class="ko-col-12">
                            <div class="ko-form-group">
                                <label for="subject" class="ko-contact-label" >Your Message <span>*</span></label>
                                <textarea name="Message" class="ko-form-control"  rows="4" cols="2" id="subject" placeholder="Your Message" required></textarea>
                            </div>
                        </div>
                        <div class="ko-col-12">
                            <button type="submit" class="ko-btn">Submit Your Message</button>
                        </div>
                    </form>
                </div>
            </div>
         </section>
        <!-- contact us form end -->

    </main>

    <!-- footer start -->
<x-footer />
