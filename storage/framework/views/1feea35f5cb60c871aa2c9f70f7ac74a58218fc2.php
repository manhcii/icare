<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $image= $block->image != '' ? $block->image : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
        <div id="our-story" class="section">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                  <div class="our-story-image">
                    <img
                      src="<?php echo e($image_background); ?>"
                      alt="our story"
                      title="our story"
                    />
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                  <div  class="our-story-content">
                    <h2 class="title"><?php echo e($title); ?></h2>
                    <p  class="desc">
                     <?php echo e($brief); ?>

                    </p>
                    <div
                      class="our-story-content-number d-flex align-items-center mt-5"
                    >
                    <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="item d-flex align-items-center">
                        <div class="fbox-icon">
                          <a href="#"><i class="<?php echo e($item->icon); ?>"></i></a>
                        </div>
                        <p class="text"><?php echo e($item->title); ?> <br /><?php echo e($item->brief); ?></p>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/cauchuyen/styles/default.blade.php ENDPATH**/ ?>