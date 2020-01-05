(function($){
    $(document).ready(function(){

        // width
        let width = window.innerWidth;

        let num = width > 991 ? 4 : 1;
        // for recommended
        let numm = width > 991 ? 2 : 1;

        // recommended posts
        $('.recommend-post').slick({
            infinite: true,
            slidesToShow: num,
            slidesToScroll: num,
            dots: false,
            // fade: true,
            autoplay : true,
            arrows : true,
        });

        // single page random posts
        $(".recommend-post-single").slick({
            infinite: true,
            slidesToShow: numm,
            slidesToScroll: numm,
            dots: false,
            // fade: true,
            autoplay : true,
            arrows : true,
        });

        /**
         * homepage slider 
         */
        $(".homepage_slider").slick({
            infinite : true,
            dots : true , 
            autoplay : true , 
            autoplaySpeed : 2000 , 
            arrows : false,
        });

        /**
         * single post section
         */
        function copyTextFunc() {
            /* Get the text field */
            let copyText = document.getElementById('copyText');
            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/
            
            /* Copy the text inside the text field */
            document.execCommand("copy");
            
            /* Alert the copied text */
            // alert("Copied the text: " + copyText.value);
        }

        $("#copyTextButton").click(function(){
            copyTextFunc();
            $(this).text('Copied');
        });

        /**
         * pretty input options
         * @param {target element} element 
         * @param {it true then the label must be hidden} force 
         */
        function prettyInputs(element , force){
            if($(element).legnth > 0){
                if($(element).val().length > 0 || force){
                    $(element).prev().addClass('hide_label');
                }else{
                    $(element).prev().removeClass('hide_label');
                }
            }
        }
        prettyInputs($("#author") , false);
        prettyInputs($("#email") , false);

        $("#author , #email").focus(function(){
            prettyInputs(this , true);
        });
        $("#author , #email").focusout(function(){
            prettyInputs(this , false);
        });
        $("#author , #email").keydown(function(){
            prettyInputs(this , true);
        });

        /**
         * chat options
         */
        $(".chat_picker").click(function(){
            $(".chat_box").toggleClass("show_chat_box");
            $(this).toggleClass("shown_chat_box");
        });

    });
})(jQuery);