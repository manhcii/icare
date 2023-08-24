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
  <!-- START PROCESS -->
  <div id="solution-process" class="section mt-md-0 mt-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-12 mb-md-6 mb-lg-0 mb-4">
          <div class="solution-process-image rounded-6">
            <img
              src="{{ $image }}"
              alt="process"
              title="process"
            />
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12 mb-md-6 mb-lg-0 mb-4">
          <div class="solution-process-content">
            <h2 class="title">{{ $title }} <br />{{ $brief }}</h2>
            @foreach($block_childs as $item)
            @php
            $title_child = $item->json_params->title->{$locale} ?? $item->title;
            $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
            $content_child = $item->json_params->content->{$locale} ?? $item->content;
            $icon = $item->icon != '' ? $item->icon : '';
             @endphp
            <div class="solution-process-content-wrapper">
              <div class="solution-process-content-item">
                <h3 class="title">{{ $loop->iteration }}. {{ $title_child }}</h3>
                <p class="desc">
                  {{ $brief_child }}
                </p>
              </div>

            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PROCESS -->
@endif
