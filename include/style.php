<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../asset/css/jquery.signature.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }
    .text_uppercase {
        text-transform: uppercase;
    }
    .app_type {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }
    .app_type div {
        margin-right: 15px;
    }
    .sn {
        width: 150px;
        font-weight: 700;
    }
    .action {
        width: 100px;
        text-align: center;
    }
    .input_group {
        border: 1px solid #ccc; 
        padding: 16px 8px 8px 8px;
        border-radius: 8px;
    }
    input, select {
        font-weight: bold !important;
    }
    .apptype {
        background-color: #1e90ff;
        color: #ffffff;
    }

    /* Open Custom Image */
    #msg_alert {
        position: fixed;
        width: auto;
        z-index: 1000;
        top: 0;
        right: 0;
        margin-top: 50px;
        margin-right: 30px;
    }
    #msg_alert span {
        color: white;
        font-weight: 500;
    }
    #i_image_con {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
    }
    #i_img_wrapper {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    #i_image_item{
        padding: 10px;
        height: 180px;
        width: 180px;
        border-radius: 8px;
        background-color: #ccc;
    }
    #i_image_content {
        height: 100%;
        width: 100%;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
    }
    .img-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        padding: 10px 13px;
    }
    .img-btn #b_image {
        margin-right: 8px;
    }

    @media only screen and (max-width: 1200px) {
        #i_image_con {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
    }
    /* Close Custom Image */
    #b_submit {
        margin-right: 5px;
    }
    #btn_update, #btn_reuse, #btn_manual {
        font-size: 30px;
        margin-right: 10px;
    }
    .print_con {
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }
    .print_con button {
        margin: 5px 0;
    }
    @media screen and (max-width: 768px) {
         .print_con button {
            width: 100%;
         }
    }
    .series_no {
        padding: 5px 10px;
        border: 1px solid #dc3545;
        color: #dc3545;
        border-radius: 7px;
    }
    .t_table td, th {
        text-align: center;
        padding: 5px;
    }
    .t_img {
        height: 100px;
    }
    .t_sig {
        width: 230px;
    }
    .id_personnel_front, .id_personnel_back {
        width: 100%;
        z-index: 1;
    }
    #profile_picture {
        width: 102px;
        height: 102px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        top: 49px;
        left: 18px;
        z-index: 100;
        position: fixed;
        border: 2px solid #00088a;
    }
    #signature_img {
        width: 97px;
        height: 22px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        /*border: 1px solid black;*/
        top: 166px;
        left: 20px;
        z-index: 150;
        position: fixed;
    }
    #_container {
        display: inline-block;
        border: 1px solid transparent;
        width: 190px;
        padding: 5;
        top: 57px;
        left: 127px;
        z-index: 100;
        position: fixed;
    }
    #fname_text, #fname_text1, #fname_text2,#fname_text3,#fname_text4 {
        color: #f5fa7e;
        text-transform: uppercase;
        font-weight: 700;
        width: 100%;
    }
    #fname_text {
        font-family: 'Roboto Condensed', sans-serif;
        font-size: 24px;
    }
    #fname_text1 {
        font-size: 22px;
        margin-top: 3px;
    }
    #fname_text2 {
        font-size: 21px;
        margin-top: 7px;
    }
    #fname_text3 {
        font-size: 20px;
        margin-top: 7px;
    }
    #fname_text4 {
        font-size: 19px;
        margin-top: 7px;
    }
    #mlname_text {
       color: white;
       text-transform: capitalize;
       font-size: 13px;
       font-weight: 700;
       width: 100%; 
       margin-top: -5px;
    }
    #bottom_con {
       margin-top: 12px;
       display: flex;
       flex-direction: row;
       justify-content: space-between;
    }
    #position_text {
       color: white;
       text-transform: uppercase;
       font-size: 11px;
       margin-top: 3px;
       width: 100px;
       line-height: 10px;
       font-weight: 700;
       
    }
    #id_number_text {
       color: white;
       text-transform: uppercase;
       font-size: 11px;
       font-weight: 700;
       width: 90px;
       text-align: right;
       
    }
    #dob_con {
        width: 185px;
        padding: 5;
        top: 167px;
        left: 195px;
        z-index: 150;
        position: fixed;

        color: black;
        text-transform: uppercase;
        font-size: 7px;
        font-weight: 600;
    }
    #address_con {
        width: 125px;
        line-height: 8px;
        padding: 5;
        top: 183px;
        left: 195px;
        z-index: 150;
        position: fixed;
    }
    #address_text {
        color: black;
        text-transform: uppercase;
        font-size: 7px;
        font-weight: 600;
    }
    #address_text1 {
        color: black;
        text-transform: uppercase;
        font-size: 7px;
        font-weight: 600;
    }
    #address_text2 {
        color: black;
        text-transform: uppercase;
        font-size: 6px;
        font-weight: 600;
    }
    #page_one, #page_two {
        contain: content;
    }

    #bt_sex_con {
        width: 245px;
        padding: 5;
        top: 17px;
        left: 70px;
        z-index: 150;
        position: fixed;
    }
    #bloodtype_text {
        color: black;
        text-transform: capitalize;
        font-size: 8px;
        font-weight: 700;
        margin-top: 1px;
    }

    #sex_text {
        color: black;
        text-transform: uppercase;
        font-size: 8px;
        font-weight: 700;
        margin-left: 75px;
        margin-top: -12px;
    }
    #id_con1 {
        border: 1px solid transparent;
        margin-top: 10px;
        margin-left: 0;
        width: 60px;
    }
    #id_con2 {
        border: 1px solid transparent;
        margin-top: -36px;
        margin-left: 75px;
        width: 60px;
    }
    #tin_text {
        font-family: 'Roboto Condensed', sans-serif;
        color: black;
        text-transform: capitalize;
        font-size: 5px;
        font-weight: 700;
    }
    #philhealth_text {
        font-family: 'Roboto Condensed', sans-serif;
        color: black;
        text-transform: capitalize;
        font-size: 5px;
        font-weight: 700;
        margin-top: 5px;
    }
    #gsis_text {
        font-family: 'Roboto Condensed', sans-serif;
        color: black;
        text-transform: capitalize;
        font-size: 5px;
        font-weight: 700;
        margin-top: 6px;
    }
    #pagibig_text {
        font-family: 'Roboto Condensed', sans-serif;
        color: black;
        text-transform: capitalize;
        font-size: 5px;
        font-weight: 700;
    }
    #sss_text {
        font-family: 'Roboto Condensed', sans-serif;
        color: black;
        text-transform: capitalize;
        font-size: 5px;
        font-weight: 700;
        margin-top: 7px;
    }
    #parent_text {
        color: black;
        text-transform: uppercase;
        font-size: 7px;
        font-weight: 700;
        margin-left: 140px;
        margin-top: -30px;
    }
    #contact_text {
        color: black;
        text-transform: uppercase;
        font-size: 6px;
        font-weight: 600;
        margin-left: 140px;
        margin-top: -2px;
    }
    #sn_text {
        color: black;
        text-transform: uppercase;
        font-size: 4px;
        font-weight: 700;
        margin-left: 200px;
        margin-top: 140px;
        margin-right: 2px;
        text-align: right;
    }
    #id_cover {
        background-color: white;
        display: block;
        z-index: 999;
        width: 100%;
        height: 100%;
        position: fixed;
    }
    #btn_printed {
        margin-top: 20px;
        margin-left: 20px;
        position: fixed;
        z-index: 1000;
    }
    @media print {
        #id_cover {
            display: none;
        }
        #btn_printed {
            display: none;
        }
    }
    .add_con {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: flex-end;
    }
    .back_con {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
    }
    .sn_field {
        color: black;
        background-color: #ced4da;
    }
    .btn_mr {
        margin-right: 5px;
    }
    #contact_con {
        width: 250px;
        padding: 5;
        top: 65px;
        left: 60px;
        z-index: 150;
        position: fixed;
    }

    /* Signature Style */
    #js-signature canvas {
        border-radius: 8px;
    }
    #signature64 {
        display: none;
    }
    #title_capture {
        line-height: 43px !important;
    }

    .card-title {
        font-weight: 700;
        font-size: 35px;
    }

    .btn_view {
        font-size: 20px;
        font-weight: 500;
    }

    #profile_picture_s {
        width: 115px;
        height: 115px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        top: 52px;
        left: 6px;
        z-index: 100;
        position: fixed;
        border: 2px solid #fdee55;
    }
    #signature_img_s {
        width: 95px;
        height: 40px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        border: 1px solid transparent;
        top: 240px;
        left: 57px;
        z-index: 150;
        position: fixed;
    }
    #college_name {
        z-index: 5;
        position: fixed;
        top: 173px;
        left: 6px;
        border: 1px solid transparent;
        width: 197px;
        text-align: center;
        font-weight: 700;
        line-height: 15px;
        font-size: 9px;
        color: #132d4b;
    }
    #college_s {
        line-height: 10px !important;
        margin-bottom: 10px;
    }
    #lastname_con {
        margin-top: 7px;
    }
    #lastname_s {
        color: #ba000c;
        font-size: 25px;
        font-weight: 700;
        padding: 0 4px;
    }
    #first_middle {
        margin-top: 0px;
        font-size: 15px;
    }
    #top_side {
        width: 75px;
        border: 1px solid transparent;
        top: 60px;
        left: 127px;
        z-index: 5;
        position: fixed;
        height: 36px;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    #campus_s {
        line-height: 10px;
        font-size: 8px;
        font-weight: 700;
        color: #132d4b;
        text-align: center;
    }
    #id_s {
        width: 75px;
        border: 1px solid transparent;
        top: 107px;
        left: 127px;
        z-index: 5;
        position: fixed;

        line-height: 10px;
        font-size: 16px;
        font-weight: 500;
        color: #ffffff;
        text-align: center;
        /* font-family: 'Roboto Condensed', sans-serif; */
        /* font-family: 'Oswald', sans-serif; */
        font-family: 'Bebas Neue', cursive;
    }
    #course_s {
        width: 75px;
        border: 1px solid transparent;
        top: 127px;
        left: 127px;
        z-index: 5;
        position: fixed;
        background-color: #132d4b;
        padding: 3px 3px 2px;
        text-align: center;
    }
    #course_s div {
        font-weight: 700;
        color: white;
        font-family: 'Roboto Condensed', sans-serif;
    }
    #course_1 {
        line-height: 14px;
        font-size: 20px;
        padding-bottom: 1px;
    }
    #course_2 {
        line-height: 14px;
        font-size: 16px;
    }
    #contact_s {
        width: 190px;
        border: 1px solid transparent;
        text-align: center;
        color: black;

        top: 36px;
        left: 10px;
        z-index: 5;
        position: fixed;
    }
    #parent_s {
        font-size: 13px;
        font-weight: 700;
    }
    #contact_num_s {
        margin-top: -5px;
        font-size: 10px;
        font-weight: 500;
    }
    #address_s {
        margin-top: -2px;
        font-size: 7px;
        font-weight: 500;
    }
    #bd_s {
        top: 97px;
        left: 15px;
        width: 85px;
        z-index: 5;
        position: fixed;
        font-weight: 700;
        color: black;
    }
    #sex_s {
        top: 86px;
        left: 158px;
        z-index: 5;
        position: fixed;
        width: 30px;
        font-weight: 700;
        color: black;
    }
    #bloodtype_s {
        top: 97px;
        left: 158px;
        z-index: 5;
        position: fixed;
        width: 30px;
        font-weight: 700;
        color: black;
    }
    #bd_s, #sex_s, #bloodtype_s {
        font-size: 8px;
    }
    #sn_s {
        top: 310px;
        left: 15px;
        z-index: 5;
        position: fixed;
        width: 120px;
        font-weight: 400;
        font-size: 6px;
        color: black;
    }
    .page_two_flip {
        transform: rotate(0deg);
    }
    .page_one_flip {
        transform: rotate(180deg);
    }
    .page_one_flip1 {
        transform: rotate(0deg);
        height: 100vh;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }
    .page_two_flip2 {
        transform: rotate(0deg);
        height: 100vh;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    #page_fixed {
        height:85.6mm !important;
        width: 54mm !important;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }
    #content_fixed {
        transform: scale(.95);
        position: fixed;
        z-index: 100;
        margin-top: 0px;
        margin-left: 4.25px;
    }
    #content_fixed2 {
        transform: scale(1);
        position: fixed;
        z-index: 100;
    }
    #preview_btn_con {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    #preview_btn_wrap1 {
        text-align: right;
    }
    #preview_btn_wrap1 div {
        width: 100%;
        margin-bottom: 3px;
    }
    @media screen and (max-width: 1010px) {
        #preview_btn_con {
            flex-direction: column;
        }
        #preview_btn_wrap button, #preview_btn_wrap1 button {
            width: 60%;
            margin: 5px 0;
        }
        #preview_btn_wrap {
            text-align: center;
        }
        #preview_btn_wrap1 {
            padding-top: 15px;
            text-align: center;
        }
    }
    @media screen and (max-width: 991px) {
        #preview_btn_wrap button, #preview_btn_wrap1 button {
            width: 80%;
        }
    }
    @media screen and (max-width: 991px) {
        #preview_btn_wrap button, #preview_btn_wrap1 button {
            width: 100%;
        }
    }
    .btn_adjust {
        padding-bottom: 13px;
    }
    .login_center {
        height: 100vh;
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    #icto_logo {
        width: 150px;
    }
    .sign_out {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
    }
    .sign_out span {
        padding: 2px 8px;
        background-color: #dc3545;
        width: auto;
        color: white;
        font-weight: 500;
        border-radius: 50px;
    }
    .sign_out span i {
        padding: 2px 2px 0 2px; 
        background-color: white; 
        color: #dc3545; 
        border-radius: 50px;
    }
</style>