<div class="week_by_week text-center">
    <h4>WEEK BY WEEK</h4>
    <h1>Pergenancy Calendar</h1>
    <span class="green">
         Sign up 
    </span>
    <span class="blue">
        for the web's most entertaining
    </span>
    <span class="green">
         (while informative) 
    </span>
    <span class="blue"> weekly newsletter on your pregnancy! </span>
    <span class="green block"> Enter Expected Due Date </span>

    <div class="row">
        <div class="col-md-3">
            <div class="icon">
                <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/imgs/week_by_week/week_by_week.svg'; ?>" alt="Pergenancy Icon">
            </div>
        </div>

        <div class="col-md-9">
            <!-- form -->
            <form action="/subscribe-news-letters-pergenancy" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="date">
                            <input type="text" id="month" name="MM" placeholder="MM" required>
                            <input type="text" id="day"   name="DD" placeholder="DD" required>
                            <input type="text" id="year"  name="YYYY" placeholder="YYYY" required>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="email">
                            <input type="email" id="email" name="email" placeholder="Your Email" required>
                        </div>

                        <button>
                            <img src="<?php echo get_template_directory_uri().'/imgs/week_by_week/week_by_week_heart.svg' ?>" alt="heart" />
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4"></div>
        <div class="col-md-8">
            <div class="health text-left">
                <span class="blue">Your family's </span> <span class="green">health</span> 
                <span class="blue"> is important to us </span>
            </div>
        </div>

    </div>

    <?php 
        // errors 
        if(isset($isError) && count($isError) > 0){
            foreach($isError as $error){
                ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <?php echo $error; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php 
            }
        }

        // sucess 
        if(isset($successMessage)){
            ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?php echo $successMessage; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php   
        }
    
    ?>

</div>