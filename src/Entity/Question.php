<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuestionAnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\Status;

#[ORM\Entity(repositoryClass: QuestionAnswerRepository::class)]
#[ApiResource]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?bool $promoted = null;

    #[ORM\Column(length: 255)]
    private ?Status $status = null;

    #[ORM\OneToOne(mappedBy: 'question', cascade: ['persist', 'remove'])]
    private ?Answer $answer = null;

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

    public function isPromoted(): ?bool
    {
        return $this->promoted;
    }

    public function setPromoted(bool $promoted): self
    {
        $this->promoted = $promoted;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getAnswer(): ?Answer
    {
        return $this->answer;
    }

    public function setAnswer(Answer $answer): self
    {
        // set the owning side of the relation if necessary
        if ($answer->getQuestion() !== $this) {
            $answer->setQuestion($this);
        }

        $this->answer = $answer;

        return $this;
    }

}
