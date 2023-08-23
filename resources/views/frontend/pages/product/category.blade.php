@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $page_brief = $taxonomy->json_params->brief->{$locale} ?? ($taxonomy->brief ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
@endphp
@push('style')
  <style>
  .bg-success {
      background: linear-gradient( 45deg, #bf953f, #d2ca72, #b38728, #d5cc76, #aa771c ) !important ;
      border-color: unset !important ;
  }
  .ml-3{
    margin-left: 15px;
  }
  .font-bold{
    font-weight: 700 !important;
  }
  
  </style>
  <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap"
      rel="stylesheet"
      type="text/css"
    />
   
@endpush
@section('content')
<section class="bg-gradient " style="background-image: url('{{ $image_background }}'); background-size: cover;" id="page-title">
    <div class="container clearfix text-center">
      <h1 class="">{{ $title }}</h1>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="row gutter-40 col-mb-80">
          <div class="postcontent col-lg-9 order-lg-last">
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
                <div class="product col-md-4 col-sm-6 col-6 {{ $item->taxonomy_alias ?? $item->taxonomy_title }}">
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
                      <div class="sale-flash badge bg-success p-2">
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
                      <a href="javascript:void(0)" title="@lang('Add to cart')" style="border: 0px" data-id="{{ $item->id }}" data-quantity="1" class="add-to-cart btn me-2 text-white bg-success "
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
            <!-- #shop end -->
            <div class="mt-5 d-flex justify-content-center align-items-center">
              {{ $posts->withQueryString()->links('frontend.pagination.default') }}
            </div>

          </div>
          @include('frontend.components.sidebar.product')

        </div>
      </div>
    </div>
    <div id="form" class="section dark my-0">
      <div class="container">
        <div class="quick-contact-widget form-widget dark clearfix">
          <div class="heading-block">
            <h2 class="font-title">Liên hệ tư vấn</h2>
          </div>

          <div class="form-result"></div>

          <form
            id="quick-contact-form"
            name="quick-contact-form"
            class="quick-contact-form mb-0 mt-6 form_ajax"
            action="{{ route('frontend.contact.store') }}" method="post" 
            >@csrf
              <div class="form-process">
                <div class="css3-spinner">
                  <div class="css3-spinner-scaler"></div>
                </div>
              </div>

              <input
                type="text"
                class="required sm-form-control input-block-level not-dark "
                id="quick-contact-form-name"
                name="name"
                value="" required
                placeholder="Họ tên"
              />

              <input
                type="email"
                class="required sm-form-control email input-block-level not-dark "
                id="quick-contact-form-email"
                name="email"
                value=""required
                placeholder="Email"
              />

              <input
                type="text"
                class="required sm-form-control input-block-level not-dark valid"
                id="quick-contact-form-phone"
                name="phone"
                value=""
                placeholder="Điện thoại"
              />

              <textarea
                class="required sm-form-control input-block-level not-dark short-textarea valid"
                id="quick-contact-form-message"
                name="content"
                rows="5"
                cols="30"
                placeholder="Lời nhắn"
              ></textarea>

              <input type="hidden" name="is_type" value="contact">

              <button
                type="submit"
                id="quick-contact-form-submit"
                name="quick-contact-form-submit"
                class="button button-border button-dark topmargin-sm font-title mx-auto d-block"
                value="submit"
              >
                Gửi
              </button>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection
@push('js_filter')
  <script>
    $('.click_li').click(function() {
      $(this).find('.fa').toggleClass('fa-angle-up');
      $(this).parents('.box-li').find('.show_list').slideToggle('slow');
    })
    $('.click_li_li').click(function() {
      $(this).find('.fa').toggleClass('fa-angle-up');
      $(this).parents('.box-li-li').find('.show_list_list').slideToggle('slow');
    })
    $('.click-fil').click(function(){
      var instance = $(".range_03").data("ionRangeSlider");

       instance.update({
         from: 200000 ,
         to: 700000,
       });
      $('.product').show();
      var sortByValue = $(".lowtohight").find("a").attr("data-sort-by");
          $("#shop").isotope({ sortBy: sortByValue });
          return false;
    })
    
      jQuery(document).ready(function ($) {
        $(window).on("pluginIsotopeReady", function () {
          $("#shop").isotope({
            transitionDuration: "0.65s",
            getSortData: {
              name: ".product-title",
              price_lh: function (itemElem) {
                if ($(itemElem).find(".product-price-number").find("ins").length > 0) {
                  var price = $(itemElem).find(".product-price-number ins").text();
                } else {
                  var price = $(itemElem).find(".product-price-number").text();
                }

                priceNum = price.split("VNĐ");

                return parseFloat(priceNum[0]);
              },
              price_hl: function (itemElem) {
                if ($(itemElem).find(".product-price-number").find("ins").length > 0) {
                  var price = $(itemElem).find(".product-price-number ins").text();
                } else {
                  var price = $(itemElem).find(".product-price-number").text();
                }

                priceNum = price.split("VNĐ");

                return parseFloat(priceNum[0]);
              },
            },
            sortAscending: {
              name: true,
              price_lh: true,
              price_hl: false,
            },
          });

          $(".custom-filter:not(.no-count)")
            .children("li:not(.widget-filter-reset)")
            .each(function () {
              var element = $(this),
                elementFilter = element.children("a").attr("data-filter"),
                elementFilterContainer = element
                  .parents(".custom-filter")
                  .attr("data-container");

              elementFilterCount = Number(
                jQuery(elementFilterContainer).find(elementFilter).length
              );

              element.append("<span>" + elementFilterCount + "</span>");
            });

          $(".shop-sorting li").click(function () {
            $(".shop-sorting").find("li").removeClass("active-filter");
            $(this).addClass("active-filter");
            var sortByValue = $(this).find("a").attr("data-sort-by");
            $("#shop").isotope({ sortBy: sortByValue });
            return false;
          });
        });
      });

    </script>
@endpush