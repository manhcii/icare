<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div id="gallery" class="section bg-transparent mb-0 pt-0">
  <div class="container">
    <div class="heading-block">
      <h2 class="font-title"><?php echo e($title); ?></h2>
    </div>
    <div class="gallery-list mt-6">
      <div class="row col-mb-30">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_child = $item->json_params->title->{$locale} ?? $item->title;
              $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_child = $item->json_params->content->{$locale} ?? $item->content;
              $image_child = $item->image != '' ? $item->image : null;
              $url_link = $item->url_link != '' ? $item->url_link : 'javascript:void(0)';
              $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
              $icon = $item->icon != '' ? $item->icon : '';
              $style = $item->json_params->style ?? '';
            ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="gallery-item">
                <img class="lazyload" src="<?php echo e(asset('public/data/cms-image/loading.gif')); ?>" data-src="<?php echo e($image_child); ?>" alt="noi that" />
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>  
      </div>
    </div>
  </div>
  </div>
<?php endif; ?>  <?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/custom/styles/about_development.blade.php ENDPATH**/ ?>