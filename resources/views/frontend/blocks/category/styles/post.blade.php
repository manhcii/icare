@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
    $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
    $params['taxonomy'] = App\Consts::TAXONOMY['product'];
    
    $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
    
    $params['status'] = App\Consts::POST_STATUS['active'];
    // $params['is_featured'] = true;
    $params['is_type'] = App\Consts::POST_TYPE['product'];
    $rows = App\Http\Services\ContentService::getCmsPost($params)->limit(12)->get();
    
  @endphp
  <div id="product" style="background-image: url('{{ $background }}');" class="section bg-transparent mb-0">
    <div class="container">
      <p class="titular-sub-title text-primary fw-bold center">
        {{ $title }}
      </p>
      <h1
        class="titular-title fw-normal center font-secondary fst-normal mb-5"
      >
        {{ $brief }}
      </h1>

      <div class="clear mb-5"></div>
    </div>
    <div class="container">
      <div class="row col-mb-50 mb-0">
        @foreach ($rows as $item)
        @php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $price = $item->json_params->price ?? null;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image_child = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          $date = date('H:i d/m/Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
        @endphp
        <a href="{{ $alias }}" class="col-sm-6 col-lg-4">
          <div class="feature-box fbox-effect">
            <div class="fbox-icon mb-4">
              <div>
                <img style="height: 85px;" 
                  src="{{ $image_child }}"
                  alt=""
                />
              </div>
            </div>
            <div class="fbox-content">
              <h3 class="elipsis1">{{ $title }}</h3>
              <p class="elipsis1">{{ $brief }}</p>
              <p>{{ isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' VNĐ' : __('Contact') }}</p>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
  </div>
@endif  