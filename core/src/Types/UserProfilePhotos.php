<?php

namespace Zetgram\Types;

use stdClass;

/*
This object represent a user's profile pictures.

Source: https://core.telegram.org/bots/api#userprofilephotos
*/
class UserProfilePhotos extends Base
{
    /**
    * Total number of profile pictures the target user has
    * @var int
    */
    public int $totalCount;

    /**
    * Requested profile pictures (in up to 4 sizes each)
    * @var PhotoSizeCollectionCollection
    */
    public PhotoSizeCollectionCollection $photos;

    protected function build(stdClass $data)
    {
        $this->totalCount = $data->total_count;
        $this->photos = new PhotoSizeCollectionCollection($data->photos);
    }
}