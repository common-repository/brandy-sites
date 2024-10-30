"use strict";

(function ($) {
  $("document").ready(function () {
    if (window.Swiper == null) {
      return;
    }

    const defaultConfig = {
      direction: "horizontal",
      slidesPerView: 4,
      spaceBetween: 30,
    };

    const backIcon =
      window.brandyData?.swiper?.backIcon ??
      '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L1 11" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
    const nextIcon =
      window.brandyData?.swiper?.nextIcon ??
      '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L1 11" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';

    $(document).ready(function () {
      $(
        ".brandy-cosmetic-flash-sale-slider:not(.block-editor-block-list__block) .wp-block-woocommerce-product-collection"
      ).addClass("swiper");
      $(
        ".brandy-cosmetic-flash-sale-slider:not(.block-editor-block-list__block) .brandy-site-product-template"
      ).addClass("swiper-wrapper");
      $(
        ".brandy-cosmetic-flash-sale-slider:not(.block-editor-block-list__block) .brandy-site-product-template > .product"
      ).addClass("swiper-slide");
      $(
        ".brandy-cosmetic-flash-sale-slider:not(.block-editor-block-list__block)"
      ).append(`
		<div class="brandy-cosmetic-flash-sale-slider-navigation brandy-swiper-navigation">
			<span class="brandy-swiper-navigation-button brandy-swiper-navigation-button--back">${backIcon}</span>
			<span class="brandy-swiper-navigation-button brandy-swiper-navigation-button--next">${nextIcon}</span>
		</div>
      `);

      $(
        ".brandy-cosmetic-flash-sale-slider:not(.block-editor-block-list__block)"
      ).append(`
		<div class="brandy-cosmetic-flash-sale-slider-scrollbar swiper-scrollbar brandy-swiper-scrollbar"></div>
      `);
      setTimeout(() => {
        new Swiper(
          ".brandy-cosmetic-flash-sale-slider:not(.block-editor-block-list__block) .swiper",
          {
            navigation: {
              nextEl: ".brandy-swiper-navigation-button--next",
              prevEl: ".brandy-swiper-navigation-button--back",
            },
            direction: "horizontal",
            slidesPerView: 1,
            grabCursor: true,
          }
        );
      }, 1);
    });
  });
})(window.jQuery);
