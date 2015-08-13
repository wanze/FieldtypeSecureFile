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
     * @return string
     */
    public function path()
    {
        return $this->page->filesManager->securePath($this->field);
    }
}