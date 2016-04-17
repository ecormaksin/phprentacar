<?php

namespace Acme\RentacarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Acme\RentacarBundle\Entity\User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=100, nullable=false)
     */
    private $password;

    /**
     * @var string $tel
     *
     * @ORM\Column(name="tel", type="string", length=20, nullable=true)
     */
    private $tel;

    /**
     * @var date $birth
     *
     * @ORM\Column(name="birth", type="date", nullable=true)
     */
    private $birth;

    /**
     * @var string $activationKey
     *
     * @ORM\Column(name="activation_key", type="string", length=100, nullable=true)
     */
    private $activationKey;

    /**
     * @var datetime $createdAt
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create")
     */
    private $createdAt;

    /**
     * @var datetime $updatedAt
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="update")
     */
    private $updatedAt;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set tel
     *
     * @param string $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set birth
     *
     * @param date $birth
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;
    }

    /**
     * Get birth
     *
     * @return date 
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set activationKey
     *
     * @param string $activationKey
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;
    }

    /**
     * Get activationKey
     *
     * @return string 
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
