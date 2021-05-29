<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form By Prince</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="Style.css" />
</head>

<body>
    <div class="contact-form">
        <h2>Contact Us</h2>
        <form action="#" method="POST">
            <input type="text" class="name" name="name" placeholder="Enter Name" required/>
            <input type="text" class="phone" name="phone" placeholder="Enter Phone No" required/>
            <input type="email" class="email" name="email" placeholder="Enter Email Address" required/>
            <textarea class="message" name="message" placeholder="Your Message" required></textarea>
            <!--For captcha-->
            <!-- <div class="g-recaptcha" data-sitekey="your_site_key"></div> -->
            <div class="g-recaptcha" data-sitekey="6LcNpOkaAAAAAP6zoeqE3ueODg8CuHw580ccsFMa"></div>
            <input type="submit" class="submit-btn" name="submit" value="Send" />
        </form>
        <!--PHP for validation-->
        <div class="status">
            <?php
               if (isset($_POST['submit'])) {

                //store user inputs in a variable
                    $user_name = $_POST['name'];
                    $user_phone = $_POST['phone'];
                    $user_email = $_POST['email'];
                    $user_message = $_POST['message'];

                    // Format on how the email is going to be displayed in gmail app etc
                    $email_from = 'noreply@marceluyi.com'; //website default email to recieve message from site and also send
                    $email_subject = 'New form submission'; // Default email subject from website to your email
                    $email_body = "Name: $user_name \n".
                                  "Phone No: $user_name \n".
                                  "Email: $user_email \n".
                                  "Message: $user_message \n";

                    $to_email = "uyimarcel3@gmail.com"; //your real email to recieve the message from your website user
                    $headers = "From: $email_from \r\n";
                    $headers = "Reply-To: $user_email \r\n"; // reply to user email, if you are to reply

                    $secret_key ="6LcNpOkaAAAAAFka8rJ9eR5qfWrG9dU_e2lWdEhT"; // variable to store secret captcha key
                    $response_key = $_POST['g-recaptcha-response']; // variable to store response from user on the captcha key
                    $user_IP = $_SERVER['REMOTE_ADDR']; // variable to store/get remote IP (user IP) address using server global variable
                    $url = "https://www.google.com/recaptcha/api/siteverify? secret=$secret_key&response=$response_key&remoteip=$user_IP";

                    // To get the users response on the captcha :)
                    $response = file_get_contents($url);
                    $response = json_decode($url);

                    if ($response->success) {
                        mail($to_email,$email_subject,$email_body,$headers);
                        echo "Message sent successfully";
                    }
                    else{
                        echo "<span>Invalid captcha: Please Verify captcha</span>";
                    }

               }

            ?>

        </div>

    </div>
</body>

</html>