<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;

    $orther_content = $block->json_params->orther_content ?? "";
    $orther_brief = $block->json_params->orther_brief ?? "";

    $image_background = $block->image_background != '' ? $block->image_background : '';
    $image = $block->image != '' ? $block->image : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
  ?>
  <section id="content">
    <div class="content-wrap pt-0 bg-mint">
    <div class="about">
      <div class="container">
        <div class="about-content-wrapper">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 col-md-3 col-12">
                <h2 class="about-content-title">
                  <?php echo $title; ?>

                </h2>
              </div>
              <div class="col-lg-6 col-md-6 col-12">
                <p class="about-content-description">
                  <?php echo e($content); ?>

                </p>
              </div>
              <div class="col-lg-2 col-md-3 col-12">
                <p class="about-content-counter"><?php echo $brief; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-5 col-md-5 col-sm-6">
            <div class="heading-block border-bottom-0">
              <h2
                class="fw-normal ls0 nott mb-0 font-primary"
                style="
                  font-size: 44px;
                  line-height: 1.3;
                  font-weight: bold !important;
                  color: #000;
                "
              >
                <?php echo e($orther_brief); ?>

              </h2>
            </div>
            <p>
              <?php echo e($orther_content); ?>

            </p>
          </div>
          <div class="col-lg-6 col-md-7 col-sm-6 mt-5 mt-sm-0">
            <div class="d-none d-lg-flex">
              <img
                src="<?php echo e($image); ?>"
                class="fast fadeInDown animated"
                alt="Image"
                style="height: 600px"
                data-animate="fadeInDown"
              />
            </div>
            <img
              src="https://websitedemos.net/diagnostics-lab-02/wp-content/uploads/sites/662/2020/08/diagnostic-lab-hero-img.jpg"
              alt="Image"
              class="d-block d-lg-none px-5 px-sm-0 p-md-5"
            />
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>    <?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>