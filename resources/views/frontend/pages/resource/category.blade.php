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
<section class="bg-gradient " style="background-image: url('{{ $image_background }}'); background-size: cover;" id="page-title">
    <div class="container clearfix text-center">
      <h1 class="">{{ $title }}</h1>
    </div>
  </section>
  <section id="content">
    <div class="content-wrap pb-0 pt-5">
      <!-- START LIST PROJECT -->
      <div id="list-project" class="section bg-transparent my-0 pt-0">
        <div class="container">
          {{-- <div class="heading-block">
            <h2 class="font-title">Dự án</h2>
          </div> --}}
          <div class="row col-mb-30 mt-5">
            @foreach ($posts as $item)
            @php
              $title = $item->json_params->title->{$locale} ?? $item->title;
              $brief = $item->json_params->brief->{$locale} ?? $item->brief;
              $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
              $date = date('H:i d/m/Y', strtotime($item->created_at));
              // Viet ham xu ly lay alias bai viet
              $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $item->taxonomy_alias ?? $item->taxonomy_title, $item->taxonomy_id);
              $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['resource'], $item->alias ?? $title, $item->id, 'detail', $item->taxonomy_title);
            @endphp
            <div class="col-lg-4 col-md-6 col-sm-12">
              <a href="{{ $alias }}">
                <div class="list-project-item">
                  <div class="list-project-item-img">
                    <img src="{{ $image }}" alt="" />
                  </div>
                  <div class="list-project-item-content dark">
                    <h3>{{ $title }}</h3>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      {{ $posts->withQueryString()->links('frontend.pagination.default') }}
      <!-- END LIST PROJECT -->
      <!-- START FORM -->
      <div id="form" class="section dark my-0">
        <div class="container">
          <div class="quick-contact-widget form-widget dark clearfix">
            <div class="heading-block">
              <h2 class="font-title">Liên hệ tư vấn</h2>
            </div>

            <div class="form-result"></div>

            <form
          id="quick-contact-form"
          name="quick-contact-form"
          class="quick-contact-form mb-0 mt-6 form_ajax"
          action="{{ route('frontend.contact.store') }}" method="post" 
        >@csrf
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
      <!-- END FORM -->
    </div>
  </section>
  {{-- End content --}}
@endsection
