<?php

namespace App\Entity;

use App\Entity\User\Customer;
use App\Entity\User\Repairman;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Repairman", inversedBy="comments")
     */
    private $repairman;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User\Customer", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $createdBy;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getRepairman(): ?Repairman
    {
        return $this->repairman;
    }

    public function setRepairman(?Repairman $repairman): self
    {
        $this->repairman = $repairman;

        return $this;
    }

    public function getCreatedBy(): ?Customer
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?Customer $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}
