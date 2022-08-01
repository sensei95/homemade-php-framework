<?php

namespace App\Entities;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name: "tags")]
class Tag
{
    #[Id, Column(type: Types::INTEGER), GeneratedValue]
    private int $id;

    #[Column(type: Types::STRING, length: 255)]
    private string $name;

    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private string $slug;

    #[Column(name: "created_at", type: Types::DATETIME_MUTABLE,  options: ['default' => 'CURRENT_TIMESTAMP'])]
    private DateTime $createdAt;

    #[ManyToMany(targetEntity: Post::class, mappedBy: "tags")]
    private Collection $posts;


    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): Tag
    {
        $this->name = $name;
        return $this;
    }


    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): Tag
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): Tag
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getPosts(): ArrayCollection|Collection
    {
        return $this->posts;
    }

    /**
     * @param ArrayCollection|Collection $posts
     */
    public function setPosts(ArrayCollection|Collection $posts): Tag
    {
        $this->posts = $posts;
        return $this;
    }

    public function addPost(Post $post)
    {
        $this->posts->add($post);
        return $this;
    }

}