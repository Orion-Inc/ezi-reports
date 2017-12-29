<?php
    require_once ('../Autoloader.php');
    $get = new Database();

    $errors = array();


    $data = array('data' => array());

    $school_options = '';
    
    try {
        $schoolsArray = $get->query("SELECT * FROM `ezi_school`");
        if (!empty($schoolsArray)) {
            foreach ($schoolsArray as $school) {
                $view = '<button class="btn btn-outline btn-success btn-sm" data-toggle="modal" data-target="#admin-view-school-modal" data-school="'.$school['school_code'].'"><i class="ti-eye"></i></button>';
                $edit = '<button class="btn btn-outline btn-primary btn-sm" data-toggle="modal" data-target="#admin-edit-school-modal" data-school="'.$school['school_code'].'"><i class="ti-pencil"></i></button>';
                $delete = '<button class="btn btn-outline btn-danger btn-sm" onclick="deleteSchool(\''.addslashes($school['school_code']).'\',\''.addslashes($school['school_name']).'\')"><i class="ti-trash"></i></button>';
                
                $change_password = '<button class="btn btn-default btn-sm" data-toggle="modal" data-target="#admin-change-school-password-modal" data-school="'.$school['school_code'].'"><i class="ti-lock"></i></button>';
                $send_message = '<button class="btn btn-black btn-sm" data-toggle="modal" data-target="#admin-send-school-message-modal" data-school="'.$school['school_code'].'"><i class="ti-comment-alt"></i></button>';
                
                $school_options = '<div role="group" class="btn-group mr-10">'.$view.$edit.$delete.'</div>';
                $admin_options = '<div role="group" class="btn-group">'.$change_password.$send_message.'</div>';
                $options = $school_options.$admin_options;

                $school_code = '<a href="#">'.$school['school_code'].'</a>';
                $school_name = ucwords($school['school_name']);
                $school_prefix = (!empty($school['school_prefix'])) ? $school['school_prefix'] : "-";
                $school_location = (!empty($school['school_location'])) ? $school['school_location'] : "Not Available";
                $school_email = (!empty($school['school_email'])) ? "<a href=\"mailto:".$school['school_email']."\" target=\"_blank\">".$school['school_email']."</a>" : "Not Provided";
                $school_telephone = (!empty($school['school_telephone'])) ? "<a href=\"tel:".$school['school_telephone']."\">".$school['school_telephone']."</a>" : "Not Provided";
                $school_website = (!empty($school['school_website'])) ? "<a href=\"//".$school['school_website']."\" target=\"_blank\">".$school['school_website']."</a>" : "Not Provided";
                $school_motto = (!empty($school['school_motto'])) ? $school['school_motto'] : "Not Provided";
                $school_address = (!empty($school['school_address'])) ? $school['school_address'] : "Not Provided";
                $updated_at = date_format(date_create($school['updated_at']),"j F Y  h:ia");


                $data['data'][] = array(
                   $school_code,
                   $school_name,
                   $school_prefix,
                   $school_location,
                   $school_email,
                   $school_telephone,
                   $school_website,
                   $options,
                   $updated_at,
                   '',
                   $school_motto,
                   $school_address,
                   '
                    <a href="#" data-toggle="modal" data-target="#admin-view-school-crest-modal" data-school="'.$school['school_code'].'">View</a> | 
                    <a href="#" data-toggle="modal" data-target="#admin-edit-school-crest-modal" data-school="'.$school['school_code'].'">Change</a>
                   '                
                );
            }
        }
    } catch (Exception $e) {
        echo json_encode($errors);
    }
    
    echo json_encode($data);

?>
