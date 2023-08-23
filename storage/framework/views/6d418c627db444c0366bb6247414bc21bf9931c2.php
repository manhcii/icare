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
  <div id="form" class="section dark my-0">
    <div class="container">
      <div class="quick-contact-widget form-widget dark clearfix">
        <div class="heading-block">
          <h2 class="font-title"><?php echo e($title); ?></h2>
        </div>

        <div class="form-result"></div>

        <form
          id="quick-contact-form"
          name="quick-contact-form"
          class="quick-contact-form mb-0 mt-6 form_ajax"
          action="<?php echo e(route('frontend.contact.store')); ?>" method="post" 
        ><?php echo csrf_field(); ?>
          <div class="form-process">
            <div class="css3-spinner">
              <div class="css3-spinner-scaler"></div>
            </div>
          </div>

          <input
            type="text"
            class="required sm-form-control input-block-level not-dark "
            id="quick-contact-form-name"
            name="name"
            value="" required
            placeholder="Họ tên"
          />

          <input
            type="email"
            class="required sm-form-control email input-block-level not-dark "
            id="quick-contact-form-email"
            name="email"
            value=""required
            placeholder="Email"
          />

          <input
            type="text"
            class="required sm-form-control input-block-level not-dark valid"
            id="quick-contact-form-phone"
            name="phone"
            value=""
            placeholder="Điện thoại"
          />

          <textarea
            class="required sm-form-control input-block-level not-dark short-textarea valid"
            id="quick-contact-form-message"
            name="content"
            rows="5"
            cols="30"
            placeholder="Lời nhắn"
          ></textarea>

          <input type="hidden" name="is_type" value="contact">

          <button
            type="submit"
            id="quick-contact-form-submit"
            name="quick-contact-form-submit"
            class="button button-border button-dark topmargin-sm font-title mx-auto d-block"
            value="submit"
          >
            Gửi
          </button>
        </form>
      </div>
    </div>
  </div>
  <?php endif; ?><?php /**PATH E:\xampp\htdocs\capital\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>