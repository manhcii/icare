<header id="header" class="">
  <div id="header-wrap" class="">
    <div class="container">
      <div class="header-row justify-content-lg-between">
        <div id="logo" class="order-lg-2 col-auto px-0 me-lg-0">
          <a href="{{ route('frontend.home') }}" class="standard-logo" data-dark-logo="images/logo-dark.png"><img
              src="{{ $web_information->image->logo_header ?? '' }}" alt="FHM Logo" style="height: 100px" /></a>
          <a href="{{ route('frontend.home') }}" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img
              src="{{ $web_information->image->logo_header ?? '' }}" alt="FHM Logo" style="height: 100px" /></a>
        </div>
        <div id="primary-menu-trigger">
          <svg class="svg-trigger" viewBox="0 0 100 100">
            <path
              d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
            </path>
            <path d="m 30,50 h 40"></path>
            <path
              d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
            </path>
          </svg>
        </div>

        <nav class="primary-menu order-lg-1 col-lg-5 px-0" style="position: inherit">
          <ul class="menu-container">
            @isset($menu)
              @php
                $main_menu = $menu->first(function ($item, $key) {
                    return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
                });
                if ($main_menu) {
                    $content = '';$cou =0;
                    foreach ($menu as  $item) {
                        $url = $title = '';
                        if ($item->parent_id == $main_menu->id && $cou < 3) {
                            $cou ++;
                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                            $url = $item->url_link;
                            if ($item->sub == 0) {
                              $content .= '<li class="menu-item sub-menu"><a style="padding-top: 39px; padding-bottom: 39px" class="menu-link" href="' . $url . '"><div>' . $title . '<i class="icon-angle-down"></i></div></a>';
                            }
                            $content .= '</li>';
                        }
                    }
                    echo $content;
                }
              @endphp
            @endisset
           
          </ul>
        </nav>

        <nav class="primary-menu order-lg-3 col-lg-5 px-0" style="position: inherit">
          <div class="menu-container justify-content-lg-end">
            
           @isset($menu)
              @php
                $main_menu = $menu->first(function ($item, $key) {
                    return $item->menu_type == 'header' && ($item->parent_id == null || $item->parent_id == 0);
                });
                if ($main_menu) {
                    $content = '';$cou =0;
                    foreach ($menu as  $item) {
                        $url = $title = '';
                        if ($item->parent_id == $main_menu->id ) {
                            $cou ++;
                            if ($cou > 3) {
                              $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                              $url = $item->url_link;
                              if ($item->sub == 0) {
                                $content .= '<li class="menu-item mega-menu sub-menu"><a style="padding-top: 39px; padding-bottom: 39px"  class="menu-link" href="' . $url . '"><div>' . $title . '<i class="icon-angle-down"></i></div></a>';
                              }
                              $content .= '</li>';
                            }
                        }
                    }
                    echo $content;
                }
              @endphp
            @endisset
          </div>
        </nav>

      </div>
    </div>
  </div>
  <div class="header-wrap-clone" style="height: 100px"></div>
</header>