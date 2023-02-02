     $(document).ready(function () {
         $(".owl-carousel").owlCarousel();
     });
     $('.owl-carousel').owlCarousel({
         loop: true,
         margin: 10,
         autoplay: true,
         autoplayTimeout: 3000,
         autoplayHoverPause: true,

         responsiveClass: true,
         responsive: {
             0: {
                 items: 1,

             },
             600: {
                 items: 1,

             },
             1000: {
                 items: 1,


             }
         }

     })



     //for bkash transition id
window.onload = function() {
        document.getElementById('trx-feild').style.display = 'none';
    }

    function yesnoCheck() {
        if (document.getElementById('p-bkash').checked) {
            document.getElementById('trx-feild').style.display = 'block';
        } 
        else {
            document.getElementById('trx-feild').style.display = 'none';
         
        }   
    }








//Image Viewer js code


jQuery(document).ready(function () {
        jQuery.viewImage({
            'target': '.container img',
            'delay': 200
        });
    });


  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
