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

  <div class="section m-0 dark" style="background-color: #0b4889">
    <div class="container">
      <div class="heading-block center">
        <h2 class="fw-normal ls0 nott mb-3 font-primary"><?php echo e($title); ?></h2>
        <span>
         <?php echo e($brief); ?>

        </span>
      </div>
      <div class="row col-mb-50">
        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-6 col-lg-3 text-center">
          <div class="counter counter-large" style="color: #3ab2b8ff">
            <span
              data-from="100"
              data-to="<?php echo e($item->title); ?>"
              data-refresh-interval="50"
              data-speed="2000"
              >+</span
            >+
          </div>
          <h5><?php echo e($item->brief); ?></h5>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/custom/styles/about_development.blade.php ENDPATH**/ ?>