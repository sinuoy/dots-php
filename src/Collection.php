<?php

namespace Dots;

use Traversable;
use ArrayIterator;

class Collection extends DotsObject implements \Countable, \IteratorAggregate
{
    const OBJECT = 'list';

    /**
     * @var array An array of DotsObject items in the collection.
     */
    protected $items = [];

    /**
     * @var bool Indicates whether there are more items beyond the ones currently loaded.
     */
    protected $hasMore;

    /**
     * Creates a new instance from an array.
     *
     * @param array $array
     * @return self
     */
    public static function fromArray(array $array): self
    {
        // TODO: Implement fromArray() method.
    }

    /**
     * Returns an iterator for the items in the collection.
     *
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Counts the number of items currently in the collection.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Returns the array of items.
     *
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(DotsObject $item): void
    {
        $this->items[] = $item;
    }

    public function setHasMore(bool $hasMore): void
    {
        $this->hasMore = $hasMore;
    }

    /**
     * Returns the hasMore property.
     *
     * @return bool
     */
    public function hasMore(): bool
    {
        return $this->hasMore;
    }
}
