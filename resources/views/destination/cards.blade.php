@if(isset($cards) && count($cards) > 0)
<div class="row">
    @foreach($cards as $card)
    <div class="col-lg-{{ $columns ?? 4 }} col-md-6">
        <div class="single_feature">
            @if(isset($card['icon']))
            <div class="feature_head">
                <i class="{{ $card['icon'] }}"></i>
                <h4>{{ $card['title'] }}</h4>
            </div>
            @else
            <div class="feature_head">
                <h4>{{ $card['title'] }}</h4>
            </div>
            @endif
            <div class="feature_content">
                
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif