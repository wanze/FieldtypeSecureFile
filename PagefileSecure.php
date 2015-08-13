<?php

/**
 * Class PagefileSecure
 *
 * @author Stefan Wanzenried <stefan.wanzenried@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License, version 2
 */
class PagefileSecure extends Pagefile
{

    /**
     * Check if a user has permission to download this file.
     * If you omit the $user argument, the check is performed for the current logged in user.
     *
     * @param User|null $user
     * @return bool
     */
    public function ___isDownloadable(User $user = null)
    {
        if ($this->wire('user')->isSuperuser()) {
            return true;
        }
        $user = ($user instanceof User) ? $user : $this->wire('user');
        /** @var Field $field */
        $field = $this->pagefiles->field;
        if (!is_array($field->get('roles'))) {
            return false;
        }
        foreach ($field->get('roles') as $roleId) {
            if ($user->hasRole($roleId)) {
                return true;
            }
        }

        return false;
    }


    /**
     * Download the file
     *
     * @param array $options Options passed to the wireSendFile function
     * @throws WireException
     */
    public function download(array $options = array())
    {
        if ($this->isDownloadable()) {
            wireSendFile($this->filename, $options);
        }
    }


    /**
     * Return the web accessible URL (with schema and hostname) to this Pagefile
     *
     * @return string
     */
    public function ___httpUrl()
    {
        return '';
    }


    /**
     * Return the web accessible URL to this Pagefile
     *
     * @return string
     */
    public function url()
    {
        return '';
    }
}