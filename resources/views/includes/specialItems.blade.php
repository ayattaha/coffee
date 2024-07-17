<div id="special" class="tm-page-content">
    <div class="tm-special-items">
        @foreach($specialItems as $specialItem)
        <div class="tm-black-bg tm-special-item">
            <img src="{{ asset('assets/img/beveragesImg/'.$specialItem->image) }}" alt="Image">
            <div class="tm-special-item-description">
                <h2 class="tm-text-primary tm-special-item-title">{{ $specialItem->name }}</h2>
                <p class="tm-special-item-text">{{ $specialItem->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
