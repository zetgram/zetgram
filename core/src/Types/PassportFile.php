<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport
    files are in JPEG format when decrypted and don't exceed 10MB.

Source: https://core.telegram.org/bots/api#passportfile
*/
class PassportFile extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * File size
    * @var int
    */
    public int $fileSize;

    /**
    * Unix time when the file was uploaded
    * @var int
    */
    public int $fileDate;

    protected function build(stdClass $data)
    {
        $this->fileId = $data->file_id;
        $this->fileSize = $data->file_size;
        $this->fileDate = $data->file_date;
    }
}