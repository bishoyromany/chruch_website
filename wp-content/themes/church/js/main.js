/**
 * Author : Bishoy Romany
 * Versoin : v1.0.0
 */

(function($){

    var checkReady = setInterval(function(){
        if (document.readyState === 'complete') {
            $(".loader").slideUp(300);
            // remove the loader
            setTimeout(function(){
                $(".loader").remove();
            } , 300)
            clearInterval(checkReady);
        }
    }, 100);

    $(document).ready(function() {

        var screenWidth = $(document).innerWidth();
        /**
         * fix the author page
         */
        if(screenWidth < 991 && $(".author-page").hasClass("container")){
            $(".author-info").css({"position" : "static" , 'margin' : '20px'});
        }
        /**
         * Scroll options
         */
        $(document).scroll(function(){
            var scrolled = $(document).scrollTop();
            
            if($(".nav-bar-container")){

                // header scroll option
                var headHeight = $(".nav-bar-container").innerHeight();
                if(headHeight <= scrolled || screenWidth <= 760){
                    $(".nav-bar-container").css({"position":"fixed" , "top":"0px"});
                    $(".nav-bar-container .navbar").css({"background" : "linear-gradient(135deg, rgb(236, 236, 236) 0%, rgb(135, 206, 228) 50%, rgb(255, 255, 255) 100%)" , "border-bottom" : "1px solid #333"});
                    if(scrolled > 800 && scrolled < 1100){
                        $(".nav-bar-container .navbar").css({"background" : "linear-gradient(135deg, rgb(207, 233, 243) 0%, rgb(110, 207, 236) 50%, rgb(218, 239, 253) 100%)"});
                    }else if(scrolled > 1100){
                        $(".nav-bar-container .navbar").css({"background-color" : "linear-gradient(135deg, rgb(128, 219, 255) 0%, rgb(0, 195, 255) 50%, rgb(135, 207, 255) 100%)"});
                    }
                }else{
                    $(".nav-bar-container").css({"position":"absolute" , "top":"0px"});
                    $(".nav-bar-container .navbar").css({"background" : "transparent" , "border" : "none"});
                }
            }

            // author page
            if($(".author-page").hasClass("container") && screenWidth > 991){
                var scrollH  = $(".author-page").innerHeight() - 700; 
                if(scrolled >= 50){
                    $(".author-info").css("top" , "70px");
                    if(scrolled >= scrollH){
                        $(".author-info").css("height" , "80%");
                    }else{
                        $(".author-info").css("height" , "100%");
                    }
                }else{
                    $(".author-info").css("top" , "230px");
                }
            }else{
                $(".author-info").css("position" , "static");
            }

            // category page
            if($(".cutom-sidebar").hasClass("cutom")){
                // sidebar height
                var sidebarHeight = $(".cutom-sidebar").innerHeight() + 324;
                // show 2 ads when scroll down
                if(sidebarHeight <= scrolled && screenWidth > 991){
                    $(".a-d").css({'position' : 'fixed' , 'top' : '40px' });
                    $(".a-d-s").css({'position' : 'fixed' , 'top' : '430px'});
                    $(".a-d-s").removeClass('hidden');
                }else{
                    $(".a-d").css({'position' : 'static'});
                    if(screenWidth > 991){
                        $(".a-d-s").addClass('hidden');
                    }
                }
            }
        });
        /**
         * phone type toggle down
         */
        $(".navbar-toggle").click(function(){
            $(".navbar").css("background" , "linear-gradient(135deg, rgb(236, 236, 236) 0%, rgb(135, 206, 228) 50%, rgb(255, 255, 255) 100%)");
        });
        /**
         * Slick For Random posts in single and homepage sections
         */

        if(screenWidth > 991){
            // single page
            $('.random-posts-single .random-post').slick({
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 1500,
            });

            // gallery of single post
            $('.wp-block-gallery').slick({
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
            });

            // homepage
            $('#homeRandom .random-post').slick({
                dots: false,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 1500,
            });

        }else{
            // single page
            $('.random-posts-single .random-post').slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
            });

            // gallery of single post
            $('.wp-block-gallery').slick({
                dots: true,
                infinite: true,
                slidesToShow:1,
                slidesToScroll:1,
            });

            // homepage
            $('#homeRandom .random-post').slick({
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
            }); 
        }

        $("#homeRandom .random-post button").remove();
        $(".wp-block-gallery button").remove();

        /**
         * the search otions
         */
        $(".menu-item-283").html("<a style='cursor:pointer;'>Search <i class='fa fa-search fa-fw'></i></a>");
        $(".menu-item-283").click(function(){
            $(".search-form").slideToggle();
        });
        $(".search-end").click(function(){
            console.log("working");
            $(".search-form").slideUp();
        });



        /**
         * faq page options
         */
        $(".faq .faq-quest .question-container .question").click(function(){
            $(this).next(".answer").slideToggle();
            if(!$(this).hasClass('down')){
                $(this).addClass('down');
                $(this).children('.plus-minus').html('<i class="fa fa-minus fa-fw"></i>');
            }else{
                $(this).removeClass('down');
                $(this).children('.plus-minus').html('<i class="fa fa-plus fa-fw"></i>');
            }
        });
    });

})(jQuery);