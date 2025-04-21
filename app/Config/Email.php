<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // Set these fields to your details
    public string $fromEmail  = 'vinmogate@gmail.com'; // Your email address (the one that will be sending the emails)
    public string $fromName   = 'Barangay Pinagbuklod'; // The name that will appear as the sender
    public string $recipients = ''; // (Optional) default recipients if any, leave empty

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * The mail sending protocol: mail, sendmail, smtp
     */
    public string $protocol = 'smtp'; // Use smtp for sending emails

    /**
     * SMTP Server Hostname
     */
    public string $SMTPHost = 'smtp.gmail.com'; // Gmail SMTP server

    /**
     * SMTP Username
     */
    public string $SMTPUser = 'vinmogate@gmail.com'; // Your Gmail address (same as $fromEmail)

    /**
     * SMTP Password
     */
    public string $SMTPPass = 'ddhaboeqiwwrtzpj'; // Your app password generated in Gmail

    /**
     * SMTP Port
     */
    public int $SMTPPort = 587; // Port for TLS (587)

    /**
     * SMTP Timeout (in seconds)
     */
    public int $SMTPTimeout = 5;

    /**
     * Enable persistent SMTP connections
     */
    public bool $SMTPKeepAlive = true;

    /**
     * SMTP Encryption.
     *
     * @var string '', 'tls' or 'ssl'. 'tls' will issue a STARTTLS command
     *             to the server. 'ssl' means implicit SSL. Connection on port
     *             465 should set this to 'ssl'.
     */
    public string $SMTPCrypto = 'tls'; // Use TLS encryption

    /**
     * Enable word-wrap
     */
    public bool $wordWrap = true;

    /**
     * Character count to wrap at
     */
    public int $wrapChars = 76;

    /**
     * Type of mail, either 'text' or 'html'
     */
    public string $mailType = 'html'; // Use HTML email content

    /**
     * Character set (utf-8, iso-8859-1, etc.)
     */
    public string $charset = 'UTF-8';

    /**
     * Whether to validate the email address
     */
    public bool $validate = false;

    /**
     * Email Priority. 1 = highest. 5 = lowest. 3 = normal
     */
    public int $priority = 3;

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Newline character. (Use “\r\n” to comply with RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Enable BCC Batch Mode.
     */
    public bool $BCCBatchMode = false;

    /**
     * Number of emails in each BCC batch
     */
    public int $BCCBatchSize = 200;

    /**
     * Enable notify message from server
     */
    public bool $DSN = false;
}
