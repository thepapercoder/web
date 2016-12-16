<?php
/**
 * Copyright (c) 2016. Son Nguyen Giang
 */

/**
 * Created by PhpStorm.
 * User: Son Nguyen Giang
 * Date: 12/10/2016
 * Time: 10:33 AM
 */

class User extends Model
{
    private $variableType = "isssssssssss";
    protected $id;
    protected $username;
    protected $password;
    protected $address;
    protected $phone;
    protected $sex;
    protected $name;
    protected $dateofbirth;
    protected $email;
    protected $profileUrl;
    protected $userType;
    protected $isDelete;

    public static function Delete($obj)
    {
        $obj->setIsDelete("yes");
        return Model::Update($obj);
    }

    public static function Authenticate($username, $password)
    {
        $sql = "SELECT * FROM `user` WHERE `username` = '".$username."' AND password = '".$password."'";
        $result = Database::getInstance()->query($sql);
        if ($result->num_rows !== 0)
        {
            $result = $result->fetch_object("User", array("id", "username", "password", "address", "phone", "sex", "name", "dateofbirth", "email", "profileUrl", "userType", "isDelete"));
            if ($result->getIsDelete() == "yes")
            {
                return "deleted";
            }
            else
            {
                return $result;
            }
        }
        else
        {
            return false;
        }
    }

    public static function getPlayerOrCoach($userType)
    {
        $sql = "SELECT * FROM `user` WHERE `userType` = '".$userType."'";
        $result = Database::getInstance()->query($sql);
        if ($result == false || $result->num_rows == 0)
        {
            return array();
        }
        else
        {
            $arrResult = array();
            while ($obj = $result->fetch_object("User", array("id", "username", "password", "address", "phone", "sex", "name", "dateofbirth", "email", "profileUrl", "userType", "isDelete")))
            {
                if ($obj->getIsDelete() == "yes")
                {
                    continue;
                }
                else
                {
                    array_push($arrResult, $obj);
                }
            }
            return $arrResult;
        }
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
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
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * @param mixed $dateofbirth
     */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getProfileUrl()
    {
        return $this->profileUrl;
    }

    /**
     * @param mixed $profile_url
     */
    public function setProfileUrl($profile_url)
    {
        $this->profileUrl = $profile_url;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
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

    /**
     * @param mixed $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

}