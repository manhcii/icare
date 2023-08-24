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
    <div class="form-widget">
      <div class="form-result"></div>
      <div class="row shadow bg-light border">
        <div class="col-lg-6 dark" style="background: url('<?php echo e($image); ?>') center center / cover; min-height: 400px;">
        </div>

        <div class="col-lg-6 p-5 bg-icon ">
          <form class="row mb-0 form_ajax" action="<?php echo e(route('frontend.contact.store')); ?>" method="post">
          <?php echo csrf_field(); ?>
            <h3 class="text-white"><?php echo e($title); ?></h3>
            <div class="col-12 form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label class="text-white" for="fitness-form-name"><?php echo app('translator')->get('Đơn vị'); ?><span class="text-red">*</span>:</label>
                  <input type="text" name="unit" class="form-control required" value="" placeholder="Đơn vị">
                </div><div class="col-sm-4">
                  <label class="text-white" for="fitness-form-name"><?php echo app('translator')->get('Khu vực hoạt động'); ?>:</label>
                  <input type="text" name="area"  class="form-control required" value="" placeholder="Khu vực hoạt động">
                </div>
              </div>
            </div>
             <div class="col-12 form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label class="text-white" for="fitness-form-name"><?php echo app('translator')->get('Fullname'); ?><span class="text-red">*</span>:</label>
                  <input type="text" name="name" class="form-control required" value="" placeholder="Họ và tên">
                </div><div class="col-sm-4">
                  <label class="text-white" for="fitness-form-name">Phone<span class="text-red">*</span>:</label>
                  <input type="text" name="phone"  class="form-control required" value="" placeholder="SĐT">
                </div>
              </div>
            </div>
            <div class="col-12 form-group">
              <div class="row">
                <div class="col-sm-7">
                  <label class="text-white" for="fitness-form-name"><?php echo app('translator')->get('Email'); ?><span class="text-red">*</span>:</label>
                  <input type="text" name="email" class="form-control required" value="" placeholder="Enter your Email">
                </div><div class="col-sm-5">
                  <label class="text-white" for="fitness-form-name"><?php echo app('translator')->get('Nhu cầu'); ?><span class="text-red">*</span>:</label>
                  <select name="demain" id="demain" class="select2 form-select">
                    <?php $__currentLoopData = App\Consts::DEMAND; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 form-group">
                <label class="text-white" for="fitness-form-name">Message:</label>
                <textarea name="content" class="form-control required" rows="5" placeholder="<?php echo app('translator')->get('Vấn đề cần tư vấn'); ?>"></textarea>
            </div>
            <input type="hidden" name="is_type" value="contact">
            <div class="col-12 d-flex justify-content-end align-items-center">
              <button type="submit" name="fitness-form-submit" class="btn btn-default bg-white text-uppercase font-weight-bold ms-2">Confirm Booking</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?><?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/form/styles/booking.blade.php ENDPATH**/ ?>