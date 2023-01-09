<?php
include ("models/m_ban.php");
class c_ban
{
    public function ban_list()
    {
        if (isset($_POST['submit'])) {
            header('location: ban-add.php');
        }
        $m_ban = new m_ban();
        $ban = $m_ban->read_ban();
        $view = "views/ban/v_ban-list.php";
        include "templates/layout.php";
    }

    public function add_ban()
    {
        if (isset($_POST['cancle'])) {
            header('location: ban-list.php');
        } elseif (isset($_POST['submit'])) {
            $id_ban = NULL;
            $ten_ban = $_POST["name"];
            $so_cho_ngoi = $_POST["sochongoi"];
            $ban = new m_ban();
            $result = $ban->add_ban($ten_ban, $so_cho_ngoi);
            if ($result) {
                echo "<script>alert('Thêm thành công')</script>";
            } else {
                echo "<script>alert('Thêm không thành công')</script>";
            }
        }
        $view = "views/ban/v_ban-add.php";
        include "templates/layout.php";
    }

    public function edit_ban()
    {
        $m_ban = new m_ban();
        if (isset($_GET['id'])) {
            $id_ban = $_GET['id'];
            $ban_detail = $m_ban->read_ban_by_id_ban($id_ban);
            if (isset($_POST['cancle'])) {
                header('location: ban-list.php');
            } elseif (isset($_POST['submit'])) {
                $ten_ban = $_POST["name"];
                $so_cho_ngoi = $_POST["sochongoi"];
                $ban = new m_ban();
                $result = $ban->edit_ban( $ten_ban, $so_cho_ngoi,$id_ban);
                if ($result) {
                    echo "<script>alert('Sửa thành công')</script>";
                } else {
                    echo "<script>alert('Sửa không thành công')</script>";
                }
            }
        }
        $view = "views/ban/v_ban-edit.php";
        include "templates/layout.php";
    }

    public function delete_ban()
    {
        $m_ban = new m_ban();
        if (isset($_GET['id'])) {
            $id_ban = $_GET['id'];
            $delete = $m_ban->delete_ban($id_ban);
            if ($delete) {
                echo "<script>alert(Xóa thành công)</script>";
            } else {
                echo "<script>alert('Xóa không thành công')</script>";
            }
            header("location: ban-list.php");
        }
    }

}
?>