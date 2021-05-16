<?php
namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getToPage($page);

    /**
     * @return mixed
     */
    public function getToTable($page);

    /**
     * @return mixed
     */
    public function getOnePost($idPost);

    /**
     * @return mixed
     */
    public function getCountPages($perPage);

}