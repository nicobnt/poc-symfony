<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Article
{
    /**
     * @Assert\NotBlank(message="Un auteur doit être associé à l'article")
     */
    private $author;

    /**
     * @Assert\NotBlank(message="Un article doit avoir un contenu")
     */
    private $content;

    /**
     * @Assert\Length(
     *     min="10",
     *     minMessage="Le titre doit-être supérieur à 10 caractères",
     *     max="70",
     *     maxMessage="Le titre doit-être inférieur à 70 caractères"
     * )
     */
    private $title;

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

}
