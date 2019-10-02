<?php
namespace App\Models;


class CommentManager extends Manager {

    function getComment($id_post) {

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_publication, \'%d/%m/%Y à %Hh%imin%ss\') AS date_publication_fr FROM comments WHERE id_post=? ORDER BY id');
        $req->execute(array($id_post));
        $listComments = $req->fetchAll();
        return $listComments;
    }

}
