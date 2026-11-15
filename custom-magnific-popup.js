jQuery(document).ready(function($) {
    jQuery('.popup-youtube').magnificPopup({
     /* disableOn: 700,*/
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });

    function openVideoPopup(videoUrl) {
      $.magnificPopup.open({
          items: {
              src: videoUrl
          },
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false,
          closeBtnInside: true, // Ensures close button is inside the popup
          iframe: {
              markup: `
                  <div class="mfp-iframe-scaler">
                      <button title="Close" type="button" class="mfp-close sam">&times;</button>
                      <iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>
                  </div>`
          }
      });
  }
});