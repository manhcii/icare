@if ($block)
  @php
    $title = $block->json_params->title->{$locale} ?? $block->title;
    $brief = $block->json_params->brief->{$locale} ?? $block->brief;
    $content = $block->json_params->content->{$locale} ?? $block->content;
    $image = $block->image != '' ? $block->image : null;
    $background = $block->image_background != '' ? $block->image_background : null;
    $url_link = $block->url_link != '' ? $block->url_link : '';
    $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

  @endphp
    <div class="form-widget">
      <div class="form-result"></div>
      <div class="row shadow bg-light border">
        <div class="col-lg-6 dark" style="background: url('{{ $image }}') center center / cover; min-height: 400px;">
        </div>

        <div class="col-lg-6 p-5 bg-icon ">
          <form class="row mb-0 form_ajax" action="{{ route('frontend.contact.store') }}" method="post">
          @csrf
            <h3 class="text-white">{{ $title }}</h3>
            <div class="col-12 form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label class="text-white" for="fitness-form-name">@lang('Đơn vị')<span class="text-red">*</span>:</label>
                  <input type="text" name="unit" class="form-control required" value="" placeholder="Đơn vị">
                </div><div class="col-sm-4">
                  <label class="text-white" for="fitness-form-name">@lang('Khu vực hoạt động'):</label>
                  <input type="text" name="area"  class="form-control required" value="" placeholder="Khu vực hoạt động">
                </div>
              </div>
            </div>
             <div class="col-12 form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label class="text-white" for="fitness-form-name">@lang('Fullname')<span class="text-red">*</span>:</label>
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
                  <label class="text-white" for="fitness-form-name">@lang('Email')<span class="text-red">*</span>:</label>
                  <input type="text" name="email" class="form-control required" value="" placeholder="Nhập email của bạn">
                </div><div class="col-sm-5">
                  <label class="text-white" for="fitness-form-name">@lang('Nhu cầu')<span class="text-red">*</span>:</label>
                  <select name="demain" id="demain" class="select2 form-select">
                    @foreach(App\Consts::DEMAND as $key => $item)
                      <option value="{{ $key }}">{{ $item }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <div class="col-12 form-group">
                <label class="text-white" for="fitness-form-name">@lang('Nội dung'):</label>
                <textarea name="content" class="form-control required" rows="5" placeholder="@lang('Vấn đề cần tư vấn')"></textarea>
            </div>
            <input type="hidden" name="is_type" value="contact">
            <div class="col-12 d-flex justify-content-end align-items-center">
              <button type="submit" name="fitness-form-submit" class="btn btn-default bg-white text-uppercase font-weight-bold ms-2">@lang('Gửi')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endif
