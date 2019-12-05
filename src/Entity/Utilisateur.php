<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 * @UniqueEntity(
 * fields={"username"},
 * message="cet user existe déjà!"
 * )
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 5,
     *      max = 10,
     *      minMessage = "Your username must be at least 5 characters long",
     *      maxMessage = "Your username cannot be longer than 10 characters"
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 5,
     *      max = 50,
     *      minMessage = "Your password must be at least 5 characters long",
     *      maxMessage = "Your password cannot be longer than 50 characters"
     * )
     */
    private $password;

    /**
     * @Assert\Length(
     *      min = 5,
     *      max = 10,
     *      minMessage = "Your password must be at least 5 characters long",
     *      maxMessage = "Your password cannot be longer than 10 characters"
     * )
     * @Assert\EqualTo(propertyPath="password", message="les deux mot de passe ne sont pas equivalentes")
     */
    private $verificationPassword;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of verificationPassword
     */ 
    public function getVerificationPassword()
    {
        return $this->verificationPassword;
    }

    /**
     * Set the value of verificationPassword
     *
     * @return  self
     */ 
    public function setVerificationPassword($verificationPassword)
    {
        $this->verificationPassword = $verificationPassword;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }
}
