<?php
session_start();
include 'include/connection.php';
$isDataAvail = FALSE;
$data_ForDisplay;
$sql = "select * from  tblparta where userID='" . $_SESSION['userID'] . "'";
if ($con->query($sql)) {
    $isDataAvail = true;
    $data_For = $con->query($sql);
    $data_ForDisplay = $data_For->fetch_assoc();
    $sql = "SELECT * FROM `tbleducationinfo` WHERE tbleducationinfo.tabAID IN(
                        SELECT tabAID FROM tblparta WHERE tblparta.userID='" . $_SESSION['userID'] . "'
                )";
    $data_For = $con->query($sql);
    $data_eduTable = $data_For->fetch_assoc();
}

function setEduData($id) {
    global $isDataAvail;
    if ($isDataAvail) {
        global $data_eduTable;
        echo $data_eduTable[$id];
    }
}

function setAvailData($id) {
    global $isDataAvail;
    if ($isDataAvail) {
        global $data_ForDisplay;
        echo $data_ForDisplay[$id];
    }
}
?>
<html>
    <head>
        <title> partA</title>
        <script src="JS/loadPhoto.js"></script>
    </head>
    <body>
        <?php include 'include/navbar.php'; ?>
        <button class="btn btn-primary" style="border-radius:0px;margin-right: 0px;position: absolute;width:7.5%">Part A</button>
        <form action="" method="post" enctype="multipart/form-data">
       <?php
        $sql="select * from partStatus where userID='".$_SESSION['userID']."'";
        $dat=$con->query($sql);
        $data=$dat->fetch_assoc();
        if(($data['isALock']=='false')){
            echo "<button class='btn btn-info' name='btnDeatilsSavePartA' type='submit' style='border-radius:0px;right: 0px;position: absolute;width:7.5%'><b>Save</b>
            </button> <button class='btn btn-info' name='btnPart_AFinalSubmit' type='submit' style='border-radius:0px;right: 7%;position: absolute;width:7.5%'><b>Lock A</b></button>";
        }
       ?>
            
       
           

            <div class="container">
                <div class="row">
                    <legend>Basic Information</legend>
                    <div class="col-sm-4">
                        Canidate's Name
                        <input type="text" class="form-control" placeholder="Candidate's Name" name="cName" value="<?php setAvailData("cName") ?>">
                    </div>
                    <div class="col-sm-4">
                        Father's/Husband's Name
                        <input type="text" class="form-control" placeholder="" name="cFatherName" value="<?php setAvailData("cFatherName") ?>">
                    </div>
                    <div class="col-sm-4">
                        Mother's Name
                        <input type="text" class="form-control" placeholder="" name="cMotherName" value="<?php setAvailData("cMotherName") ?>">
                    </div>
                    <div class="col-sm-4">
                        Permanent Address
                        <input type="text" class="form-control" placeholder="" name="cAddress" value="<?php setAvailData("cAddress") ?>">
                    </div>
                    <div class="col-sm-4">
                        Date of Birth (dd/mm/yy)
                        <input type="date" class="form-control" placeholder="" name="cDOB" value="<?php setAvailData("cDOB") ?>">
                    </div>
                    <div class="col-sm-4">
                        Place and State of Birth
                        <input type="text" class="form-control" placeholder="" name="cPlaceBirth" value="<?php setAvailData("cPlaceBirth") ?>">
                    </div>
                    <div id="aa"  class="col-sm-4">
                        Marital status 
                        <select name="cMaitalStatus" id="id_matStat" class="form-control">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <?php echo "<script>document.getElementById('id_matStat').setSelected='" . setAvailData('cMatStatus') . "';</script>"; ?>
                    </div>
                    <div class="col-sm-4">
                        Nationality
                        <input type="text" required class="form-control" placeholder="" name="cNationality" value="<?php setAvailData("cNationality") ?>">
                    </div>
                </div>
            </div>
            <div style="box-shadow: 0px 0px 2px gray;margin-top: 3px;padding: 5px">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Step 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Step 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Step 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Step 4</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane container-fluid active" id="home">
                        <center><b>School,Colleges and University attended.</b></center>
                        <table class="table table-sm table-hover table-bordered" >
                            <tr >
                                <th>Sr. No.</th>
                                <th>Institute Name</th>
                                <th>Subject</th>
                                <th>Percentage</th>
                                <th>Year</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cSchName" value="<?php setAvailData("SchName") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cSchSubject" value="<?php setAvailData("SchSubject") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cSchPer" value="<?php setAvailData("SchPer") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cSchYear" value="<?php setAvailData("SchYear") ?>"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cClzName" value="<?php setAvailData("ClzName") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cClzSubject" value="<?php setAvailData("ClzSubject") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cClzPer" value="<?php setAvailData("ClzPer") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cClzYear" value="<?php setAvailData("ClzYear") ?>"></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cUniName" value="<?php setAvailData("UniName") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cUniSubject" value="<?php setAvailData("UniSubject") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cUniPer" value="<?php setAvailData("UniPer") ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="cUniYear" value="<?php setAvailData("UniYear") ?>"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="" value=""></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="" value=""></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="" value=""></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;" class="form-control" placeholder="" name="" value=""></td>
                            </tr>


                        </table>

                        <center><b>Scholarships and fellowships with details</b></center>
                        <div class="row">
                            <div class="col-sm-4">
                                At Undergraduate level
                                <input type="text" class="form-control" placeholder="0" name="scholUG" value="<?php setAvailData("scholUG") ?>">
                            </div>
                            <div class="col-sm-4">
                                At Graduate level
                                <input type="text" class="form-control" placeholder="0" name="scholG" value="<?php setAvailData("scholG") ?>">
                            </div>
                            <div class="col-sm-4">
                                At Post-graduate level
                                <input type="text" class="form-control" placeholder="0" name="scholPG" value="<?php setAvailData("scholPG") ?>">
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane container-fluid fade" id="menu1">
                        <center><b>Educational Qualifications(including NET/SET/SLET)</b></center>
                        <table class="table table-sm table-bordered" stye=padding:"22px">
                            <tr><td>S.no.</td><td>Examination passed</td><td>Subjects</td><td>Class/Div.<br> with Hons. or distinction</td><td>%age of Marks</td><td>University/Board</td><td>Year of Passing</td><td>Remarks</td></tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" placeholder="" style="border:none;" name="examPass1" value="<?php setEduData("examP1") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="subs1" value="<?php setEduData("subject1") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="classDiv1" value="<?php setEduData("diHons1") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="perMarks1" value="<?php setEduData("perMarks1") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="uniBoard1" value="<?php setEduData("uni1") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;"  name="yOfPas1" value="<?php setEduData("passYear1") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="remarks1" value="<?php setEduData("remark1") ?>"></td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td><input type="text" placeholder="" style="border:none;" name="examPass2" value="<?php setEduData("exam2") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="subs2" value="<?php setEduData("subject2") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="classDiv2" value="<?php setEduData("diHons2") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="perMarks2" value="<?php setEduData("perMarks2") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="uniBoard2" value="<?php setEduData("uni2") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;"  name="yOfPas2" value="<?php setEduData("passYear2") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="remarks2" value="<?php setEduData("remarks2") ?>"></td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td><input type="text" placeholder="" style="border:none;" name="examPass3" value="<?php setEduData("exam3") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="subs3" value="<?php setEduData("subject3") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="classDiv3" value="<?php setEduData("diHons3") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="perMarks3" value="<?php setEduData("perMarks3") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="uniBoard3" value="<?php setEduData("uni3") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;"  name="yOfPas3" value="<?php setEduData("passYear3") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="remarks3" value="<?php setEduData("remarks3") ?>"></td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td><input type="text" placeholder="" style="border:none;" name="examPass4" value="<?php setEduData("exam4") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="subs4" value="<?php setEduData("subject4") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="classDiv4" value="<?php setEduData("diHons4") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="perMarks4" value="<?php setEduData("perMarks4") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="uniBoard4" value="<?php setEduData("uni4") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;"  name="yOfPas4" value="<?php setEduData("passYear4") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="remarks4" value="<?php setEduData("remarks4") ?>"></td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td><input type="text" placeholder="" style="border:none;" name="examPass5" value="<?php setEduData("exam5") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="subs5" value="<?php setEduData("subject5") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="classDiv5" value="<?php setEduData("diHons5") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="perMarks5" value="<?php setEduData("perMarks5") ?>"></td>
                                <td><input type="text" placeholder="" style="border:none;" name="uniBoard5" value="<?php setEduData("uni5") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;"  name="yOfPas5" value="<?php setEduData("passYear5") ?>"></td>
                                <td><input type="text" placeholder=""style="border:none;" name="remarks5" value="<?php setEduData("remarks5") ?>"></td>
                            </tr>

                        </table>

                        <div class="textbox">
                            Title of PHD : <input type="text" style="font-weight: bold;border:none;border-bottom: 1px solid black;text-transform: capitalize    " placeholder="Title of Ph.D Thesis" name="phdTitlle"  value="<?php setEduData('phdTitle') ?>">     
                        </div>

                        Details of Employment (Starting from the present position):
                        <table border="1px" >
                            <tr><td>S.no.</td><td>Institute</td><td>Designation</td><td>period(From)</td><td>period(To)</td><td>Reasons for leaving</td><td>Nature of Duties</td></tr>
                            <tr>
                                <td>1</td>
                                <td><input type="text" placeholder="" name="inst1" value="<?php setEduData("phdIns1") ?>"></td>
                                <td><input type="text" placeholder="" name="desgi1" value="<?php setEduData("phdDesi1") ?>"></td>
                                <td><input type="text" placeholder="" name="perForm1" value="<?php setEduData("phdPerFrom1") ?>"></td>
                                <td><input type="text" placeholder="" name="perTo1" value="<?php setEduData("phdPerTo1") ?>"></td>
                                <td><input type="text" placeholder="" name="leaveReson1" value="<?php setEduData("phdLeaveRes1") ?>"></td>
                                <td><input type="text" placeholder="" name="natureDut1" value="<?php setEduData("phdNuDuty1") ?>"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><input type="text" placeholder="" name="inst2" value="<?php setEduData("phdIns2") ?>"></td>
                                <td><input type="text" placeholder="" name="desgi2" value="<?php setEduData("phdDesi2") ?>"></td>
                                <td><input type="text" placeholder="" name="perForm2" value="<?php setEduData("phdPerFrom2") ?>"></td>
                                <td><input type="text" placeholder="" name="perTo2" value="<?php setEduData("phdPerTo1") ?>"></td>
                                <td><input type="text" placeholder="" name="leaveReson2" value="<?php setEduData("phdLeaveRes2") ?>"></td>
                                <td><input type="text" placeholder="" name="natureDut2" value="<?php setEduData("phdNuDuty2") ?>"></td>
                            </tr>
                            <tr><td>3</td>
                                <td><input type="text" placeholder="" name="inst3" value="<?php setEduData("phdIns3") ?>"></td>
                                <td><input type="text" placeholder="" name="desgi3" value="<?php setEduData("phdDesi3") ?>"></td>
                                <td><input type="text" placeholder="" name="perForm3" value="<?php setEduData("phdPerFrom3") ?>"></td>
                                <td><input type="text" placeholder="" name="perTo3" value="<?php setEduData("phdPerTo3") ?>"></td>
                                <td><input type="text" placeholder="" name="leaveReson3" value="<?php setEduData("phdLeavrRes3") ?>"></td>
                                <td><input type="text" placeholder="" name="natureDut3" value="<?php setEduData("phdNuDuty3") ?>"></td>    
                            </tr>
                        </table>

                    </div>
                    <div class="tab-pane container-fluid fade" id="menu2">

                        <b>Teaching Experience:</b>
                        <table border="1px" style="padding:22px">
                            <tr><td>Teaching</td><td>Class</td><td>Years</td></tr>
                            <tr><td>Undergraduate level</td>
                                <td><input type="text" placeholder="" name="expTeaUGClass" value="<?php setEduData("expTeaUGClass") ?>"></td>
                                <td><input type="text" placeholder="" name="expTeaUGYear" value="<?php setEduData("expTeaUGYears") ?>"></td>
                            </tr>
                            <tr><td>Post-graduate level</td>
                                <td><input type="text" placeholder="" name="expTeaPGClass" value="<?php setEduData("expTeaPGClass") ?>"></td>
                                <td><input type="text" placeholder="" name="expTeaPGYear" value="<?php setEduData("expTeaPGYears") ?>"></td>
                            </tr>
                        </table>
                        <pre>
                        </pre>
                        <b>Research Experience:</b>
                        <table border="1px" style="padding:22px">
                            <tr><td>Research</td><td>Class</td><td>Years</td></tr>
                            <tr><td>Post-graduate level</td>
                                <td><input type="text" placeholder="" name="resExpPGClass" value="<?php setEduData("expReaPGClass") ?>"></td>
                                <td><input type="text" placeholder="" name="resExpPGYear" value="<?php setEduData("expReaPGYears") ?>"></td>
                            </tr>
                            <tr><td>Undergraduate level</td>
                                <td><input type="text" placeholder="" name="resExpUGClass" value="<?php setEduData("expResUgClass") ?>"></td>
                                <td><input type="text" placeholder="" name="resExpUGYear" value="<?php setEduData("expResUGYears") ?>"></td></tr>
                        </table>
                        <pre>
                 
                        </pre>


                        <b>Supervisor for research degrees(Give number)</b>
                        <table border="1px" style="padding:22px">
                            <tr><td>Degree</td><td>Awarded</td><td>Thesis/Dissertation</td><td>No. of Research Scholars <br>working under him/her</td></tr>
                            <tr><td>Ph.D</td>
                                <td><input type="text" placeholder="" name="supResAwarPHD" value="<?php setEduData("resDegPHDAward") ?>"></td>
                                <td><input type="text" placeholder="" name="supResThsisPHD" value="<?php setEduData("resDegPHDThisis") ?>"></td>
                                <td><input type="text" placeholder="" name="supResEmpNoPHD" value="<?php setEduData("resDegPHDNoEmp") ?>"></td>
                            </tr>   
                            <tr><td>M.Phil</td>
                                <td><input type="text" placeholder="" name="supResAwarMphill" value="<?php setEduData("resDegMpihillAward") ?>"></td>
                                <td><input type="text" placeholder="" name="supResThsisMphil" value="<?php setEduData("resDegMphillThisis") ?>"></td>
                                <td><input type="text" placeholder="" name="supResEmpNoMphil" value="<?php setEduData("resDegMphillNoEmp") ?>"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="tab-pane container-fluid fade" id="menu3">
                        <br>
                        <div class="col-sm-4" style="display:inline-block">
                            <center><img src="./uploads/<?php  setAvailData('cImg') ?>" id="cImgPreview"  height="150" width="150" alt="Image Preview"><br></center>
                            <b>Candide Image</b>
                            <input type="file" name="cImg" onChange="loadPhoto(this, 'cImgPreview');" class="form-control">
                        </div>
                        <div class="col-sm-4" style="display: inline-block">
                            <center><img src="./uploads/<?php  setAvailData('cSign') ?>" id="cSignPreview"  height="150" width="150"><br></center>
                            <b>Candide Signature</b>
                            <input type="file" name="cSign" onChange="loadPhoto(this, 'cSignPreview');" class="form-control ">
                        </div>

                    </div>
                </div>

            </div>
        </form>

    </body>
</html>	   
<?php
if (isset($_POST['btnDeatilsSavePartA'])) {
    include 'include/connection.php';

    global $isDataAvail;
    if ($isDataAvail) {
        $sql = "delete from tbleducationinfo where tabAID IN("
                . "     select pAID from tblparta where userID='" . $_SESSION['userID'] . "'"
                . ")";
        $con->query($sql);
        $con->query("delete from tblparta where userID='" . $_SESSION['userID'] . "'");
    }

    $image = $_FILES['cImg']['name'];
    $sign = $_FILES['cSign']['name'];
    move_uploaded_file($_FILES['cImg']['tmp_name'], "./uploads/" . $image);
    move_uploaded_file($_FILES['cImg']['tmp_name'], "./uploads/" . $sign);

    $sql = "INSERT INTO `tblparta`(`cName`,`cFatherName`, `cMotherName`, `cAddress`, `cDOB`, `cPlaceBirth`, `cMatStatus`, `cNationality`, `userID`, `SchName`, `SchSubject`, `SchPer`, `SchYear`, `ClzName`, `ClzSubject`, `ClzPer`, `ClzYear`, `UniName`, `UniSubject`, `UniPer`, `UniYear`, `scholUG`, `scholG`, `scholPG`,`cImg`,`cSign`) "
            . "VALUES ('" . $_POST['cName'] . "','" . $_POST['cFatherName'] . "','" . $_POST['cMotherName'] . "','" . $_POST['cAddress'] . "',"
            . "'" . $_POST['cDOB'] . "','" . $_POST['cPlaceBirth'] . "','" . $_POST['cMaitalStatus'] . "','" . $_POST['cNationality'] . "','" . $_SESSION['userID'] . "',"
            . "'" . $_POST['cSchName'] . "','" . $_POST['cSchSubject'] . "','" . $_POST['cSchPer'] . "','" . $_POST['cSchYear'] . "','" . $_POST['cClzName'] . "',"
            . "'" . $_POST['cClzSubject'] . "','" . $_POST['cClzPer'] . "','" . $_POST['cClzYear'] . "','" . $_POST['cUniName'] . "','" . $_POST['cUniSubject'] . "',"
            . "'" . $_POST['cUniPer'] . "','" . $_POST['cUniYear'] . "','" . $_POST['scholUG'] . "','" . $_POST['scholG'] . "','" . $_POST['scholPG'] . "','" . $image . "','".$sign."')";
//    echo $sql;
    if ($con->query($sql)) {
        $sql = "select max(pAID) as ID from tblparta";
        $maxID = $con->query($sql);
        $maxID_D = $maxID->fetch_assoc();
//        echo "<script>alert('".$maxID_D['ID']."');</script>";
        $sql = "INSERT INTO `tbleducationinfo`( `tabAID`, `examP1`, `subject1`, `diHons1`, `perMarks1`, `exam2`, `subject2`, `diHons2`, `perMarks2`, `exam3`, `subject3`, `diHons3`, `perMarks3`, `exam4`, `subject4`, `diHons4`, `perMarks4`, `exam5`, `subject5`, `diHons5`, `perMarks5`, `phdTitle`, `phdIns1`, `phdDesi1`, `phdPerFrom1`, `phdPerTo1`, `phdLeaveRes1`, `phdNuDuty1`, `phdIns2`, `phdDesi2`, `phdPerFrom2`, `phdPerTo2`, `phdLeaveRes2`, `phdNuDuty2`, `phdIns3`, `phdDesi3`, `phdPerFrom3`, `phdPerTo3`, `phdLeavrRes3`, `phdNuDuty3`, `uni1`, `passYear1`, `remark1`, `uni2`, `passYear2`, `remarks2`, `uni3`, `passYear3`, `remarks3`, `uni4`, `passYear4`, `remarks4`, `uni5`, `passYear5`, `remarks5`,  `expTeaUGClass`, `expTeaUGYears`, `expTeaPGClass`, `expTeaPGYears`, `expReaPGClass`, `expReaPGYears`, `expResUgClass`, `expResUGYears`, `resDegPHDAward`, `resDegPHDThisis`, `resDegPHDNoEmp`, `resDegMpihillAward`, `resDegMphillThisis`, `resDegMphillNoEmp`) "
                . "VALUES ('" . $maxID_D['ID'] . "','" . $_POST['examPass1'] . "','" . $_POST['subs1'] . "','" . $_POST['classDiv1'] . "',"
                . "'" . $_POST['perMarks1'] . "','" . $_POST['examPass2'] . "','" . $_POST['subs2'] . "','" . $_POST['classDiv2'] . "','" . $_POST['perMarks2'] . "',"
                . "'" . $_POST['examPass3'] . "','" . $_POST['subs3'] . "','" . $_POST['classDiv3'] . "','" . $_POST['perMarks3'] . "','" . $_POST['examPass4'] . "',"
                . "'" . $_POST['subs4'] . "','" . $_POST['classDiv4'] . "','" . $_POST['perMarks4'] . "','" . $_POST['examPass5'] . "','" . $_POST['subs5'] . "',"
                . "'" . $_POST['classDiv5'] . "','" . $_POST['perMarks5'] . "','" . $_POST['phdTitlle'] . "','" . $_POST['inst1'] . "','" . $_POST['desgi1'] . "',"
                . "'" . $_POST['perForm1'] . "','" . $_POST['perTo1'] . "','" . $_POST['leaveReson1'] . "','" . $_POST['natureDut1'] . "','" . $_POST['inst2'] . "',"
                . "'" . $_POST['desgi2'] . "','" . $_POST['perForm2'] . "','" . $_POST['perTo2'] . "','" . $_POST['leaveReson2'] . "','" . $_POST['natureDut2'] . "',"
                . "'" . $_POST['inst3'] . "','" . $_POST['desgi3'] . "','" . $_POST['perForm3'] . "','" . $_POST['perTo3'] . "','" . $_POST['leaveReson3'] . "',"
                . "'" . $_POST['natureDut3'] . "','" . $_POST['uniBoard1'] . "','" . $_POST['yOfPas1'] . "','" . $_POST['remarks1'] . "','" . $_POST['uniBoard2'] . "',"
                . "'" . $_POST['yOfPas2'] . "','" . $_POST['remarks2'] . "','" . $_POST['uniBoard3'] . "','" . $_POST['yOfPas3'] . "','" . $_POST['remarks3'] . "',"
                . "'" . $_POST['uniBoard4'] . "','" . $_POST['yOfPas4'] . "','" . $_POST['remarks4'] . "','" . $_POST['uniBoard5'] . "','" . $_POST['yOfPas5'] . "','" . $_POST['remarks5'] . "',"
                . "'" . $_POST['expTeaUGClass'] . "','" . $_POST['expTeaUGYear'] . "','" . $_POST['expTeaPGClass'] . "','" . $_POST['expTeaPGYear'] . "','" . $_POST['resExpPGClass'] . "',"
                . "'" . $_POST['resExpPGYear'] . "','" . $_POST['resExpUGClass'] . "','" . $_POST['resExpUGYear'] . "','" . $_POST['supResAwarPHD'] . "','" . $_POST['supResThsisPHD'] . "',"
                . "'" . $_POST['supResEmpNoPHD'] . "','" . $_POST['supResAwarMphill'] . "','" . $_POST['supResThsisMphil'] . "','" . $_POST['supResEmpNoMphil'] . "'"
                . ")";
//        echo $sql;
        $con->query($sql);
        echo "<div class='btn-success' style='width:50%;margin:auto;border-radius:10px;padding:15px;'><b>Data Saved Sucess! </b></button>";
    }
}
if(isset($_POST['btnPart_AFinalSubmit'])){
    $sql="update partStatus set isALock='true' where userID='".$_SESSION['userID']."'";
    if($con->query($sql)){
        echo "<script>alert('Part A Locked!!');</script>";
    }
}
?>