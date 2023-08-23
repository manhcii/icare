@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $seo_title = $page_title . (isset($params['keyword']) && $params['keyword'] != '' ? ': ' . $params['keyword'] : '');
  
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
@endphp
@push('style')
  <style>

  </style>
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="page-title" class="page-title-parallax page-title-center page-title bg-gradient"
    style="background-image: url('{{ $image_background }}'); background-size: cover;"
    data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
    <div id="particles-line"></div>

    <div class="container clearfix mt-4">
      {{-- <div class="badge rounded-pill border border-light text-light">{{ $page_title }}</div> --}}
      <ol class="breadcrumb d-none">
        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">@lang('Home')</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $page_title ?? '' }}</li>
      </ol>
      <h1 class="">
        {{ $page_title }}
        @if (isset($params['keyword']) && $params['keyword'] != '')
          {!! ': ' . $params['keyword'] !!}
        @endif
      </h1>
    </div>
  </section>


  <section id="content">

    <div class="content-wrap">
      <div class="container mb-3">

        <div class="row mb-5 clearfix">
          <div class="postcontent ">
            <div id="shop"class="shop row grid-container gutter-20" data-layout="fitRows">
              @foreach ($posts as $item)
                @php
                  $title = $item->json_params->title->{$locale} ?? $item->title;
                  $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                  $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                  $price = $item->json_params->price ?? null;
                  $price_old = $item->json_params->price_old ?? null;
                  // $date = date('H:i d/m/Y', strtotime($item->created_at));
                  $date = date('d', strtotime($item->created_at));
                  $month = date('M', strtotime($item->created_at));
                  $year = date('Y', strtotime($item->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                @endphp
                <div class="product col-md-3 col-sm-6 col-6 {{ $item->taxonomy_alias ?? $item->taxonomy_title }}">
                  <div class="product-image">
                    <a href="#"
                      ><img 
                        src="{{ $image }}"
                        alt="{{ $title }}"
                    /></a>
                    @isset($item->json_params->gallery_image)
                      <?php $count = 0; ?>
                      @foreach ($item->json_params->gallery_image as $key => $value)
                        <?php if($count == 1) break; ?>
                          <a href="{{ $image }}"
                            ><img 
                              src="{{ $value }}"
                          /></a>
                          <?php $count++; ?>
                      @endforeach
                    @endisset
                    @if($price_old >0)
                      <div class="sale-flash badge bg-success p-2 bg-gradient">
                        {{ $price_old >0 ?round(100-($price/$price_old)*100):"" }}% Off*
                      </div>
                    @endif
                    <div class="bg-overlay">
                      <div
                        class="bg-overlay-content align-items-end justify-content-between"
                        data-hover-animate="fadeIn"
                        data-hover-speed="400"
                        data-lightbox="gallery"
                      >
                      <a href="javascript:void(0)" title="@lang('Add to cart')" style="border: 0px" data-id="{{ $item->id }}" data-quantity="1" class="add-to-cart btn me-2 text-white bg-success bg-gradient"
                        ><i class="icon-shopping-cart"></i>
                      </a>
                      <a
                      href="{{ $image }}" data-bs-toggle="tooltip" title="Hình ảnh"
                      data-lightbox="gallery-item"
                      class="btn bg-gradient"
                      ><i class="icon-line-expand"></i
                    ></a>
                      </div>
                      <div class="bg-overlay-bg bg-transparent"></div>
                    </div>
                  </div>
                  <div class="product-desc center">
                    <div class="product-title">
                      <h3>
                        <a href="{{ $alias }}">{{ $title }}</a>
                      </h3>
                    </div>
                    <div style="display: none;" class="product-price-number">{{ isset($price) && $price > 0 ? $price:0 }}</div>
                    <div class="product-price">
                      <del>{!! isset($price_old) && $price_old > 0 ? number_format($price_old, 0, ',', '.') . ' ₫' : "" !!}</del> <ins>{!! isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' ₫' : __('Contact') !!}</ins>
                    </div>
                    
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          {{-- @include('frontend.components.sidebar.product') --}}

        </div>
      </div>
    </div>
  </section>

  {{-- End content --}}
@endsection
