<?php 
if (isset($_GET["fbpixel"]) && !empty($_GET["fbpixel"])) {
    setcookie("FBpixel", $_GET["fbpixel"], time()+60*60*24);
}
?>


<!DOCTYPE html>

<html lang="en-PH"><head>
<script referrerpolicy="no-referrer" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<meta charset="utf-8"/>
<meta content="width=device-width,initial-scale=1" name="viewport"/>
<link href="style.css" rel="stylesheet"/>
<script defer="" src="main.js"></script>
<title>Varicone</title>
<link href="prod.webp" rel="shortcut icon" type="image/x-icon"/>

<style>
@media (max-width: 500px) {
        .price-flex {
            display: flex;
            flex-direction: column
        }
    }

    @media (max-width: 390px) {
        .notification div {
            position: absolute
        }
    }

    .form-title {
        text-align: center
    }

    .coment-wrap {
        display: flex;
        align-items: flex-start;
        gap: 15px
    }

    .coment-wrap img {
        border-radius: 50%;
        width: 40px;
        aspect-ratio: 1
    }

    .form-price {
        text-align: center
    }
</style>
</head>


<body>
    <div class="wrapper">
    <header class="header">
        <div class="container">
            <!-- <h1 class="core-title" style="">Napatunayang Siyentipiko:</h1> -->
            <h1 class="core-title" style="background-color:#ec1313;color:#fff"> 
                Talunin ang tired blood vessels syndrome at kalimutan na ang high blood pressure forever
            </h1>
        </div>
    </header>
    <main class="main">
        <span id="form-wrap"></span>
    <div id="oneform"></div>


<section class="section-video">
    <div class="div-video relative">
        <div class="notification">
            <div><p>Nag‑start na ang video!</p>
                <img loading="eager" src="mute.webp"/>
                <p>Tap para i‑on ang sound!</p>
            </div>
        </div>

        <video 
            autoplay="" 
            class="video" 
            controlslist="nodownload" 
            id="video" 
            muted="" 
            playsinline="" 
            preload="none" 
            src="middlecompress.mp4"
        > </video>

        <div class="close none">
        <div>X</div>
        </div>
    </div>





<!-- Полоса прогресса -->
<div id="videoProgress" style="position:relative;width:100%;height:6px;background:#e5e7eb;border-radius:3px;overflow:hidden;">
  <div id="videoProgressBar" style="height:100%;width:0%;background:#3b82f6;transition:width .25s linear;"></div>
</div>

<script>
(function () {
  // const video = document.querySelector('wistia-player[media-id="f6w72o9wcn"]');
  const bar = document.getElementById('videoProgressBar');
  if (!video || !bar) return;

  function getNativeVideo() {
    if (typeof video.currentTime === 'number') return video;
    if (video.shadowRoot) {
      const v = video.shadowRoot.querySelector('video, audio');
      if (v) return v;
    }
    return null;
  }

  // 50% за 60 секунд
  const FAST = 60;
  function percentFor(t, dur) {
    if (t <= FAST) return (t / FAST) * 50;
    const remain = Math.max(dur - FAST, 1);
    return 50 + Math.min((t - FAST) / remain, 1) * 50;
  }

  let nativeVid = null;
  let duration = 25 * 60;

  function tryUpdateDuration() {
    if (nativeVid && typeof nativeVid.duration === 'number' && isFinite(nativeVid.duration) && nativeVid.duration > 0) {
      duration = nativeVid.duration;
    }
  }

  function update() {
    if (!nativeVid) return;
    tryUpdateDuration();
    const t = +nativeVid.currentTime || 0;
    const p = Math.min(100, percentFor(t, duration));
    bar.style.width = p.toFixed(2) + '%';
    if (p >= 100) clearInterval(poll);
  }

  const poll = setInterval(() => {
    if (!nativeVid) {
      nativeVid = getNativeVideo();
      if (!nativeVid) return;
      try { nativeVid.addEventListener('timeupdate', update, { passive: true }); } catch (_) {}
    }
    update();
  }, 250);

  window.addEventListener('beforeunload', () => clearInterval(poll), { once: true });
})();
</script>







     <p style="text-align:center;background-color:#fff;color:#000;padding:10px 0 30px">
        Saglit lang, naglo‑load ang video. Siguraduhing naka‑on ang tunog.
    </p>
</section>

<section class="section-form none" id="form-wrap2">
    <form action="api.php" class="form" method="POST">
        <input type="hidden" name="subid" value="{subid}" />
        <?php if (isset($_GET["utm_source"])) : ?>
            <input type="hidden" name="utm_source" value="<?=htmlspecialchars($_GET[" utm_source "]);?>" />   <?php endif; ?>
                <?php if (isset($_GET["utm_content"])) : ?>
                    <input type="hidden" name="utm_content" value="<?=htmlspecialchars($_GET[" utm_content "]);?>" />   <?php endif; ?>
                        <?php if (isset($_GET["utm_term"])) : ?>
                            <input type="hidden" name="utm_term" value="<?=htmlspecialchars($_GET[" utm_term "]);?>" />   <?php endif; ?>
                                <?php if (isset($_GET["utm_campaign"])) : ?>
                                    <input type="hidden" name="utm_campaign" value="<?=htmlspecialchars($_GET[" utm_campaign "]);?>" />   <?php endif; ?>
                                        <?php if (isset($_GET["utm_medium"])) : ?>
                                            <input type="hidden" name="utm_medium" value="<?=htmlspecialchars($_GET[" utm_medium "]);?>" />   <?php endif; ?>
                                                <?php if (isset($_GET["subid"])) : ?>
                                                    <input type="hidden" name="subid" value="<?=htmlspecialchars($_GET[" subid "]);?>" />   <?php endif; ?>
                                                        <?php if (isset($_GET["uuid"])) : ?>
                                                            <input type="hidden" name="uuid" value="<?=htmlspecialchars($_GET[" uuid "]);?>" />   <?php endif; ?>
                                                                <?php if (isset($_GET["fbclid"])) : ?>
                                                                    <input type="hidden" name="fbclid" value="<?=htmlspecialchars($_GET[" fbclid "]);?>" />   <?php endif; ?>
                                                                        <?php if (isset($_GET["gclid"])) : ?>
                                                                            <input type="hidden" name="gclid" value="<?=htmlspecialchars($_GET[" gclid "]);?>" />   <?php endif; ?>
                                                                                <?php if (isset($_GET["cpc"])) : ?>
                                                                                    <input type="hidden" name="cpc" value="<?=htmlspecialchars($_GET[" cpc "]);?>" />    <?php endif; ?>
                                                                                        <?php if (isset($_GET["cur"])) : ?>
                                                                                            <input type="hidden" name="cur" value="<?=htmlspecialchars($_GET[" cur "]);?>" />   <?php endif; ?>

    <p class="form-title">
        <strong>Bilisan mo!</strong> Malapit nang matapos ang promo bundles.
    </p>
    <p class="form-title">
        <strong>Update: </strong> natitira na lang ay <span style="color:red">17</span> units today.
    </p>
    <div class="wrap-prod-mobile"><img  class="prod-form-img prod-form-img-2" loading="lazy" src="prod.webp"/></div>
    <p class="form-price"><strong>-50% DISCOUNT</strong></p>
    <p class="form-price price-flex">
        <span style="text-decoration:line-through"> ₱ 4000  </span> 
        <strong><span style="color:red"> ₱ 1950  </span></strong>
    </p>
    <p class="termina-form">Mag-eend na in</p>
    <p class="form-text"><span class="timer">09:09</span></p>
    <p>Pangalan
                        mo:</p><input autocomplete="off" class="ss" id="name" name="name" placeholder="Pangalan" required="" type="text"/>
    <p>Phone number mo:</p>
    <div class="input-container"><img  loading="lazy" src="flag.png"/> <input autocomplete="off" class="pp" id="phone" name="phone" required="" type="text"/></div>
    <button class="btn-submit" type="submit" value="Enviar">I‑save ang request</button>
    <div class="formFb__steps">
    <div class="formFb__step formFb__step--one"><img  loading="lazy" src="step1.png"/></div>
    <div class="formFb__step--line"></div>
    <div class="formFb__step formFb__step--one"><img  loading="lazy" src="step2.png"/></div>
    <div class="formFb__step--line"></div>
    <div class="formFb__step"><img  loading="lazy" src="step3.png"/></div>
    </div>
    <p class="footer-title_form">*Ang discount na ito per package ay valid kapag umorder ka ng treatment</p>
    <p id="error-message" style="color:red"></p></form>
</section>

<!-- <section class="section-banner-chanels">
    <div class="banner-chanels"><p style="color:#fff">As seen in:</p>
    <div><img  loading="lazy" src="chanel1.png"/> <img  loading="lazy" src="chanel2.png" style="border-radius:0"/> <img  loading="lazy" src="chanel3.webp"/> <img  loading="lazy" src="chanel4.png"/></div>
    </div>
</section> -->

<section class="section-coments">
<div class="container">
<div class="all-coments">
    <p class="text-all-coments">Mga komento</p>
<hr/>
<div class="place-coment" style="flex-direction: column-reverse;">
<div class="coment" style="display: flex;">
    <div class="info-coment"><p class="name-coment">Bayani
                                    Liwanag</p>
        <div class="coment-wrap"><img  loading="lazy" src="ava/w1_1.jpg"/>
        <p class="text-coment">“Pagkatapos ng unang course ng Cardio Tonus, nawala ang sakit ng ulo at ingay sa tenga.
                                            Sa wakas, nakakatulog na ako nang mahimbing at gumigising nang walang bigat sa ulo.”</p></div>
        <div class="all-buttons-coment">
            <div class="btn-react-coment">
                <p class="react-coment">Like ko ’to</p>
                <p class="react-coment">Reply</p>
                <p>3 minutes</p>
            </div>
            <div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
            <p>8</p></div>
        </div>
    </div>
</div>
<div class="coment" style="display: flex;">
    <div class="info-coment">
        <p class="name-coment">Mayumi Tala</p>
    <div class="coment-wrap">
        <img  loading="lazy" src="ava/w2.jpg"/>
        <p class="text-coment">
            “In‑approve ng doktor ang capsules, pero ang hirap hanapin ang original. Umiinom ako 3 weeks na: mas pantay ang pulso, wala na akong napapansing biglang pagtaas.”<br/>
        </p>
    </div>
    <div class="all-buttons-coment">
        <div class="btn-react-coment"><p class="react-coment">Like</p>
            <p class="react-coment">Reply</p>
            <p>3 minutes</p>
        </div>
        <div class="btn-like-coment">
            <img  loading="lazy" src="likes.png"/>
            <p>85</p>
        </div>
    </div>
    </div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment"><p class="name-coment">Makisig Dumlao</p>
    <div class="coment-wrap">
        <img  loading="lazy" src="ava/w5.jpg"/>
        <p class="text-coment">
            “Hindi na ‘pumupukpok’ ang batok ko kapag nagbabago ang panahon. Buong araw sa trabaho kaya ko na nang kalmado, walang kirot sa ulo.”
        </p>
    </div>
    <div class="all-buttons-coment">
        <div class="btn-react-coment"><p class="react-coment">Like</p>
            <p class="react-coment">Reply</p>
            <p>3 minutes</p>
        </div>
        <div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
            <p>9</p>
        </div>
    </div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment"><p class="name-coment">Ligaya
                                Manansala</p>
<div class="coment-wrap"><img  loading="lazy" src="ava/w8.jpg"/>
<p class="text-coment">“Pagkalipas ng 10 araw na Cardio Tonus, nawala ang kaba at ‘rapid heartbeat’ sa gabi.
                                        Mas malalim ang tulog ko ngayon.”<br/></p></div>
<div class="all-buttons-coment">
<div class="btn-react-coment"><p class="react-coment">Like</p>
<p class="react-coment">Reply</p>
<p>3 minutes</p></div>
<div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
<p>85</p></div>
</div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment"><p class="name-coment">Datu
                                Mangubat</p>
<div class="coment-wrap"><img  loading="lazy" src="ava/w12.jpg"/>
<p class="text-coment">“Si Mama, 68, isang buwan nang umiinom — nakalimutan na niya kung ano ang hilo sa hagdan.”<br/></p></div>
<div class="all-buttons-coment">
<div class="btn-react-coment"><p class="react-coment">Like</p>
<p class="react-coment">Reply</p>
<p>3 minutes</p></div>
<div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
<p>17</p></div>
</div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment">
    <p class="name-coment">Alon Bagongon</p>
<div class="coment-wrap">
    <img loading="lazy" src="ava/w13.jpg"/>
<p class="text-coment">“Ako 61. Kapag tag‑init lagi akong 160+ dati, ngayon nasa normal na.
                                        Tuwing Linggo nakakapasok ako sa simbahan nang walang hilo.”<br/></p></div>
<div class="all-buttons-coment">
<div class="btn-react-coment"><p class="react-coment">Like</p>
<p class="react-coment">Reply</p>
<p>2 minutes</p></div>
<div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
<p>41</p></div>
</div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment"><p class="name-coment">Amihan
                                Mapili</p>
<div class="coment-wrap"><img  loading="lazy" src="ava/w14.jpg"/>
<p class="text-coment">“Pag akyat ko dati, umiitim ang paningin. Ngayon umaabot ako sa 3rd floor
                                        nang hindi humihinto — wala nang hilo.”<br/></p></div>
<div class="all-buttons-coment">
<div class="btn-react-coment"><p class="react-coment">Like</p>
<p class="react-coment">Reply</p>
<p>2 minutes</p></div>
<div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
<p>40</p></div>
</div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment"><p class="name-coment">Malaya
                                Diwa</p>
<div class="coment-wrap"><img  loading="lazy" src="ava/w15.jpg"/>
<p class="text-coment">“Ako 46, buong araw nakatayo sa palengke: nawala ang pag‑pintig sa sentido,
                                        at sa gabi hindi na ‘nanghihina’ ang katawan.”</p></div>
<div class="all-buttons-coment">
    <div class="btn-react-coment"><p class="react-coment">Like</p>
    <p class="react-coment">Reply</p>
    <p>2 minutes</p></div>
    <div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
    <p>66</p></div>
    </div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment">
    <p class="name-coment">
        Lakambini Dimaala
    </p>
<div class="coment-wrap">
    <img  loading="lazy" src="ava/w16.jpg"/>
    <p class="text-coment">
        Dati pag baba ko ng jeepney, parang 20 minutes akong sinisipa sa ulo — sobrang sakit.
        Ngayon, kalmado ang byahe: hindi na ako takot sa init o alog, stable ang BP.
        Isang buong course ang tinapos ko 4 months ago at nananatili ang resulta.
    </p>
</div>
<div class="all-buttons-coment">
<div class="btn-react-coment"><p class="react-coment">Like</p>
<p class="react-coment">Reply</p>
<p>1 minute</p></div>
<div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
<p>81</p></div>
</div>
</div>
</div>
<div class="coment" style="display: flex;">
<div class="info-coment">
    <p class="name-coment">
        Lakan Ilogon
    </p>
<div class="coment-wrap"><img  loading="lazy" src="ava/w18.jpg"/>
    <p class="text-coment">
        Sintido parang dinuduro, umiiyak sa sakit, takot na takot sa stroke — iniisip ko bukas di na magigising. 
        Isang linggo lang Cardio Tonus, nawala sakit at takot.
    </p>
</div>
<div class="all-buttons-coment">
<div class="btn-react-coment"><p class="react-coment">Like</p>
<p class="react-coment">Reply</p>
<p>1 minute</p></div>
<div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
<p>85</p></div>
</div>
</div>
</div>
<div class="coment" style="display: none;">
<div class="info-coment">
    <p class="name-coment"> Diwata Baluyot </p>
<div class="coment-wrap">
    <img  loading="lazy" src="ava/w19.jpg"/>
    <p class="text-coment">
        Taxista ako labindalawang oras sa trapik ng Maynila. 
        Stress nakakapos ng dibdib ko. Isang linggo lang ng Cardio Tonus, ngumingiti na ako sa pasahero at dumami na ang lagay ko!
    </p>
</div>
<div class="all-buttons-coment">
    <div class="btn-react-coment"><p class="react-coment">Like</p>
    <p class="react-coment">Reply</p>
    <p>1 minute</p></div>
    <div class="btn-like-coment"><img  loading="lazy" src="likes.png"/>
        <p>85</p>
    </div>
</div>
</div>
</div>
</div>
    <p class="text-all-coments"  >
        Kailangan mong mag‑log in para makapag‑comment
    </p>
</div>
</div>
</section>



</main>
</div>
<footer class="footer"></footer>
<style>.notification div {
    text-align: center !important
}

@media screen and (max-width: 700px) {
    .notification div {
        width: 68% !important
    }
}

@media screen and (max-width: 500px) {
    .banner-chanels div {
        gap: 8px !important
    }

    .banner-chanels img {
        width: 62px !important
    }
}

@media screen and (max-width: 400px) {
    .notification {
        /* top: -30px */
    }

    .notification * {
        font-size: 15px !important
    }
}
</style>


</body>
</html>