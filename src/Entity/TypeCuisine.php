<?php

namespace App\Entity;

use App\Repository\TypeCuisineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeCuisineRepository::class)
 */
class TypeCuisine
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
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Menu::class, mappedBy="typeCuisine", orphanRemoval=true)
     */
    private $menus;

    /**
     * @ORM\OneToMany(targetEntity=Chef::class, mappedBy="typeCuisine")
     */
    private $chefs;
    

    public function __construct()
    {
        $this->menus = new ArrayCollection();
        $this->chefs = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->image;
    }

    public function setPhoto(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Menu[]
     */
    public function getMenus(): Collection
    {
        return $this->menus;
    }

    public function addMenu(Menu $menu): self
    {
        if (!$this->menus->contains($menu)) {
            $this->menus[] = $menu;
            $menu->setTypeCuisine($this);
        }

        return $this;
    }

    public function removeMenu(Menu $menu): self
    {
        if ($this->menus->contains($menu)) {
            $this->menus->removeElement($menu);
            // set the owning side to null (unless already changed)
            if ($menu->getTypeCuisine() === $this) {
                $menu->setTypeCuisine(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Chef[]
     */
    public function getChefs(): Collection
    {
        return $this->chefs;
    }

    public function addChef(Chef $chef): self
    {
        if (!$this->chefs->contains($chef)) {
            $this->chefs[] = $chef;
            $chef->setTypeCuisine($this);
        }

        return $this;
    }

    public function removeChef(Chef $chef): self
    {
        if ($this->chefs->contains($chef)) {
            $this->chefs->removeElement($chef);
            // set the owning side to null (unless already changed)
            if ($chef->getTypeCuisine() === $this) {
                $chef->setTypeCuisine(null);
            }
        }

        return $this;
    }
 
    public function __toString(): ? string
    {
        return $this;
    }
}
