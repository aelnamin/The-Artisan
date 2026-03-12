<section class="testi">
    <div class="fu" style="text-align:center">
        <p class="sec-sup">Suara Pelanggan</p>
        <h2 class="sec-title">Mereka Sudah <em>Rasai</em></h2>
    </div>
    <div class="t-grid">
        @foreach($reviews as $index => $review)
            @php
                $delay = $index % 3;
                $delayClass = $delay === 0 ? '' : ' d' . ($delay + 1);
            @endphp
            <div class="tc fu{{ $delayClass }}">
                <span class="tc-q">"</span>
                <div class="tc-stars" style="font-size: 20px; color: #ffe066;">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </div>
                <p class="tc-body">{{ $review->comment }}</p>
                <p class="tc-auth">{{ $review->name }} · {{ $review->product->name ?? 'The Artisan' }}</p>
            </div>
        @endforeach
    </div>
</section>