<?php

/**
 * Class PagefilesSecure
 *
 * @author Stefan Wanzenried <stefan.wanzenried@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License, version 2
 */
class PagefilesSecure extends Pagefiles
{

    /**
     * @param mixed $item
     * @return bool
     */
    public function isValidItem($item)
    {
        return ($item instanceof PagefileSecure);
    }


    /**
     * Add a new PagefileSecure item, or create one from it's filename and add it.
     *
     * @param PagefileSecure|string $item If item is a string (filename) then the PagefileSecure instance will be created automatically.
     * @return $this
     */
    public function add($item)
    {
        if (is_string($item)) {
            $item = new PagefileSecure($this, $item);
        }

        return parent::add($item);
    }


    /**
     * @return string
     */
    public function path()
    {
        return $this->page->filesManager->securePath($this->field);
    }


    /**
     * @return PagefileSecure
     */
    public function makeBlankItem()
    {
        return new PagefileSecure($this, '');
    }

}