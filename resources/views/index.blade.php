@extends("layouts.app")

@section("meta-description")
  "Sitio Oficial de la Asociación Asperger Argentina"
  @endsection

@section("title")

  @endsection

@section("style")
    {{-- <style> --}}

    {{-- /* ************ HOME - MOBILE************ */ --}}
      @for ($i=0; $i < count($noticiasCarousel); $i++)
        .noticiaNro{{$i}} {background-image: url('/media/noticias/carousel/mobile/{{$noticiasCarousel[$i]->carousel}}');}
      @endfor

      {{-- /* CAROUSEL - HOME - MOBILE*/ --}}
      .slideshow-container {
        width: 99.9%;
        position: relative;
        margin: auto
      }
      .mySlides {
        display: none;
      }
      .prev,
      .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        color: #ffffff;
        background-color: rgba(34, 36, 40, 0.3);
        font-weight: bold;
        font-size: 20px;
        transition: .6s ease;
        z-index: 900;
      }
      .next {
        right: 0px;
        border-radius: 50px 0px 0px 50px;
        padding: 10px 5px 10px 10px;
      }
      .prev {
        border-radius: 0px 50px 50px 0px;
        padding: 10px 10px 10px 5px;
      }
      .downScroll{
        cursor: pointer;
        width: auto;
        transform: rotate(90deg);
        color: #ffffff;
        background-color: rgba(34, 36, 40, 0.3);
        font-weight: bold;
        font-size: 20px;
        border-radius: 50px 0px 0px 50px;
        padding: 10px 5px 10px 10px;
        transition: .6s ease;
        position: absolute;
        bottom: 1vh;
        margin-bottom: -10px;
        z-index: 900;
        left: 50%;
        margin-left: -12.595px;
      }
      .prev:hover,
      .next:hover,
      .downScroll:hover {
        color: #ffffff;
        background-color: rgba(171, 32, 151, 0.5);
        text-decoration: none;
      }
      .dotContainer {
        position: absolute;
        bottom: 65px;
        width: 100%;
      }
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        display: inline-block;
        transition: background-color .6s ease;
      }
      .dot:first-child{
        margin-left: 17px;
      }
      .active,
      .dot:hover {
        background-color: rgba(171, 32, 151, 0.5);
      }
      /* Fading animation */
      .slideshow-inner{
        overflow: hidden;
      }
      .transition-news{
        -webkit-animation-name: slidein;
        -webkit-animation-duration: 0.5s;
        animation-name: slidein;
        animation-duration: 0.5s;
      }
      @-webkit-keyframes slidein {
        from {
          margin-left: 100%;
          width: 100%;
        }
        to {
          margin-left: 0%;
          width: 100%;
        }
      }
      @keyframes slidein {
        from {
          margin-left: 100%;
          width: 100%;
        }
        to {
          margin-left: 0%;
          width: 100%;
        }
      }
      .transition-news-back{
        -webkit-animation-name: slideback;
        -webkit-animation-duration: 0.5s;
        animation-name: slideback;
        animation-duration: 0.5s;
      }
      @-webkit-keyframes slideback {
        from {
          margin-left: -100%;
          width: 100%;
        }
        to {
          margin-left: 0%;
          width: 100%;
        }
      }
      @keyframes slideback {
        from {
          margin-left: -100%;
          width: 100%;
        }
        to {
          margin-left: 0%;
          width: 100%;
        }
      }

      .img_intro{
        height: 90vh;
        background-image: url('/media/home/63293crop_mobile.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
      }
      .div_intro{
        position: absolute;
        left: 50%;
        margin-left: -132.5px;
        top: 58%;
        margin-top: -105px;
      }
      .p_intro{
        font-weight:bold;
        color: #FFFFFF;
        background-color: rgba(106, 207, 149, 0.76);
        text-align: center;
        font-size: 30px;
        line-height: 55px;
        width: 265px;
        height: 54px;
      }
      .img_noticia{
        height: 90vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .img_noticia a{
        width: 80%;
        text-align: center;
      }
      .div_noticia{
        width: 100%;
        padding: 30px 15px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        border-radius: 6px;
      }
      .div_noticia .p_noticia:first-child{
        font-weight:bold;
        color: #FFFFFF;
        font-size: 24px;
        letter-spacing: 3px;
        line-height: 1.4;
        text-shadow: 1px 1px var(--black);
      }
      .div_noticia .p_noticia:nth-child(2){
        color: #FFFFFF;
        font-size: 20px;
        line-height: 1.4;
        text-shadow: 1px 1px var(--black);
      }
      .div_noticia .mas_info{
        text-transform: uppercase;
        background-color: #FFFFFF;
        width: 75%;
        margin: auto;
        margin-top: 30px;
      }
      .div_noticia .mas_info .p_mas_info{
        text-transform: uppercase;
        font-weight:bold;
        font-size: 16px;
        letter-spacing: 3px;
        margin-bottom: 0;
        padding: 10px 0px;
      }
      .down{
        position: absolute;
        bottom: 12vh;
      }
      .carousel_colors{
        height: 10px;
        display: flex;
      }
      .green{
        width: 33.33%;
        height: 10px;
        background-color: var(--green);
      }
      .orange{
        width: 33.33%;
        height: 10px;
        background-color: var(--orange);
      }
      .blue{
        width: 33.33%;
        height: 10px;
        background-color: var(--blue);
      }
      {{-- /* END CAROUSEL - HOME - MOBILE*/ --}}

      {{-- /* INFO CONTAINER - HOME - MOBILE*/ --}}
      .info_container{
        display: flex;
        margin: 10px 0;
        flex-direction: column;
      }
      .asoc_container, .asperger_container{
        width: 100%;
        background: var(--grey);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        padding: 15px 0 5px 0;
      }
      .asperger_container{
        margin-top: 10px;
      }
      .p_asoc_container, .div_a_asoc_container, .p_asperger_container, .div_a_asperger_container{
        background: #FFFFFF;
        border-radius: 6px;
        width: 90%;
        border: 3px solid var(--green);
        margin-bottom: 10px;
      }
      .p_asperger_container, .div_a_asperger_container{
        border: 3px solid var(--blue);
      }
      .p_asoc_container, .p_asperger_container{
        font-style: normal;
        font-weight: 500;
        font-size: 18px;
        line-height: 35px;
        text-align: center;
        padding: 13px;
      }
      .div_a_asoc_container{
        text-align: center;
        width: 100%;
      }
      .a_asoc_container {
        font-style: normal;
        font-weight: 800;
        font-size: 15px;
        line-height: 55px;
        width: 90%;
      }
      .a_asoc_container:hover{
      text-decoration: none;
      color: var(--black);
      }
      .div_a_asperger_container{
        text-align: center;
        width: 100%;
      }
      .a_asperger_container {
        font-style: normal;
        font-weight: 800;
        font-size: 15px;
        line-height: 55px;
        width: 90%;
      }
      .a_asperger_container:hover{
        text-decoration: none;
        color: var(--black);
      }
      {{-- /* END INFO CONTAINER - HOME - MOBILE*/ --}}

      {{-- /* SEPARADOR - HOME - MOBILE*/ --}}
      .separador{
        position: relative;
      }
      .img_separador{
        width: 100%;
      }
      .p_separador_invisible{
        font-weight: 500;
        font-size: 18px;
        line-height: 22px;
        text-align: center;
        padding: 10px;
        margin-bottom: 0;
        background-color: var(--orange);
        color: var(--orange);
      }
      .p_separador{
        position: absolute;
        left: 0;
        bottom: 0;
        font-weight:500;
        font-size: 18px;
        line-height: 30px;
        color: #FFFFFF;
        background-color: var(--orange);
        width: 100%;
        text-align: center;
        padding: 10px;
      }
      {{-- /* END SEPARADOR - HOME - MOBILE*/ --}}

      {{-- /* CLOSING - HOME - MOBILE*/ --}}
      .closing{
        margin: 15px;
      }
      .donate{
        border-radius: 6px;
        border: 3px solid var(--magenta);
        padding: 15px;
        text-align: center;
      }
      .p_donate{
        font-family: 'Raleway', sans-serif;
        color: #000000;
        {{-- font-size: 16px; --}}
        font-size: 18px;
        {{-- line-height: 19px; --}}
        line-height: 35px;
      }
      {{-- .p_donate:first-child{
        font-size: 18px;
      } --}}
      .div_donate{
        width: 128px;
        height: 48px;
        background-color: var(--magenta);
        border-radius: 8px;
        text-align: center;
        margin: auto;
      }
      .a_donate{
        font-family: 'Raleway', sans-serif;
        font-size: 25px;
        font-weight: 800;
        line-height: 47px;
        color: #ffffff;
        padding: 8px 17px;
      }
      .a_donate:hover{
        text-decoration: none;
        color: #FFFFFF;
      }
      .facebook{
        border-radius: 6px;
        border: 3px solid var(--orange);
        text-align: center;
        margin-top: 15px;
        height: 370px;
        overflow: hidden;
      }
      {{-- /* END CLOSING - HOME - MOBILE*/ --}}

      {{-- /* FOOTER - HOME - MOBILE*/ --}}
      footer{
        background-color: var(--grey);
        display: flex;
        flex-direction: column-reverse;
      }

      {{-- /* DIV LOGO - FOOTER - HOME - MOBILE*/ --}}
      .container_logo_footer{
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
      }
      .logo_footer{
        text-align: center;
        width: 99%;
      }
      .img_footer_logo{
        width: 252px;
        margin: 25px;
      }
      .p_footer{
        font-weight: 500;
        font-size: 18px;
        line-height: 30px;
      }
      .p_footer:first-of-type{
        margin-bottom: 0;
      }
      .p_footer.creditos{
        font-style: italic;
        font-size: 12px;
      }
      .vl_footer{
        display: none;
      }
      {{-- /* DIV CONTACT - FOOTER - HOME - MOBILE*/ --}}
      .contact_footer{
        width: 95%;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
      }
      .p_contact_footer{
        font-weight: 500;
        font-size: 18px;
        line-height: 26px;
        letter-spacing: 1px;
        text-align: center;
      }
      .p_contact_footer:first-child{
        margin-bottom: 0px;
        margin-top: 40px;
      }
      .vh_footer{
        display: none;
      }
      .img_socialmedia_footer{
        width: 45px;
        height: 45px;
        border-radius: 6px;
        margin: 5px;
      }
      {{-- /* DIV NEWSLETTER - FOOTER - HOME - MOBILE*/ --}}
      .newsletter_footer{
        background-color: var(--green);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: auto;
      }
      .p_newsletter_footer{
        font-weight: 500;
        font-size: 14px;
        line-height: 17px;
        margin: 15px 0;
      }
      .form_newsletter_footer{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 95%;
      }
      .form_item{
        text-align: center;
        margin: 5px 0;
        width: 100%;
      }
      .label_newsletter_footer{
        font-size: 14px;
        letter-spacing: 1px;
        margin-bottom: 1px;
      }
      .input_newsletter_footer{
        background-color: var(--grey);
        border-style: none;
        padding-left: 10px;
        width: 100%;
        height: 39px;
        border-radius: 6px;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
      }
      .input_newsletter_footer:focus{
        outline: none;
      }
      .buton_newsletter_footer{
        width: 100%;
        height: 39px;
        background-color: var(--green);
        border-radius: 6px;
        border: 4px solid #F3F3F3;
        color: var(--grey);
        font-family: 'Montserrat', sans-serif;
        font-size: 16px;
        line-height: 20px;
        text-align: center;
        margin: 15px 0;
      }
      .buton_newsletter_footer p{
        margin-bottom: 0px;
      }
      .buton_newsletter_footer p:last-child{
        display: none;
      }
      .buton_newsletter_footer:focus{
        outline: none;
        background-color: var(--magenta);
      }
      .buton_newsletter_footer:focus p:first-child{
        display: none;
      }
      .buton_newsletter_footer:focus p:last-child{
        display: block;
      }
      #mc_embed_signup_scroll{
        width: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
      }
      #mc_embed_signup #mc-embedded-subscribe-form div.mce_inline_error {
        background-color: var(--green);
        color: red;
        font-weight: normal;
        font-style: italic;
        line-height: 1;
        margin: 0;
        padding: 0;
      }
      #mce-responses{
        position: absolute;
        top: 0;
        z-index: 5;
        width: 100%;
      }
      #mce-error-response, #mce-success-response{
        background-color: var(--green);
        border: 2px solid var(--green);
        text-align: center;
        width: 100%;
        height: 280px;
        padding: 10px;
      }
      #mce-error-response{
        color: red;
      }
      .new_buton_newsletter_footer{
        width: 80%;
        height: 70px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
      }
      .new_buton_newsletter_footer:hover{
        cursor: pointer;
      }
      {{-- /* END FOOTER - HOME - MOBILE*/ --}}
      {{-- /* ************ END HOME - MOBILE ************ */ --}}


      @media (min-width: 768px){
        {{-- /* ************ HOME - TABLET ************ */ --}}
        @for ($i=0; $i < count($noticiasCarousel); $i++)
          .noticiaNro{{$i}} {background-image: url('/media/noticias/carousel/tablet/{{$noticiasCarousel[$i]->carousel}}');}
        @endfor

        {{-- /* CAROUSEL - HOME - TABLET*/ --}}
        .img_intro{
          height: 90vh;
          background-image: url('/media/home/63293crop_tablet.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
        }
        .div_intro{
          left: 50%;
          margin-left: -132.5px;
          top: 50%;
          margin-top: -105px;
        }
        {{-- /* END CAROUSEL - HOME - TABLET*/ --}}

        {{-- /* INFO CONTAINER - HOME - TABLET*/ --}}
        .info_container{
          flex-direction: row;
        }
        .asoc_container, .asperger_container{
          width: 50%;
        }
        .asperger_container{
          margin-top: 0;
        }
        .p_asoc_container {
          height: 375px;
        }
        .p_asperger_container{
          height: 303px;
        }
        {{-- /* END INFO CONTAINER - HOME - TABLET*/ --}}

        {{-- /* SEPARADOR - HOME - TABLET */ --}}
        .p_separador_invisible{
          display: none;
        }
        .p_separador{
          bottom: 5px;
        }
        {{-- /* END SEPARADOR - HOME - TABLET */ --}}

        {{-- /* CLOSING - HOME - TABLET */ --}}


        {{-- /* END CLOSING - HOME - TABLET */ --}}

        {{-- /* FOOTER - HOME - TABLET */ --}}
        footer{
        flex-wrap: wrap;
        flex-direction: row;
        }
        .container_logo_footer{
          display: none;
        }
        .vl_footer{
          display: block;
          background-color: var(--black);
          width: 2px;
          height: 200px;
        }
        .contact_footer{
          width: 50%;
          justify-content: center;
        }
        .newsletter_footer{
          width: 50%;
        }
        {{-- /* END FOOTER - HOME - TABLET */ --}}
        {{-- /* ************ END HOME - TABLET ************ */ --}}
      }

      @media (min-width: 992px){
        {{-- /* ************ HOME - DESKTOP************ */ --}}
        @for ($i=0; $i < count($noticiasCarousel); $i++)
          .noticiaNro{{$i}} {background-image: url('/media/noticias/carousel/desktop/{{$noticiasCarousel[$i]->carousel}}');}
        @endfor

        {{-- /* CAROUSEL - HOME - DESKTOP*/ --}}
        .img_intro{
          height: 99vh;
          background-image: url('/media/home/63293crop_desktop.jpg');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
        }
        .img_noticia{
          height: 99vh;
        }
        .div_intro{
          left: 68%;
          margin-left: -132.5px;
          top: 50%;
          margin-top: -105px;
        }
        .p_intro{
          font-size: 59px;
          line-height: 72px;
          width: 384px;
          height: 77px;
        }
        .img_noticia a{
          width: 45%;
        }
        .prev,
        .next {
          font-size: 30px;
        }
        .next {
          padding: 15px 8px 15px 16px;
        }
        .prev {
          padding: 15px 16px 15px 8px;
        }
        .downScroll{
          font-size: 30px;
          padding: 15px 8px 15px 16px;
          bottom: 0vh;
        }
        {{-- /* END CAROUSEL - HOME - DESKTOP*/ --}}

        {{-- /* INFO CONTAINER - HOME - DESKTOP*/ --}}
        .info_container{
          justify-content: space-between;
          margin: 30px 0;
        }
        .asoc_container, .asperger_container{
          width: 49.3%;
        }
        .p_asoc_container, .div_a_asoc_container, .p_asperger_container, .div_a_asperger_container{
          max-width: 482px;
          border: 5px solid rgba(106, 207, 149, 0.76);
        }
        .p_asperger_container, .div_a_asperger_container{
          border: 5px solid var(--blue);
        }
        .p_asoc_container{
          height: 611px;
          font-size: 23px;
          line-height: 45px;
          padding: 50px 49px 70px 49px;
        }
        .div_a_asoc_container{
          height: 110px;
          margin-left: auto;
          margin-right: auto;
        }
        .a_asoc_container {
          font-size: 23px;
          line-height: 100px;
        }
        .p_asperger_container{
          height: 490px;
          font-size: 23px;
          line-height: 38px;
          padding: 50px 49px 70px 49px;
        }
        .div_a_asperger_container{
          height: 110px;
          margin-left: auto;
          margin-right: auto;
        }
        .a_asperger_container {
          font-size: 23px;
          line-height: 100px;
        }
        .div_a_asoc_container:hover, .div_a_asperger_container:hover{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        {{-- /* END INFO CONTAINER - HOME - DESKTOP*/ --}}

        {{-- /* SEPARADOR - HOME - DESKTOP*/ --}}
        .p_separador_invisible{
          display: none;
        }
        .p_separador{
          bottom: 13px;
          font-size: 29px;
          line-height: 48px;
          height: 244px;
          padding: 26px 66px;
        }
        {{-- /* END SEPARADOR - HOME - DESKTOP*/ --}}

        {{-- /* CLOSING - HOME - DESKTOP*/ --}}
        .closing{
          display: flex;
          justify-content: space-around;
          margin: 30px 0px;
        }
        .donate{
          width: 59%;
          height: 510px;
          border: 5px solid var(--magenta);
          {{-- padding: 30px 33px 0px 33px; --}}
          padding: 60px;
        }
        {{-- .p_donate:last-of-type{
          margin-bottom: 5px;
        } --}}
        .div_donate{
          margin-top: 20px;
        }
        .div_donate:hover{
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        .facebook{
          display: block;
          width: 35%;
          height: 500px;
          height: 510px;
          border: 5px solid var(--orange);
          border-radius: 6px;
          margin-top: 0;
          overflow: hidden;
        }
        .fb-desktop{
          display: block;
        }
        .fb-mobile{
          display: none;
        }
        {{-- /* END CLOSING - HOME - DESKTOP*/ --}}

        {{-- /* FOOTER - HOME - DESKTOP*/ --}}

        {{-- /* DIV LOGO - FOOTER - HOME - DESKTOP*/ --}}
        .container_logo_footer{
          display: flex;
          width: 25%;
        }
        .img_footer_logo{
          width: 66%;
        }

        {{-- /* DIV CONTACT - FOOTER - HOME - DESKTOP*/ --}}
        .contact_footer{
          width: 37.5%;
        }
        .p_contact_footer:first-child {
          margin-top: 0px;
        }
        .vh_footer{
          display: block;
          background-color: var(--black);
          width: 80%;
          height: 2px;
          margin-bottom: 23px;
          margin-top: 20px;
        }
        .img_socialmedia_footer:hover{
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }

        {{-- /* DIV NEWSLETTER - FOOTER - HOME - DESKTOP*/ --}}
        .newsletter_footer{
          width: 37.5%;
          height: 293px;
        }
        .p_newsletter_footer{
          margin-bottom: 15px;
        }
        .form_newsletter_footer{
          width: 85%;
        }
        .form_item{
          position: relative;
        }
        .label_newsletter_footer{
          font-weight: bold;
          font-size: 14px;
          line-height: 40px;
          letter-spacing: 1px;
          position: absolute;
          top: 0px;
          left: 10px;
        }
        .input_newsletter_footer{
          width: 100%;
          padding-left: 100px;
        }
        .buton_newsletter_footer{
          margin-top: 7px;
          width: 100%;
        }
        .buton_newsletter_footer:hover{
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        #mce-error-response, #mce-success-response{
          height: 200px;
        }
        {{-- /* END FOOTER - HOME - DESKTOP*/ --}}
        {{-- /* ************ END HOME - DESKTOP************ */ --}}
      }

      {{-- /*desktop X-LARGE*/ --}}
      @media (min-width:1920px) {
        .p_asoc_container, .div_a_asoc_container, .p_asperger_container, .div_a_asperger_container{
          max-width: 535px;
        }
        .p_separador{
          padding: 50px 66px;
        }
        .donate{
          padding: 50px 50px 0px 50px;
        }
        .p_donate:last-of-type{
          margin-bottom: 40px;
        }
        .img_footer_logo {
          width: 55%;
        }
      }

      @media (min-width:2048px){
        .img_intro, .img_noticia{
          height: 1080px;
        }
        .info_container{
          background-color: #ffffff;
        }
        .donate{
          background-color: #ffffff;
        }
        .facebook{
          background-color: #ffffff;
        }
      }
    {{-- </style> --}}
    @endsection

@section('content')
  {{-- <div id="fb-root"></div> --}}
  {{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script> --}}
  {{-- <script defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script> --}}

      <div class="slideshow-container">
          <div class="slideshow-inner">

            <div class="mySlides img_intro transition-news">
              <div class="div_intro">
                <p class="p_intro">Asociación</p>
                <p class="p_intro">Asperger</p>
                <p class="p_intro">Argentina</p>
              </div>
            </div>

            @for ($i=0; $i < count($noticiasCarousel); $i++)
              @php
                $randColor = $colores[rand(0,3)];
              @endphp
              <div class="mySlides img_noticia noticiaNro{{$i}} transition-news">
                <a href="/noticia/{{$noticiasCarousel[$i]->id}}/{{$noticiasCarousel[$i]->slug}}">
                  <div class="div_noticia" style="background-color: {{$randColor}};">
                    <p class="p_noticia">{{$noticiasCarousel[$i]->title}}</p>
                    <p class="p_noticia">{{$noticiasCarousel[$i]->subtitle}}</p>
                    <div class="mas_info">
                      <p class="p_mas_info" style="color: {{$randColor}};">Más información</p>
                    </div>
                  </div>
                </a>
              </div>
            @endfor

          </div>

          @if (count($noticiasCarousel) > 0)
            <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
            <a class="next" onclick='plusSlides(1)'>&#10095;</a>

            <div class="dotContainer" style='text-align: center;'>
                @for ($i=0; $i <= count($noticiasCarousel); $i++)
                  <span class="dot" onclick='currentSlide({{$i +1 }})'></span>
                @endfor
            </div>
          @endif

      <a class="downScroll" href="#sitio">&#10095;</a>

      <div id="sitio" class="down"></div>

      <div class="carousel_colors">
        <div class="green"></div>
        <div class="orange"></div>
        <div class="blue"></div>
      </div>

    </div>

  <div class="info_container">
    <div class="asoc_container">
      <p class="p_asoc_container">La <b>Asociación Asperger Argentina</b> (AsAAr) es una <b>organización sin fines de lucro</b> formada por un <b>grupo de padres</b> que, al haber tomado conocimiento de la situación en la que estaban inmersos sus hijos, decidieron organizarse en pos del bienestar de las personas con el síndrome.</p>

      <a class="a_asoc_container" href="/quienes-somos"><div class="div_a_asoc_container">Leer más sobre la Asociación</div></a>

      <a class="a_asoc_container" href="/actividades"><div class="div_a_asoc_container">Actividades</div></a>
    </div>

    <div class="asperger_container">
      <p class="p_asperger_container">El <b>Síndrome de Asperger</b> es una condición del neurodesarrollo, una variación del desarrollo que acompaña a las personas durante toda la vida. Influye en la forma en que éstas dan sentido al mundo, procesan la información y se relacionan con los otros.</p>

      <a class="a_asperger_container" href="/asperger-cea"><div class="div_a_asperger_container">Información sobre Asperger / CEA</div></a>

      <a class="a_asperger_container" href="/asperger-cea#diagnosticos"><div class="div_a_asperger_container">Criterios Diagnósticos</div></a>

      <a class="a_asperger_container" href="/asperger-cea#intervenciones"><div class="div_a_asperger_container">Intervenciones / Tratamientos</div></a>

    </div>
  </div>

  <div class="separador">
    <img class="img_separador"
    srcset="
    /media/home/2580120crop_desktop.jpg 1920w,
    /media/home/2580120crop_tablet.jpg 991w,
    /media/home/2580120crop_mobile.jpg 767w
    "
    src="/media/2580120crop_desktop.jpg"
    alt="Muchas manos levantadas">


    <p class="p_separador_invisible">La AsAAr acompaña a las familias brindando asesoramiento, información y contención; y compartiendo experiencias en un plano de igualdad entre todas las familias unidas por una misma circunstancia de vida.</p>
    <p class="p_separador">La AsAAr acompaña a las familias brindando asesoramiento, información y contención; y compartiendo experiencias en un plano de igualdad entre todas las familias unidas por una misma circunstancia de vida.</p>
  </div>

  <div class="closing">
    <div class="donate">
      {{-- <p class="p_donate"><b>Estimado amigo y lector:</b></p>
      <p class="p_donate">Hoy te pedimos que <b>ayudes a la Asociación Asperger Argentina.</b></p>
      <p class="p_donate"> Nos sostenemos gracias a las donaciones de poco menos de $100.- y para proteger nuestra independencia, nunca verás avisos publicitarios.</p>
      <p class="p_donate">Solo unos pocos de nuestros lectores donan.</p>
      <p class="p_donate">¡Ahora es el momento de pedirte algo!</p>
      <p class="p_donate"><b>Si todos los que están leyendo esto, ahora donaran $80.-, nuestra campaña de recaudación de fondos finalizaría en una hora. Tan simple como eso: lo único que necesitamos es el valor de un café.</b></p>
      <p class="p_donate">Somos una Asociación sin fines de lucro con necesidad de crecer para ofrecerles a ustedes un lugar de pertenencia: <b>nuestra SEDE.</b></p>
      <p class="p_donate">Si la Asociación Asperger Argentina te resulta útil, por favor tomate un minuto para ayudarnos a seguir creciendo.</p>
      <p class="p_donate"><b>¡Muchas gracias!</b></p> --}}
      <p class="p_donate"><b>Ayudanos a crecer, donando</b></p>
      <p class="p_donate">Con tu aporte, sumado al de muchas otras personas, nos permitirá incrementar nuestras actividades en pos  de mejorar la calidad de vida de las personas con Síndrome de Asperger, trabajando junto a  las familias, generando espacios de encuentros, difundiendo, capacitando,  investigando.</p>
      <p class="p_donate"><b>Gracias por confiar en nosotros.</b></p>
      <p class="p_donate">Asociación Asperger Argentina</p>
      <div class="div_donate">
        <a class="a_donate" href="/donar" style="text-transform: uppercase;">donar</a>
      </div>
    </div>
    <div class="facebook">
      {{-- <div class="fb-desktop">
        <div class="fb-page" data-href="https://www.facebook.com/AsociacionAspergerArgentina/" data-tabs="timeline" data-width="483" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/AsociacionAspergerArgentina/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AsociacionAspergerArgentina/">Asociacion Asperger Argentina</a></blockquote></div>
      </div> --}}
      <iframe title="Facebook" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAsociacionAspergerArgentina&tabs=timeline&width=483&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="483" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
    </div>
  </div>

  <footer>
    <div class="container_logo_footer">
      <div class="logo_footer">
        <img class="img_footer_logo"src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina">
        <p class="p_footer">Sitio oficial</p>
        <p class="p_footer">Copyright 2003-2020</p>
        <a class="p_footer creditos" href="/creditos">* Créditos imágenes</a>
      </div>
      <div class="vl_footer"> </div>
    </div>
    <div class="contact_footer">
      <p class="p_contact_footer"><b>TELÉFONO:</b> (011) 4931-2712</p>
      <p class="p_contact_footer">(De lunes a viernes de 14:00 a 18:00 hs.)</p>
      <p class="p_contact_footer"><b>MAIL:</b> <a href="mailto:info@asperger.org.ar">info@asperger.org.ar</a></p>
      <div class="vh_footer"></div>
      <div class="socialmedia_footer">

        <a class="a_socialmedia_footer" href="https://www.facebook.com/AsociacionAspergerArgentina/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/facebook.svg" alt="Logo Facebook"></a>

        <a class="a_socialmedia_footer" href="https://twitter.com/AspergerArg" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/twitter.svg" alt="Logo Twitter"></a>

        <a class="a_socialmedia_footer" href="https://www.youtube.com/channel/UCOl2EpPpSQxKUZP2UmpR_jQ" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/youtube.svg" alt="Logo YouTube"></a>

        <a class="a_socialmedia_footer" href="https://www.instagram.com/asociacionasperger/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/instagram.svg" alt="Logo Instagram"></a>

        <a class="a_socialmedia_footer" href="https://www.linkedin.com/company/asociaci%C3%B3n-asperger-argentina/about/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/linkedin.svg" alt="Logo Linkedin"></a>
      </div>
    </div>

    {{-- <!-- Begin Mailchimp Signup Form -->
      <div id="mc_embed_signup" class="newsletter_footer">
        <p class="p_newsletter_footer">Recibir novedades por mail:</p>
        <form action="https://gmail.us19.list-manage.com/subscribe/post?u=5ef693025dfac788bcbc56790&amp;id=3ad72c438f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form_newsletter_footer" target="_blank" novalidate>
          <div id="mc_embed_signup_scroll">
            <div class="mc-field-group form_item">
               <label class="label_newsletter_footer" for="mce-FNAME">NOMBRE</label>
               <input type="text" value="" name="FNAME" class="required input_newsletter_footer" id="mce-FNAME">
             </div>
            <div class="mc-field-group form_item">
              <label class="label_newsletter_footer" for="mce-LNAME">APELLIDO</label>
              <input type="text" value="" name="LNAME" class="required input_newsletter_footer" id="mce-LNAME">
            </div>
            <div class="mc-field-group form_item">
              <label class="label_newsletter_footer" for="mce-EMAIL">E-MAIL</label>
              <input type="email" value="" name="EMAIL" class="required email input_newsletter_footer" id="mce-EMAIL">
            </div>
            <div id="mce-responses" class="clear">
              <div class="response" id="mce-error-response" style="display:none"></div>
              <div class="response" id="mce-success-response" style="display:none"></div>
            </div>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5ef693025dfac788bcbc56790_3ad72c438f" tabindex="-1" value=""></div>
            <div class="clear"><input class="buton_newsletter_footer" type="submit" value="Suscribirse a nuestras novedades" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
          </div>
        </form>
      </div>
    <!--End mc_embed_signup--> --}}

      <div class="newsletter_footer">
        <a href="/suscribirse">
          <div class="buton_newsletter_footer new_buton_newsletter_footer">
            Recibir nuestras novedades por e-mail
          </div>
        </a>
      </div>

    </footer>

  @endsection

  @section("scripts")
    {{-- <script src="{{ asset('js/index.js') }}"></script> --}}
    <script>
      // LINEAR GRADIENT HEADER:
      document.getElementById("header").style.backgroundColor="transparent";

      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
        if ((document.body.scrollTop > 50 && document.body.scrollTop <= 100) || (document.documentElement.scrollTop > 50 && document.documentElement.scrollTop <= 100)) {
          document.getElementById("header").style.backgroundImage= "linear-gradient(to top, rgba(243,243,243,0), rgba(243,243,243,0.1), rgba(243,243,243,0.2), rgba(243,243,243,0.3),rgba(243,243,243,0.4), rgba(243,243,243,0.5))";

        } else {
          if ((document.body.scrollTop > 100 && document.body.scrollTop <= 150) || (document.documentElement.scrollTop > 100 && document.documentElement.scrollTop <= 150)) {
            document.getElementById("header").style.backgroundImage= "linear-gradient(to top, rgba(243,243,243,0.6), rgba(243,243,243,0.7), rgba(243,243,243,0.8), rgba(243,243,243,0.9), rgba(243,243,243,1))";

          } else {
            if ((document.body.scrollTop > 150) || (document.documentElement.scrollTop > 150)){
              document.getElementById("header").style.backgroundImage= "linear-gradient(to top, rgba(243,243,243,1), rgba(243,243,243,1))";

            }else{
              document.getElementById("header").style.backgroundImage= "none";
              }
            }
          }
        }

      // SLIDESHOW:
      var slideIndex = 1;

      var myTimer;

      var slideshowContainer;

      showSlides(slideIndex);
      myTimer = setInterval(function(){plusSlides(1)}, 4000);

      // NEXT AND PREVIOUS CONTROL
      function plusSlides(n){
        clearInterval(myTimer);
        if (n < 0){
          showSlides(slideIndex -= 1);
          } else {
           showSlides(slideIndex += 1);
        }

        if (n === -1){
          myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
          } else {
            myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
          }
        }

      //Controls the current slide and resets interval if needed
      function currentSlide(n){
        clearInterval(myTimer);
        myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
        showSlides(slideIndex = n);
        }

      function showSlides(n){
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        // slides[slideIndex-1].style.display = "block";
        slides[slideIndex-1].style.display = "flex";
        slides[slideIndex-1].classList.remove("transition-news-back");
        slides[slideIndex-1].classList.add("transition-news");

        if (dots.length>0){
          dots[slideIndex-1].className += " active";
        }
      }

        // pause - resume
        let div_noticia = document.querySelectorAll(".div_noticia");

        for (var i = 0; i < div_noticia.length; i++) {

          div_noticia[i].addEventListener("mouseenter", function(){
            clearInterval(myTimer);
          });

          div_noticia[i].addEventListener("mouseleave", function(){
            clearInterval(myTimer);
            myTimer = setInterval(function(){plusSlides(slideIndex)}, 4000);
          });
        }


        // reverse transition
        let aPrev = document.querySelector(".prev");
        let mySlides = document.querySelectorAll(".mySlides");

        if (aPrev != null){
          aPrev.addEventListener("click", function(){
            for (var i = 0; i < mySlides.length; i++) {
              mySlides[i].classList.remove("transition-news");
              mySlides[i].classList.add("transition-news-back");
            }
          });
        }
    </script>

    {{-- Mailchimp --}}
    {{-- <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email'; /*
     * Translated default messages for the $ validation plugin.
     * Locale: ES
     */
    $.extend($.validator.messages, {
      required: "Este campo es obligatorio.",
      remote: "Por favor, rellena este campo.",
      email: "Por favor, escribe una dirección de correo válida",
      url: "Por favor, escribe una URL válida.",
      date: "Por favor, escribe una fecha válida.",
      dateISO: "Por favor, escribe una fecha (ISO) válida.",
      number: "Por favor, escribe un número entero válido.",
      digits: "Por favor, escribe sólo dígitos.",
      creditcard: "Por favor, escribe un número de tarjeta válido.",
      equalTo: "Por favor, escribe el mismo valor de nuevo.",
      accept: "Por favor, escribe un valor con una extensión aceptada.",
      maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
      minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
      rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
      range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
      max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
      min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });}(jQuery));var $mcj = jQuery.noConflict(true);</script> --}}

  @endsection
