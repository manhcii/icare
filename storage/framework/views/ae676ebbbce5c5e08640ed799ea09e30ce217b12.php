<footer id="footer" class="dark">
  <div class="container">
    <div class="footer-widgets-wrap">
      <div class="row col-mb-50">
        <?php if(isset($menu)): ?>
          <?php
            $footer_menu = $menu->filter(function ($item, $key) {
                return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
            });
            
            $content = '';
            foreach ($footer_menu as $main_menu) {
                $url = $title = '';
                $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                $content .= '<div class="col-sm-6 col-lg-2"><div class="widget clearfix">';
                $content .= '<h4>' . $title . '</h4><div class="widget_links">';
                $content .= '<ul class="">';
                foreach ($menu as $item) {
                    if ($item->parent_id == $main_menu->id) {
                        $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                        $url = $item->url_link;
            
                        $active = $url == url()->current() ? 'active' : '';
            
                        $content .= '<li><a href="' . $url . '">' . $title . '</a>';
                        $content .= '</li>';
                    }
                }
                $content .= '</ul>';
                $content .= '</div></div></div>';
            }
            echo $content;
          ?>
        <?php endif; ?>

        <div class="col-sm-6 col-lg-4">
          <div class="footer-information">
            <address class="mb-0">
              <abbr
                title="Headquarters"
                style="display: inline-block; margin-bottom: 7px"
                ><strong>Địa chỉ:</strong></abbr
              ><br />
              <?php echo e($web_information->information->address ?? ''); ?><br />
            </address>

            <abbr title="Phone Number"><strong>Điện thoại:</strong></abbr
            ><?php echo e($web_information->information->phone ?? ''); ?><br />
            <abbr title="Email Address"><strong>Email:</strong></abbr>
           <?php echo e($web_information->information->email ?? ''); ?>

          </div>
        </div>
        <div class="col-lg-6">
          <div
            class="widget clearfix d-flex flex-column justify-content-between align-items-center h-100"
          >
            <img
              src="<?php echo e(asset('public/data/cms-image/loading.gif')); ?>" data-src="<?php echo e($web_information->image->logo_footer ?? ''); ?>"
              alt="Image"
              class="footer-logo lazyload"
            />

            <div class="mt-4">
              <?php if(isset($web_information->social->facebook)): ?>
                <a href="<?php echo e($web_information->social->facebook ?? "https://facebook.com/"); ?>" class="social-icon si-small si-rounded  si-mini si-facebook mb-0">
                  <i class="icon-facebook"></i>
                  <i class="icon-facebook"></i>
                </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->youtube)): ?>
                <a href="<?php echo e($web_information->social->youtube ?? "https://youtube.com/"); ?>" class="social-icon si-small si-rounded  si-mini si-youtube mb-0">
                  <i class="icon-youtube"></i>
                  <i class="icon-youtube"></i>
                </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->instagram)): ?>
                <a href="<?php echo e($web_information->social->instagram ?? "https://instagram.com/"); ?>" class="social-icon si-small si-rounded  si-mini si-instagram mb-0">
                  <i class="icon-instagram"></i>
                  <i class="icon-instagram"></i>
                </a>
                <?php endif; ?>
                <?php if(isset($web_information->social->pinterest)): ?>
                <a href="<?php echo e($web_information->social->pinterest ?? "https://pinterest.com/"); ?>" class="social-icon si-small si-rounded  si-mini si-pinterest mb-0">
                  <i class="icon-pinterest"></i>
                  <i class="icon-pinterest"></i>
                </a>
                <?php endif; ?>
                <a
                  href="<?php echo e($web_information->social->twitter ?? "https://twitter.com/"); ?>"
                  class="social-icon si-small si-rounded si-twitter"
                >
                  <i class="icon-twitter"></i>
                  <i class="icon-twitter"></i>
                </a>

                <a
                  href="<?php echo e($web_information->social->gmail ?? "https://gmail.com/"); ?>"
                  class="social-icon si-small si-rounded si-gplus"
                >
                  <i class="icon-gplus"></i>
                  <i class="icon-gplus"></i>
                </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- .footer-widgets-wrap end -->
  </div>

 
  <div id="copyrights">
    <div class="container">
      <div class="w-100 text-center">
        Copyrights &copy; 2023 FHM Việt Nam.
      </div>
    </div>
  </div>
  <!-- #copyrights end -->
</footer><?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>