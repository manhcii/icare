    <!-- START PRODUCT -->
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
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::POST_TYPE['resource'];
        $rows = App\Http\Services\ContentService::getCmsPost($params)->limit(3)->get();
        
      @endphp
      <div id="project" class="section bg-transparent my-0">
        <div class="container">
          <div class="heading-block">
            <h2 class="font-title">{{ $title }}</h2>
          </div>
          <div class="row mt-5 col-mb-30">
            @foreach ($rows as $item)
              @php
                $title = $item->json_params->title->{$locale} ?? $item->title;
                $price = $item->json_params->price ?? null;
                $price_old = $item->json_params->price_old ?? null;
                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                $date = date('H:i d/m/Y', strtotime($item->created_at));
                // Viet ham xu ly lay slug
                $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
              @endphp
              <div class="col-lg-4 col-12">
                <div class="project-item dark">
                  <div class="project-item-img">
                    <img class="lazyload" src="{{ asset('public/data/cms-image/loading.gif') }}" data-src="{{ $image }}" alt="{{ $title }}" />
                  </div>
                  <h3 class="">
                    {{ $title }}
                  </h3>
                  <a
                    href="{{ $alias }}"
                    class="button button-border button-dark button-small font-title"
                    >Chi tiết</a
                  >
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif