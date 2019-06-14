<?php 

    include("koneksi.php");

    if ($_GET['type'] == 'insert'){

        $label = $_POST['word-label-add'];
        $sunda = $_POST['word-sunda-add'];

        $query = mysqli_query($koneksi, "INSERT INTO `word` (`id`, `cat_id`, `label`, `sunda`, `image`) VALUES (null, 4, '$label', '$sunda', '')");

        if ($query) {
            $res = array(
                'success' => true,
                'messages' => 'Word Phrases berhasil ditambahkan'
            );
            echo json_encode($res);
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Phrases gagal ditambahkan'
            );
            echo json_encode($res);
        }

        // echo json_encode($data_query);

    }
    if ($_GET['type'] == 'view'){
        
        $query = mysqli_query($koneksi, "SELECT * FROM `word` WHERE cat_id = '4' ");
        while ($data = mysqli_fetch_assoc($query)) {
            echo "  <div class='card card3'>
                        <div class='col-10 col-s-12 word-frame'>
                            <p class='word-label'>".$data['label']."</p>
                            <p class='word-sunda'>".$data['sunda']."</p>
                        </div>
                        <div class='col-2 col-s-12 word-action-frame'>
                            <div class='col-6 d-flex flex-center'>
                                <i class='material-icons action-edit' onclick='modalEdit(".$data['id'].")'>edit</i>
                            </div>
                            <div class='col-6 d-flex flex-center'>
                                <i class='material-icons action-delete' onclick='modalDelete(".$data['id'].")'>delete</i>
                            </div>
                        </div>
                    </div>";
        }
        
    }
    if ($_GET['type'] == 'getData'){
        
        // echo "ajax getData";
        $id = $_GET['id'];

        $query = mysqli_query($koneksi, "SELECT * FROM `word` WHERE id = '$id' ");
        $data = mysqli_fetch_assoc($query);
    
        $data_query = array(
            'id'        => $data['id'],
            'cat_id'    => $data['cat_id'],
            'label'     => $data['label'],
            'sunda'     => $data['sunda']
        );

        echo json_encode($data_query);
    }
    if ($_GET['type'] == 'edit'){
        
        $id         = $_GET['id'];
        $label      = $_POST['word-label-edit'];
        $sunda      = $_POST['word-sunda-edit'];

        $query = mysqli_query($koneksi, "UPDATE `word` SET 
            `label` = '$label', 
            `sunda` = '$sunda'
            WHERE id = '$id' ");

        if ($query) {
            $res = array(
                'success' => true,
                'messages' => 'Word Phrases berhasil ditambahkan'
            );
            echo json_encode($res);
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Phrases gagal ditambahkan'
            );
            echo json_encode($res);
        }
    }
    if ($_GET['type'] == 'delete'){

        $id     = $_GET['id'];

        $query = mysqli_query($koneksi, "DELETE FROM `word` WHERE id = '$id' ");

        if ($query) {
            $res = array(
                'success' => true,
                'messages' => 'Word '.$id.' berhasil dihapus'
            );
            echo json_encode($res);
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word '.$id.' gagal dihapus'
            );
            echo json_encode($res);
        }
        
    }

?>