<?php
session_start();
include 'include/connection.php';
$isDataAvail = FALSE;
$data_ForDisplay;
$sql = "select * from  tblpartb where userID='" . $_SESSION['userID'] . "'";
echo $sql;
if ($con->query($sql)) {
    $isDataAvail = true;
    $data_For = $con->query($sql);
    $data_ForDisplay = $data_For->fetch_assoc();
    $sql = "SELECT * FROM `tblpartb2` WHERE tblpartb2.tabBID IN(
                        SELECT tabBID FROM tblpartb WHERE tblpartb.userID='" . $_SESSION['userID'] . "'
                )";
    $data_For = $con->query($sql);
    $data_eduTable = $data_For->fetch_assoc();
}

function setB2Data($id) {
    global $isDataAvail;
    if ($isDataAvail) {
        global $data_eduTable;
        echo $data_eduTable[$id];
    }
}

function setBData($id) {
    global $isDataAvail;
    if ($isDataAvail) {
        global $data_ForDisplay;
        echo $data_ForDisplay[$id];
    }
}
?>
<html>
    <head>
        <title> AMU (Part B)</title>
    </head>
    <body > 
        <?php include 'include/navbar.php'; ?>
        <div style="position: fixed;float: right;left: 10px;padding: 9px 20px 9px 20px;" class="btn-primary">Part B</div>

        <br>
        <div class="container-fluid">
            <form name="form" method="post" action="">
                  <?php
        $sql="select * from partStatus where userID='".$_SESSION['userID']."'";
        $dat=$con->query($sql);
        $data=$dat->fetch_assoc();
        if(($data['isBLock']=='false')){
            echo "
                <button type='submit' style='position: fixed;border: none;float: right;right: 10px;top:7%;padding: 9px 30px 9px 30px;z-index: 1'  class='btn-info' name='btn_BSave'>Save</button>
                 <button class='btn btn-info' name='btnPart_BFinalSubmit' type='submit' style='position: fixed;border: none;float: right;right: 6.7%;top:7%;padding: 9px 30px 9px 30px;z-index: 1'><b>Lock B</b></button>";
        }
       ?>

                <br>
                <ul class="nav nav-tabs" style="position: fixed;top:7%;left: 100px;background-color: white;width: 100%">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Step 1 & 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Step 3 & 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Step 5 & 6</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane container active" id="home">
                        <h5><b><u> Research Papers in Peer-Reviewed or UGC Listed Journals</u></b></h5>
                        <table class="table table-sm table-bordered table-striped" >
                            <tr>    
                                <th>S.no.</th>
                                <th>Title of Journal,<br>Volume,Issue,<br>Page no,Years</th>
                                <th>Title of the paper</th><th>ISSN/ISBN<br>no.</th>
                                <th>Whether peer<br>reviewed or UGC<br>Listed(Impact<br>Factor,if any)</th><th>No.of<br>co-author</th>
                                <th>Whether you are<br>the first/principal/<br>corresponding author</th><th>score</th><th>Supporting <br>Document</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_journallTitle1" value="<?php setBData("a_journallTitle1"); ?>" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_paperTitle1" value="<?php setBData("a_paperTitle1"); ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_ISBN1" value="<?php setBData("a_ISBN1"); ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_UGCRev1" value="<?php setBData("a_UGCRev1"); ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_coAuthNo1" value="<?php setBData("a_coAuthNo1"); ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_AutherFirst1" value="<?php setBData("a_AutherFirst1"); ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_Score1" value="<?php setBData("a_Score1"); ?>"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control"  name="a_SupDoc1" value="<?php setBData("a_SupDoc1"); ?>"></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_journallTitle2"); ?>" name="a_journallTitle2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_paperTitle2"); ?>" name="a_paperTitle2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_ISBN2"); ?>" name="a_ISBN2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_UGCRev2"); ?>" name="a_UGCRev2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_coAuthNo2"); ?>" name="a_coAuthNo2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_AutherFirst2"); ?>" name="a_AutherFirst2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_Score2"); ?>" name="a_Score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_SupDoc2"); ?>" name="a_SupDoc2" ></td>

                            </tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_journallTitle3"); ?>" name="a_journallTitle3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_paperTitle3"); ?>" name="a_paperTitle3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_ISBN3"); ?>" name="a_ISBN3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_UGCRev3"); ?>" name="a_UGCRev3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_coAuthNo3"); ?>" name="a_coAuthNo3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_AutherFirst3"); ?>" name="a_AutherFirst3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_Score3"); ?>" name="a_Score3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("a_SupDoc3"); ?>" name="a_SupDoc3" ></td>
                            </tr>   
                        </table>

                        <h5><b><u> 2(a) Books/Monograph authored</u></b></h5>
                        <table class="table table-sm table-bordered " >
                            <tr><th>S.no.</th><th>Books/Monograph<br>title & publisher</th><th>Year</th><th>ISSN/ISBN<br>no.</th>
                                <th>Complete Book<br>if chapter only<br>(Specify title &<br>page nos.)</th><th>Whether<br>you are the author/<br>Editor</th>
                                <th>No.of Co-<br>author(s)/<br>Co-<br>Editor(s)<br></th><th>International/<br>national<br>publisher<br>specify</th><th>score</th><th>Supporting <br>Document</th>
                            </tr>
                            <tr>
                                <td>1</td>

                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_bookPublish1"); ?>" name="b_bookPublish1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_Year1"); ?>" name="b_Year1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_ISBN1"); ?>" name="b_ISBN1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_bookComplete1"); ?>" name="b_bookComplete1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_author1"); ?>" name="b_author1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_authorNo1"); ?>" name="b_authorNo1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_speciPublish1"); ?>" name="b_speciPublish1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_score1"); ?>" name="b_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_supportDoc1"); ?>" name="b_supportDoc1" ></td>
                            </tr>
                            <tr>
                                <td >2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_bookPublish2"); ?>" name="b_bookPublish2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_Year2"); ?>" name="b_Year2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_ISBN2"); ?>" name="b_ISBN2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_bookComplete2"); ?>" name="b_bookComplete2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_author2"); ?>" name="b_author2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_authorNo2"); ?>" name="b_authorNo2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_speciPublish2"); ?>" name="b_speciPublish2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_score2"); ?>" name="b_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_supportDoc2"); ?>" name="b_supportDoc2" ></td>
                            </tr>
                            <tr>
                                <td >3</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_bookPublish3"); ?>" name="b_bookPublish3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_Year3"); ?>" name="b_Year3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_ISBN3"); ?>" name="b_ISBN3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_bookComplete3"); ?>" name="b_bookComplete3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_author3"); ?>" name="b_author3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_authorNo3"); ?>" name="b_authorNo3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_speciPublish3"); ?>" name="b_speciPublish3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_score3"); ?>" name="b_score3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b_supportDoc3"); ?>" name="b_supportDoc3" ></td>
                            </tr>
                        </table>

                        <h5><b><u>  2(b) Participation in Solo Show(not less than three days)/Group Exhibitions with evidence of Invitation,<br>Catalogue or news coverage/International Participation in Art Workshop/Art camps:</u></b></h5>
                        <table class="table table-sm table-bordered table-striped">
                            <tr><th>S.no.</th><th>Title</th><th>Show/s</th><th>Place</th><th>Sponsor/Curator</th><th>National/International</th><th>score claimed</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_title1"); ?>" name="b2_title1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_show1"); ?>" name="b2_show1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_place1"); ?>" name="b2_place1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_sponsor1"); ?>" name="b2_sponsor1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_national1"); ?>" name="b2_national1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_clamScore1"); ?>" name="b2_clamScore1" ></td>
                            </tr>
                            <tr>
                                <td>2</td><td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_title2"); ?>" name="b2_title2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_show2"); ?>" name="b2_show2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_place2"); ?>" name="b2_place2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_sponsor2"); ?>" name="b2_sponsor2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_national2"); ?>" name="b2_national2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_clamScore2"); ?>" name="b2_clamScore2" ></td>
                            </tr>
                            <tr>
                                <td>3</td><td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_title3"); ?>" name="b2_title3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_show3"); ?>" name="b2_show3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_place3"); ?>" name="b2_place3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_sponsor3"); ?>" name="b2_sponsor3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_national3"); ?>" name="b2_national3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b2_clamScore3"); ?>" name="b2_clamScore3" ></td>
                            </tr>
                        </table>

                        <h5><b><u>                         2(c)&nbsp&nbsp Translation works in Indian and Foreign Language</u></b></h5>
                        <table class="table table-sm table-bordered table-striped" >
                            <tr><th>S.no.</th><th>Title of Book/<br>Monograph/Chapter<br>Research paper with<br>page nos.</th>
                                <th>Year</th><th>Details of <br>Translation<br>Work</th><th>ISSN/ISBN<br>no.<br></th><th>No.of co-<br>translator<br>(in case more<br>than one)</th><th>Whether you<br> are the main<br> translator<br>(Y/N)</th><th>score</th><th>Supporting <br>Document</th></tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_bookTitle1"); ?>" name="b3_bookTitle1"></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_year1"); ?>" name="b3_year1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_workTraslation1"); ?>" name="b3_workTraslation1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_ISBN1"); ?>" name="b3_ISBN1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_translatorNo1"); ?>" name="b3_translatorNo1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_mainTranslator1"); ?>" name="b3_mainTranslator1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_score1"); ?>" name="b3_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_docSupport1"); ?>" name="b3_docSupport1" ></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_bookTitle2"); ?>" name="b3_bookTitle2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_year2"); ?>" name="b3_year2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_workTraslation2"); ?>" name="b3_workTraslation2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_ISBN2"); ?>" name="b3_ISBN2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_translatorNo2"); ?>" name="b3_translatorNo2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_mainTranslator2"); ?>" name="b3_mainTranslator2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_score2"); ?>" name="b3_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_docSupport2"); ?>" name="b3_docSupport2" ></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_bookTitle3"); ?>" name="b3_bookTitle3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_year3"); ?>" name="b3_year3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_workTraslation3"); ?>" name="b3_workTraslation3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_ISBN3"); ?>" name="b3_ISBN3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_translatorNo3"); ?>" name="b3_translatorNo3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_mainTranslator3"); ?>" name="b3_mainTranslator3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_score3"); ?>" name="b3_score3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("b3_docSupport3"); ?>" name="b3_docSupport3" ></td>
                            </tr>
                        </table>


                    </div>
                    <div class="tab-pane container fade" id="menu1">
                        <br>
                        <h5><b><u>3(a)&nbsp&nbsp Development of Innovation pedagogy</u></b></h5>
                        <table class="table table-sm table-bordered table-striped">
                            <tr><td>S.no.</td><td>Description</td><td>score</td><td>Supporting Document</td></tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_des1"); ?>" name="c1_des1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_score1"); ?>" name="c1_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_docSupport1"); ?>" name="c1_docSupport1" ></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_des2"); ?>" name="c1_des2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_score2"); ?>" name="c1_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_docSupport2"); ?>" name="c1_docSupport2" ></td>
                            </tr>
                            <tr><td>3</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_des3"); ?>" name="c1_des3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_score3"); ?>" name="c1_score3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c1_docSupport3"); ?>" name="c1_docSupport3" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>3(b) Design of new curricular pedagogy</u></b></h5>
                        <table class="table table-sm table-bordered ">

                            <tr><td>S.no.</td><td>Description</td><td>score</td><td>Supporting Document</td></tr>
                            <tr>
                                <td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_des1"); ?>" name="c2_des1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_score1"); ?>" name="c2_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_docSupport1"); ?>" name="c2_docSupport1" ></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_des2"); ?>" name="c2_des2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_score2"); ?>" name="c2_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_docSupport2"); ?>" name="c2_docSupport2" ></td>
                            </tr>
                            <tr><td>3</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_des3"); ?>" name="c2_des3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_score3"); ?>" name="c2_score3" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("c2_docSupport3"); ?>" name="c2_docSupport3" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>4(a)&nbsp&nbsp Research Guidance</u></b></h5>
                        <table class="table table-sm table-bordered table-striped">

                            <tr><td>S.no.</td><td>Number Enrolled</td><td>Thesis Submitted</td><td>Degree awarded</td><td>score</td><td>Supporting Document</td></tr>
                            <tr><td>M.Phil/P.G.<br>dissertation</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_enrolledNo1"); ?>" name="d1_enrolledNo1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_thsis1"); ?>" name="d1_thsis1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_awardDegree1"); ?>" name="d1_awardDegree1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_score1"); ?>" name="d1_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_docSupport1"); ?>" name="d1_docSupport1" ></td>
                            </tr>
                            <tr><td>Ph.D. or<br>equivalent</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_enrolledNo2"); ?>" name="d1_enrolledNo2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_thsis2"); ?>" name="d1_thsis2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_awardDegree2"); ?>" name="d1_awardDegree2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_score2"); ?>" name="d1_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d1_docSupport2"); ?>" name="d1_docSupport2" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>4(b)&nbsp&nbsp Research Project/s Completed</u></b></h5>
                        <table class="table table-sm table-bordered">

                            <tr><td>S.no.</td><td>Title</td><td>Agency</td><td>Period</td><td>Grant/Amount<br>Mobilized<br>(Rs.in Lakh)</td><td>Whether you are <br>Principal Investigator/<br>Co-Investigator<td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_title1"); ?>" name="d2_title1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_agency1"); ?>" name="d2_agency1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_period1"); ?>" name="d2_period1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_grantAmt1"); ?>" name="d2_grantAmt1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_isPrincipal1"); ?>" name="d2_isPrincipal1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_score1"); ?>" name="d2_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_supDoc1"); ?>" name="d2_supDoc1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_title2"); ?>" name="d2_title2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_agency2"); ?>" name="d2_agency2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_period2"); ?>" name="d2_period2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_grantAmt2"); ?>" name="d2_grantAmt2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_isPrincipal2"); ?>" name="d2_isPrincipal2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_score2"); ?>" name="d2_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d2_supDoc2"); ?>" name="d2_supDoc2" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>4(c)&nbsp&nbsp Ongoing Research Project/s</u></b></h5>
                        <table class="table table-sm table-bordered table-striped">

                            <tr><td>S.no.</td><td>Title</td><td>Agency</td><td>Period</td><td>Grant/Amount<br>Mobilized<br>(Rs.in Lakh)</td><td>Whether you are <br>Principal Investigator/<br>Co-Investigator<td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_title1"); ?>" name="d3_title1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_agency1"); ?>" name="d3_agency1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_period1"); ?>" name="d3_period1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_grantAmt1"); ?>" name="d3_grantAmt1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_isPrincipal1"); ?>" name="d3_isPrincipal1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_score1"); ?>" name="d3_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_supDoc1"); ?>" name="d3_supDoc1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_title2"); ?>" name="d3_title2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_agency2"); ?>" name="d3_agency2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_period2"); ?>" name="d3_period2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_grantAmt2"); ?>" name="d3_grantAmt2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_isPrincipal2"); ?>" name="d3_isPrincipal2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_score2"); ?>" name="d3_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d3_supDoc2"); ?>" name="d3_supDoc2" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>4(d)&nbsp&nbsp Consultancy</u></b></h5>
                        <table class="table table-sm table-bordered " >
                            <tr><td>S.no.</td><td>Title</td><td>Agency</td><td>Period</td><td>Amount Mobilized<br>(Rs.in Lakh)</td><td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setBData("d4_title1"); ?>" name="d4_title1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_agency1"); ?>" name="d4_agency1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_period1"); ?>" name="d4_period1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_grantAmt1"); ?>" name="d4_grantAmt1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_score1"); ?>" name="d4_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_supDoc1"); ?>" name="d4_supDoc1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_title2"); ?>" name="d4_title2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_agency2"); ?>" name="d4_agency2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_period2"); ?>" name="d4_period2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_grantAmt2"); ?>" name="d4_grantAmt2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_score2"); ?>" name="d4_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("d4_supDoc2"); ?>" name="d4_supDoc2" ></td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane container fade" id="menu2">
                        <h5><b><u>5(a)&nbsp&nbsp Patents</u></b></h5>
                        <table class="table table-sm table-bordered table-striped">
                            <tr><td>S.no.</td><td>Title of Patent</td><td>International/<br>National</td><td>Patent No.</td><td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_patents1"); ?>" name="e1_patents1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_national1"); ?>" name="e1_national1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_patentNo1"); ?>" name="e1_patentNo1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_score1"); ?>" name="e1_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_supportDoc1"); ?>" name="e1_supportDoc1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_patents2"); ?>" name="e1_patents2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_national2"); ?>" name="e1_national2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_patentNo2"); ?>" name="e1_patentNo2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_score2"); ?>" name="e1_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e1_supportDoc2"); ?>" name="e1_supportDoc2" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>5(b) *Policy Document(Submitted to an internation body/organization like UNO/UNESCO/World Bank/ internation Monetary Fund etc. or Central Government or State Government)</u></b></h5>
                        <table class="table table-sm table-bordered">

                            <tr><td>S.no.</td><td>Description</td><td>Year</td><td>International/<br>National/State</td><td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_desc1"); ?>" name="e2_desc1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_year1"); ?>" name="e2_year1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_national1"); ?>" name="e2_national1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_score1"); ?>" name="e2_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_docSupport1"); ?>" name="e2_docSupport1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_desc2"); ?>" name="e2_desc2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_year2"); ?>" name="e2_year2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_national2"); ?>" name="e2_national2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_score2"); ?>" name="e2_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e2_docSupport2"); ?>" name="e2_docSupport2" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>5(c)&nbsp&nbsp Awards/Fellowships</u></b></h5>
                        <table class="table table-sm table-bordered table-striped">

                            <tr><td>S.no.</td><td>Name of the Awards/<br>Fellowships</td><td>year</td><td>International/<br>National</td><td>Awarding Body</td><td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_desc1"); ?>" name="e3_desc1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_year1"); ?>" name="e3_year1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_national1"); ?>" name="e3_national1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_awardBody1"); ?>" name="e3_awardBody1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_score1"); ?>" name="e3_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_docSupport1"); ?>" name="e3_docSupport1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_desc2"); ?>" name="e3_desc2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_year2"); ?>" name="e3_year2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_national2"); ?>" name="e3_national2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_awardBody2"); ?>" name="e3_awardBody2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_score2"); ?>" name="e3_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("e3_docSupport2"); ?>" name="e3_docSupport2" ></td>
                            </tr>
                        </table>

                        <br>
                        <br>
                        <h5><b><u>6 Invite lectures/Artist/Resource Person/Paper presentation in Seminars/Conferences/Residencies/full paper in Conference Proceedings (Paper presented in Seminars/Conferences and also published as full paper in Conference Proceedings will be counted only once) </u></b></h5>
                        <table class="table table-sm table-bordered">

                            <tr><td>S.no.</td><td>Title</td><td>Name of the event/<br>organizer/Institute</td><td>Year</td><td>International/National/<br>State/University</td><td>Score</td><td>Supporting<br>Document</td></tr>
                            <tr><td>1</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_desc1"); ?>" name="f_desc1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_nameOfEvent1"); ?>" name="f_nameOfEvent1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_year1"); ?>" name="f_year1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_national1"); ?>" name="f_national1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_score1"); ?>" name="f_score1" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_docSupport1"); ?>" name="f_docSupport1" ></td>
                            </tr>
                            <tr><td>2</td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_desc2"); ?>" name="f_desc2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_nameOfEvent2"); ?>" name="f_nameOfEvent2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_year2"); ?>" name="f_year2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_national2"); ?>" name="f_national2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_score2"); ?>" name="f_score2" ></td>
                                <td style="padding: 0px;"><input type="text" style="border:none;background-color: transparent" class="form-control" value="<?php setB2Data("f_docSupport2"); ?>" name="f_docSupport2" ></td>
                            </tr>
                        </table>

                    </div>
                </div>




            </form>
        </div>
    </body>
</html>	   
<?php
if (isset($_POST['btn_BSave'])) {
    include 'include/connection.php';
    global $isDataAvail;
    if ($isDataAvail) {
        $sql = "delete from tblpartb2 where tabBID IN("
                . "     select tabBID from tblpartb where userID='" . $_SESSION['userID'] . "'"
                . ")";
        $con->query($sql);
        $con->query("delete from tblpartb where userID='" . $_SESSION['userID'] . "'");
    }


    $sql = "INSERT INTO `tblpartb`( `a_journallTitle1`, `a_paperTitle1`, `a_ISBN1`, `a_UGCRev1`, `a_coAuthNo1`, `a_AutherFirst1`, `a_Score1`, `a_SupDoc1`, `a_journallTitle2`, `a_paperTitle2`, `a_ISBN2`, `a_UGCRev2`, `a_coAuthNo2`, `a_AutherFirst2`, `a_Score2`, `a_SupDoc2`, `a_journallTitle3`, `a_paperTitle3`, `a_ISBN3`, `a_UGCRev3`, `a_coAuthNo3`, `a_AutherFirst3`, `a_Score3`, `a_SupDoc3`, `b_bookPublish1`, `b_Year1`, `b_ISBN1`, `b_bookComplete1`, `b_author1`, `b_authorNo1`, `b_speciPublish1`, `b_score1`, `b_supportDoc1`, `b_bookPublish2`, `b_Year2`, `b_ISBN2`, `b_bookComplete2`, `b_author2`, `b_authorNo2`, `b_speciPublish2`, `b_score2`, `b_supportDoc2`, `b_bookPublish3`, `b_Year3`, `b_ISBN3`, `b_bookComplete3`, `b_author3`, `b_authorNo3`, `b_speciPublish3`, `b_score3`, `b_supportDoc3`, `b2_title1`, `b2_show1`, `b2_place1`, `b2_sponsor1`, `b2_national1`, `b2_clamScore1`, `b2_title2`, `b2_show2`, `b2_place2`, `b2_sponsor2`, `b2_national2`, `b2_clamScore2`, `b2_title3`, `b2_show3`, `b2_place3`, `b2_sponsor3`, `b2_national3`, `b2_clamScore3`, `b3_bookTitle1`, `b3_year1`, `b3_workTraslation1`, `b3_ISBN1`, `b3_translatorNo1`, `b3_mainTranslator1`, `b3_score1`, `b3_docSupport1`, `b3_bookTitle2`, `b3_year2`, `b3_workTraslation2`, `b3_ISBN2`, `b3_translatorNo2`, `b3_mainTranslator2`, `b3_score2`, `b3_docSupport2`, `b3_bookTitle3`, `b3_year3`, `b3_workTraslation3`, `b3_ISBN3`, `b3_translatorNo3`, `b3_mainTranslator3`, `b3_score3`, `b3_docSupport3`, `c1_des1`, `c1_score1`, `c1_docSupport1`, `c1_des2`, `c1_score2`, `c1_docSupport2`, `c1_des3`, `c1_score3`, `c1_docSupport3`, `c2_des1`, `c2_score1`, `c2_docSupport1`, `c2_des2`, `c2_score2`, `c2_docSupport2`, `c2_des3`, `c2_score3`, `c2_docSupport3`, `d1_enrolledNo1`, `d1_thsis1`, `d1_awardDegree1`, `d1_score1`, `d1_docSupport1`, `d1_enrolledNo2`, `d1_thsis2`, `d1_awardDegree2`, `d1_score2`, `d1_docSupport2`, `d2_title1`, `d2_agency1`, `d2_period1`, `d2_grantAmt1`, `d2_isPrincipal1`, `d2_score1`, `d2_supDoc1`, `d2_title2`, `d2_agency2`, `d2_period2`, `d2_grantAmt2`, `d2_isPrincipal2`, `d2_score2`, `d2_supDoc2`, `d3_title1`, `d3_agency1`, `d3_period1`, `d3_grantAmt1`, `d3_isPrincipal1`, `d3_score1`, `d3_supDoc1`, `d3_title2`, `d3_agency2`, `d3_period2`, `d3_grantAmt2`, `d3_isPrincipal2`, `d3_score2`, `d3_supDoc2`, `d4_title1`,`userID`) VALUES"
            . " ('" . $_POST['a_journallTitle1'] . "','" . $_POST['a_paperTitle1'] . "','" . $_POST['a_ISBN1'] . "','" . $_POST['a_UGCRev1'] . "','" . $_POST['a_coAuthNo1'] . "','" . $_POST['a_AutherFirst1'] . "','" . $_POST['a_Score1'] . "','" . $_POST['a_SupDoc1'] . "','" . $_POST['a_journallTitle2'] . "',"
            . "'" . $_POST['a_paperTitle2'] . "','" . $_POST['a_ISBN2'] . "','" . $_POST['a_UGCRev2'] . "','" . $_POST['a_coAuthNo2'] . "','" . $_POST['a_AutherFirst2'] . "','" . $_POST['a_Score2'] . "','" . $_POST['a_SupDoc2'] . "','" . $_POST['a_journallTitle3'] . "','" . $_POST['a_paperTitle3'] . "','" . $_POST['a_ISBN3'] . "',"
            . "'" . $_POST['a_UGCRev3'] . "','" . $_POST['a_coAuthNo3'] . "','" . $_POST['a_AutherFirst3'] . "','" . $_POST['a_Score3'] . "','" . $_POST['a_SupDoc3'] . "','" . $_POST['b_bookPublish1'] . "','" . $_POST['b_Year1'] . "','" . $_POST['b_ISBN1'] . "','" . $_POST['b_bookComplete1'] . "','" . $_POST['b_author1'] . "',"
            . "'" . $_POST['b_authorNo1'] . "','" . $_POST['b_speciPublish1'] . "','" . $_POST['b_score1'] . "','" . $_POST['b_supportDoc1'] . "','" . $_POST['b_bookPublish2'] . "','" . $_POST['b_Year2'] . "','" . $_POST['b_ISBN2'] . "','" . $_POST['b_bookComplete2'] . "','" . $_POST['b_author2'] . "','" . $_POST['b_authorNo2'] . "',"
            . "'" . $_POST['b_speciPublish2'] . "','" . $_POST['b_score2'] . "','" . $_POST['b_supportDoc2'] . "','" . $_POST['b_bookPublish3'] . "','" . $_POST['b_Year3'] . "','" . $_POST['b_ISBN3'] . "','" . $_POST['b_bookComplete3'] . "','" . $_POST['b_author3'] . "','" . $_POST['b_authorNo3'] . "','" . $_POST['b_speciPublish3'] . "',"
            . "'" . $_POST['b_score3'] . "','" . $_POST['b_supportDoc3'] . "','" . $_POST['b2_title1'] . "','" . $_POST['b2_show1'] . "','" . $_POST['b2_place1'] . "','" . $_POST['b2_sponsor1'] . "','" . $_POST['b2_national1'] . "','" . $_POST['b2_clamScore1'] . "','" . $_POST['b2_title2'] . "','" . $_POST['b2_show2'] . "',"
            . "'" . $_POST['b2_place2'] . "','" . $_POST['b2_sponsor2'] . "','" . $_POST['b2_national2'] . "','" . $_POST['b2_clamScore2'] . "','" . $_POST['b2_title3'] . "','" . $_POST['b2_show3'] . "','" . $_POST['b2_place3'] . "','" . $_POST['b2_sponsor3'] . "','" . $_POST['b2_national3'] . "','" . $_POST['b2_clamScore3'] . "',"
            . "'" . $_POST['b3_bookTitle1'] . "','" . $_POST['b3_year1'] . "','" . $_POST['b3_workTraslation1'] . "','" . $_POST['b3_ISBN1'] . "','" . $_POST['b3_translatorNo1'] . "','" . $_POST['b3_mainTranslator1'] . "','" . $_POST['b3_score1'] . "','" . $_POST['b3_docSupport1'] . "','" . $_POST['b3_bookTitle2'] . "','" . $_POST['b3_year2'] . "',"
            . "'" . $_POST['b3_workTraslation2'] . "','" . $_POST['b3_ISBN2'] . "','" . $_POST['b3_translatorNo2'] . "','" . $_POST['b3_mainTranslator2'] . "','" . $_POST['b3_score2'] . "','" . $_POST['b3_docSupport2'] . "','" . $_POST['b3_bookTitle3'] . "','" . $_POST['b3_year3'] . "','" . $_POST['b3_workTraslation3'] . "','" . $_POST['b3_ISBN3'] . "',"
            . "'" . $_POST['b3_translatorNo3'] . "','" . $_POST['b3_mainTranslator3'] . "','" . $_POST['b3_score3'] . "','" . $_POST['b3_docSupport3'] . "','" . $_POST['c1_des1'] . "','" . $_POST['c1_score1'] . "','" . $_POST['c1_docSupport1'] . "','" . $_POST['c1_des2'] . "','" . $_POST['c1_score2'] . "','" . $_POST['c1_docSupport2'] . "',"
            . "'" . $_POST['c1_des3'] . "','" . $_POST['c1_score3'] . "','" . $_POST['c1_docSupport3'] . "','" . $_POST['c2_des1'] . "','" . $_POST['c2_score1'] . "','" . $_POST['c2_docSupport1'] . "','" . $_POST['c2_des2'] . "','" . $_POST['c2_score2'] . "','" . $_POST['c2_docSupport2'] . "','" . $_POST['c2_des3'] . "',"
            . "'" . $_POST['c2_score3'] . "','" . $_POST['c2_docSupport3'] . "','" . $_POST['d1_enrolledNo1'] . "','" . $_POST['d1_thsis1'] . "','" . $_POST['d1_awardDegree1'] . "','" . $_POST['d1_score1'] . "','" . $_POST['d1_docSupport1'] . "','" . $_POST['d1_enrolledNo2'] . "','" . $_POST['d1_thsis2'] . "','" . $_POST['d1_awardDegree2'] . "', "
            . "'" . $_POST['d1_score2'] . "','" . $_POST['d1_docSupport2'] . "','" . $_POST['d1_docSupport2'] . "','" . $_POST['d2_agency1'] . "','" . $_POST['d2_period1'] . "','" . $_POST['d2_grantAmt1'] . "','" . $_POST['d2_isPrincipal1'] . "','" . $_POST['d2_score1'] . "','" . $_POST['d2_supDoc1'] . "','" . $_POST['d2_title2'] . "',"
            . "'" . $_POST['d2_agency2'] . "','" . $_POST['d2_period2'] . "','" . $_POST['d2_grantAmt2'] . "','" . $_POST['d2_isPrincipal2'] . "','" . $_POST['d2_score2'] . "','" . $_POST['d2_supDoc2'] . "','" . $_POST['d3_title1'] . "','" . $_POST['d3_agency1'] . "','" . $_POST['d3_period1'] . "','" . $_POST['d3_grantAmt1'] . "',"
            . "'" . $_POST['d3_isPrincipal1'] . "','" . $_POST['d3_score1'] . "','" . $_POST['d3_supDoc1'] . "','" . $_POST['d3_title2'] . "','" . $_POST['d3_agency2'] . "','" . $_POST['d3_period2'] . "','" . $_POST['d3_grantAmt2'] . "','" . $_POST['d3_isPrincipal2'] . "','" . $_POST['d3_score2'] . "','" . $_POST['d3_supDoc2'] . "','" . $_POST['d4_title1'] . "','" . $_SESSION['userID'] . "')";
    if ($con->query($sql)) {
        $sql = "select max(tabBID) as b_ID from tblpartb";
        $dataP = $con->query($sql);
        $maxID_B = $dataP->fetch_assoc();
        $sql = "INSERT INTO `tblpartb2`( `tabBID`, `d4_agency1`, `d4_period1`, `d4_grantAmt1`, `d4_score1`, `d4_supDoc1`, `d4_title2`, `d4_agency2`, `d4_period2`, `d4_grantAmt2`, `d4_score2`, `d4_supDoc2`, `e1_patents1`, `e1_national1`, `e1_patentNo1`, `e1_score1`, `e1_supportDoc1`, `e1_patents2`, `e1_national2`, `e1_patentNo2`, `e1_score2`, `e1_supportDoc2`, `e2_desc1`, `e2_year1`, `e2_national1`, `e2_score1`, `e2_docSupport1`, `e2_desc2`, `e2_year2`, `e2_national2`, `e2_score2`, `e2_docSupport2`, `e3_desc1`, `e3_year1`, `e3_national1`, `e3_awardBody1`, `e3_score1`, `e3_docSupport1`, `e3_desc2`, `e3_year2`, `e3_national2`, `e3_awardBody2`, `e3_score2`, `e3_docSupport2`, `f_desc1`, `f_nameOfEvent1`, `f_year1`, `f_national1`, `f_score1`, `f_docSupport1`, `f_desc2`, `f_nameOfEvent2`, `f_year2`, `f_national2`, `f_score2`, `f_docSupport2`) VALUES "
                . "(" . $maxID_B['b_ID'] . ",'" . $_POST['d4_agency1'] . "','" . $_POST['d4_period1'] . "','" . $_POST['d4_grantAmt1'] . "',' " . $_POST['d4_score1'] . " ',' " . $_POST['d4_supDoc1'] . "','" . $_POST['d4_title2'] . "','" . $_POST['d4_agency2'] . "','" . $_POST['d4_period2'] . "',"
                . " 'q " . $_POST['d4_grantAmt2'] . " ','" . $_POST['d4_score2'] . "','" . $_POST['d4_supDoc2'] . "','" . $_POST['e1_patents1'] . "','" . $_POST['e1_national1'] . "','" . $_POST['e1_patentNo1'] . "','" . $_POST['e1_score1'] . "','" . $_POST['e1_supportDoc1'] . "','" . $_POST['e1_patents2'] . "','" . $_POST['e1_national2'] . "',"
                . "'" . $_POST['e1_patentNo2'] . "','" . $_POST['e1_score2'] . "','" . $_POST['e1_supportDoc2'] . "','" . $_POST['e2_desc1'] . "','" . $_POST['e2_year1'] . "','" . $_POST['e2_national1'] . "','" . $_POST['e2_score1'] . "','" . $_POST['e2_docSupport1'] . "','" . $_POST['e2_desc2'] . "','" . $_POST['e2_year2'] . "',"
                . "'" . $_POST['e2_national2'] . "','" . $_POST['e2_score2'] . "','" . $_POST['e2_docSupport2'] . "','" . $_POST['e3_desc1'] . "','" . $_POST['e3_year1'] . "','" . $_POST['e3_national1'] . "','" . $_POST['e3_awardBody1'] . "','" . $_POST['e3_score1'] . "','" . $_POST['e3_docSupport1'] . "','" . $_POST['e3_desc2'] . "',"
                . "'" . $_POST['e3_year2'] . "', '" . $_POST['e3_national2'] . "', '" . $_POST['e3_awardBody2'] . "', '" . $_POST['e3_score2'] . "', '" . $_POST['e3_docSupport2'] . "', '" . $_POST['f_desc1'] . "', '" . $_POST['f_nameOfEvent1'] . "', '" . $_POST['f_year1'] . "', '" . $_POST['f_national1'] . "', '" . $_POST['f_score1'] . "', "
                . "'" . $_POST['f_docSupport1'] . "', '" . $_POST['f_desc2'] . "', '" . $_POST['f_nameOfEvent2'] . "', '" . $_POST['f_year2'] . "', '" . $_POST['f_national2'] . "', '" . $_POST['f_score2'] . "', '" . $_POST['f_docSupport2'] . "')";
        $con->query($sql);
        echo "<script>alert('Data Saved Success');</script>";
        ;
    }
}
if(isset($_POST['btnPart_BFinalSubmit'])){
    $sql="update partStatus set isBLock='true' where userID='".$_SESSION['userID']."'";
    if($con->query($sql)){
        echo "<script>alert('Part B Locked!!');</script>";
    }
}
?>






















