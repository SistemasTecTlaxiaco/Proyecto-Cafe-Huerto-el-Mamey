<html>
  
<!-- Mirrored from hiukim.github.io/mind-ar-js-doc/samples/advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Apr 2022 00:39:01 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script src="public/cdn.jsdelivr.net/gh/hiukim/mind-ar-js%401.0.0/dist/mindar-image.prod.js"></script>
    <script src="public/aframe.io/releases/1.2.0/aframe.min.js"></script>
    <script src="public/cdn.jsdelivr.net/gh/hiukim/mind-ar-js%401.0.0/dist/mindar-image-aframe.prod.js"></script>

    <!-- scripts de voz -->
    <!-- <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.6.0/aframe/build/aframe-ar.js"></script> -->
    <script src="https://rawgit.com/donmccurdy/aframe-extras/master/dist/aframe-extras.loaders.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <script>
      const showInfo = () => {
        let y = 0;
        const microButton = document.querySelector("#micro-button");
        const webButton = document.querySelector("#web-button");
        const emailButton = document.querySelector("#email-button");
        const locationButton = document.querySelector("#location-button");
        const text = document.querySelector("#text");

        microButton.setAttribute("visible", true);
        setTimeout(() => {
          webButton.setAttribute("visible", true);
        }, 300);
        setTimeout(() => {
          emailButton.setAttribute("visible", true);
        }, 600);
        setTimeout(() => {
          locationButton.setAttribute("visible", true);
        }, 900);

        let currentTab = '';
        webButton.addEventListener('click', function (evt) {
          text.setAttribute("value", "https://softmind.tech/");
          currentTab = 'web';
        });
        emailButton.addEventListener('click', function (evt) {
          text.setAttribute("value", "hello@softmind.tech");
          currentTab = 'email';
        });
        microButton.addEventListener('click', function (evt) {
          text.setAttribute("value", "Asistente de café huerto el Mamey");
          currentTab = 'micro';
        });
        locationButton.addEventListener('click', function (evt) {
          console.log("location");
          text.setAttribute("value", "Te mostramos la localización de nuestros plantios de café.");
          currentTab = 'location';
        });

        text.addEventListener('click', function (evt) {
          if (currentTab === 'location') {
            window.location.href = "https://goo.gl/maps/xoDSsgtVdavSrBD28";
          }
        });
      }

      const showPortfolio = (done) => {
        const portfolio = document.querySelector("#portfolio-panel");
        const portfolioLeftButton = document.querySelector("#portfolio-left-button");
        const portfolioRightButton = document.querySelector("#portfolio-right-button");
        const paintandquestPreviewButton = document.querySelector("#paintandquest-preview-button");

        let y = 0;
        let currentItem = 0;

        portfolio.setAttribute("visible", true);

        const showPortfolioItem = (item) => {
          for (let i = 0; i <= 2; i++) {
            document.querySelector("#portfolio-item" + i).setAttribute("visible", i === item);
          }
        }
        const id = setInterval(() => {
          y += 0.008;
          if (y >= 0.6) {
            clearInterval(id);
            portfolioLeftButton.setAttribute("visible", true);
            portfolioRightButton.setAttribute("visible", true);
            portfolioLeftButton.addEventListener('click', () => {
              currentItem = (currentItem + 1) % 3;
              showPortfolioItem(currentItem);
            });
            portfolioRightButton.addEventListener('click', () => {
              currentItem = (currentItem - 1 + 3) % 3;
              showPortfolioItem(currentItem);
            });

            paintandquestPreviewButton.addEventListener('click', () => {
              paintandquestPreviewButton.setAttribute("visible", false);
              const testVideo = document.createElement( "video" );
              const canplayWebm = testVideo.canPlayType( 'video/webm; codecs="vp8, vorbis"' );
              if (canplayWebm == "") {
                document.querySelector("#paintandquest-video-link").setAttribute("src", "#paintandquest-video-mp4");
                document.querySelector("#paintandquest-video-mp4").play();
              } else {
                document.querySelector("#paintandquest-video-link").setAttribute("src", "#paintandquest-video-webm");
                document.querySelector("#paintandquest-video-webm").play();
              }
            });

            setTimeout(() => {
              done();
            }, 500);
          }
          portfolio.setAttribute("position", "0 " + y + " -0.01");
        }, 10);
      }

      const showAvatar = (onDone) => {
        const avatar = document.querySelector("#avatar");
        let z = -0.3;
        const id = setInterval(() => {
          z += 0.008;
          if (z >= 0.3) {
            clearInterval(id);
            onDone();
          }
          avatar.setAttribute("position", "0 -0.25 " + z);
        }, 10);
      }

      AFRAME.registerComponent('mytarget', {
        init: function () {
          this.el.addEventListener('targetFound', event => {
            console.log("target found");
            showAvatar(() => {
              setTimeout(() => {
                showPortfolio(() => {
                  setTimeout(() => {
                    showInfo();
                  }, 300);
                });
              }, 300);
            });
          });
          this.el.addEventListener('targetLost', event => {
            console.log("target found");
          });
          //this.el.emit('targetFound');
        }
      });
    </script>

    <style>
      body {
        margin: 0;
      }
      .example-container {
        overflow: hidden;
        position: absolute;
        width: 100%;
        height: 100%;
      }
     
      #example-scanning-overlay {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: transparent;
        z-index: 2;
      }
      @media (min-aspect-ratio: 1/1) {
        #example-scanning-overlay .inner {
          width: 50vh;
          height: 50vh;
        }
      }
      @media (max-aspect-ratio: 1/1) {
        #example-scanning-overlay .inner {
          width: 80vw;
          height: 80vw;
        }
      }

      #example-scanning-overlay .inner {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;

        background:
          linear-gradient(to right, white 10px, transparent 10px) 0 0,
          linear-gradient(to right, white 10px, transparent 10px) 0 100%,
          linear-gradient(to left, white 10px, transparent 10px) 100% 0,
          linear-gradient(to left, white 10px, transparent 10px) 100% 100%,
          linear-gradient(to bottom, white 10px, transparent 10px) 0 0,
          linear-gradient(to bottom, white 10px, transparent 10px) 100% 0,
          linear-gradient(to top, white 10px, transparent 10px) 0 100%,
          linear-gradient(to top, white 10px, transparent 10px) 100% 100%;
        background-repeat: no-repeat;
        background-size: 40px 40px;
      }

      #example-scanning-overlay.hidden {
	        display: none;
      }

      #example-scanning-overlay img {
        opacity: 0.6;
        width: 90%;
        align-self: center;
      }

      #example-scanning-overlay .inner .scanline {
        position: absolute;
        width: 100%;
        height: 10px;
        background: white;
        animation: move 2s linear infinite;
      }
      @keyframes move {
        0%, 100% { top: 0% }
        50% { top: calc(100% - 10px) }
      }
    </style>
  </head>
  <body>
    <div class="example-container">
      <div id="example-scanning-overlay" class="hidden">
	<div class="inner">
	  <img src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/grano.jpg"/>
	  <div class="scanline"></div>
	</div>
      </div>
      <!-- https://mindarealidad.herokuapp.com -->
      <a-scene mindar-image="imageTargetSrc: http://localhost/tiendahuerto/public/targets.mind; showStats: false; uiScanning: #example-scanning-overlay;" embedded color-space="sRGB" renderer="colorManagement: true, physicallyCorrectLights" vr-mode-ui="enabled: false" device-orientation-permission-ui="enabled: false">
        <a-assets>
          <img id="card" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/portfolio/cafe15.jpg" />
          <!-- <img id="icon-web" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/web.png" /> -->
          <img id="icon-location" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/localizacion.png" />
          <img id="icon-micro" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/microfono.png" />
          <img id="icon-phone" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/phone.png" />
          <!-- <img id="icon-email" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/email.png" /> -->
          <img id="icon-play" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/play.png" />
          <img id="icon-left" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/left.png" />
          <img id="icon-right" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/icons/right.png" />
          <img id="paintandquest-preview" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/portfolio/paintandquest-preview.jpeg" />
          <video id="paintandquest-video-mp4" autoplay="false" loop="true" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/portfolio/paintandquest.mp4"></video>
          <video id="paintandquest-video-webm" autoplay="false" loop="true" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/portfolio/paintandquest.webm"></video>
          <img id="coffeemachine-preview" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/portfolio/coffeemachine-preview.jpeg" />
          <img id="peak-preview" src="public/hiukim.github.io/mind-ar-js-doc/samples/assets/card-example/portfolio/peak-preview.jpeg" />
          <!-- https://mindarealidad.herokuapp.com -->
          <a-asset-item id="avatarModel" src="http://localhost/tiendahuerto/public/BolsaAnimacion.glb"></a-asset-item>
        </a-assets>

        <a-camera position="0 0 0" look-controls="enabled: false" cursor="fuse: false; rayOrigin: mouse;" raycaster="far: 10000; objects: .clickable">
        </a-camera>

        <a-entity id="mytarget" mytarget mindar-image-target="targetIndex: 0">
          <a-plane src="#card" position="0 0 0" height="0.552" width="1" rotation="0 0 0"></a-plane>

          <a-entity visible=false id="portfolio-panel" position="0 0 -0.01">
            <a-text value="Portfolio" color="black" align="center" width="2" position="0 0.4 0"></a-text>
            <a-entity id="portfolio-item0">
              <a-video id="paintandquest-video-link" webkit-playsinline playsinline width="1" height="0.552" position="0 0 0"></a-video>
              <a-image id="paintandquest-preview-button" class="clickable" src="#paintandquest-preview" alpha-test="0.5" position="0 0 0" height="0.552" width="1">
              </a-image>
            </a-entity>
            <a-entity id="portfolio-item1" visible=false>
              <a-image class="clickable" src="#coffeemachine-preview" alpha-test="0.5" position="0 0 0" height="0.552" width="1">
              </a-image>
            </a-entity>
            <a-entity id="portfolio-item2" visible=false>
              <a-image class="clickable" src="#peak-preview" alpha-test="0.5" position="0 0 0" height="0.552" width="1">
              </a-image>
            </a-entity>

            <a-image visible=false id="portfolio-left-button" class="clickable" src="#icon-left" position="-0.14 -0.5 0" height="0.15" width="0.15"></a-image>
            <a-image visible=false id="portfolio-right-button" class="clickable" src="#icon-right" position="0.7 0 0" height="0.15" width="0.15"></a-image>
          </a-entity>

          <a-image visible=false id="micro-button" class="clickable" src="#icon-micro" position="-0.14 -0.5 0" height="0.15" width="0.15"
            animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate"
          ></a-image>

         <!--  <a-image visible=false id="web-button" class="clickable" src="#icon-web" alpha-test="0.5" position="-0.14 -0.5 0" height="0.15" width="0.15"
            animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate"
          ></a-image>

          <a-image visible=false id="email-button" class="clickable" src="#icon-email"  position="0.14 -0.5 0" height="0.15" width="0.15"
            animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate"
          ></a-image> -->

          <a-image visible=false id="location-button" class="clickable" src="#icon-location"  position="0.14 -0.5 0" height="0.15" width="0.15"
            animation="property: scale; to: 1.2 1.2 1.2; dur: 1000; easing: easeInOutQuad; loop: true; dir: alternate"></a-image>

          <a-gltf-model id="avatar" rotation="0 0 0" position="0 -0.25 0" scale="0.08 0.08 0.08" src="#avatarModel"></a-gltf-model>

          <a-text id="text" class="clickable" value="" color="black" align="center" width="2" position="0 -1 0" geometry="primitive:plane; height: 0.1; width: 2;" material="opacity: 0.5"></a-text>
        </a-entity>
      </a-scene>
    </div>
  </body>

  <script>
  window.contador = 0;
  window.contadorcubogrande = 0;
  var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition
  var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList
  var SpeechRecognitionEvent = SpeechRecognitionEvent || webkitSpeechRecognitionEvent

  var arreglovoz = ['Hola kiwi',
    'kiwi de dónde traen el café',
    'kiwi Dime el objetivo del sistema',
    'kiwi Dime los tipos de café que vendes',
    'Kiwi Qué es huerto el Mamey',
    'kiwi Muéstrame una bolsa de café',
  ];

  var grammar = '#JSGF V1.0; grammar arreglovoz; public <arreglovoz> = ' + arreglovoz.join(' | ') + ' ;'

  var recognition = new SpeechRecognition();
  var speechRecognitionList = new SpeechGrammarList();
  speechRecognitionList.addFromString(grammar, 1);
  recognition.grammars = speechRecognitionList;
  recognition.continuous = false;
  recognition.lang = 'es-MX';
  recognition.interimResults = false;
  recognition.maxAlternatives = 1;

  var diagnostic = document.querySelector('#text'); 
  var vozHTML = '';
  arreglovoz.forEach(function (v, i, a) {
    console.log(v, i);

  });

  window.onload = function() {
  function micro(){
 recognition.start();
 console.log('Te escucho.');
}
document.getElementById('micro-button').onclick = micro;
}

  recognition.onresult = function (event) {
    var voz = event.results[0][0].transcript;         
    diagnostic.setAttribute("value", "Dijiste: " + voz + ".");
    bg = voz;
    var bg = document.querySelector('text');


    //VISUALIZO EN CONSOLA
    console.log(bg);
    console.log(voz);

    function randD(array) {
      var rand = Math.random() * array.length | 0;
      var result = array[rand];
      return result;
    }

    // Interacciones iniciales
    if (voz === 'Hola kiwi') {
      console.log("Hola, estás saludando a kiwi!");
      let utterance = new SpeechSynthesisUtterance('Hola, yo soy el asistente de la pagina, me llamo kiwi, puedes preguntarme cosas acerca de cafe hueto el mamey.')
      utterance.lang = 'es-MX'
      speechSynthesis.speak(utterance)
    }


    if (voz === 'kiwi de dónde traen el café') {
      console.log("Dando ubicación");
      let utterance = new SpeechSynthesisUtterance('El cafe es plantado, casechado y tratado en la comunidad de yucuiti, ubicada en la sierra de la mixteca, el cafe es cosechado por agricultores de la región y procesado por los propietarios de la huerta de forma artesanal.')
      utterance.lang = 'es-MX'
      speechSynthesis.speak(utterance)
    }


    if (voz === 'kiwi Dime los tipos de café que vendes') {
      console.log("Nuestros tipos de café");
      let utterance = new SpeechSynthesisUtterance('Contamos con diferentes tipos, como el cafe oro, cafe pergamino, cafe tostado y muchas variedades mas, todos con un gran aroma y un magnifico sabor que los caracteriza.')
      utterance.lang = 'es-MX'
      speechSynthesis.speak(utterance)
    }

    if (voz === 'kiwi Qué es huerto el Mamey') {
      console.log("Quienes somos");
      let utterance = new SpeechSynthesisUtterance('Huerto el mamey es una empresa familiar ubicada en santa maria yucuiti, la cual emplea de forma directa e indirecta a familias de la región, si jiro es plantar , cocechar y procesar el grano del cafe para darle a los clientes finales un gran experiencia.')
      utterance.lang = 'es-MX'
      speechSynthesis.speak(utterance)
    }

    //interaccion con RA         
    if (voz === 'kiwi muéstrame una bolsa de café' || voz === 'Muéstra una bolsa de café') {
      console.log("Estas queriendo visualizar el modelo ironcat");

      if (contador == 0) {
        var el = document.querySelector('#avatar');
        el.setAttribute("src", "https://cdn.glitch.global/1af350be-03ad-434a-a87e-bd3882b4eba1/Bolsa.glb?v=1654274510662");
        let utterance = new SpeechSynthesisUtterance('Aquí te muestro una de las presentaciones con las que contamos, es una realidad aumentada.')
        utterance.lang = 'es-MX'
        speechSynthesis.speak(utterance)
      }

      if (contador == 1) {
        var el = document.querySelector('#avatar');
        el.setAttribute("src", "https://cdn.glitch.global/1af350be-03ad-434a-a87e-bd3882b4eba1/Bolsa.glb?v=1654274510662");
        let utterance = new SpeechSynthesisUtterance('Nuevamente te presentamos una de nuestras presentaciones de bolsas de café.')
        utterance.lang = 'es-MX'
        speechSynthesis.speak(utterance)
        contador = 0;
      }
      contador++;
      console.log(contador);
    }

    console.log('Confidence: ' + event.results[0][0].confidence);
  }


  recognition.onspeechend = function () {
    recognition.stop();
  }

  recognition.onnomatch = function (event) {
    diagnostic.setAttribute("value", "No puedo escucharte claramente, por favor repiteme.");
  }

  recognition.onerror = function (event) {
    diagnostic.setAttribute("value", 'Ocurrio un error al escucharte: ' + event.error);
  }
</script>

<!-- Mirrored from hiukim.github.io/mind-ar-js-doc/samples/advanced.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 01 Apr 2022 00:39:07 GMT -->
</html>
