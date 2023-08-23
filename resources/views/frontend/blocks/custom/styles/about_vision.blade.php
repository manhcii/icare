@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp
  <div class="section border-top-0 mb-0">
    <div class="container text-center">
      <div class="heading-block center">
        <h2>{{ $title }}</h2>
        <span>{{ $brief }}
        </span>
      </div>
    </div>
    <div class="container clearfix">
      <div class="row col-mb-50">
        @if ($block_childs)
          @foreach ($block_childs as $key => $item)
            @php
              $title_child = $item->json_params->title->{$locale} ?? $item->title;
              $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_child = $item->json_params->content->{$locale} ?? $item->content;
              $icon = $item->icon != '' ? $item->icon : '';
            @endphp
            <div class="col-sm-6 col-lg-4">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="{{ $icon }} i-alt"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>{{ $title_child }}</h3>
                  <p class="text-dark">
                    {{ $brief_child }}
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        @endif    
      </div>

      <div class="clear"></div>
    </div>
  </div>
@endif  