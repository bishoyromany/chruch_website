(function($){
    $(document).ready(function(){

        // $(document).click(function(e){
        //     let target = e.target;
        //     /**
        //      * navabr cats close when click out
        //      */
        //     if(!$(target).hasClass('active_dropdown_nav_a')){
        //         $(".active_dropwdown_nav").slideUp();
        //         $(".active_dropwdown_nav").removeClass('active_dropwdown_nav');
        //         $(".active_dropdown_nav_a").removeClass('active_dropdown_nav_a');
        //     }

        //     /**
        //      * search autoclose
        //      */
        //     // console.log(target);
        //     if(!$(target).hasClass('searchValue') && !$(target).hasClass('search_form') && !$(target).hasClass('search_icon') && !$(target).parent().hasClass('search_icon') && $(".search_form").hasClass('active_search_nav_bar')){
        //         $(".search_form").fadeOut();
        //         $(".search_form").removeClass('active_search_nav_bar');
        //     }
        // });
        
        // // $("#navbar .navbar_cats").children('li').children('ul').children('li').addClass('col-md-3');
        // // $("#navbar .navbar_cats").children('li').children('ul').addClass('row');
        // $("#navbar .navbar_cats").children('li').children('a').click(function(e){

        //     e.preventDefault();

        //     if(!$(this).hasClass('active_dropdown_nav_a')){
        //         $(".active_dropwdown_nav").slideUp(0);
        //         $(".active_dropwdown_nav").removeClass('active_dropwdown_nav');
        //         $(".active_dropdown_nav_a").removeClass('active_dropdown_nav_a');
        //     }

        //     $(this).next().slideToggle();
        //     $(this).next().toggleClass('active_dropwdown_nav');
        //     $(this).toggleClass('active_dropdown_nav_a');

        // });

        // $(".toggle_navs").click(function(){
        //     $(".nav_links").fadeToggle(0);
        //     $(".toggle_navs").toggleClass("active_toggled_navs_button");
        // });

        // /**
        //  * navbar scroll animation
        //  */
        // var lastScroll = 0;

        // function headerScroller(){
        //     let scrolled = $(window).scrollTop();
        //     let screenWidth = $(document).innerWidth();

        //     if(screenWidth > 991){
        //         if(scrolled > 0){
        //             // $(".upper").slideUp(500);
        //             if(lastScroll > scrolled){
        //                 $(".nav_links").addClass("show_it");
        //                 $(".nav_links").removeClass("hide_it");
        //             }else{
        //                 $(".nav_links").removeClass("show_it");
        //                 $(".nav_links").addClass("hide_it");
        //             }
        //         }else{
        //             $(".nav_links").removeClass("show_it");
        //             $(".nav_links").removeClass("hide_it");
        //             // $(".upper").slideDown(500);
        //         }
        //     }

        //     lastScroll = scrolled;
        // }headerScroller();

        /**
         * back to top
         */
        var lastScrolledOfBackToTop = 0;
        function backToTop(){
            let scrolled = $(window).scrollTop();
            let screenWidth = $(document).innerWidth();
            if(scrolled >= 300 && lastScrolledOfBackToTop < scrolled){
                $("#backToTop").addClass("show_back_to_top");
            }else{
                $("#backToTop").removeClass("show_back_to_top");
            }
            lastScrolledOfBackToTop = scrolled;
        }
        $("#backToTop").click(function(){
            $('html,body').animate({ scrollTop: 0 }, 'slow');  
        });

        $(document).scroll(function(){
            // headerScroller();
            backToTop();
        });

        /**
         * toggle search icon
         */
        $(".search_icon").click(function(){
            setTimeout(function(){
                $(".search_form").fadeToggle();
                $(".search_form").toggleClass('active_search_nav_bar');
            } , 100);
        });

    });
})(jQuery);