
<section id="content">
  <div class="content-wrap py-0">
    <!-- START PRODUCT -->
    <?php if($block): ?>
      <?php
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
        $params['is_type'] = App\Consts::POST_TYPE['product'];
        $rows = App\Http\Services\ContentService::getCmsPost($params)->limit(8)->get();
        
      ?>
    <div class="product-section section bg-transparent my-0">
      <div class="container">
        <div class="heading-block">
          <h2 class="font-title"><?php echo e($title); ?></h2>
        </div>
        <div
          id="shop"
          class="shop row grid-container gutter-30 mt-5"
          data-layout="fitRows"
        > 
          <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $title = $item->json_params->title->{$locale} ?? $item->title;
            $price = $item->json_params->price ?? null;
            $price_old = $item->json_params->price_old ?? null;
            $brief = $item->json_params->brief->{$locale} ?? $item->brief;
            $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
            $date = date('H:i d/m/Y', strtotime($item->created_at));
            // Viet ham xu ly lay slug
            $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
            $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
          ?>
          
          <div class="product col-lg-3 col-md-4 col-sm-6 col-6">
                  <div class="grid-inner">
                    <div class="product-image">
                      <a href="<?php echo e($alias); ?>"
                        ><img
                          class="lazyload" src="<?php echo e(asset('public/data/cms-image/loading.gif')); ?>" data-src="<?php echo e($image); ?>"
                          alt="<?php echo e($title); ?>"
                      /></a>
                      <a href="<?php echo e($alias); ?>"
                        ><img
                          class="lazyload" src="<?php echo e(asset('public/data/cms-image/loading.gif')); ?>" data-src="<?php echo e($image); ?>"
                          alt="<?php echo e($title); ?>"
                      /></a>
                      
                      <div class="bg-overlay">
                        <div
                          class="bg-overlay-content align-items-end justify-content-between"
                          data-hover-animate="fadeIn"
                          data-hover-speed="400"
                          data-lightbox="gallery"
                        >
                          <a href="<?php echo e($alias); ?>" title="<?php echo app('translator')->get('Add to cart'); ?>" data-id="<?php echo e($item->id); ?>" data-quantity="1" class="add-to-cart btn bg-gradient me-2"
                            ><i class="icon-shopping-basket"></i
                          ></a>
                          <a
                            href="<?php echo e($image); ?>" data-bs-toggle="tooltip" title="Hình ảnh" data-lightbox="gallery-item"
                            class="btn bg-gradient"
                            
                            ><i class="icon-line-expand"></i
                          ></a>
                        </div>
                        <div class="bg-overlay-bg bg-transparent"></div>
                      </div>
                    </div>
                    <div class="product-desc">
                      <div class="product-title">
                        <h3>
                          <a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                        </h3>
                      </div>
                      <div class="product-price">
                        <del><?php echo isset($price_old) && $price_old > 0 ? number_format($price_old, 0, ',', '.') . ' ₫' : ""; ?></del> <ins><?php echo isset($price) && $price > 0 ? number_format($price, 0, ',', '.') . ' ₫' : __('Contact'); ?></ins>
                      </div>
                    </div>
                  </div>
                </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
      </div>
    </div>
    <?php endif; ?><?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>