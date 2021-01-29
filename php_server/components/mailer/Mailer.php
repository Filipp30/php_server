<?php


namespace Mailer;

use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Swift_TransportException;

class Mailer{

    public function send_mail($mail_adres,$message_text): bool{

            // Create the Transport
            $transport = (new Swift_SmtpTransport($_ENV['MAIL_HOST'], $_ENV['MAIL_PORT']))
                ->setUsername($_ENV['MAIL_USERNAME'])
                ->setPassword($_ENV['MAIL_PASSWORD'])
            ;
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);
            //
            // Create a message
            $message = (new Swift_Message('No-reply'))
                ->setFrom([$_ENV['MAIL_FROM_ADDRESS'] => 'Admin'])
                ->setTo([$mail_adres => 'Message from Admin. No reply'])
                ->setBody($message_text);
            // Attach the generated PDF from earlier)
            //            ->attach(Swift_Attachment::fromPath('pdf_user/file.pdf'))
            ;
        try {
            // Send the message
            $mailer->send($message);
            return true;
        }catch (Swift_TransportException $ex){
            return false;
        }
    }
}