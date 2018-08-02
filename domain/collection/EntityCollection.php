<?php

namespace domain\collection;
use domain\quiz\Entity;

class EntityCollection implements \Iterator, \Countable
{
    protected $id;
    protected $items = [];
    protected $itemIds = [];

    protected $position;

    /**
     * QuizCollection constructor.
     * @param $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
        $this->position = 0;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function addItem(Entity $item): void
    {
        $id               = $item->getId();
        $this->itemIds[]        = $id;
        $this->items[$id] = $item;
    }

    public function getItem(string $id): Entity
    {
        return isset($this->items[$id]) ? $this->items[$id] : null;
    }

    public function current()
    {
        $index = $this->itemIds[$this->position];
        return $this->items[$index];
    }

    public function next()
    {
        $this->position++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return (isset($this->itemIds[$this->position]));
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function count()
    {
        return count($this->items);
    }

    /**
     * Checks if the collection has an item based on the 'equals' method of the entity interface.
     * @param Entity $comparingItem
     * @return bool
     */
    public function hasItem(Entity $comparingItem)
    {

        foreach($this->items as $item) {
            if($item->equals($comparingItem)) {
                return true;
            }
        }
        return false;
    }


}