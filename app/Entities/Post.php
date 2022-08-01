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
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;



#[Entity, Table(name: 'posts')]
class Post
{

    #[Id, Column(type: Types::INTEGER), GeneratedValue]
    private int $id;


    #[Column(type: Types::STRING, length: 255)]
    private string $title;

    #[Column(type: Types::STRING, length: 255, nullable: true)]
    private string $slug;

    #[Column(type: Types::STRING)]
    private string $content;


    #[Column(name: "created_at", type: Types::DATETIME_MUTABLE, options: ['default' => 'CURRENT_TIMESTAMP'])]
    private DateTime $createdAt;


    #[Column(type: Types::BOOLEAN, options: ["default" => false])]
    private  bool $isPublished;


    #[Column(name: "published_at", type: Types::DATETIME_MUTABLE, nullable: true, options: ["default" => "CURRENT_TIMESTAMP"])]
    private DateTime $publishedAt;

    #[Column(name: "category_id", type: Types::INTEGER)]
    private int $categoryId;

    #[ManyToOne(targetEntity: Category::class, inversedBy: "posts")]
    private Category $category;

    #[
        ManyToMany(targetEntity: "Tag", inversedBy: "posts", cascade: ['persist','remove']),
        JoinTable(name: "post_tag"),
    ]
    private Collection $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): Post
    {
        $this->content = $content;
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
    public function setCreatedAt(DateTime $createdAt): Post
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->isPublished;
    }

    /**
     * @param bool $isPublished
     */
    public function setIsPublished(bool $isPublished): Post
    {
        $this->isPublished = $isPublished;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPublishedAt(): DateTime
    {
        return $this->publishedAt;
    }

    /**
     * @param DateTime $publishedAt
     */
    public function setPublishedAt(DateTime $publishedAt): Post
    {
        $this->publishedAt = $publishedAt;
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
    public function setSlug(string $slug): Post
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): Post
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getTags(): ArrayCollection|Collection
    {
        return $this->tags;
    }

    /**
     * @param ArrayCollection|Collection $tags
     */
    public function setTags(ArrayCollection|Collection $tags): Post
    {
        $this->tags = $tags;
        return $this;
    }

    public function addTag(Tag $tag): Post
    {
        $tag->addPost($this);
        $this->tags->add($tag);
        return $this;
    }

}