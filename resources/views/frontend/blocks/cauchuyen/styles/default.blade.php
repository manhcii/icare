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
    <div id="content">
        <div id="our-story" class="section">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="our-story-image">
                    <img
                      src="{{ $image_background }}"
                      alt="our story"
                      title="our story"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div  class="our-story-content">
                    <h2 class="title">{{ $title }}</h2>
                    <p  class="desc">
                     {{$brief}}
                    </p>
                    <div
                      class="our-story-content-number d-flex align-items-center mt-5"
                    >
                    @foreach($block_childs as $item)
                      <div class="item d-flex align-items-center">
                        <div class="fbox-icon">
                          <a href="#"><i class="{{ $item->icon }}"></i></a>
                        </div>
                        <p class="text">{{ $item->title }} <br />{{ $item->brief }}</p>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </div>
@endif
