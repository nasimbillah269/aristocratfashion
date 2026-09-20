<!-- REVIEW SUMMARY -->
    <div class="mgmt-review-summary">
        <div class="mgmt-review-average">
            <h2>0.0</h2>
            <div class="mgmt-review-stars">
                <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>
                <i class="far fa-star"></i> <i class="far fa-star"></i>
            </div>
            <span> 0 Customer Reviews </span>
        </div>
        <div class="mgmt-review-summary-text">
            <h4>Customer Reviews</h4>
            <p>Share your experience with this product and help other customers make a better choice.</p>
        </div>
    </div>
    
    <!-- REVIEW LIST CONTAINER -->
    <div class="mgmt-review-list mb-4" id="reviewListContainer">
        @foreach($reviews as $review)
        <div class="single-review-item border-bottom pb-3 mb-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="mb-0 fw-bold">{{ $review->name }}</h6>
                <span class="text-muted small">{{ $review->created_at ? $review->created_at->diffForHumans() : 'Just now' }}</span>
            </div>
            <div class="mgmt-review-stars text-warning mb-2" style="font-size: 13px;">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= $review->rating)
                        <i class="fas fa-star"></i>
                    @else
                        <i class="far fa-star"></i>
                    @endif
                @endfor
            </div>
            <p class="mb-0 text-secondary" style="font-size: 14px;">{{ $review->content }}</p>
        </div>
        @endforeach
        
        {{$reviews->links('pagination')}}
    </div>