@extends('frontend.layouts.default')

@php
  $page_title = $taxonomy->title ?? ($page->title ?? $page->name);
  $image_background = $taxonomy->json_params->image_background ?? ($web_information->image->background_breadcrumbs ?? '');

  $title = $taxonomy->json_params->title->{$locale} ?? ($taxonomy->title ?? null);
  $image = $taxonomy->json_params->image ?? null;
  $seo_title = $taxonomy->json_params->seo_title ?? $title;
  $seo_keyword = $taxonomy->json_params->seo_keyword ?? null;
  $seo_description = $taxonomy->json_params->seo_description ?? null;
  $seo_image = $image ?? null;
  $str_alias = '.html?id=';
@endphp
@push('style')
  <style>

  </style>
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/geem.css') }}" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/project.css') }}" />
@endpush
@section('content')
  {{-- Print all content by [module - route - page] without blocks content at here --}}
  <section id="content">
    <div class="content-wrap py-0">
      <!-- START BANNER -->
      <div id="about-us-banner" class="section bg-transparent">
        <div class="container">
          <h1 class="banner-title">Đơn vị đầu tiên tại Việt Nam</h1>
          <p class="banner-desc">
            Cung cấp giải pháp tổng thể và toàn diện giúp cơ sở y tế mở mới,
            vận hành, kinh doanh và mở rộng điểm hoạt động với khả năng cam
            kết hiệu quả lợi nhuận trong cả ngắn hạn và dài hạn
          </p>
        </div>
      </div>
      <!-- END BANNER -->

      <!-- START OUR STORY -->
      <div id="our-story" class="section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
              <div class="our-story-image">
                <img
                  src="./images/Group 8.png"
                  alt="our story"
                  title="our story"
                />
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
              <div class="our-story-content">
                <h2 class="title">Câu chuyện iCare Partner</h2>
                <p class="desc">
                  Sau 8 năm cùng làm việc trong môi trường y tế từ phòng
                  khám một cơ sở tới chuỗi bệnh viện lớn nhất trong nước,
                  đội ngũ iCare thấu hiểu khó khăn mà các bác sĩ gặp phải
                  khi xây dựng và quản lý một cơ sở y tế. iCare ấp ủ mong
                  muốn trở thành người đồng hành cùng các bác sĩ trong toàn
                  bộ quá trình quản lý cơ sở y tế, giải phóng bác sĩ khỏi
                  các "nhiệm vụ vận hành", tạo cơ hội cho bác sĩ tập trung
                  vào phát triển chuyên môn tại phòng khám và bệnh viện,
                  song song với việc thúc đẩy khả năng phát triển cơ sở y tế
                  đến mức cao nhất.
                </p>
                <div
                  class="our-story-content-number d-flex align-items-center mt-5"
                >
                  <div class="item d-flex align-items-center">
                    <div class="fbox-icon">
                      <a href="#"><i class="icon-beaker i-alt"></i></a>
                    </div>
                    <p class="text">8+ <br />Năm kinh nghiệm</p>
                  </div>
                  <div class="item d-flex align-items-center">
                    <div class="fbox-icon">
                      <a href="#"><i class="icon-beaker i-alt"></i></a>
                    </div>
                    <p class="text">100+ <br />Cố vấn y tế</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END OUR STORY -->

      <!-- START WHY CHOOSE US -->
      <div id="about-us-why-choose-us" class="section bg-transparent">
        <div class="container text-center">
          <div class="heading-block center">
            <h2>
              iCare là lựa chọn hàng đầu của các cơ sở y tế trên cả nước
            </h2>
            <span
              >Đội ngũ iCare đã từng thực hiện hơn 50 dự án trong ngành và
              nhận được sự hài lòng của khách hàng trên cả nước
            </span>
          </div>
        </div>
        <div class="container clearfix">
          <div class="row col-mb-50">
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="icon-screen i-alt"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Đồng hành</h3>
                  <p class="text-dark">
                    Năng lực đồng hành bác sĩ từ khi mở cơ sở đầu tiên tới
                    vận hành chuỗi trên cả nước
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="icon-eye i-alt"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Chuyên biệt</h3>
                  <p class="text-dark">
                    Dịch vụ đo đinh đóng giày cho ngành y tế, với kinh
                    nghiệm triển khai thực tế
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="icon-beaker i-alt"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Chuyên nghiệp</h3>
                  <p class="text-dark">
                    Chuyên nghiệp và bài bản, trên từng bước triển khai đồng
                    thời sẵn sàng cam kết đầu ra
                  </p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="feature-box fbox-effect">
                <div class="fbox-icon">
                  <a href="#"><i class="icon-beaker i-alt"></i></a>
                </div>
                <div class="fbox-content">
                  <h3>Toàn diện</h3>
                  <p class="text-dark">
                    Cung cấp dịch vụ toàn diện giúp bác sĩ tập trung vào
                    phát triển chuyên môn phòng khám
                  </p>
                </div>
              </div>
            </div>
          </div>

          <div class="clear"></div>
        </div>
      </div>
      <!-- END WHY CHOOSE US -->

      <!-- START CLIENT -->

      <div class="section border-top-0 m-0">
        <div class="container clearfix">
          <div class="heading-block center">
            <h2>đối tác</h2>
            <span>Đối tác của chúng tôi</span>
          </div>
          <div
            id="oc-clients"
            class="owl-carousel image-carousel carousel-widget owl-loaded owl-drag with-carousel-dots"
            data-margin="20"
            data-nav="false"
            data-pagi="true"
            data-items-xs="2"
            data-items-sm="3"
            data-items-md="4"
            data-items-lg="5"
            data-items-xl="6"
          >
            <div class="owl-stage-outer">
              <div
                class="owl-stage"
                style="
                  transform: translate3d(0px, 0px, 0px);
                  transition: all 0s ease 0s;
                  width: 2194px;
                "
              >
                <div
                  class="owl-item active"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/4.png" alt="Clients"
                    /></a>
                  </div>
                </div>
                <div
                  class="owl-item active"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/5.png" alt="Clients"
                    /></a>
                  </div>
                </div>
                <div
                  class="owl-item active"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/6.png" alt="Clients"
                    /></a>
                  </div>
                </div>
                <div
                  class="owl-item active"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/7.png" alt="Clients"
                    /></a>
                  </div>
                </div>
                <div
                  class="owl-item"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/8.png" alt="Clients"
                    /></a>
                  </div>
                </div>
                <div
                  class="owl-item"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/9.png" alt="Clients"
                    /></a>
                  </div>
                </div>
                <div
                  class="owl-item"
                  style="width: 199.333px; margin-right: 20px"
                >
                  <div class="oc-item">
                    <a href="#"
                      ><img src="images/clients/10.png" alt="Clients"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="owl-nav disabled">
              <button type="button" role="presentation" class="owl-prev">
                <i class="icon-angle-left"></i></button
              ><button type="button" role="presentation" class="owl-next">
                <i class="icon-angle-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- END CLIENT -->
    </div>
  </section>
@endsection
