<?php if($block): ?>
  <?php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : '';
    $image_background = $block->image_background != '' ? $block->image_background : '';
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
    $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';
    
    // Filter all blocks by parent_id
    $block_childs = $blocks->filter(function ($item, $key) use ($block) {
        return $item->parent_id == $block->id;
    });
  ?>
  <div class="section m-0">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="heading-block">
            <h2 class="fw-normal ls0 nott mb-3 font-primary">
              <?php echo e($title); ?>

            </h2>
          </div>
          <p>
            <?php echo e($brief); ?>

          </p>
        </div>
        <div
          class="col-md-6 offset-0 offset-md-1 mt-5 mt-md-0 d-flex justify-content-center"
        >
          <div class="circle-border">
            <div class="feature-content">
              <div
                class="d-flex align-items-center justify-content-between h-100"
              >
                <div>
                  <div
                    class="circle-inner"
                    style="transform: translateY(70%)"
                  >
                    <div>
                      <div
                        class="counter mb-0 fw-normal font-body text-primary"
                      >
                        <span
                          class="font-body"
                          data-from="1"
                          data-to="<?php echo e($web_information->information->project ?? ''); ?>"
                          data-refresh-interval="10"
                          data-speed="2000"
                          ><?php echo e($web_information->information->project ?? ''); ?></span
                        >+
                      </div>
                      <h5 class="mt-2 text-muted font-body ls0"><?php echo app('translator')->get('Dự án'); ?></h5>
                    </div>
                  </div>
                </div>
                <div
                  class="d-flex h-100 flex-column justify-content-between"
                >
                  <div class="circle-inner">
                    <div>
                      <div
                        class="counter mb-0 fw-normal font-body text-info"
                      >
                        <span
                          class="font-body"
                          data-from="1"
                          data-to="<?php echo e($web_information->information->adviser ?? ''); ?>"
                          data-refresh-interval="200"
                          data-speed="23000"
                          ><?php echo e($web_information->information->adviser ?? ''); ?></span
                        >+
                      </div>
                      <h5 class="mt-2 text-muted font-body ls0">
                        <?php echo app('translator')->get('Cố vấn'); ?>
                      </h5>
                    </div>
                  </div>
                  <div class="circle-inner">
                    <div>
                      <div
                        class="counter mb-0 fw-normal font-body text-warning"
                      >
                        <span
                          class="font-body"
                          data-from="1"
                          data-to="<?php echo e($web_information->information->year ?? ''); ?>"
                          data-refresh-interval="100"
                          data-speed="2400"
                          ><?php echo e($web_information->information->year ?? ''); ?></span
                        >+
                      </div>
                      <h5 class="mt-2 text-muted font-body ls0">
                        <?php echo app('translator')->get('năm'); ?>
                      </h5>
                    </div>
                  </div>
                  <div
                    class="circle-inner"
                    style="opacity: 0; user-select: none"
                  >
                    <div>
                      <div
                        class="counter mb-0 fw-normal font-body text-warning"
                      >
                        <span
                          class="font-body"
                          data-from="1"
                          data-to="100"
                          data-refresh-interval="100"
                          data-speed="2400"
                          >100</span
                        >+
                      </div>
                      <h5 class="mt-2 text-muted font-body ls0">
                        Cố vấn
                      </h5>
                    </div>
                  </div>
                </div>
                <div>
                  <div
                    class="circle-inner"
                    style="transform: translateY(70%)"
                  >
                    <div>
                      <div
                        class="counter mb-0 fw-normal font-body color"
                      >
                        <span
                          class="font-body"
                          data-from="1"
                          data-to="<?php echo e($web_information->information->professer ?? ''); ?>"
                          data-refresh-interval="100"
                          data-speed="2400"
                          ><?php echo e($web_information->information->professer ?? ''); ?></span
                        >+
                      </div>
                      <h5 class="mt-2 text-muted font-body ls0">
                        <?php echo app('translator')->get('năm'); ?>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>  <?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/custom/styles/about_development.blade.php ENDPATH**/ ?>