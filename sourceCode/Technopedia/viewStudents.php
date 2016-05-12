                <?php
                /**
                 * Created by PhpStorm.
                 * User: hamdy
                 * Date: 3/25/16
                 * Time: 11:35 PM
                 *
                 * This file is responsible to retrieve data from the data base about
                 * a student and return them in the appropriate format in order to be used.
                 *
                 */

                include "dbAccess.php";
                $str = $_REQUEST["q"];

                $sql = "Select CandidateID,FirstNameEnglish, LastNameEnglish, IdentityNo, ECDL_LogbookNo From " .$str;

                $result = mysqli_query($GLOBALS["dbh"],$sql);


                $str2 = '[';
                while ($row = mysqli_fetch_array($result)){

                    $str2 .= '{candidateID:'."\"".$row['CandidateID']."\",";
                    $str2 .= 'fName:'."\"".$row['FirstNameEnglish']."\",";
                    $str2 .= 'lName:'."\"".$row['LastNameEnglish']."\",";
                    $str2 .= 'id:'."\"".$row['IdentityNo']."\",";
                    $str2 .= 'ecdlNum:'."\"".$row['ECDL_LogbookNo']."\"},";

                }
                if ($str2 != "[")
                    $str2 = substr($str2,0,-1);

                $str2 .= ']';


                echo $str2;
                mysqli_close($GLOBALS["dbh"]);
