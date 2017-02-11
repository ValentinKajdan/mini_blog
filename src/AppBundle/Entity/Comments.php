<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommentsRepository")
 * @ORM\Table(name="comments")
 */
class Comments
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
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Articles", cascade={"persist"})
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    private $idArticle;
    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string")
     * @Length(max="72")
     */
    private $author;
    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @NotBlank(message="Le contenu ne doit pas être vide")
     */
    private $content;
    /**
     * @Assert\Date()
     *
     * @ORM\Column(name="date", type="date")
     * @NotBlank()
     */
    private $date;
    /**
     * Get the value of content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * Set the value of content
     *
     * @param string conetnt
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    /**
     * Get the value of date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Set the value of date
     *
     * @param string date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * Get the value of author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * Set the value of author
     *
     * @param string author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * Get the value of the Id of the article
     *
     * @return mixed
     */
    public function getIdArticle()
    {
        return $this->idArticle;
    }
    /**
     * Set the value of the Id of the article
     *
     * @param int article
     *
     * @return self
     */
    public function setIdArticle($article)
    {
        $this->idArticle = $article;
        return $this;
    }
}
