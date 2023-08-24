@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $image= $block->image != '' ? $block->image : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp

      <!-- START WHY CHOOSE US -->
      <div id="about-us-why-choose-us" class="section bg-transparent">
        <div class="container text-center">
          <div class="heading-block center">
            <h2>
              {{ $title }}
            </h2>
            <span
              >{{$brief}}
            </span>
          </div>
        </div>
        <div class="container clearfix">
          <div class="row col-mb-50">
            @foreach($block_childs as $item)
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="{{ $item->icon }}"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>{{ $item->title }}</h3>
                  <p class="text-dark">
                  {{$item->brief}}
                  </p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="clear"></div>
        </div>
      </div>
  <!-- END PROCESS -->
@endif
