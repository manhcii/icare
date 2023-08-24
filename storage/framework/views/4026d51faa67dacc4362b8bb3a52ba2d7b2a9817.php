<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>

  <div class="section border-top-0 mb-0 mt-0">
    <div class="container text-center">
      <div class="heading-block center">
        <h2><?php echo e($title); ?></h2>
        <span><?php echo e($brief); ?>

        </span>
      </div>
    </div>
    <div class="container clearfix">
      <div class="row col-mb-50">
        <?php if($block_childs): ?>
          <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_child = $item->json_params->title->{$locale} ?? $item->title;
              $brief_child = $item->json_params->brief->{$locale} ?? $item->brief;
              $content_child = $item->json_params->content->{$locale} ?? $item->content;
              $icon = $item->icon != '' ? $item->icon : '';
            ?>
            <div class="col-sm-6 col-lg-4">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="<?php echo e($icon); ?> i-alt"></i></a>
                </div>
                <div class="fbox-content">
                  <h3><?php echo e($title_child); ?></h3>
                  <p class="text-dark">
                    <?php echo e($brief_child); ?>

                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>    
      </div>

      <div class="clear"></div>
    </div>
  </div>
<?php endif; ?>  <?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/custom/styles/about_vision.blade.php ENDPATH**/ ?>