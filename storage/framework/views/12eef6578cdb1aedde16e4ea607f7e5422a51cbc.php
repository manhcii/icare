<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div id="guarantee" class="section dark my-0">
    <div class="container">
      <div class="heading-block">
        <h2 class="font-title">
          <?php echo e($title); ?>

        </h2>
      </div>

      <div class="row mt-5 col-mb-30">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : '';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : 'icon-check';
              $style = $item->json_params->style ?? '';
            ?>
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-center fbox-dark fbox-plain">
                <div class="fbox-icon">
                  <i class="<?php echo e($icon); ?>"></i>
                </div>
                <div class="fbox-content">
                  <h3><?php echo e($title); ?></h3>
                  <p>
                    <?php echo e($brief); ?>

                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>  
      </div>
    </div>
  </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/banner/styles/logo_partner.blade.php ENDPATH**/ ?>