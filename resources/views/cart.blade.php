<x-header :title="'Room Cart'" />

<main>
    <section class="ko-banner" style="background-image: url('assets/images/cart-banner.webp');">
        <div class="ko-container">
            <div class="ko-banner-content">
                <h2>Room's Cart</h2>
                <p>Indulge in the ultimate blend of elegance and comfort in our meticulously designed rooms. Confirm your booking today.</p>
                <nav>
                    <ol class="ko-banner-list">
                      <li><a href="{{ route('view.home') }}">Home</a></li>
                      <li class="active">Room's Cart</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </section>

    <!-- Cart section start -->
    <section class="ko-cart-section">
        <div class="ko-container">
            <div class="ko-row">
                <div class="ko-col-8">
                    <div class="ko-cart-table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th></th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="ko-cart-room-img">
                                            <a href="#">
                                                <img src="/assets/images/room-demo2.webp" alt="room img" />
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ko-room-details">
                                            <h4>Signature Suite</h4>
                                            <span class="ko-room-price">$129.00</span>
                                            <ul>
                                                <li>
                                                    <span><strong>Date: </strong> 2025-02-05 - 2025-02-06</span>
                                                </li>
                                                <li>
                                                    <span><strong>Details: </strong> Room: <small>1</small>, Extra Bed: <small>0</small>, Adult: <small>1</small>, Children: <small>0</small></span>
                                                </li>
                                                <li>
                                                    <span><strong>Extra Services: </strong> Pet-Friendly Amenities For 1 Room</span>
                                                </li>
                                            </ul>
                                            <div class="ko-counter-wrap">
                                                <div class="ko-qty-counter">
                                                    <button type="button" class="ko-qty-minus">-</button>
                                                    <input type="text" class="ko-qty-input" value="1" />
                                                    <button type="button" class="ko-qty-plus">+</button>
                                                </div>
                                                <button type="button" class="ko-remove-room">Remove List</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>$129.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="ko-col-4">
                    <div class="ko-cart-totals-wrap">
                        <h3>Cart totals</h3>
                        <ul>
                            <li>
                                <div class="ko-cartTotals-accordian">
                                    <div class="ko-cartTotals-head">
                                        <span>Add a coupon</span>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="24" height="24" aria-hidden="true" class="wc-block-components-panel__button-icon" focusable="false">
                                            <path d="M17.5 11.6L12 16l-5.5-4.4.9-1.2L12 14l4.5-3.6 1 1.2z"></path>
                                        </svg>
                                    </div>
                                    <div class="ko-cartTotals-ctn">
                                        <div class="ko-addCoupon-wrap">
                                            <div class="ko-addCoupon-control">
                                                <input type="text" autocomplete="off" placeholder="" name="" id="ko_add_coupon" />
                                                <label for="ko_add_coupon">Enter code</label>
                                            </div>
                                            <button type="button" class="ko-btn ko-addCoupon-btn">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="ko-cart-subtotal">
                                <span>Subtotal</span>
                                <strong>$1,147.00</strong>
                            </li>
                            <li class="ko-cart-total">
                                <strong>Total</strong>
                                <strong>$1,147.00</strong>
                            </li>
                        </ul>
                        <a href="#" class="ko-btn">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Cart section end -->

</main>

<x-footer />