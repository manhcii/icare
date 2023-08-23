@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
  @endphp
  <section id="banner" class="section bg-transparent">
    <div class="container">
      <a href="#" class="banner-button" title="CTA">Liên hệ</a>
    </div>
    <div class="banner-image " style="background-image:{{ $image_background }}">
      <div class="container">
        <h1 class="banner-image-text">{{ $seo_title ?? ($page->title ?? ($web_information->information->seo_title ?? '')) }}</h1>
      </div>
    </div>
    <div class="banner-content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-3 col-12">
            <h2 class="banner-content-title">
              {!! $title !!}
            </h2>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <p class="banner-content-description">
              {{ $content }}
            </p>
          </div>
          <div class="col-lg-2 col-md-3 col-12">
            <p class="banner-content-counter">{!! $brief !!}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endif