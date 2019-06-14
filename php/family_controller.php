<?php 

    include("koneksi.php");

    if ($_GET['type'] == 'insert'){
        
        $image = $_FILES['image-add']['name'];
        $label = $_POST['word-label-add'];
        $sunda = $_POST['word-sunda-add'];

        $arrayImageName = explode('.', $image);
        $extensionImage = "." . end($arrayImageName);
        $newImageName = "family_" . $label . "_" . time() . $extensionImage;

        $path   = "../assets/images/" . $newImageName;

        $query = mysqli_query($koneksi, "INSERT INTO `word` (`id`, `cat_id`, `label`, `sunda`, `image`) VALUES (null, 2, '$label', '$sunda', '$newImageName')");
        move_uploaded_file($_FILES['image-add']['tmp_name'], $path);

        if ($query) {
            $res = array(
                'success' => true,
                'messages' => 'Word Family berhasil ditambahkan'
            );
            echo json_encode($res);
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Family gagal ditambahkan'
            );
            echo json_encode($res);
        }

        // echo json_encode($data_query);

    }
    if ($_GET['type'] == 'view'){
        
        $query = mysqli_query($koneksi, "SELECT * FROM `word` WHERE cat_id = '2' ");
        while ($data = mysqli_fetch_assoc($query)) {
            echo "  <div class='card card3'>
                        <div class='col-1 col-s-12 d-flex flex-center'>
                            <img class='word-image' src='assets/images/".$data['image']."' alt='image'>
                        </div>
                        <div class='col-9 col-s-12 word-frame'>
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
            'sunda'     => $data['sunda'],
            'image'     => $data['image']
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
                'messages' => 'Word Family berhasil ditambahkan'
            );
            echo json_encode($res);
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Family gagal ditambahkan'
            );
            echo json_encode($res);
        }
    }
    if ($_GET['type'] == 'editWithImage'){
        
        $id         = $_GET['id'];
        $image      = $_FILES['image-edit']['name'];
        $label      = $_POST['word-label-edit'];
        $sunda      = $_POST['word-sunda-edit'];
        $oldImage   = "../assets/images/" . $_POST['current-image-edit'];

        $arrayImageName = explode('.', $image);
        $extensionImage = "." . end($arrayImageName);
        $newImageName   = "family_" . $label . "_" . time() . $extensionImage;
        $path           = "../assets/images/" . $newImageName;

        $query = mysqli_query($koneksi, "UPDATE `word` SET 
            `label` = '$label', 
            `sunda` = '$sunda', 
            `image` = '$newImageName' 
            WHERE id = '$id' ");

        unlink($oldImage);
        move_uploaded_file($_FILES['image-edit']['tmp_name'], $path);

        if ($query) {
            $res = array(
                'success' => true,
                'messages' => 'Word Family berhasil ditambahkan'
            );
            echo json_encode($res);
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Family gagal ditambahkan'
            );
            echo json_encode($res);
        }
    }
    if ($_GET['type'] == 'delete'){

        $id     = $_GET['id'];
        $image  = "../" . $_GET['image'];

        $query = mysqli_query($koneksi, "DELETE FROM `word` WHERE id = '$id' ");
        unlink($image);

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