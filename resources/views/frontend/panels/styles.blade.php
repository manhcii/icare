 <link
  href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&amp;display=swap"
  rel="stylesheet" type="text/css" />
<link
  href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700,800,900|Roboto:900,300,100,400&amp;display=swap"
  rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/demos/articles/articles.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/demos/articles/css/fonts.css') }}" type="text/css" />

  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/bootstrap.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/style.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/swiper.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/dark.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/font-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/animate.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/magnific-popup.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/css/custom.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{ asset('themes/frontend/watches/FHMtemp-agency.css') }}" />

  <meta name="viewport" content="width=device-width, initial-scale=1" />

<style>
  .elipsis2 {
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
  }
  .elipsis1 {
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 1;
    display: -webkit-box;
    -webkit-box-orient: vertical;
  }
  .form-check-input:checked {
      background-color: #fff;
      border-color: #fff;
  }
  .form-check-input {
      background-color: unset;
      border-color: #fff;
  }
</style>
@isset($web_information->source_code->header)
  {!! $web_information->source_code->header !!}
@endisset
