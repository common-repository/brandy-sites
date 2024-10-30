"use strict";

(function ($) {
  $("document").ready(function () {
    if (window.Swiper == null) {
      return;
    }

    const backIcon =
      window.brandyData?.swiper?.backIcon ??
      '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L1 11" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const nextIcon =
      window.brandyData?.swiper?.nextIcon ??
      '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L1 11" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';

    $(document).ready(function () {
      $(
        ".brandy-product-collection-custom-slider:not(.block-editor-block-list__block)"
      ).addClass("swiper");
      $(
        ".brandy-product-collection-custom-slider:not(.block-editor-block-list__block) ul"
      ).addClass("swiper-wrapper");
      $(
        ".brandy-product-collection-custom-slider:not(.block-editor-block-list__block) ul > .product"
      ).addClass("swiper-slide");
      $(
        ".brandy-product-collection-custom-slider:not(.block-editor-block-list__block)"
      ).append(`
		<div class="brandy-product-collection-slider-navigation brandy-swiper-navigation">
				<span class="brandy-swiper-navigation-button brandy-swiper-navigation-button--back">${backIcon}</span>
				<span class="brandy-swiper-navigation-button brandy-swiper-navigation-button--next">${nextIcon}</span>
			</div>
      `);

      $(
        ".brandy-product-collection-custom-slider:not(.block-editor-block-list__block)"
      ).append(`
		<div class="brandy-product-collection-slider-scrollbar swiper-scrollbar brandy-swiper-scrollbar"></div>
      `);
      setTimeout(() => {
        new Swiper(
          ".brandy-product-collection-custom-slider:not(.block-editor-block-list__block)",
          {
            navigation: {
              nextEl: ".brandy-swiper-navigation-button--next",
              prevEl: ".brandy-swiper-navigation-button--back",
            },
            direction: "horizontal",
            slidesPerView: 1,
            effect: "cards",
            grabCursor: true,
            cardsEffect: {
              perSlideOffset: 2,
              perSlideRotate: 1,
              slideShadows: false,
              rotate: false,
            },
          }
        );
      }, 1);
    });
  });
})(window.jQuery);
