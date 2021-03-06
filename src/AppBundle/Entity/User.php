<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     * @NotBlank(message="L'email est vide !")
     */
    private $email;
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     * @NotBlank(message="Le mot de passe est vide !")
     */
    private $password;
    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string")
     */
    private $role;
    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of Id
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Get the value of Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Set the value of Email
     *
     * @param string email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get the value of Password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * Set the value of Password
     *
     * @param string password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of Password
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of Role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Set the value of Role
     *
     * @param string role
     *
     * @return self
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
    /**
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [$this->role];
    }
    /**
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }
    /**
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }
    /**
     */
    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->password,
            $this->email,
            // see section on salt below
            // $this->salt,
        ));
    }

   /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}
