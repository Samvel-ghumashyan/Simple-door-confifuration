<?php

namespace app\controllers;

use app\models\Main;
use CURLFile;
use RedBeanPHP\R;
use dconf\Controller;
use TCPDF;

/** @property Main $model */
class MainController extends Controller
{

    public function indexAction()
    {

       // phpinfo();

        if (!empty($_POST)) {

            $door = R::dispense('door');
            $door->paint_col = $_POST['paint_col'];
            $door->film_col = $_POST['film_col'];
            $door->handle_col = $_POST['handle_col'];
            $door->width_l = $_POST['width_l'];
            $door->height_l = $_POST['height_l'];
            $door->opening_l = $_POST['opening_l'];
            //$door->Acs_1 = $_POST['Acs_1'];
            isset($_POST['acs_1']) ? $door->acs_1 = $_POST['acs_1'] : $door->acs_1 = "NO";
            isset($_POST['acs_2']) ? $door->acs_2 = $_POST['acs_2'] : $door->acs_2 = "NO";
            isset($_POST['acs_3']) ? $door->acs_3 = $_POST['acs_3'] : $door->acs_3 = "NO";
            $door->pay_input = $_POST['pay_input'];
            $id = R::store($door);




            if (isset($_POST['imageNameInput']) && isset($_POST['imageDataInput'])) {
                $imgData = $_POST['imageDataInput'];
                $imgName = $_POST['imageNameInput'];

                // Save image in 'public/screenJpg' folder
                $folderPath = ROOT . '/public/screenJpg/';
                if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true); // create directory if it does not exist
                }
                $filePath = $folderPath . $imgName;
                $imgData = str_replace('data:image/jpeg;base64,', '', $imgData); // remove base64 encoding
                $imgData = str_replace(' ', '+', $imgData);
                $fileData = base64_decode($imgData); // convert base64 to image file data
                file_put_contents($filePath, $fileData); // save image file to disk


                $door_image = R::load('door', $id);
                $door_image->image_name = $imgName;
                R::store($door_image);


                sleep(0.5);

                require_once( ROOT. '/vendor/tecnickcom/tcpdf/tcpdf.php');
// Create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Telegram Owner');
                $pdf->SetTitle('Конфигуратор входной двери');
                $pdf->SetSubject('Конфигуратор входной двери');
                $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// Set default header and footer data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING);
                $pdf->setFooterData(array(0,64,0), array(0,64,128));
// Set header and footer fonts
                $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// Set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// Set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// Set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// Set image name
                $imageName = ROOT . '/public/screenJpg/' . $imgName;
// Set database data

        $form_data = R::load('door', $id);
        $html_pdf = '<h2>Конфигуратор входной двери</h2>
        <p>Цвет покраски: '.$form_data->paint_col.'</p>
        <p>Цвет пленки: '.$form_data->film_col.'</p>
        <p>Цвет ручки: '.$form_data->handle_col.'</p>
        <p>Ширина: '.$form_data->width_l.'</p>
        <p>Высота: '.$form_data->height_l.'</p>
        <p>Открывание: '.$form_data->opening_l.'</p>
        <p>Acs_1: '.$form_data->acs_1.'</p>
        <p>Acs_2: '.$form_data->acs_2.'</p>
        <p>Acs_3: '.$form_data->acs_3.'</p>
        <p>Итого: '.$form_data->pay_input.'</p> ';

// Add a page
                $pdf->AddPage();
// Set font
                $pdf->SetFont('dejavusans', '', 12);
// Insert image
                $pdf->Image($imageName, 15, 20, 90, 70, 'JPG', '', '', true, 300, '', false, false, 0, false, false, false);
// Insert database data
                $pdf->Ln(64); // move down 60 units

                $pdf->writeHTML($html_pdf, true, false, true, false, '');
// Save PDF file
                $pdfFileName = $id . '_doorPdf.pdf';
                $pdf_file_path =  ROOT .  '/public/myPdfFiles/' . $pdfFileName;
                $pdf->Output($pdf_file_path, 'F');


                sleep(0.5);

                // Send PDF to Telegram
                $telegramBotToken = 'telegram_TOKEN_Example';
                $telegramChatId = 'user_id';
                $telegramApiUrl = 'https://api.telegram.org/bot'.$telegramBotToken.'/sendDocument';
                $curl = curl_init($telegramApiUrl);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, [
                    'chat_id' => $telegramChatId,
                    'document' => new CURLfile(realpath($pdf_file_path)),
                ]);



                ob_start();

                if( curl_exec($curl) === true){
                    $response = true;
                } else {
                    $response = false;
                }
                curl_close($curl);



                $output = ob_get_clean();

                redirect($response);

                echo $output;

                exit();

            }

        }

        $allDone = '';
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('allDone'));
    }

}