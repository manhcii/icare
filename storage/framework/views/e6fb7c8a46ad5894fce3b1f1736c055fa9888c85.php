<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div class="section border-top-0 m-0 section-clients">
    <div class="container clearfix">
      <div class="heading-block center">
        <h2><?php echo e($title); ?></h2>
        <span><?php echo e($brief); ?></span>
      </div>
      <div id="oc-clients"
        class="owl-carousel image-carousel carousel-widget owl-loaded owl-drag with-carousel-dots"
        data-margin="20" data-nav="false" data-pagi="true" data-items-xs="2" data-items-sm="3" data-items-md="4"
        data-items-lg="5" data-items-xl="4">
        <div class="owl-stage-outer">
          <div class="owl-stage" style="
                transform: translate3d(0px, 0px, 0px);
                transition: all 0s ease 0s;
                width: 2194px;
              ">
            <?php if($block_childs): ?>
              <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                  $image = $item->image != '' ? $item->image : null;
                  $url_link = $item->url_link != '' ? $item->url_link : '';
                  $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                ?>  
                <div class="owl-item active" style="width: 199.333px; margin-right: 20px">
                  <div class="oc-item">
                    <a><img src="<?php echo e($image); ?>" alt="Clients" /></a>
                  </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <?php endif; ?>
          </div>
        </div>
        <div class="owl-nav disabled">
          <button type="button" role="presentation" class="owl-prev">
            <i class="icon-angle-left"></i></button><button type="button" role="presentation" class="owl-next">
            <i class="icon-angle-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>  <?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/banner/styles/logo_partner.blade.php ENDPATH**/ ?>