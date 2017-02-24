$(document).ready(function() {
      $('.sl').slick({
          slidesToShow: 3,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          centerPadding: "0px",
          pauseOnHover: false,
          arrows: true,
          responsive: [
              {
                  breakpoint: 769,
                  settings: {
                      arrows: false,
                      slidesToShow: 2
                  }
              }
          ]
      });
});

