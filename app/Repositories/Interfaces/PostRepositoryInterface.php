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
    public function getOnePost($idPost);

}