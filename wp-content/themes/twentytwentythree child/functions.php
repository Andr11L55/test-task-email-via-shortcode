<?php

function child_theme_enqueue() {

    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');


    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');

    wp_enqueue_style('fontawesome-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');


    wp_enqueue_style('inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');


    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));


    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);


    wp_enqueue_script('wizard-js', get_stylesheet_directory_uri() . '/js/wizard.js', array('jquery'), null, true);
}


add_action('wp_enqueue_scripts', 'child_theme_enqueue');

function render_mini_wizard($atts, $content = null) {
    $atts = shortcode_atts(array(
        'title' => 'Default Title',
    ), $atts, 'r_test');


    ob_start();
    ?>


    <div class="container">
            <div class="step-wrapper p-5 pb-5">
                <div class="step-container ">
                    <ul class="nav nav-pills d-inline-flex align-items-center px-3 breadcrumbs">
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link" href="#" id="home"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10.7069 2.293C10.5194 2.10553 10.2651 2.00021 9.99992 2.00021C9.73475 2.00021 9.48045 2.10553 9.29292 2.293L2.29292 9.293C2.11076 9.4816 2.00997 9.7342 2.01224 9.9964C2.01452 10.2586 2.11969 10.5094 2.3051 10.6948C2.49051 10.8802 2.74132 10.9854 3.00352 10.9877C3.26571 10.99 3.51832 10.8892 3.70692 10.707L3.99992 10.414V17C3.99992 17.2652 4.10528 17.5196 4.29281 17.7071C4.48035 17.8946 4.7347 18 4.99992 18H6.99992C7.26514 18 7.51949 17.8946 7.70703 17.7071C7.89456 17.5196 7.99992 17.2652 7.99992 17V15C7.99992 14.7348 8.10528 14.4804 8.29281 14.2929C8.48035 14.1054 8.7347 14 8.99992 14H10.9999C11.2651 14 11.5195 14.1054 11.707 14.2929C11.8946 14.4804 11.9999 14.7348 11.9999 15V17C11.9999 17.2652 12.1053 17.5196 12.2928 17.7071C12.4803 17.8946 12.7347 18 12.9999 18H14.9999C15.2651 18 15.5195 17.8946 15.707 17.7071C15.8946 17.5196 15.9999 17.2652 15.9999 17V10.414L16.2929 10.707C16.4815 10.8892 16.7341 10.99 16.9963 10.9877C17.2585 10.9854 17.5093 10.8802 17.6947 10.6948C17.8801 10.5094 17.9853 10.2586 17.9876 9.9964C17.9899 9.7342 17.8891 9.4816 17.7069 9.293L10.7069 2.293Z" fill="#9CA3AF"/>
                                </svg></a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link active px-2" href="#" id="step1-link">Contact Info</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link px-2" href="#" id="step2-link">Quantity</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link px-2" href="#" id="step3-link">Price</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="nav-link px-2" href="#" id="step4-link">Done</a>
                        </li>
                    </ul>
                </div>
                    <div class="wizard-step" id="step-1">
                        <h3>Contact Info</h3>
                        <div class="step-content">
                            <form class="form d-flex flex-column gap-3">
                                <div class="form-group d-flex">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" placeholder=""
                                           class="form-control input-form d-flex justify-content-center align-items-center flex-shrink-0">
                                </div>
                                <div class="form-group d-flex">
                                    <label for="email">Email <sup>required</sup> </label>
                                    <input type="email" id="email" placeholder="" class="form-control input-form d-flex justify-content-center align-items-center flex-shrink-0" required>
                                </div>
                                <div class="form-group d-flex">
                                    <label for="phone">Phone</label>
                                    <input type="tel" id="phone" placeholder="" class="form-control input-form d-flex justify-content-center align-items-center flex-shrink-0">
                                </div>
                            </form>
                            <p id="contact-error" class="text-danger d-none">
                                Please fill in all required fields correctly.
                            </p>
                        </div>
                        <div class="btn-container">
                            <button class="btn btn-primary" onclick="validateContactInfo()">Continue</button>
                        </div>
                    </div>

                    <div class="wizard-step d-none" id="step-2">
                        <h3>Quantity</h3>
                        <div class="step-content">
                            <form class="form d-flex flex-column gap-3">
                                <div class="form-group d-flex">
                                    <label for="quantity">Quantity <sup>required</sup> </label>
                                    <input type="number" id="quantity" placeholder="" class="form-control input-form d-flex justify-content-center align-items-center flex-shrink-0" max="1000" required >
                                </div>
                            </form>
                            <p id="quantity-error" class="text-danger d-none">Please enter a valid quantity between 1 and 1000.</p>
                        </div>
                        <div class="btn-container">
                            <button class="btn btn-primary d-inline-flex justify-content-center align-items-center g-2" onclick="goToStep(3)">Continue</button>
                            <button class="btn btn-light" onclick="goToStep(1)"><i class="fa-solid fa-arrow-left"></i> Back</button>
                        </div>
                    </div>

                    <div class="wizard-step d-none" id="step-3">
                        <h3 class="price-header">Price</h3>
                        <div class="step-content">
                            <p  id="price" class="line-height">$10</p>
                        </div>
                        <div class="btn-container">
                            <button class="btn btn-primary d-inline-flex justify-content-center align-items-center g-2btn btn-primary d-inline-flex justify-content-center align-items-center g-2" onclick="sendForm()">Send to Email</button>
                            <button class="btn btn-light" onclick="goToStep(2)"><i class="fa-solid fa-arrow-left"></i> Back</button>
                        </div>
                    </div>

                    <div class="wizard-step d-none" id="step-4">
                        <h3>Done</h3>
                        <div class="step-content">
                            <p class=" d-none" id="success-message">✅ Your email was send successfully</p>
                            <p class=" d-none" id="error-message"><i class="fa-solid fa-triangle-exclamation"></i> We cannot send you email right now. Use alternative way to contact us </p>

                        </div>
                        <div class="btn-container">
                            <button class="btn btn-primary d-inline-flex justify-content-center align-items-center g-2 btn-again" onclick="restartWizard()">Start Again  <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </div>
            </div>
        <div class="title-description">
            <h2><?php echo esc_html($atts['title']); ?></h2>
            <p><?php echo esc_html($content); ?></p>
        </div>
    </div>

    <?php
    return ob_get_clean();
}


add_shortcode('r_test', 'render_mini_wizard');

// Обробка AJAX запиту
add_action('wp_ajax_send_email', 'send_email');
add_action('wp_ajax_nopriv_send_email', 'send_email');

function send_email() {
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $quantity = intval($_POST['quantity']);
    $price = sanitize_text_field($_POST['price']);


    $subject = "Wizard Form Submission";
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nQuantity: $quantity\nPrice: $price";
    $to = "vbcghf5est@gmail.com";


    $headers = array('Content-Type: text/plain; charset=UTF-8');
    $headers[] = 'From: Your Name <' . $email . '>';
    $headers[] = 'Bcc: ' . $to;

    if (wp_mail($to, $subject, $message, $headers)) {
        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
    wp_die();
}

?>
