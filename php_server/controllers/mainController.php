<?php



class mainController {

    function get_all_users(){
        $model = new Model\mainModel();
        $result = $model->get_all_users();
        echo json_encode($result);
        exit;
    }

    function send_mail($data){
        $mailer = new Mailer\Mailer();
        $res = $mailer->send_mail($data->email,$data->message);
        echo json_encode($res);
        exit;
    }

    private function create_pdf_file(){
        $pdf = new Pdf_Creator\Pdf_Creator();
        $pdf->create_pdf();
    }



}
