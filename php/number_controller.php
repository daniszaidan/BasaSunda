<?php 

	include("koneksi.php");

    if ($_GET['type'] == 'insert'){ // start of insert function
        
        $image = $_FILES['image-add']['name']; // get image from form data
        $label = $_POST['word-label-add']; // get label from form data
        $sunda = $_POST['word-sunda-add']; // get sunda from form data

        $arrayImageName = explode('.', $image); 
        $extensionImage = "." . end($arrayImageName); // get image extension
        $newImageName = "number_" . $label . "_" . time() . $extensionImage; // rename image with new name

        $path   = "../assets/images/" . $newImageName; // path to save image in local directory

        $query = mysqli_query($koneksi, "INSERT INTO `word` (`id`, `cat_id`, `label`, `sunda`, `image`) VALUES (null, 1, '$label', '$sunda', '$newImageName')");
        move_uploaded_file($_FILES['image-add']['tmp_name'], $path); // script insert data

        if ($query) { // if insert success (true)
            $res = array(
                'success' => true,
                'messages' => 'Word Number berhasil ditambahkan'
            );
            echo json_encode($res); // send messages in json data
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Number gagal ditambahkan'
            );
            echo json_encode($res); // send messages in json data
        }

    } // end of insert function
    if ($_GET['type'] == 'view'){ // start of view function
        
        $query = mysqli_query($koneksi, "SELECT * FROM `word` WHERE cat_id = '1' "); // script select data 
        while ($data = mysqli_fetch_assoc($query)) { //
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
                    </div>"; // return data from database
        }
        
    } // end of view function
    if ($_GET['type'] == 'getData'){ // start of getData function
        
        $id = $_GET['id']; // get id

        $query = mysqli_query($koneksi, "SELECT * FROM `word` WHERE id = '$id' "); // script select data 
        $data = mysqli_fetch_assoc($query);
    
        $data_query = array(
            'id'        => $data['id'],
            'cat_id'    => $data['cat_id'],
            'label'     => $data['label'],
            'sunda'     => $data['sunda'],
            'image'     => $data['image']
        );

        echo json_encode($data_query); // send data in json data
    } // end of getData function
    if ($_GET['type'] == 'edit'){ // start of edit function
        // this script edits data without changing image
        
        $id         = $_GET['id'];  // get id from form data
        $label      = $_POST['word-label-edit'];  // get label from form data
        $sunda      = $_POST['word-sunda-edit'];  // get sunda from form data

        $query = mysqli_query($koneksi, "UPDATE `word` SET 
            `label` = '$label', 
            `sunda` = '$sunda'
            WHERE id = '$id' "); // script update data 

        if ($query) { // if insert success (true)
            $res = array(
                'success' => true,
                'messages' => 'Word Number berhasil ditambahkan'
            );
            echo json_encode($res); // send messages in json data
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Number gagal ditambahkan'
            );
            echo json_encode($res); // send messages in json data
        }
    } // end of edit function
    if ($_GET['type'] == 'editWithImage'){ // start of editWithImage function
        // this script edits data without changing image
        
        $id         = $_GET['id']; // get id from form data
        $image      = $_FILES['image-edit']['name']; // get image from form data
        $label      = $_POST['word-label-edit']; // get label from form data
        $sunda      = $_POST['word-sunda-edit']; // get sunda from form data
        $oldImage   = "../assets/images/" . $_POST['current-image-edit']; // get image path folder

        $arrayImageName = explode('.', $image);
        $extensionImage = "." . end($arrayImageName); // get image extension
        $newImageName   = "number_" . $label . "_" . time() . $extensionImage; // rename image with new name
        $path           = "../assets/images/" . $newImageName; // path to save image in local directory

        $query = mysqli_query($koneksi, "UPDATE `word` SET 
            `label` = '$label', 
            `sunda` = '$sunda', 
            `image` = '$newImageName' 
            WHERE id = '$id' "); // script update data

        unlink($oldImage); // delete old image in folder
        move_uploaded_file($_FILES['image-edit']['tmp_name'], $path); // upload new image in folder

        if ($query) { // if insert success (true)
            $res = array(
                'success' => true,
                'messages' => 'Word Number berhasil ditambahkan'
            );
            echo json_encode($res); // send messages in json data
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word Number gagal ditambahkan'
            );
            echo json_encode($res); // send messages in json data
        }
    } // end of editWithImage function
    if ($_GET['type'] == 'delete'){ // start of delete function
        // this script edits data and change the image

        $id     = $_GET['id']; // get id from form data
        $image  = "../" . $_GET['image']; // get image from form data

        $query = mysqli_query($koneksi, "DELETE FROM `word` WHERE id = '$id' "); // script delete data
        unlink($image); // delete image in folder

        if ($query) { // if insert success (true)
            $res = array(
                'success' => true,
                'messages' => 'Word '.$id.' berhasil dihapus'
            );
            echo json_encode($res); // send messages in json data
        }else{
            $res = array(
                'success' => false,
                'messages' => 'Word '.$id.' gagal dihapus'
            );
            echo json_encode($res); // send messages in json data
        }
        
    } // end of delete function

?>