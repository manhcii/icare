<footer id="footer" class="dark" data-scrollto-settings='{"offset":140,"speed":1250,"easing":"easeOutQuad"}'>
    <!-- Copyrights
    ============================================= -->
    <div id="copyrights">
      <div class="container">
        <div class="row col-mb-30">
          <div class="col-md-6 text-center text-md-start">
            <?php echo e($web_information->information->site_name ?? ''); ?><br />
            <div class="copyright-links">
              <?php echo e($web_information->information->address ?? ''); ?>

            </div>
          </div>

          <div class="col-md-6 text-center text-md-end">
            <div class="d-flex justify-content-center justify-content-md-end">

              
              <a href="<?php echo e($web_information->social->facebook ?? ''); ?>" class="social-icon si-small si-borderless si-facebook">
                <i class="icon-facebook"></i>
                <i class="icon-facebook"></i>
              </a>
              

              
              <a href="<?php echo e($web_information->social->twitter ?? "https://twitter.com/"); ?>" class="social-icon si-small si-borderless si-twitter">
                <i class="icon-twitter"></i>
                <i class="icon-twitter"></i>
              </a>
              

              
              <a href="<?php echo e($web_information->social->gmail ?? "https://gmail.com/"); ?>" class="social-icon si-small si-borderless si-gplus">
                <i class="icon-gplus"></i>
                <i class="icon-gplus"></i>
              </a>
              

              
              <a href="<?php echo e($web_information->social->pinterest ?? "https://pinterest.com/"); ?>" class="social-icon si-small si-borderless si-pinterest">
                <i class="icon-pinterest"></i>
                <i class="icon-pinterest"></i>
              </a>
              

              
              
              

              
              
              

              
             
              

              
              
              
            </div>

            <div class="clear"></div>

            <i class="icon-envelope2"></i> <?php echo e($web_information->information->email ?? ''); ?>

            <span class="middot">·</span>
            <i class="icon-headphones"></i> <?php echo e($web_information->information->phone ?? ''); ?>

            
          </div>
        </div>
      </div>
    </div>
    <!-- #copyrights end -->
  </footer>
<?php /**PATH C:\xamppp\htdocs\icare\resources\views/frontend/blocks/footer/styles/default.blade.php ENDPATH**/ ?>