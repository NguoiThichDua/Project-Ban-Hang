<?php
    $str1 = 'database/KetNoiComment.php';
    $str2 = '../database/KetNoiComment.php';
    $str3 = '../../../database/KetNoiComment.php';

    if(file_exists($str1)){
        $file = $str1;
    }else if(file_exists($str2)){
        $file = $str2;
    }else{
        $file = $str3;
    }
    require $file;
  
    class CommentClass extends databaseComment{

        # Lấy tất cả Comment
        public function LayTatCaComment($ID_SanPham){
            $comment = $this->connect->prepare('SELECT * FROM comment WHERE ID_SanPham= ?');
            $comment->setFetchMode(PDO::FETCH_OBJ);
            $comment->execute(array($ID_SanPham));
            $listcomment = $comment->fetchAll();
            return $listcomment;
        }

        #Lấy thông tin 1 Comment
        public function LayMotComment($ID){
            $comment = $this->connect->prepare("SELECT * FROM comment Where ID = ?");
			$comment->setFetchMode(PDO::FETCH_OBJ);
			$comment->execute(array($ID));
			$list = $comment->fetch(); 
			return $list;
        }
        
        # Thêm mới
        public function ThemComment($NoiDung, $ID_User, $ID_SanPham){
            $cauLenh = 'INSERT INTO comment (NoiDung, ID_User, ID_SanPham) VALUES (?,?,?)';
            $themMoi = $this->connect->prepare($cauLenh);
            $themMoi->execute(array($NoiDung, $ID_User, $ID_SanPham));
        }

        # Chỉnh sửa 
        public function SuaComment($TieuDe, $NoiDung, $ID_User, $ID_SanPham, $ID){
            $cauLenh = 'UPDATE comment SET TieuDe = ?, NoiDung = ?, ID_User = ?, ID_SanPham = ? WHERE comment.ID = ?';
            $capNhat = $this->connect->prepare($cauLenh);
            $capNhat->execute(array($TieuDe, $NoiDung, $ID_User, $ID_SanPham, $ID));
        }

        # Xóa
        public function XoaComment($ID){
            $cauLenh = 'DELETE FROM comment WHERE comment.ID = ?';
            $xoa = $this->connect->prepare($cauLenh);
            $xoa->execute(array($ID));
        }
    }
?>