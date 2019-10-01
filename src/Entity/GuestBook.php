<?php
/**
 * Created by PhpStorm.
 * User: Юрий
 * Date: 01.10.2019
 * Time: 5:43
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GuestBook
 * @package App\Entity
 * @ORM\Entity()
 * @UniqueEntity("username", message="Данный username уже зарегистрирован")
 */
class GuestBook
{
    /**
     * @var integer
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $ip;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    protected $browser;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Заполните поле")
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Заполните поле")
     * @Assert\Email(message="Введите Email")
     */
    protected $email;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Url(message="Введите URL")
     */
    protected $homepage;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Введите сообщение")
     */
    protected $text;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->createdAt = time();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getBrowser()
    {
        return $this->browser;
    }

    /**
     * @param string $browser
     */
    public function setBrowser(string $browser)
    {
        $this->browser = $browser;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @param null|string $homepage
     */
    public function setHomepage(?string $homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param int $createdAt
     */
    public function setCreatedAt(int $createdAt)
    {
        $this->createdAt = $createdAt;
    }
}