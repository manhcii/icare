<?php
  $params_taxonomy['status'] = App\Consts::TAXONOMY_STATUS['active'];
  $params_taxonomy['taxonomy'] = App\Consts::TAXONOMY['product'];
  $params_taxonomy['is_featured'] = true;
  $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params_taxonomy)->get();
?>
<?php if(isset($taxonomys)): ?>
  <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($item->parent_id == 0 || $item->parent_id == null): ?>
      <?php $__currentLoopData = $taxonomys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
          <?php
            $title_sub = $sub->json_params->title->{$locale} ?? $sub->title;
            $alias_category_sub = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title_sub, $sub->id);
            $url_current = url()->full();
            $current = $alias_category_sub == $url_current ? 'active-filter' : '';
          ?>
          <div class="product-section section bg-transparent my-0">
            <div class="container">
              <div class="heading-block">
                <h2 class="font-title"><?php echo e($title_sub); ?></h2>
              </div>
              <div
                id="shop"
                class="shop row grid-container gutter-30 mt-5"
                data-layout="fitRows"
              >
              <?php
                $params['status'] = App\Consts::POST_STATUS['active'];
                $params['is_type'] = App\Consts::POST_TYPE['product'];
                $params['taxonomy_id'] = $sub->id;
                $rows = App\Http\Services\ContentService::getCmsPost($params)
                    ->limit(8)
                    ->get();

              ?>
              <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $title = $item_sub->json_params->title->{$locale} ?? $item_sub->title;
                  $price = $item_sub->json_params->price ?? null;
                  $price_old = $item_sub->json_params->price_old ?? null;
                  $brief = $item_sub->json_params->brief->{$locale} ?? $item_sub->brief;
                  $image = $item_sub->image_thumb != '' ? $item_sub->image_thumb : ($item_sub->image != '' ? $item_sub->image : null);
                  $date = date('H:i d/m/Y', strtotime($item_sub->created_at));
                  // Viet ham xu ly lay slug
                  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item_sub->taxonomy_title, $item_sub->taxonomy_id);
                  $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item_sub->id, 'detail', $item_sub->taxonomy_title);
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
                          <a href="<?php echo e($alias); ?>" title="<?php echo app('translator')->get('Add to cart'); ?>" data-id="<?php echo e($item_sub->id); ?>" data-quantity="1" class="add-to-cart btn bg-gradient me-2"
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
        
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>          <?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/category/styles/product.blade.php ENDPATH**/ ?>