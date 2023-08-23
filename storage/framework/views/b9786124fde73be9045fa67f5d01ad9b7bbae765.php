<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    
  ?>
  <div id="about-us" class="section dark my-0">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="about-us-content">
            <div class="heading-block mb-5">
              <h2 class="font-title"><?php echo e($title); ?></h2>
            </div>
            <?php echo $content; ?>

          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="about-us-img">
            <img class="lazyload" src="<?php echo e(asset('public/data/cms-image/loading.gif')); ?>" data-src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" />
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>