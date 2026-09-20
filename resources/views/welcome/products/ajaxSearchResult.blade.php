@if($products->count() > 0)
    <ul class="search-result-list m-0 p-0 list-unstyled">
        @foreach($products as $pd)
            <li class="search-result-item">
                <a href="{{ route('productView', $pd->slug ?: Str::slug($pd->name)) }}" class="d-flex align-items-center gap-3 p-2 text-decoration-none border-bottom">
                    <!-- প্রোডাক্ট ইমেজ -->
                    <div class="search-product-img flex-shrink-0" style="width: 45px; height: 45px; overflow: hidden; border-radius: 6px; background: #f8f9fa;">
                        <img src="{{ asset($pd->image()) }}" alt="{{ $pd->name }}" class="w-100 h-100 object-fit-cover">
                    </div>
                    <!-- প্রোডাক্ট ইনফো -->
                    <div class="search-product-info flex-grow-1" style="min-width: 0;">
                        <h6 class="mb-1 text-dark" style="font-size: 13px; font-weight: 500; line-height: 1.3; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;">
                            {{ $pd->name }}
                        </h6>
                        <span class="fw-bold text-danger" style="font-size: 12px;">{{ priceFullFormat($pd->offerPrice()) }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
@else
    <div class="p-3 text-center text-muted fs-6">
        <i class="fa-solid fa-circle-exclamation me-1"></i> No Result Found
    </div>
@endif