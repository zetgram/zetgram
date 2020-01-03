<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represents a file ready to be downloaded. The file can be downloaded via the link
    https://api.telegram.org/file/bot<token>/<file_path>. It is guaranteed that the link will be
    valid for at least 1 hour. When the link expires, a new one can be requested by calling
    getFile.
    Maximum file size to download is 20 MB

Source: https://core.telegram.org/bots/api#file
*/
class File extends Base
{
    /**
    * Identifier for this file
    * @var string
    */
    public string $fileId;

    /**
    * File size, if known
    * @var int
    */
    public ?int $fileSize;

    /**
    * File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
    * @var string
    */
    public ?string $filePath;

    protected function build(stdClass $data)
    {
        $this->fileId = $data->file_id;
        if (isset($data->file_size)) {
            $this->fileSize = $data->file_size;
        }
        if (isset($data->file_path)) {
            $this->filePath = $data->file_path;
        }
    }
}