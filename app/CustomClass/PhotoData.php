<?php


namespace App\CustomClass;

use App\Photo;

class PhotoData
{

    private $id;
    private $photo_data;

    function __construct($photo_id)
    {
        $photo = Photo::findOrFail($photo_id);
        $this->id = $photo->id;
        $this->setPhotoData($photo);
    }

    /**
     * @return mixed
     */
    public function getPhotoData()
    {
        $this->photo_data['image']
            = Path::$domain_url . 'movie/photo/' . $this->photo_data['image'];
        return $this->photo_data;
    }

    /**
     * @param mixed $blog_data
     */
    private function setPhotoData($photo_data)
    {
        $this->photo_data = $photo_data;
    }
}
