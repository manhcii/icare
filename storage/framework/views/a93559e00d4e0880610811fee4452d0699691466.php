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
      <div id="about-us-banner" class="section bg-transparent">
        <div class="container">
          <h1 class="banner-title"><?php echo e($title); ?></h1>
          <p class="banner-desc">
            <?php echo e($brief); ?>

          </p>
        </div>
      </div>
      <!-- END BANNER -->
    </div>
  </section>
<?php endif; ?>
<?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/about/styles/default.blade.php ENDPATH**/ ?>