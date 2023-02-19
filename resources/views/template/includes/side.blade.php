<div id="aside" class="col-md-3">
    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Categories</h3>
        <div class="checkbox-filter">

            <div class="input-checkbox">
                <input type="checkbox" id="category-1">
                <label for="category-1">
                    <span></span>
                    Laptops
                    <small>(120)</small>
                </label>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" id="category-2">
                <label for="category-2">
                    <span></span>
                    Smartphones
                    <small>(740)</small>
                </label>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" id="category-3">
                <label for="category-3">
                    <span></span>
                    Cameras
                    <small>(1450)</small>
                </label>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" id="category-4">
                <label for="category-4">
                    <span></span>
                    Accessories
                    <small>(578)</small>
                </label>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" id="category-5">
                <label for="category-5">
                    <span></span>
                    Laptops
                    <small>(120)</small>
                </label>
            </div>

            <div class="input-checkbox">
                <input type="checkbox" id="category-6">
                <label for="category-6">
                    <span></span>
                    Smartphones
                    <small>(740)</small>
                </label>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Price</h3>
        <div class="price-filter">
            <div id="price-slider"></div>
            <div class="input-number price-min">
                <input id="price-min" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
            <span>-</span>
            <div class="input-number price-max">
                <input id="price-max" type="number">
                <span class="qty-up">+</span>
                <span class="qty-down">-</span>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <div class="aside">
            <h3 class="aside-title">TAG</h3>
            @foreach ($tag_slug as $item)
                
            <div class="checkbox-filter">
                <div class="input-checkbox">
                    <input type="checkbox" id="brand-1">
                    <label for="brand-1">
                        <span></span>
                        {{ $item->name }}
                        <small>(578)</small>
                    </label>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /aside Widget -->

    <!-- aside Widget -->
    <div class="aside">
        <h3 class="aside-title">Top selling</h3>
        <div class="product-widget">
            <div class="product-img">
                <img src="{{ asset('components/img/product01.png') }}" alt="">
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
        </div>

        <div class="product-widget">
            <div class="product-img">
                <img src="{{ asset('components/img/product02.png') }}" alt="">
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
        </div>

        <div class="product-widget">
            <div class="product-img">
                <img src="{{ asset('components/img/product03.png') }}" alt="">
            </div>
            <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
        </div>
    </div>
    <!-- /aside Widget -->
</div>
