

<?php
  $page_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $title = $detail->json_params->title->{$locale} ?? $detail->title;
  $brief = $detail->json_params->brief->{$locale} ?? null;
  $content = $detail->json_params->content->{$locale} ?? null;
  $image = $detail->image != '' ? $detail->image : null;
  $image_thumb = $detail->image_thumb != '' ? $detail->image_thumb : null;
  $date = date('H:i d/m/Y', strtotime($detail->created_at));
  $page_brief = $taxonomy->json_params->brief->{$locale} ?? ($taxonomy->brief ?? null);
  // For taxonomy
  $taxonomy_json_params = json_decode($detail->taxonomy_json_params);
  $taxonomy_title = $taxonomy_json_params->title->{$locale} ?? $detail->taxonomy_title;
  $image_background = $taxonomy_json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? null);
  $taxonomy_alias = Str::slug($taxonomy_title);
  $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $taxonomy_alias, $detail->taxonomy_id);
  
  $seo_title = $detail->json_params->seo_title ?? $title;
  $seo_keyword = $detail->json_params->seo_keyword ?? null;
  $seo_description = $detail->json_params->seo_description ?? $brief;
  $seo_image = $image ?? ($image_thumb ?? null);
  
  // schema information
  $datePublished = date('Y-m-d', strtotime($detail->created_at));
  $dateModified = date('Y-m-d', strtotime($detail->updated_at));
?>

<?php $__env->startPush('style'); ?>
  <style>
    #content-detail {
      text-align: justify;
    }

    #content-detail h2 {
      font-size: 30px;
    }

    #content-detail h3 {
      font-size: 24px;
    }

    #content-detail h4 {
      font-size: 18px;
    }

    #content-detail h5,
    #content-detail h6 {
      font-size: 16px;
    }

    #content-detail p {
      margin-top: 0;
      margin-bottom: 0;
    }

    #content-detail h1,
    #content-detail h2,
    #content-detail h3,
    #content-detail h4,
    #content-detail h5,
    #content-detail h6 {
      margin-top: 0;
      margin-bottom: .5rem;
    }

    #content-detail p+h2,
    #content-detail p+.h2 {
      margin-top: 1rem;
    }

    #content-detail h2+p,
    #content-detail .h2+p {
      margin-top: 1rem;
    }

    #content-detail p+h3,
    #content-detail p+.h3 {
      margin-top: 0.5rem;
    }

    #content-detail h3+p,
    #content-detail .h3+p {
      margin-top: 0.5rem;
    }

    #content-detail ul,
    #content-detail ol {
      list-style: inherit;
      padding: 0 0 0 25px;

    }

    #content-detail ul li {
      display: list-item;
      list-style: initial;
    }

    #content-detail ol li {
      display: list-item;
      list-style: decimal;
    }

    .posts-sm .entry-image {
      width: 75px;
    }

    #content-detail img {
      max-width: 100%;
      width: auto !important;
    }

    body.light #content-detail p {
      color: #000 !important;
      font-weight: 400 !important;
    }
  </style>

  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/watches/geem.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('themes/frontend/watches/about-us.css.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('schema'); ?>
  <script type="application/ld+json">
  {
      "@context": "https://schema.org/",
      "@type": "BlogPosting",
      "@id": "<?php echo e(Request::fullUrl()); ?>",
      "mainEntityOfPage": "<?php echo e(Request::fullUrl()); ?>",
      "headline": "<?php echo e($seo_title); ?>",
      "name": "<?php echo e($seo_title); ?>",
      "description": "<?php echo e($seo_description); ?>",
      "datePublished": "<?php echo e($datePublished); ?>",
      "dateModified": "<?php echo e($dateModified); ?>",
      "author": {
          "@type": "Person",
          "name": "<?php echo e($web_information->information->site_name ?? ''); ?>",
          "url": "<?php echo e(Request::root()); ?>",
          "image": {
              "@type": "ImageObject",
              "@id": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "url": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "height": "125",
              "width": "125"
          }
      },
      "publisher": {
          "@type": "Organization",
          "@id": "<?php echo e(Request::root()); ?>",
          "name": "<?php echo e($web_information->information->site_name ?? ''); ?>",
          "logo": {
              "@type": "ImageObject",
              "@id": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "url": "<?php echo e($web_information->image->logo_header ?? ''); ?>",
              "width": "125",
              "height": "125"
          }
      },
      "image": {
          "@type": "ImageObject",
          "@id": "<?php echo e($seo_image); ?>",
          "url": "<?php echo e($seo_image); ?>",
          "height": "362",
          "width": "388"
      },
      "url": "<?php echo e(Request::fullUrl()); ?>",
      "isPartOf": {
          "@type" : "Blog",
           "@id": "<?php echo e($alias_category); ?>",
           "name": "<?php echo e($taxonomy_title ?? ''); ?>",
           "publisher": {
               "@type": "Organization",
               "@id": "<?php echo e(Request::root()); ?>",
               "name": "<?php echo e($web_information->information->site_name ?? ''); ?>"
           }
       }
  }
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <section class="bg-gradient " style="background-image: url('<?php echo e($image_background); ?>'); background-size: cover;" id="page-title">
    <div  class="container clearfix text-center">
      <h1><?php echo e($page_title); ?></h1>
      <span><?php echo e($page_brief); ?></span>
    </div>
  </section>

  <section id="content">

    <div class="content-wrap">
      <div class="container clearfix">
        <div class="row gutter-40 col-mb-80">

          <div class="postcontent col-lg-9">
            <div class="single-post mb-0">

              <!-- Single Post
                            ============================================= -->
              <div class="entry clearfix">


                <!-- Entry Content
                              ============================================= -->
                <div class="entry-content mt-0" id="content-detail">
                  <h1><?php echo e($title); ?></h1>
                  <?php echo $content ?? ''; ?>

                  <!-- Post Single - Content End -->


                  <div class="clear"></div>

                  <!-- Post Single - Share
                                ============================================= -->
                  <div class="si-share border-0 d-flex justify-content-between align-items-center">
                    <span><?php echo app('translator')->get('Share this post'); ?>:</span>
                    <div>
                      <a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo e(Request::fullUrl()); ?>"
                        class="social-icon si-borderless si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                      </a>
                      <a href="https://twitter.com/intent/tweet?url=<?php echo e(Request::fullUrl()); ?>"
                        class="social-icon si-borderless si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                      </a>
                      <a href="https://www.instagram.com/cws/share?url=<?php echo e(Request::fullUrl()); ?>"
                        class="social-icon si-borderless si-instagram">
                        <i class="icon-instagram"></i>
                        <i class="icon-instagram"></i>
                      </a>
                    </div>
                  </div><!-- Post Single - Share End -->

                </div>
              </div><!-- .entry end -->

              <?php if(isset($relatedPosts) && count($relatedPosts) > 0): ?>
                <h4 class="title-widget text-uppercase"><?php echo app('translator')->get('Related Posts'); ?></h4>
                <div class="related-posts row posts-md col-mb-30">
                  <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                      $title = $item->json_params->title->{$locale} ?? $item->title;
                      $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                      $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                      $date = date('d/m/Y', strtotime($item->created_at));
                      // Viet ham xu ly lay slug
                      $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
                      $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['post'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
                    ?>
                    <div class="entry col-12 col-md-6">
                      <div class="grid-inner row align-items-center gutter-20">
                        <div class="col-4 col-xl-5">
                          <div class="entry-image">
                            <a href="<?php echo e($alias); ?>"><img style="height: 180px" src="<?php echo e($image); ?>" alt="Blog Single"></a>
                          </div>
                        </div>
                        <div class="col-8 col-xl-7">
                          <div class="entry-title title-xs nott">
                            <h3><a href="<?php echo e($alias); ?>"><?php echo e(Str::limit($title, 70)); ?></a></h3>
                          </div>
                          <div class="entry-content d-none d-xl-block">
                            <?php echo e(Str::limit($brief, 100)); ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              <?php endif; ?>

            </div>
          </div>

          <?php echo $__env->make('frontend.components.sidebar.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

      </div>
    </div>
  </section>

  
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/pages/post/detail.blade.php ENDPATH**/ ?>