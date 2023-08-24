
<section id="content">
  <div class="content-wrap">
    @if ($block)
    @php
      $title = $block->json_params->title->{$locale} ?? $block->title;
      $brief = $block->json_params->brief->{$locale} ?? $block->brief;
      $content = $block->json_params->content->{$locale} ?? $block->content;
      $image = $block->image != '' ? $block->image : '';
      $image_background = $block->image_background != '' ? $block->image_background : '';
    @endphp
    <div class="section-about">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-5 col-md-5 col-sm-6">
            <div class="heading-block border-bottom-0">
              <h2 class="fw-normal ls0 nott mb-0 font-primary" style="
                    font-size: 44px;
                    line-height: 1.3;
                    font-weight: bold !important;
                    color: #000;
                  ">
                {{ $title }}
              </h2>
            </div>
            <p>
              {{ $brief }}
            </p>
          </div>
          <div class="col-lg-6 col-md-7 col-sm-6 mt-5 mt-sm-0">
            <div class="d-none d-lg-flex">
              <img
                src="{{ $image }}"
                class="fast fadeInDown animated" alt="Image" style="height: 600px" data-animate="fadeInDown" />
              <!-- <img
                  src="demos/articles/images/iphone-2.png"
                  class="fast fadeInUp animated"
                  alt="Image"
                  style="height: 600px"
                  data-animate="fadeInUp"
                /> -->
            </div>
            <img
              src="{{ $image_background }}"
              alt="Image" class="d-block d-lg-none px-5 px-sm-0 p-md-5" />
          </div>
        </div>
      </div>
    </div>
    @endif
