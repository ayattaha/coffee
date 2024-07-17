<!-- resources/views/drinks/index.blade.php -->

@extends('layouts.app') {{-- Adjust this based on your layout structure --}}

@section('content')
    <nav class="tm-black-bg tm-drinks-nav">
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="#" class="tm-tab-link {{ $loop->first ? 'active' : '' }}" data-id="category-{{ $category->id }}">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>
    </nav>

    @foreach($categories as $category)
        <div id="category-{{ $category->id }}" class="tm-tab-content" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
            <div class="tm-list">
                @foreach($products->where('category_id', $category->id) as $product)
                    <div class="tm-list-item">
                        <img src="{{ asset('assets/img/beveragesImg/' . $product->image) }}" alt="{{ $product->name }}" class="tm-list-item-img">
                        <div class="tm-black-bg tm-list-item-text">
                            <h3 class="tm-list-item-name">{{ $product->name }}<span class="tm-list-item-price">${{ $product->price }}</span></h3>
                            <p class="tm-list-item-description">{{ $product->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tm-tab-link');
        const tabContents = document.querySelectorAll('.tm-tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all links
                tabLinks.forEach(link => {
                    link.classList.remove('active');
                });

                // Add active class to the clicked link
                link.classList.add('active');

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.style.display = 'none';
                });

                // Display the corresponding tab content
                const targetId = link.getAttribute('data-id');
                document.getElementById(targetId).style.display = 'block';
            });
        });
    });
</script>
@endsection
