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