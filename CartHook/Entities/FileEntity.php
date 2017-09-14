<?php

namespace CartHook\Entities;

use Illuminate\Database\Eloquent\JsonEncodingException;
use Illuminate\Support\Collection;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * Class FileEntity
 *
 * @package \CartHook\Entities
 */
abstract class FileEntity extends Entity
{

    abstract protected function getFile() : string;

}
