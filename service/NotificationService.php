<?php

/**
 * Notification Class
 * Used to send notification to users
 *
 *
 * @author Sandy Razafitrimo <sandy@etsik.com>
 */
class NotificationService
{
    public function __construct() {
        $this->mailerService = new MailerService();
    }

    public function confirmationMentorat($timeSlot, $person, $message, $own)
    {
          // send to r
          $this->mailerService->setTitle('DOUDOU - Confirmation de Mentorat');
          $this->mailerService->setAdd($person->getEmail());
          $this->mailerService->setMessage($message);
          $this->mailerService->sendMail();

          // send copy to defaut email
          $this->mailerService->setTitle('DOUDOU - confirmation de Mentorat');
          $this->mailerService->setAdd($owner->getUser()->getEmail());
          $this->mailerService->setMessage($message);
          $this->mailerService->sendMail();
    }


}
