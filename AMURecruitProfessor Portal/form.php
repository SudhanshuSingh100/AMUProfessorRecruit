<html>
    <head>
        <title> partc</title>
        <link rel="stylesheet" href="valid.css" type="text/css">
        <style>
            #header /* this name is called inside html file using id*/
            {
                background:#00a2d1;
                width:100%;
                height:50px;
                color:#fff;
                font-size:30px;
            }

            /*For styling a form*/
            .form-style{   /* this name is called inside html file using class="form-style"*/
                font-family: 'Open Sans Condensed', arial, sans;
                width: 900px;
                padding: 30px;
                background: #FFFFFF;
                margin: 50px auto;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
                -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
                -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

            }

            /*For styling a form heading*/
            .form-style h2{ /* this name is called inside html file using  h2*/
                background: #43D1AF;
                font-family: 'Open Sans Condensed', sans-serif;
                color: #FFFFFF;
                font-size: 18px;
                font-weight: 100;
                padding: 20px;
                margin: -30px -30px 30px -30px;
            }

            /* For styling a textarea-field*/
            .form-style .textarea-field{ /* this name is called inside html file using class="textarea-field"*/
                height:80px;
                width: 800px;
                border-radius: 5px;
            }

            .input-group{
                margin: 10px 0px 10px 0px;
            }

            /* For styling an input text field*/
            .input-group input{ /* this name is called inside html file using class="input-group"*/
                height:30px;
                width: 93%;
                padding: 5px 10px;
                font-size:16px;
                border-radius: 5px;
                border: 1px solid gray;
            }

            /* For styling a menu field*/
            .input-group select{ /* this name is called inside html file using class="input-group" but for styling menu field*/
                width: 95%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            /* For styling a button*/
            .btn{  /* this name is called inside html file using class="btn"*/
                padding:10px;
                font-size:15px;
                color:#FFFFFF;
                background: #2A88AD;
                border-radius: 5px;
                border: none;
            }
            }
        </style> 
    </head>
    <body bgcolor="lightblue">
        <div id="header" align="center">part c </div>
        <div class="form-style">
            <h2>all fields are mandatory</h2>

            <form name="form" method="post" action="">
                <div  style="position: fixed;top:2px;right:0px;">
                    <button name="submit" >Save</button>
                </div>
                <table align="center" width="800" border="0">
                    <tr>
                        <td>1.&nbsp&nbsp Candidate's Name : </td>
                        <td><div class="input-group"><input type="text" name="cName"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>2.&nbsp&nbspFather's/Husband's Name : </td>
                        <td><div class="input-group"><input type="text" name="cFatherName"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>3.&nbsp&nbsp Mother's Name : </td>
                        <td><div class="input-group"><input type="text" name="cMotherName"></div>
                        </td>
                    </tr>
                    <tr>
                        <td> 4.&nbsp&nbspPermanent Address  : </td>
                        <td><div class="input-group"><input type="text" name="cAddress"></div>
                        </td>
                    </tr>
                    <tr>
                        <td> 5.&nbsp&nbspDate of Birth(in Christian era) : </td>
                        <td><div class="input-group"><input type="text" name="cDOB"></div>
                        </td>
                    </tr>
                    <tr>
                        <td> 6.&nbsp&nbspPlace and State of Birth : </td>
                        <td><div class="input-group"><input type="text" name="cPlaceState"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>7.&nbsp&nbspMarital Status:</td>
                        <td><span id="gender">
                                <input type="radio" name="gender" value="male" id="male">Male
                                <input type="radio" name ="gender" value="female" id="female">female</span>
                        </td></tr>  


                    <tr>
                        <td> 8.&nbsp&nbspNationality : </td>
                        <td><div class="input-group"><input type="text" name="cNationality"></div>
                        </td>
                    </tr>

                </table>


                <br><br>10.&nbsp&nbsp School,Colleges and University attended. 
                <table align="center" width="800" border="1" style="border-collapse:collapse;" >
                    <tr><td>s.no.</td><td>Name of School/College/University/Board</td><td>Year of joining</td><td>Year of Leaving</td></tr>
                    <tr><td>1</td>
                        <td style="textarea-field">
                            <input style="border:none;"type="text"name="clzName1" value="">
                        </td>
                        <td>
                            <input style="border:none;"type="text"  name="yoj1" value="">
                        </td>
                        <td>
                            <input style="border:none;"type="text" name="yol1" value="">
                        </td>
                    </tr>
                    <tr><td>2</td>
                        <td style="textarea-field">
                            <input style="border:none;"type="text"name="clzName2" value="">
                        </td>
                        <td>
                            <input style="border:none;"type="text"  name="yoj2" value="">
                        </td>
                        <td>
                            <input style="border:none;"type="text" name="yol2" value="">
                        </td>
                    </tr>
                    <tr><td>3</td>
                        <td style="textarea-field">
                            <input style="border:none;"type="text"name="clzName3" value="">
                        </td>
                        <td>
                            <input style="border:none;"type="text"  name="yoj3" value="">
                        </td>
                        <td>
                            <input style="border:none;"type="text" name="yol3" value="">
                        </td>
                    </tr>
<!--                    <tr><td>2</td><td style="textarea-field"><input style="border:none;"type="text"name="" value=""></td><td><input style="border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td></tr>
                    <tr><td>3</td><td style="textarea-field"><input style="border:none;"type="text"name="" value=""></td><td><input style="border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td></tr>-->
                </table>
                <br>
                <br>
                11.&nbsp&nbsp Scholarships and fellowships with details: 
                <table align="center" width="800" border="0">
                    <tr>
                        <td>(a)&nbsp at Undergraduate level : </td>
                        <td><div class="input-group"><input type="text" name="scholAtUG"></div>
                        </td>
                    </tr>
                    <tr>
                        <td>(b)&nbsp at Graduate level : </td>
                        <td><div class="input-group"><input type="text" name="scholAtG"></div>
                        </td>
                    </tr>
                    <tr> 
                        <td>(c)&nbsp at Post-graduate level: </td>
                        <td><div class="input-group"><input type="text" name="scholAtPG"></div>
                        </td>
                    </tr>
                </table>

                <br>
                <br>
                12.&nbsp&nbsp Educational Qualifications(including NET/SET/SLET). 
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>S.no.</td><td>Examination<br> passed</td><td>Subjects</td><td>Class/Div.<br> with Hons. or<br> distinction</td><td>%age of <br>Marks</td><td>University/Board</td><td>Year of <br>Passing</td><td>Remarks</td></tr>
                    <tr>
                        <td>1</td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:120px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td><td><input style="width:100px;border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text"  name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td></tr>
                    <tr>
                        <td>2</td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:120px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="border:none;"type="text" name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text" name="" value=""></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:120px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td><td><input style="width:100px;border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text"  name="" value=""></td><td><input style="width:100px;border:none;"type="text"name="" value=""></td></tr>
                    <tr>
                        <td>4</td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text" name="" value=""></td>
                        <td><input style="border:none;"type="text" name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text" name="" value=""></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:120px;border:none;"type="text" name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text" name="" value=""></td>
                        <td><input style="border:none;"type="text" name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                        <td><input style="width:100px;border:none;"type="text"  name="" value=""></td>
                    </tr>
                </table> 


                <br>
                <br>
                13.&nbsp&nbsp Details of Employment (Starting from the present position):
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>S.no.</td><td>Institute</td><td>Designation</td><td>period(From)</td><td>period(To)</td><td>Reasons for leaving</td><td>Nature of Duties</td></tr>
                    <tr><td>1</td><td><input style="width:120px;border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td><td><input style="border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td></tr>
                    <tr><td>2</td><td><input style="width:120px;border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td><td><input style="border:none;"type="text"  name="" value=""></td></tr>
                    <tr><td>3</td><td><input style="width:120px;border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td><td><input style="width:100px;border:none;"type="text" name="" value=""></td><td><input style="border:none;"type="text"  name="" value=""></td><td><input style="border:none;"type="text"  name="" value=""></td></tr>
                </table>

                <br>
                <br>
                14(a)&nbsp&nbsp Teaching Experience:
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>Teaching</td><td>Class</td><td>Years</td></tr>
                    <tr><td>Undergraduate level</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td></tr>
                    <tr><td>Post-graduate level</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text" name="" value=""></td></tr>
                </table>

                <br>
                <br>
                14(b)&nbsp&nbsp Research Experience:
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>Research</td><td>Class</td><td>Years</td></tr>
                    <tr><td>Post-graduate level</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text" name="" value=""></td></tr>
                    <tr><td>Undergraduate level</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text" name="" value=""></td></tr>
                </table>

                <br>
                <br>
                14(c)&nbsp&nbsp Supervisor for research degrees(Give number)
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>Degree</td><td>Awarded</td><td>Thesis/Dissertation</td><td>No. of Research Scholars <br>working under him/her</td></tr>
                    <tr><td>Ph.D</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td></tr>
                    <tr><td>M.Phil</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text" name="" value=""></td></tr>
                </table>


                <br>
                <br>
                15(a)&nbsp&nbsp If at present employed,basic salary and allowances(state separetely):
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>Scale of pay:</td><td>Rs</td><td><input style="width:250px;border:none;"type="text"  name="" value=""></td><td>Present basic pay Rs.</td><td><input style="width:250px;border:none;"type="text"  name="" value=""></td></tr>
                    <tr><td>Allowances:</td><td>Rs</td><td><input style="width:250px;border:none;"type="text" name="" value=""></td><td>Total.</td><td><input style="width:250px;border:none;"type="text"  name="" value=""></td></tr>
                </table>


                <table align="center" width="900" border="0" style="border-collapse:collapse;" >
                    <tr><td>Date of next increment</td><td><div class="input-group"><input style="width:250px;border:none;"type="text"  name="" value=""></div></td></tr>
                </table>

                <table align="center" width="900" border="0" style="border-collapse:collapse;" >
                    <tr><td>Is he/she willing to accept the minimum initial pay in the scale? if not, the pay expected with reason</td></tr>
                    <tr><td><textarea name="address" class="textarea-field"></textarea></td></tr>
                </table>

                <br>
                <br>
                16.&nbsp&nbsp Particulars of visits abroad:
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>S.no.</td><td>Country</td><td>Date</td><td>Duration</td><td>Purpose</td></tr>
                    <tr><td>1</td><td><input style="width:170px;border:none;"type="text"  name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td></tr>
                    <tr><td>2</td><td><input style="width:170px;border:none;"type="text"  name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td></tr>
                    <tr><td>3</td><td><input style="width:170px;border:none;"type="text"  name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text" name="" value=""></td></tr> 
                </table>

                <br>
                <br>
                17.&nbsp&nbsp *Research Publications:
                <table align="center" width="900" border="1" style="border-collapse:collapse;" >
                    <tr><td>Publications</td><td>Published(no.)</td><td>Accepted for publicatoin(no.)</td></tr>
                    <tr><td>(a)Books</td><td><input style="width:170px;border:none;"type="text" name="" value=""></td><td><input style="width:220px;border:none;"type="text"name="" value=""></td></tr>
                    <tr><td>(b)Research Papers</td><td><input style="width:220px;border:none;"type="text" name="" value=""></td><td><input style="width:170px;border:none;"type="text"  name="" value=""></td></tr>
                    <tr><td>Articles</td><td><input style="width:220px;border:none;"type="text" name="" value=""></td><td><input style="width:220px;border:none;"type="text" name="" value=""></td></tr> 
                    <tr><td>Papers read at <br>conferences (give no.)</td><td><input style="width:220px;border:none;"type="text"  name="" value=""></td><td><input style="width:220px;border:none;"type="text" name="" value=""></td></tr> 
                </table>



            </form>
        </div>
    </body>
</html>