<!-- Category Start -->
@props(['categories'])

<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
        <div class="row g-4">
            @foreach($categories as $category)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <a class="cat-item rounded p-4" href="/categories/{{ $category->slug }}">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                    <h6 class="mb-3">{{ $category->name }}</h6>
                    @if($category->description)
                        <p class="mb-0">{{ $category->description }}</p>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->
