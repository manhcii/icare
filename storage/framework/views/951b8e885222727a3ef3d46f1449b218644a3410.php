<?php $__env->startPush('style'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
<?php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');
  $page_brief = $taxonomy->json_params->brief->{$locale} ?? ($taxonomy->brief ?? null);
  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
?>
<section id="content">
    <div class="content-wrap py-0">
      <!-- START BANNER -->
      <div id="solution-banner" class="section bg-transparent pb-0">
        <div class="container">
          <h1 class="banner-title">Giải pháp chuyên biệt cho cơ sở y tế</h1>
        </div>
      </div>
      <!-- END BANNER -->

      <!-- START SERVICE -->
      <div id="solution-service" class="section bg-transparent my-0 pt-0">
        <div class="container">
          <div class="row">
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
              $title_post = $item->json_params->title->{$locale} ?? $item->title;
              $brief_post = $item->json_params->brief->{$locale} ?? $item->brief;
              $image_post = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              // $date = date('H:i d/m/Y', strtotime($item->created_at));
              $date = date('d', strtotime($item->created_at));
              $month = date('M', strtotime($item->created_at));
              $year = date('Y', strtotime($item->created_at));
              // Viet ham xu ly lay slug
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            ?>
            <div class="col-lg-3 col-md-6 col-12 mb-4">
              <div class="card">
                <img
                  class="card-img-top w-100 h-auto"
                  data-src="holder.js/300x200"
                  alt="300x200"
                  src="<?php echo e($image_post); ?>"
                  data-holder-rendered="true"
                  style="width: 300px; height: 200px"
                />
                <div class="card-body">
                  <div class="text">
                    <h3 class="card-title">
                      <?php echo e($title_post); ?>

                    </h3>
                    <p class="card-text">
                     <?php echo e($brief_post); ?>

                    </p>
                  </div>

                  <a href="<?php echo e($alias); ?>" class="btn btn-primary">Chi tiết</a>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
      <!-- END SERVICE -->


    </div>
    </div>
    
  </section>

  <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/pages/post/category.blade.php ENDPATH**/ ?>