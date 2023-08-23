<?php if($block): ?>
<?php
  $title = $block->json_params->title->{$locale} ?? $block->title;
  $brief = $block->json_params->brief->{$locale} ?? $block->brief;
  
  $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
  $params['taxonomy'] = App\Consts::TAXONOMY['post'];
  $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();
  $params['status'] = App\Consts::POST_STATUS['active'];
  $params['is_featured'] = true;
  $params['is_type'] = App\Consts::POST_TYPE['post'];
  $rows = App\Http\Services\ContentService::getCmsPost($params)->limit(3)->get();
?>
<div class="section border-top-0 m-0 bg-transparent">
  <div class="container text-center">
    <div class="heading-block center">
      <h2><?php echo e($title); ?></h2>
      <span><?php echo e($brief); ?></span>
    </div>
  </div>
  <div class="container clearfix">
    <div class="row">
      <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
          $title = $item->json_params->title->{$locale} ?? $item->title;
          $price = $item->json_params->price ?? null;
          $price_old = $item->json_params->price_old ?? null;
          $brief = $item->json_params->brief->{$locale} ?? $item->brief;
          $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
          $date = date('H:i d/m/Y', strtotime($item->created_at));
          // Viet ham xu ly lay slug
          $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_title, $item->taxonomy_id);
          $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $title, $item->id, 'detail', $item->taxonomy_title);
        ?>
        <div class="col-md-6 col-lg-4">
          <div class="card">
            <img class="card-img-top w-100 h-auto" data-src="holder.js/300x200" alt="300x200"
              style="width: 300px; height: 200px"
              src="<?php echo e($image); ?>"
              data-holder-rendered="true" />
            <div class="card-body">
              <p class="card-text">
                <?php echo e($brief); ?>

              </p>
              <a href="<?php echo e($alias); ?>" class="btn btn-primary">View detail</a>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="clear"></div>
  </div>
</div>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\Icarecode\resources\views/frontend/blocks/cms_post/styles/default.blade.php ENDPATH**/ ?>