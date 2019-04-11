<?php

/**
 * Question.php
 *
 * Question Entity
 *
 * @category   Entity
 * @package    Api 
 * @author     Yus
 * @copyright  2019/04/10 https://isthrowable.com
 * @license    http://www.php.net/license/3_0.txt  PHP License 3.0
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(type="json_array")
     */
    private $bulleted;

    /**
     * @ORM\Column(type="boolean")
     */
    private $voted;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Survey", inversedBy="questions")
     */
    private $survey;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    public function getBulleted()
    {
        return $this->bulleted;
    }

    public function setBulleted($bulleted)
    {
        $this->bulleted = $bulleted;

        return $this;
    }

    public function getVoted()
    {
        return $this->voted;
    }

    public function setVoted(bool $voted)
    {
        $this->voted = $voted;

        return $this;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    public function getSurvey()
    {
        return $this->survey;
    }

    public function setSurvey(?Survey $survey)
    {
        $this->survey = $survey;

        return $this;
    }
}
