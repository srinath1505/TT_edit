
<main id="main">

    <section id="subhero" class="subhero">
        <div class="container">
            <div class="row d-flex align-items-center investmenrow ">
                <div class="col-lg-5 d-flex justify-content-center">
                    <div class="block-head"><span class="fw-bold text-uppercase"><?= $get->title ?></span>
                        <h2 class="block-title"> <span class="block-primary">Contact Us</span>
                        </h2>
                        <h2>
                            <p class="fs-6">
                                Contact our support team for all your questions
                            </p>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-7  mt-5">
                    <img src="./assets/img/NewTemp/contactus/contatcus.png" class="img-fluid" alt="Responsive image">
                </div>

            </div>
        </div>
    </section>
    <?php

require("./php/PHPMailer/PHPMailerAutoload.php");

if ($_POST) {

    $result_message = array();

    // ADD your Email and Name
    $recipientEmail = $get->recipient_email;
    //  $recipientEmail = 'ecem.s@mblhightech.com';
    $recipientName = $get->recipient_name;

    //collect the posted variables into local variables before calling $mail = new mailer

    $senderName = $_POST['contact-name'];
    $senderEmail = $_POST['contact-email'];
    $senderPhone = $_POST['contact-phone'];
    $senderMessage = $_POST['contact-message'];
    $senderSubject =  $get->title . '- New Message From ' . $senderName;
    if (!$senderEmail || !$senderName || !$senderMessage) {
        $result_message['status'] = 'error';
        $result_message['message'] = 'Please fill in all the fields';
        echo json_encode($result_message);
        die();
    }

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    // $mail->Mailer = "smtp";
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $get->user_name;                     //SMTP username
    $mail->Password   = $get->password;                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 465;


    //Set who the message is to be sent from
    $mail->setFrom($recipientEmail, $recipientName);
    //Set an alternative reply-to address
    $mail->addReplyTo($senderEmail, $senderName);
    //Set who the message is to be sent to
    $mail->addAddress($senderEmail, $senderName);
    //Set the subject line
    $mail->Subject = $senderSubject;

    function getUserIP()
    {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }

        return $ip;
    }


    $user_ip = getUserIP();



    $message = '<html><body>';
    $message .= '<table rules="all" style="border:1px solid #666;width:300px;" cellpadding="10">';
    $message .= ($senderName) ? "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $senderName . "</td></tr>" : '';
    $message .= ($senderEmail) ? "<tr><td><strong>Email:</strong> </td><td>" . $senderEmail . "</td></tr>" : '';
    $message .= ($senderPhone) ? "<tr><td><strong>Phone:</strong> </td><td>" . $senderPhone . "</td></tr>" : '';
    $message .= ($senderMessage) ? "<tr><td><strong>Message:</strong> </td><td>" . $senderMessage . "</td></tr>" : '';
    $message .= "<tr><td><strong>IP:</strong> </td><td>" .  $user_ip . "</td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";

    $mail->Body = $message;

    $mail->MsgHTML($message);
    $mail->AddAddress($recipientEmail, $recipientName);



    if (!$mail->Send()) {
        $result_message['status'] = 'error';
        $result_message['message'] = 'Error';
        // echo json_encode($result_message);
    } else {
        $result_message['status'] = 'success';
        $result_message['message'] = 'Message sent successfully. Thank you. We will contact you shortly.';
        // echo json_encode($result_message);
    }
}
?>

    <!-- ======= About Section ======= -->
    <section class="contactus" id="contactus">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9 m-auto mt-5">
                            <form class="align-self-center sendmessageform" action="" method="post">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">

                                        <label class="label  mb-4" for="contact-name">Name</label>

                                        <input type="text" class="form-control" id="contact-name" name="contact-name">
                                    </div>

                                    <div class=" col-lg-4 mb-4">
                                        <label for="contact-email" class="label  mb-4">E-mail </label>
                                        <input type="email" class="form-control" id="contact-email" name="contact-email" aria-describedby="emailHelp">
                                    </div>

                                    <div class=" col-lg-4 mb-4">
                                        <label for="contact-phone" class="label  mb-4"> Phone</label>
                                        <input type="tel" class="form-control" id="contact-phone" name="contact-phone">
                                    </div>

                                    <div class=" col-lg-12 mb-4">
                                        <label for="contact-message" class="label  mb-4"> Message</label>

                                        <textarea class="form-control" id="contact-message" name="contact-message" rows="3"></textarea>

                                    </div>
                                    <div class="mb-4">
                                        <?php
                                        if ($_POST) {
                                            if ($result_message["status"] == 'success') {
                                                echo '<div class="alert alert-success" role="alert">' . $result_message["message"] . '</div>';
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert">' . $result_message["message"] . '</div>';
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-get-started sendButton" >Send Message</button>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->



</main>