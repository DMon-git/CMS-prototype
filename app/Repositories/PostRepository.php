<?php
namespace App\Repositories;


use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends Model implements PostRepositoryInterface
{

    protected $table = 'posts';

    public const PUBLISH_ON = 1;
    public const PUBLISH_OFF = 0;

    /**
     * @param $page
     * @return mixed|void
     */
    public function getToPage($page)
    {
        $perPage = 10;  //  10 постов на страницу
        $columns = ['id', 'title', 'content', 'publish', 'date_add'];

        $endBetween = $page * $perPage;
        $beginBetween = $endBetween - $perPage + 1;

        $data = $this->select($columns)
                        ->where('id', '>=', $beginBetween)
                        ->where('publish', '=', self::PUBLISH_ON)
                        ->limit($perPage)
                        ->get()
                        ->toArray();

        return $data;
    }

    /**
     *
     */
    public function getToTable($page)
    {
        $perPage = 30;  //  10 постов на страницу
        $columns = ['id', 'title', 'publish', 'date_add', 'uid_add'];

        $endBetween = $page * $perPage;
        $beginBetween = $endBetween - $perPage + 1;

        $data = $this->select($columns)
            ->where('id', '>=', $beginBetween)
            ->limit($perPage)
            ->get()
            ->toArray();

        return $data;
    }

    public function getOnePost($idPost)
    {
        $columns = ['id', 'title', 'content', 'publish', 'date_add'];

        $data = $this->select($columns)
            ->where('id', '=', $idPost)
            ->get()
            ->toArray();

        return $data;
    }
}