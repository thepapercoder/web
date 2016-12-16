<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:42 AM
 */

class Exercise extends Model
{
    private $variableType = "isssiss";
    protected $id;
    protected $name;
    protected $videoUrl;
    protected $type;
    protected $duration;
    protected $description;
    protected $isDelete;

    public static function Delete($obj)
    {
        $obj->setIsDelete("yes");
        return Model::Update($obj);
    }

    /**
     * @return string
     */
    public function getVariableType()
    {
        return $this->variableType;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * @param mixed $video_url
     */
    public function setVideoUrl($video_url)
    {
        $this->videoUrl = $video_url;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getIsDelete()
    {
        return $this->isDelete;
    }

    /**
     * @param mixed $isDelete
     */
    public function setIsDelete($isDelete)
    {
        $this->isDelete = $isDelete;
    }



}