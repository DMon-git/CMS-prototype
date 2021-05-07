<?php
namespace App\Repositories;


use App\Repositories\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class PostRepository extends Model implements PostRepositoryInterface
{

    protected $table = 'posts';

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
                        ->whereBetween('id', [$beginBetween, $endBetween])
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