<?php
/*
Template name:Home page
*/
?>
<?php $page_id = get_the_ID()?>
<?php get_header() ?>
 <main> 

            <section class="page-top">
                <div class="page-top_left">
                    <div class="page-top_title">
                        <h1> <?php echo carbon_get_post_meta($page_id, 'header_1' ); ?></h1>
                    </div>
                    <div class="page-top_text">
                        <p><?php echo carbon_get_post_meta($page_id, 'top_text' ); ?></p>
                    </div>
                    <div class="page-top_button">
                        <a href="<?php echo carbon_get_post_meta($page_id, 'btn_link' ); ?>"><?php echo carbon_get_post_meta($page_id, 'btn_text' ); ?>
                        <img src="<?php echo wp_get_attachment_image_url( carbon_get_post_meta( $page_id, 'btn_img' )); ?>" alt="arrow"></a>
                    </div>
                </div>
                <div class="page-top_right">
                    <div class="page-top_slider">
                        <img src="<?php echo wp_get_attachment_image_url( carbon_get_post_meta( $page_id, 'top_image' ), "full"); ?>" alt="slider">
                    </div>
                </div>
            </section>
            <section class="products">
                <div class="products-title">
                    <h3><?php echo carbon_get_post_meta($page_id, 'products_title' ); ?></h3>
                </div>
                <div class="products-subtitle">
                    <h2><?php echo carbon_get_post_meta($page_id, 'products_subtitle' ); ?></h2>
                </div>
                <div class="products-items">
                    <div class="products-items_bg">
                        <img src="<?php echo wp_get_attachment_image_url( carbon_get_post_meta( $page_id, 'products_bg' ), "full"); ?>" alt="background"></div>
                    <div class="products-items_container">
                        <div class="products-item">
                            <div class="products-item_container">
                                <div class="products-item_logo"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/products/image_11.png" alt="logo"></div>
                                <div class="producs-item_title">
                                    <h5>News monitor</h5>
                                </div>
                                <div class="products-item_description">
                                    <p>Start analyzing easily and totally free. Start analyzing easily and totally free.</p>
                                </div>
                                <div class="products-item_link">
                                    <a href="">Learn and Try<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="logo"></a>
                                </div>
                            </div>
                        </div>
                        <div class="products-item">
                            <div class="products-item_container">
                                <div class="products-item_logo"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/products/image_12.png" alt="logo"></div>
                                <div class="producs-item_title">
                                    <h5>Twitter monitor</h5>
                                </div>
                                <div class="products-item_description">
                                    <p>Monitor social media to learn about your customers and trends related to your products or your organization reputation. </p>
                                </div>
                                <div class="products-item_link">
                                    <a href="">Learn and Try<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="icon"></a>
                                </div>
                            </div>
                        </div>
                        <div class="products-item">
                            <div class="products-item_container">
                                <div class="products-item_logo"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/products/image_16.png" alt="logo"></div>
                                <div class="producs-item_title">
                                    <h5>Vizfind</h5>
                                </div>
                                <div class="products-item_description">
                                    <p>Start analyzing easily and totally free. Start analyzing easily and totally free.</p>
                                </div>
                                <div class="products-item_link">
                                    <a href="">Learn and Try<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="why-vr">
                <div class="container2">
                    <div class="why-vr_title">
                        <h3><?php echo carbon_get_post_meta($page_id, 'why_vr_title' ); ?></h3>
                    </div>

                    <div class="why-vr_columns">
                        <div class="why-vr_column">
                            <span></span>
                            <p><?php echo carbon_get_post_meta($page_id, 'first_column' ); ?></p>
                        </div>

                        <div class="why-vr_column">
                            <span></span>
                            <p><?php echo carbon_get_post_meta($page_id, 'second_column' ); ?></p>                        </div>
                        <div class="why-vr_column">
                            <span></span>
                            <p><?php echo carbon_get_post_meta($page_id, 'third_column' ); ?></p>                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="solutions">
                <div class="solutions-top">
                    <div class="solutions-top_title">
                        <h3><?php echo carbon_get_post_meta($page_id, 'solutions_title' ); ?></h3>
                    </div>
                    <div class="solutions-top_subtitle">
                        <h2><?php echo carbon_get_post_meta($page_id, 'solutions_subtitle' ); ?></h2>
                    </div>
                    <div class="solutions-top_text">
                        <p><?php echo carbon_get_post_meta($page_id, 'solutions_text' ); ?></p>
                    </div>
                </div>
                <div class="solutions-content">
                    <div class="content_block">
                        <div class="content-block_left"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/solutions/Group35.png" alt="graphic"></div>
                        <div class="content-block_right">
                            <div class="content-block_container">
                                <div class="content-block_title">
                                    <h3>Visualize the textual territory</h3>
                                </div>
                                <div class="content-block_text">
                                    <p>We use machine learning algorithms to discover main topics to create navigation tools through 3D landscape across large volume of scattered textual data</p>
                                </div>
                                <div class="content-block_link">
                                    <a href="">Explore Solution<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="graphic"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_block">
                        <div class="content-block_left"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/solutions/Group15.png" alt="graphic"></div>
                        <div class="content-block_right">
                            <div class="content-block_container">
                                <div class="content-block_title">
                                    <h3>Sentiment analysis</h3>
                                </div>
                                <div class="content-block_text">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                                </div>
                                <div class="content-block_link">
                                    <a href="">Explore Solution<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="graphic"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_block">
                        <div class="content-block_left"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/solutions/Group17.png" alt="graphic"></div>
                        <div class="content-block_right">
                            <div class="content-block_container">
                                <div class="content-block_title">
                                    <h3>Relate to learn Textual Data Analysis</h3>
                                </div>
                                <div class="content-block_text">
                                    <p>Create relationship with our sate of the art Python customized programs to find hidden relationships in the text.</p>
                                </div>
                                <div class="content-block_link">
                                    <a href="">Explore Solution<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="arrow"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_block">
                        <div class="content-block_left"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/solutions/Group31.png" alt="graphic"></div>
                        <div class="content-block_right">
                            <div class="content-block_container">
                                <div class="content-block_title">
                                    <h3>Discover Insights from vast textual data</h3>
                                </div>
                                <div class="content-block_text">
                                    <p>We use Entity Recognition to find main themes, topics and entities. </p>
                                </div>
                                <div class="content-block_link">
                                    <a href="">Explore Solution<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content_block">
                        <div class="content-block_left"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/solutions/Frame34.png" alt="graphic"></div>
                        <div class="content-block_right">
                            <div class="content-block_container">
                                <div class="content-block_title">
                                    <h3>Word Cloud</h3>
                                </div>
                                <div class="content-block_text">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
                                </div>
                                <div class="content-block_link">
                                    <a href="#">Explore Solution<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/black-arrow.png" alt="arrow"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="tarif">
                <div class="tarif-top">
                    <div class="tarif-top_content">
                        <div class="tarif-title">
                            <h2><?php echo carbon_get_post_meta($page_id, 'tarif_title' ); ?></h2>
                        </div>
                        <div class="tarif-text">
                            <p><?php echo carbon_get_post_meta($page_id, 'solutions_text' ); ?> </p>
                        </div>
                    </div>
                    <span></span>
                </div>
                <div class="tarif-plans">
                    <div class="tarif-plans_container">
                        <div class="tarif-plan">
                            <div class="tarif-plan_container">
                                <div class="tarif-plan_title">
                                    <h4 id="starter">Starter</h4>
                                </div>
                                <div class="tarif-plan_description">
                                    <p>Start analyzing easily and totally free</p>
                                </div>
                                <div class="tarif-plan_price">
                                    <span>FREE</span>
                                </div>
                                <div class="tarif-plan_term">
                                    <span>Pay after 6 month</span>
                                </div>
                                <div class="tarif-plan_button btn-white">
                                    <a href="#">Get Started</a>
                                </div>
                                <div class="tarif-plan_about">
                                    <p>Starter plan combination:</p>
                                    <ul class="tarif-plan_benefits">
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div> Benefit 1</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 2</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 3</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 4</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 5</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tarif-plan">
                            <div class="tarif-plan_container">
                                <div class="tarif-plan_title">
                                    <h4 id="business">Business</h4>
                                </div>
                                <div class="tarif-plan_description">
                                    <p>Start analyzing easily and totally free</p>
                                </div>
                                <div class="tarif-plan_price">
                                    <span>$499.90</span>
                                </div>
                                <div class="tarif-plan_term">
                                    <span>Pay per year</span>
                                </div>
                                <div class="tarif-plan_button ">
                                    <a href="">Get Started</a>
                                </div>
                                <div class="tarif-plan_about">
                                    <p>All from the Starter plan, plus:</p>
                                    <ul class="tarif-plan_benefits">
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 1</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 2</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 3</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 4</li>
                                        <li>
                                            <div class="check-icon"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/check-mark.png " alt="icon"></div>Benefit 5</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- </div> -->


                        </div>
                    </div>
                    <div class="tarif-plan_gradientbg"></div>

                </div>
            </section>
            <section class="clients">
                <div class="clients-title">
                    <h4>Trusted by most data-driven companies across the globe</h4>
                </div>
                <div class="clients-items">
                    <div class="clients-item"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/clients/image 11.png" alt="pic"></div>
                    <div class="clients-item"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/clients/image 12.png" alt="pic"></div>
                    <div class="clients-item"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/clients/image 14.png" alt="pic"></div>
                    <div class="clients-item"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/clients/image 15.png" alt="pic"></div>
                </div>
            </section>
            <section class="mob-app">
                <div class="mob-app_container">
                    <div class="mob-app_left">
                        <h4>Mobile app</h4>
                        <h2>Get our VizRefra mobile app!</h2>
                        <p>Download app to get the most out of your service and benefits.</p>
                    </div>
                    <div class="mob-app_right">
                        <div class="mob-app_logo"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/mob-app/App_Store.png" alt="mob"></div>
                        <div class="mob-app_logo"><img src="<?php echo ( get_template_directory_uri()); ?>/design/img/mob-app/Google_Play.png" alt="mob"></div>
                    </div>
                </div>
            </section>
            <section class="cta">
                <divx class="cta-text">

                    <h2>It’s time you got more from your texts</h2>

                    <p>It’s time you got more from your texts</p>

                </divx>
                <div class="cta-buttons">
                    <div class="cta-button ">
                        <a href="#">Try Free<img src="<?php echo ( get_template_directory_uri()); ?>/design/img/icons/white-arrow.png" alt="icon"></a>
                    </div>
                    <div class="cta-button">
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </section>
        </main>
        <?php get_footer(); ?> 
        /*
Fields for Home page
*/
Container::make( 'post_meta', __( 'Aditional fields' ) )
->show_on_page(9)
->add_tab('Top screen',[
    Field::make( 'text', 'btn_text', 'Top button text' )
    ->set_width(50),
    Field::make( 'image', 'btn_img', 'Top button image' )
    ->set_width(50),
    Field::make( 'text', 'btn_link', 'Link for button' ),
    Field::make( 'image', 'top_image', 'Top image' ),
])
->add_tab('Products',[
    Field::make( 'text', 'products_title', 'Products Title' ),
    Field::make( 'text', 'products_subtitle', 'Products subtitle' ),
    Field::make( 'image', 'products_bg', 'Background image' ),
])

->add_tab('Why VizRefra',[
    Field::make( 'text', 'why_vr_title', 'Title' ),
    Field::make( 'text', 'first_column', 'First column' ),
    Field::make( 'text', 'second_column', 'Second column' ),
    Field::make( 'text', 'third_column', 'Third column' ),
])
->add_tab('Solutions',[
    Field::make( 'text', 'solutions_title', 'Title' ),
    Field::make( 'text', 'solutions_subtitle', 'Subtitle' ),
    Field::make( 'text', 'solutions_text', 'Text' ),
])
->add_tab('Tarif',[
    Field::make( 'text', 'tarif_title', 'Title' ),
    Field::make( 'text', 'tarif_text', 'Text' ),
])
