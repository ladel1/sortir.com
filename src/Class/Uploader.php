<?php

namespace App\Class;

use App\Entity\Site;

class Uploader
{
   
    private ?string $filename;

    public function __construct()
    {
        
    }

    public function setFilename(string $filename):?self{
        $this->filename = $filename;
        return $this;
    }

    public function getFilename():?string{
        return $this->filename;
    }

}