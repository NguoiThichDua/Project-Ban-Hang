<?php
    require "../modal/CommentClass.php";

    if(isset($_GET["comment"]) || isset($_GET["ID_Comment"])){
        $Comment = $_GET['comment'];

        switch ($Comment) {
            case 'them':
                    $NoiDung = $_POST["NoiDung"];
                    $ID_User = $_REQUEST["ID_User"];
                    $ID_SanPham = $_REQUEST["ID_SanPham"];

                    $comment = new CommentClass();
                    $them = $comment->ThemComment($NoiDung, $ID_User, $ID_SanPham);
                    header("Location: ../index.php?page=viewSanPham&ID=$ID_SanPham&ketqua=comment_true");

                break;
            case 'xoa':
                $ID_Comment = $_REQUEST["ID_Comment"];
                $ID_SanPham = $_REQUEST["ID_SanPham"];

                $comment = new CommentClass();
                $xoa = $comment->XoaComment($ID_Comment);

                header("Location: ../index.php?page=viewSanPham&ID=$ID_SanPham&ketqua=commentxoa_true");

            break;           
            default:
                # code...
                break;
        }

    }else{
        
    }
?>