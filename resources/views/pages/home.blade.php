@extends('layouts.app')

@section('title',' Store Home Page')

@section('content')
<div class="page-content page-home">
  <section class="store-carousel">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" data-aos="zoom-in">
          <div id="storeCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#storeCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#storeCarousel" data-slide-to="1"></li>
              <li data-target="#storeCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="/images/banner.jpg" class="d-block w-100" alt="Carousel Image" />
              </div>
              <div class="carousel-item">
                <img src="/images/banner.jpg" class="d-block w-100" alt="Carousel Image" />
              </div>
              <div class="carousel-item">
                <img src="/images/banner.jpg" class="d-block w-100" alt="Carousel Image" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="store-trend-categories">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Trend Categories</h5>
        </div>
      </div>
      <div class="row">
        @php $i=0 @endphp
        @forelse($categories as $category)
        <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $i += 100}}">
          <a class="component-categories d-block" href="{{ route('categories-detail', $category->slug) }}">
            <div class="categories-image">
              <img src="{{ Storage::url($category->images) }}" alt="{{ $category->name }}" class="w-100" />
            </div>
            <p class="categories-text">
              {{ $category->name }}
            </p>
          </a>
        </div>
        @empty
      </div>
      <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
        Kategori tidak ditemukan
      </div>
      @endforelse
    </div>
  </section>
  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>New Products</h5>
        </div>
      </div>
      <div class="row">
        @php $j=0 @endphp
        @forelse($products as $product)
        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
          <a class="component-products d-block" href="{{ route('product-detail', $product->slug) }}">
            <div class="products-thumbnail">
              <div class="products-image" style="
                      @if($product->galleries)
                        background-image: url('{{ Storage::url($product->galleries->first()->image) }}');
                      @else
                        background-color: #eee
                      @endif
                    "></div>
            </div>
            <div class="products-text">
              {{ $product->name }}
            </div>
            <div class="products-price">
              {{ $product->price }}
            </div>
          </a>
        </div>
        @empty
        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
          Tidak ada product baru
        </div>
        @endforelse
      </div>
    </div>
  </section>
</div>
@endsection