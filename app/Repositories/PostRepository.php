<?php
namespace App\Repositories;


use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class PostRepository extends Model implements PostRepositoryInterface
{

    protected $table = 'posts';

    public const PUBLISH_ON = 1;
    public const PUBLISH_OFF = 0;

    //  количество записей, выводимое в таблице со всеми записями
    public const ALLPAGE_TABLE_PERPAGE = 30; 

    //  количество записей, выводимое на главной станице
    public const MAINPAGE_PERPAGE = 10; 

    /**
     * @param $page
     * @return mixed|void
     */
    public function getToPage($page)
    {
        $perPage = self::MAINPAGE_PERPAGE;  //  10 постов на страницу
        $columns = ['id', 'title', 'content', 'publish', 'created_at'];

        $endBetween = $page * $perPage;
        $beginBetween = $endBetween - $perPage + 1;

        $data = $this->select($columns)
                     ->where('publish', '=', self::PUBLISH_ON)
                     ->simplePaginate($perPage)
                     ->toArray();

        $data = $data['data'];
        return $data;
    }

    /**
     *
     */
    public function getToTable($page)
    {
        $perPage = self::ALLPAGE_TABLE_PERPAGE;
        $columns = ['id', 'title', 'publish', 'created_at', 'uid_add'];

        $endBetween = $page * $perPage;
        $beginBetween = $endBetween - $perPage + 1;

        $data = $this->select($columns)
                     ->simplePaginate($perPage)
                     ->toArray();

        $data = $data['data'];
        return $data;
    }

    public function getOnePost($idPost)
    {
        $columns = ['id', 'title', 'content', 'publish', 'created_at'];

        $data = $this->select($columns)
            ->where('id', '=', $idPost)
            ->get()
            ->toArray();

        return $data;
    }

    public function getCountPages($perPage)
    {
        $countPosts = $this->count();
        $countPages = ceil($countPosts / $perPage);
        return $countPages;
    }
}