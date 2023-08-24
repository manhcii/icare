@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $image = $block->image != '' ? $block->image : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  @endphp
   <!-- START WHY CHOOSE US -->
   <section id="why-choose-us" class="section bg-transparent">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-12">
          <div
            class="why-choose-us-image d-flex justify-content-center align-items-center"
          >
            <img
              src="{{ $image }}"
              alt="why choose us"
              title="why choose us"
            />
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12">
          <div class="why-choose-us-content">
            <div class="heading-block mb-3">
              <h2 class="fw-normal ls0 nott mb-3 font-primary">
               {{$title}}
              </h2>
            </div>
            <div class="why-choose-us-content-top">
              <p class="text">
                {{$brief}}
              </p>
            </div>
            <div class="why-choose-us-content-bottom">
              <h3 class="title">
                {{ $content }}
              </h3>
              <ul>
                @foreach($block_childs as $item)
                <li>
                  <p class="text">
                   {{$item->brief}}
                  </p>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- END WHY CHOOSE US -->
@endif
