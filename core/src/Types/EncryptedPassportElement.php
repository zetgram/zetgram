<?php

namespace Zetgram\Types;

use stdClass;

/*
Contains information about documents or other Telegram Passport elements shared with the bot
    by the user.

Source: https://core.telegram.org/bots/api#encryptedpassportelement
*/
class EncryptedPassportElement extends Base
{
    /**
    * Element type. One of 'personal_details', 'passport', 'driver_license', 'identity_card', 'internal_passport',
    * 'address', 'utility_bill', 'bank_statement', 'rental_agreement', 'passport_registration',
    * 'temporary_registration', 'phone_number', 'email'.
    * @var string
    */
    public string $type;

    /**
    * Base64-encoded element hash for using in PassportElementErrorUnspecified
    * @var string
    */
    public string $hash;

    /**
    * Base64-encoded encrypted Telegram Passport element data provided by the user, available for 'personal_details',
    * 'passport', 'driver_license', 'identity_card', 'internal_passport' and 'address' types. Can be decrypted and
    * verified using the accompanying EncryptedCredentials.
    * @var string
    */
    public ?string $data;

    /**
    * User's verified phone number, available only for 'phone_number' type
    * @var string
    */
    public ?string $phoneNumber;

    /**
    * User's verified email address, available only for 'email' type
    * @var string
    */
    public ?string $email;

    /**
    * Array of encrypted files with documents provided by the user, available for 'utility_bill', 'bank_statement',
    * 'rental_agreement', 'passport_registration' and 'temporary_registration' types. Files can be decrypted and
    * verified using the accompanying EncryptedCredentials.
    * @var PassportFileCollection
    */
    public ?PassportFileCollection $files;

    /**
    * Encrypted file with the front side of the document, provided by the user. Available for 'passport',
    * 'driver_license', 'identity_card' and 'internal_passport'. The file can be decrypted and verified using the
    * accompanying EncryptedCredentials.
    * @var PassportFile
    */
    public ?PassportFile $frontSide;

    /**
    * Encrypted file with the reverse side of the document, provided by the user. Available for 'driver_license' and
    * 'identity_card'. The file can be decrypted and verified using the accompanying EncryptedCredentials.
    * @var PassportFile
    */
    public ?PassportFile $reverseSide;

    /**
    * Encrypted file with the selfie of the user holding a document, provided by the user; available for 'passport',
    * 'driver_license', 'identity_card' and 'internal_passport'. The file can be decrypted and verified using the
    * accompanying EncryptedCredentials.
    * @var PassportFile
    */
    public ?PassportFile $selfie;

    /**
    * Array of encrypted files with translated versions of documents provided by the user. Available if requested for
    * 'passport', 'driver_license', 'identity_card', 'internal_passport', 'utility_bill', 'bank_statement',
    * 'rental_agreement', 'passport_registration' and 'temporary_registration' types. Files can be decrypted and
    * verified using the accompanying EncryptedCredentials.
    * @var PassportFileCollection
    */
    public ?PassportFileCollection $translation;

    protected function build(stdClass $data)
    {
        $this->type = $data->type;
        $this->hash = $data->hash;
        if (isset($data->data)) {
            $this->data = $data->data;
        }
        if (isset($data->phone_number)) {
            $this->phoneNumber = $data->phone_number;
        }
        if (isset($data->email)) {
            $this->email = $data->email;
        }
        if (isset($data->files)) {
            $this->files = new PassportFileCollection($data->files);
        }
        if (isset($data->front_side)) {
            $this->frontSide = new PassportFile($data->front_side);
        }
        if (isset($data->reverse_side)) {
            $this->reverseSide = new PassportFile($data->reverse_side);
        }
        if (isset($data->selfie)) {
            $this->selfie = new PassportFile($data->selfie);
        }
        if (isset($data->translation)) {
            $this->translation = new PassportFileCollection($data->translation);
        }
    }
}