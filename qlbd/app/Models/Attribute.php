<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:34 AM
 */

class Attribute extends Model
{
    private $variableType = "iiiiiiiiiiii";
    protected $id;
    protected $acceleration;
    protected $jumping;
    protected $stamina;
    protected $finshing;
    protected $weight;
    protected $technique;
    protected $freekick;
    protected $passing;
    protected $drilble;
    protected $agility;
    protected $height;

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
    public function getAcceleration()
    {
        return $this->acceleration;
    }

    /**
     * @param mixed $acceleration
     */
    public function setAcceleration($acceleration)
    {
        $this->acceleration = $acceleration;
    }

    /**
     * @return mixed
     */
    public function getJumping()
    {
        return $this->jumping;
    }

    /**
     * @param mixed $jumping
     */
    public function setJumping($jumping)
    {
        $this->jumping = $jumping;
    }

    /**
     * @return mixed
     */
    public function getStamina()
    {
        return $this->stamina;
    }

    /**
     * @param mixed $stamina
     */
    public function setStamina($stamina)
    {
        $this->stamina = $stamina;
    }

    /**
     * @return mixed
     */
    public function getFinshing()
    {
        return $this->finshing;
    }

    /**
     * @param mixed $finshing
     */
    public function setFinshing($finshing)
    {
        $this->finshing = $finshing;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getTechnique()
    {
        return $this->technique;
    }

    /**
     * @param mixed $technique
     */
    public function setTechnique($technique)
    {
        $this->technique = $technique;
    }

    /**
     * @return mixed
     */
    public function getFreekick()
    {
        return $this->freekick;
    }

    /**
     * @param mixed $freekick
     */
    public function setFreekick($freekick)
    {
        $this->freekick = $freekick;
    }

    /**
     * @return mixed
     */
    public function getPassing()
    {
        return $this->passing;
    }

    /**
     * @param mixed $passing
     */
    public function setPassing($passing)
    {
        $this->passing = $passing;
    }

    /**
     * @return mixed
     */
    public function getDrilble()
    {
        return $this->drilble;
    }

    /**
     * @param mixed $drilble
     */
    public function setDrilble($drilble)
    {
        $this->drilble = $drilble;
    }

    /**
     * @return mixed
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * @param mixed $agility
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

}