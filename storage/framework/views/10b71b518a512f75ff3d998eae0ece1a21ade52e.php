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
  <!-- START PROCESS -->
  <section id="content">
    <div class="content-wrap py-0">
      <!-- START BANNER -->
      <div id="solution-banner" class="section bg-transparent pb-0">
        <div class="container">
          <h1 class="banner-title"><?php echo e($title); ?></h1>
        </div>
      </div>
      <!-- END BANNER -->

      <!-- START SERVICE -->
      <div id="solution-service" class="section bg-transparent my-0 pt-0">
        <div class="container">
          <div class="row">
            <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
              <div class="card">
                <img
                  class="card-img-top w-100 h-auto"
                  data-src="holder.js/300x200"
                  alt="300x200"
                  src="<?php echo e($item->image); ?>"
                  data-holder-rendered="true"
                  style="width: 300px; height: 200px"
                />
                <div class="card-body">
                  <div class="text">
                    <h3 class="card-title">
                      <?php echo e($item->title); ?>

                    </h3>
                    <p class="card-text">
                     <?php echo e($item->brief); ?>

                    </p>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- END PROCESS -->
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/solution_plus/styles/default.blade.php ENDPATH**/ ?>