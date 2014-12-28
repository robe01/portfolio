<?php

    get_header(); 

?>

    <main class="container-fluid">
        <section id="error-content" class="row">
            <div id="error-inner-container" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div id="error-header">404</div>
                <div id="error-sub-header">There has been an error...</div>
                <p>The page you are looking for has either been deleted, moved somewhere else or simply does not exist. Please go back to the <b><a href="<?php echo get_option('home'); ?>"> main menu</a></b>.</p>
            </div>
        </section>
    </main>

<?php

    get_footer();
