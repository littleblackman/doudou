<?php


/**
 * MailerService Class
 * Used to send email
 *
 *
 * @author Sandy Razafitrimo <sandy@etsik.com>
 */
class MailerService
{

    private $add;
    private $reply;
    private $title;
    private $message;
    private $encoding;
    private $from_name;
    private $from_email;

    public function __construct()
    {
        $this->setEncoding("utf-8");
        $this->setReply(DEFAULT_REPLY);
        $this->setFromEmail(DEFAULT_SENDER);
        $this->setFromName(DEFAULT_SENDER_NAME);
    }

    /**
     * Get the value of add
     */
    public function getAdd()
    {
        return $this->add;
    }

    /**
     * Set the value of add
     * @var string add  e.g. "cyruss@phpteam.net, trash@phpteam.net"
     *
     * @return  self
     */
    public function setAdd($add)
    {
        $this->add = $add;

        return $this;
    }


    /**
     * Get the value of reply
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set the value of reply
     *
     * @return  self
     */
    public function setReply($reply)
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of message
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     * @var string $message e.g. "<html><body>Hello world</body></html>"
     * @return  self
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of encoding
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Set the value of encoding
     *
     * @return  self
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

  /**
     * Get the value of from
     */
    public function getFromName()
    {
        return $this->from_name;
    }

    /**
     * Set the value of from
     * @var array
     *
     * @return  self
     */
    public function setFromName($from_name)
    {
        $this->from_name = $from_name;

        return $this;
    }

    /**
     * Get the value of from
     */
    public function getFromEmail()
    {
        return $this->from_email;
    }

    /**
     * Set the value of from
     * @var array
     *
     * @return  self
     */
    public function setFromEmail($from_email)
    {
        $this->from_email = $from_email;

        return $this;
    }

    /**
     * Get the value of head
     */
    public function getHead()
    {
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset='.$this->getEncoding();
        $headers[] = 'From: '.$this->getFromName().' <'.$this->getFromEmail().'>';
        /*$headers[] = 'Cc: anniversaire_archive@example.com';
        $headers[] = 'Bcc: anniversaire_verif@example.com';*/
        return $headers;
    }

    /**
     * SendMail function
     *
     * @return void
     */
    public function sendMail()
    {
        mail($this->getAdd(), $this->getTitle(), $this->getMessage(),  implode("\r\n", $this->getHead()));
    }




}
