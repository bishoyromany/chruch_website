<?php 
    /* 
    ** This function get the page header 
    */
    get_header(); 

?>

<!-- all posts container -->
<div class="container">
    <div class="row">
        <div class="col-md-9 content_center">
            <br><br>
            <?php 
                $isStore = 
                    count($_POST) < 4 || 
                    isset($_POST['send_contact_message']) || 
                    isset($_POST['get_free_book']) ? false : true;

                $isError = [];
                $hash = isset($_GET['hash']) ? $_GET['hash'] : false;
                $getTheBook = isset($_POST['get_free_book']) ? true : false;
                $sendContactMessage = isset($_POST['send_contact_message']) ? true : false;

                if($isStore){
                    $day = isset($_POST['DD']) ? 
                        FILTER_VAR($_POST['DD'] , FILTER_SANITIZE_NUMBER_INT) : null;
                    $month = isset($_POST['MM']) ?
                        FILTER_VAR($_POST['MM'] , FILTER_SANITIZE_NUMBER_INT) : null;
                    $year = isset($_POST['YYYY']) ? 
                        FILTER_VAR($_POST['YYYY'] , FILTER_SANITIZE_NUMBER_INT) : null;
                    $email = isset($_POST['email']) ? 
                        FILTER_VAR($_POST['email'] , FILTER_VALIDATE_EMAIL) : null;
                    
                    if(!$email){
                        $isError[] = 'Please Write a Valid Email Address';
                    }

                    if(strlen($email) < 1){
                        $isError[] = 'Email Field Required';
                    }

                    if(strlen($day) < 1){
                        $isError[] = 'Day Field Required';
                    }elseif($day < 0 || $day > 31){
                        $isError[] = 'Please Write A Valid Day';
                    }

                    if(strlen($month) < 1){
                        $isError[] = 'Month Field Required';
                    }elseif($month < 0 || $month > 12){
                        $isError[] = 'Please Write A Valid Month';
                    }

                    if(strlen($year) < 1){
                        $isError[] = 'Year Field Required';
                    }elseif($year < 1900 || $year > date('Y')){
                        $isError[] = 'Please Write A Valid Year';
                    }


                }

                if(((!$isStore || count($isError) > 0) && !$hash) && !$getTheBook && !$sendContactMessage){
                    /**
                     * pergenant section *week by week*
                     */
                    require_once (get_template_directory() . "/parts/home/week_by_week.php");
                }elseif($isStore){

                    // auth hash
                    $hash = md5(time() . $email  . $day . $month . $year . rand(100000,10000000));
                    global $wpdb;
                    $data = $wpdb->insert('wp_news_letter' , [
                        'email' => $email , 
                        'date'  => "$day-$month-$year",
                        'verified' => 0 , 
                        'type'   => 1 , 
                        'created_at' => date('d-m-Y h-i-s') , 
                        'hash'   => $hash,
                    ]);

                    $url = get_site_url().'/subscribe-news-letters-pergenancy?hash='.$hash;

                    $message = "
                        <h1>Hello , You've Subscribed Our News Letter</h1>
                        <p>Please Click <a href='$url'>Here</a> To Verify Your Email Address</p>
                        <p>If The Link Above Didn't Work , Please Click Here 
                            <a href='$url'>$url</a>
                        </p>
                    ";
                    $subject = 'Hello , May Your Please Verify Your Email To Verify Your Subscribtion.';
                    
                    $headers = array();
                    $headers[] = 'Content-Type: text/html; charset=UTF-8';
                    $headers[] = 'From: Mom&Children <kora4uemails@gmail.com>';

                    wp_mail($email , $subject , $message , $headers);
                    
                    $successMessage = "We've Send a Verification Link To Your Email Please Click It To Verify Your Email";
                        
                    require_once (get_template_directory() . "/parts/home/week_by_week.php");

                }elseif($hash){
                    global $wpdb;
                    $result = $wpdb->update('wp_news_letter', array('verified' => 1), array('hash' => $hash));
                    
                    if($result > 0){
                        echo "
                            <div class='alert alert-success'>
                                <h1>
                                    Email Verified Successfully , You'll be redirect After 3 Seconds
                                </h1>
                            </div>

                            <script> 
                                setTimeout(function(){ window.location.href = '/'; } , 3000); 
                            </script>
                        ";
                    }else{
                        echo "
                            <div class='alert alert-warning'>
                                <h1>
                                    Email Doesn't Exist Or Already Verified , You'll be redirect After 3 Seconds
                                </h1>
                            </div>

                            <script> 
                                setTimeout(function(){ window.location.href = '/'; } , 3000); 
                            </script>
                        ";
                    }
                }elseif($getTheBook){
                    $email = isset($_POST['email']) ? FILTER_VAR($_POST['email'] , FILTER_VALIDATE_EMAIL) : false;
                    $bookUrl = "https://github.com/";
                    if($email){
                        // auth hash
                        global $wpdb;
                        $data = $wpdb->insert('wp_news_letter' , [
                            'email' => $email , 
                            'date'  => date('d-m-Y h-i-s'),
                            'verified' => 0 , 
                            'type'   => 2 , // for book 
                            'created_at' => date('d-m-Y h-i-s') , 
                            'hash'   => 'Subscribe for the book',
                        ]);

                        $url = get_site_url().'/subscribe-news-letters-pergenancy?hash='.$hash;

                        $message = "
                            <h1>Get A Free Moms Book</h1>
                            <p>Thanks For Visiting Our Website</p>
                            <p>This is Your Book Download and View Link
                                <a href='$bookUrl'>$bookUrl</a>
                            </p>
                        ";
                        $subject = 'Hello , This is The Book Link That You Requested';
                        
                        $headers = array();
                        $headers[] = 'Content-Type: text/html; charset=UTF-8';
                        $headers[] = 'From: Mom&Children <kora4uemails@gmail.com>';

                        wp_mail($email , $subject , $message , $headers);
                        echo "
                            <div class='alert alert-success'>
                                <h1>
                                    We've Send You A Message With Book Link , You'll be redirect After 3 Seconds
                                </h1>
                            </div>

                            <script> 
                                setTimeout(function(){ window.location.href = '/'; } , 3000); 
                            </script>
                        ";
                            
                    }else{
                        echo "
                            <div class='alert alert-success'>
                                <h1>
                                    Please Write a Correct Email Address , You'll be redirect After 3 Seconds
                                </h1>
                            </div>

                            <script> 
                                setTimeout(function(){ window.location.href = '/'; } , 3000); 
                            </script>
                        ";

                    }
                }elseif($sendContactMessage){
                    $email = isset($_POST['email_user']) ? FILTER_VAR($_POST['email_user'] , FILTER_VALIDATE_EMAIL) : false;
                    $name = isset($_POST['name_user']) ? FILTER_VAR($_POST['name_user'] , FILTER_SANITIZE_STRING) : false;
                    $message = isset($_POST['message_user']) ? FILTER_VAR($_POST['message_user'] , FILTER_SANITIZE_STRING) : false;
                    
                    if(!$email){
                        $errorContact = 'Please Write A Valid Email';
                    }elseif(!$name){
                        $errorContact = 'Please Write Your Name';
                    }elseif(!$message){
                        $errorContact = 'Please Write Your Message';
                    }


                    if(!isset($errorContact)){
                        // auth hash
                        global $wpdb;
                        $data = $wpdb->insert('wp_contacts' , [
                            'email' => $email , 
                            'name'  => $name,
                            'message' => $message , 
                            'created_at' => date('d-m-Y h-i-s') , 
                        ]);

                        $message = "
                            <h1>Hello $name We Have Received This Message From You</h1>
                            <p>$message</p>
                            <p>And We Will Answer You As Soon As Possible</p>
                        ";
                        $subject = 'Thanks For Contacting Us';
                        
                        $headers = array();
                        $headers[] = 'Content-Type: text/html; charset=UTF-8';
                        $headers[] = 'From: Mom&Children <kora4uemails@gmail.com>';

                        wp_mail($email , $subject , $message , $headers);

                        echo "
                            <div class='alert alert-success'>
                                <h1>
                                Thanks For Contacting Us , You'll be redirect After 3 Seconds
                                </h1>
                            </div>
                            <script>
                                setTimeout(function(){
                                    history.go(-1);
                                } , 3000);
                            </script>
                        ";
                    }else{
                        echo "
                            <div class='alert alert-danger'>
                                <h1>
                                   $errorContact
                                </h1>
                            </div>
                        ";
                    }

                }

            ?>
        </div>
        
        <!-- left sidebar -->
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- end all posts container -->


<?php
    /*
    ** this function get the footer
    */
    get_footer(); 
?>