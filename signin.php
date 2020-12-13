<?php

error_reporting(E_ALL);
// include 'config/Database.php';
include 'Model/Article.php';

class Signin extends Article
{
    public function get_articles()
    {
        $article = new Article();
        $allData = $article->getData();
        foreach ($allData as &$oneData) {
            $oneData['flagabusive'] = $article->abusiveChecked($oneData['username'], $oneData['articlenumber']);
            $oneData['flagspam'] = $article->abusiveChecked($oneData['username'], $oneData['articlenumber']);
            $oneData['flagcopyright'] = $article->abusiveChecked($oneData['username'], $oneData['articlenumber']);
        }


        // $flag_check = 'SELECT COUNT(*) as flags FROM `flags` ';
        // if ($try = mysqli_query($connection, $flag_check)) {
        //     $data = mysqli_fetch_array($try);
        //     $count_flag = (int) $data['flags'];
        //     $last = [];
        //     if ($count_flag === 0) {
        //         $stmt_sec = $connection->prepare('select articlenumber, username as postedby, articletitle, articletext,publishtime from articles');
        //         $stmt_sec->execute();
        //         $stmt_sec->bind_result($articlenumber, $postedby, $title, $text, $publishtime);
        //         $stmt_sec->store_result();

        // while ($stmt_sec->fetch()) {
        //     $last[$articlenumber]['articlenumber'] = $articlenumber;
        //     $last[$articlenumber]['postedby'] = $postedby;
        //     $last[$articlenumber]['title'] = $title;
        //     $last[$articlenumber]['text'] = $text;
        //     $last[$articlenumber]['time'] = $publishtime;
        //     $last[$articlenumber]['flagabusive'] = abusive_checked($username, $articlenumber);
        //     $last[$articlenumber]['flagspam'] = spam_checked($username, $articlenumber);
        //     $last[$articlenumber]['flagcopyright'] = copy_checked($username, $articlenumber);
        // }

        // $stmt_sec->close();
        // } else {
        //     $stmt_sec = $connection->prepare('select s.articlenumber, s.username as postedby , s.articletitle,s.articletext, s.publishtime,  i.flagabusive, i.flagspam, i.flagcopyright from articles INNER join ( select * from articles )s INNER join ( select articlenumber,flagabusive,flagspam,flagcopyright From flags  ) i');

        //     $stmt_sec->execute();
        //     $stmt_sec->bind_result($articlenumber, $postedby, $title, $text, $publishtime, $abusive, $spam, $copyrighted);
        //     $stmt_sec->store_result();

        //     while ($stmt_sec->fetch()) {
        //         $last[$articlenumber]['articlenumber'] = $articlenumber;
        //         $last[$articlenumber]['postedby'] = $postedby;
        //         $last[$articlenumber]['title'] = $title;
        //         $last[$articlenumber]['text'] = $text;
        //         $last[$articlenumber]['time'] = $publishtime;
        //         $last[$articlenumber]['flagabusive'] = abusive_checked($username, $articlenumber);
        //         $last[$articlenumber]['flagspam'] = spam_checked($username, $articlenumber);
        //         $last[$articlenumber]['flagcopyright'] = copy_checked($username, $articlenumber);
        //     }

        //     $stmt_sec->close();
        // }
        // }

        return $allData;
    }
}
    $articles = new Signin();
    $data = $articles->get_articles();
    echo json_encode($data);
