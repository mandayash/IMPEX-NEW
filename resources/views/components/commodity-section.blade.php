<!-- resources/views/components/commodity-section.blade.php -->
<section class="commodity-section">
    <div class="container">
        <h2 class="section-title">Agriculture & Plantation Commodity</h2>

        <div class="commodity-slider">
            <!-- Card 1 -->
            <div class="commodity-card">
                <img src="{{ asset('aset/commodities/coffee.jpg') }}" alt="Coffee">
                <h3>Coffee</h3>
                <div class="price">$ 2.99</div>
                <div class="card-actions">
                    <button class="buy-now">Buy Now</button>
                    <button class="favorite">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="commodity-card">
                <img src="{{ asset('aset/commodities/rubber.jpg') }}" alt="Rubber">
                <h3>Karet</h3>
                <div class="price">$ 2.99</div>
                <div class="card-actions">
                    <button class="buy-now">Buy Now</button>
                    <button class="favorite">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="commodity-card">
                <img src="{{ asset('aset/commodities/rubber.jpg') }}" alt="Rubber">
                <h3>Karet</h3>
                <div class="price">$ 2.99</div>
                <div class="card-actions">
                    <button class="buy-now">Buy Now</button>
                    <button class="favorite">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
            </div>

            <!-- Add more cards similarly -->
        </div>

        <h2 class="section-title">Processed Food & Beverages Commodity</h2>

        <div class="commodity-slider">
            <!-- Card 1 -->
            <div class="commodity-card">
                <img src="{{ asset('aset/commodities/indomie-goreng.jpg') }}" alt="Indomie Goreng">
                <h3>Indomie Goreng</h3>
                <div class="price">$ 2.99</div>
                <div class="card-actions">
                    <button class="buy-now">Buy Now</button>
                    <button class="favorite">
                        <i class="far fa-heart"></i>
                    </button>
                </div>
            </div>

            <!-- Add more cards -->
        </div>
    </div>
</section>
