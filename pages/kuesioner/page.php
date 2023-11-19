<?php
    include '../../config/config.php';
    $flagp = 0;
    $flage = 0;
    $flagk = 0;
    $idk = "";
    $tessay = "";
    $k=0;
    
    
    $idk = "KU004";
    $q = mysqli_query($koneksi,"SELECT * FROM z_kuisioner WHERE kui_id='".$idk."' ;") ;
    $d = mysqli_fetch_array($q);
    $kreteria = "<b>Kreteria Kategori Penilaian :</b><br />";
    $qkre = mysqli_query($koneksi,"SELECT * FROM z_kuisioner_kriteria WHERE kui_id='".$d["kui_id"]."' ORDER BY kuik_pilihan;") ;
    $colkre = "";
    $arrkreteria = array();
    $jmlkol = 2;
    while($dkre=mysqli_fetch_array($qkre)){
        $kreteria .= $dkre["kuik_pilihan"].". ".$dkre["kuik_keterangan"]."<br />";
        $colkre .="<td align=\"center\"><b>".$dkre["kuik_pilihan"]."</b></td>";
        $arrkreteria[] = $dkre["kuik_pilihan"];
        $jmlkol ++;
        $flagk = 1;
    }
    $kreteria .="<br />";
    $jmlcolspan = $jmlkol - 1;
    
    $tpertanyaan = "";
    
    $qs = mysqli_query($koneksi,"SELECT * FROM z_kuisioner_section WHERE kui_id='".$d["kui_id"]."' ");
    $i=1;
    $l = 0;
    if($jmlks = mysqli_num_rows($qs)>0){
        while($ds = mysqli_fetch_array($qs)){
            $tpertanyaan .= "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"5\" bgcolor=\"#DDDDDD\">
                                <tr bgcolor=\"#CCCCCC\">
                                    <td align=\"center\" width=\"5%\"><b>No</b></td>
                                    <td align=\"center\" width=\"80%\"><b>Pertanyaan</b></td>
                                    ".$colkre."
                                </tr>";
            if($i%2==1){
                $bgcolor = "bgcolor=\"#FFFFFF\"";
            }else{
                $bgcolor = "bgcolor=\"#EEEEEE\"";
            }
            $tpertanyaan .="<tr ".$bgcolor.">
                                <td colspan=\"".$jmlkol."\"><h4>".$ds["ks_name"]."</h4></td>
                            </tr>";
            $i++;
            $qkp=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_pertanyaan WHERE kui_id='".$d["kui_id"]."' AND ks_id='".$ds["ks_id"]."' ORDER BY kuip_urutan;") ;
            while($dkp=mysqli_fetch_array($qkp)){
                if($i%2==1){
                    $bgcolor = "bgcolor=\"#FFFFFF\"";
                }else{
                    $bgcolor = "bgcolor=\"#EEEEEE\"";
                }
                if($dkp["kuip_tipe"]=="bobot"){
                    $colkrej = "";
                    $chk = "";
                    foreach($arrkreteria as $kre){
                        $colkrej .= "<td align=\"center\">
                                    <input type=\"radio\" name=\"jp[".$l."]\" value=\"".$kre."\"/>
                                    </td>";
                        $chk = "";
                    }
                    $tpertanyaan .= "<tr ".$bgcolor.">
                                        <td valign=\"top\" style=\"text-align:center\">".$dkp["kuip_urutan"]."</td>
                                        <td valign=\"top\"><input type=\"hidden\" name=\"kuip_id[".$l."]\" value=\"".$dkp["kuip_id"]."\">".$dkp["kuip_pertanyaan"]."</td>
                                        ".$colkrej."
                                    </tr>";
                    $i++;
                    $l++;
                    $flagp = 1;
                }else{
                    $tpertanyaan .= "<tr ".$bgcolor.">
                                        <td align=\"center\" valign=\"center\" width=\"5%\"><p>".$dkp["kuip_urutan"].".</p>
                                            <input type=\"hidden\" name=\"kuipe_id[]\" value=\"".$dkp["kuip_id"]."\"></td>
                                        <td valign=\"center\" colspan=\"".$jmlcolspan."\">".$dkp["kuip_pertanyaan"]."</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan=\"".$jmlcolspan."\" ><textarea id=\"essay[".$k."]\" name=\"essay[]\" cols=\"90%\" rows=\"4\"></textarea></td>
                                    </tr>";
                    $k++;
                    $i++;
                    $flagp = 1;
                }				
            }				
            $tpertanyaan .= "</table>";
        }
    }else{
        $l = 0;
        $qkp=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_pertanyaan WHERE kui_id='".$d["kui_id"]."' ORDER BY kuip_urutan;") ;
        while($dkp=mysqli_fetch_array($qkp)){
            if($i%2==1){
                $bgcolor = "bgcolor=\"#FFFFFF\"";
            }else{
                $bgcolor = "bgcolor=\"#EEEEEE\"";
            }
            if($dkp["kuip_tipe"]=="bobot"){
                $colkrej = "";
                $chk = "";
                foreach($arrkreteria as $kre){
                    $colkrej .= "<td align=\"center\">
                                <input type=\"radio\" name=\"jp[".$l."]\" value=\"".$kre."\"/>
                                </td>";
                    $chk = "";
                }
                $tpertanyaan .= "<tr ".$bgcolor.">
                                    <td valign=\"top\" style=\"text-align:center\">".$dkp["kuip_urutan"]."</td>
                                    <td valign=\"top\"><input type=\"hidden\" name=\"kuip_id[".$l."]\" value=\"".$dkp["kuip_id"]."\">".$dkp["kuip_pertanyaan"]."</td>
                                    ".$colkrej."
                                </tr>";
                $i++;
                $l++;
                $flagp = 1;
            }else{
                $tpertanyaan .= "<tr ".$bgcolor.">
                                    <td align=\"center\" valign=\"center\" width=\"5%\"><p>".$dkp["kuip_urutan"].".</p>
                                        <input type=\"hidden\" name=\"kuipe_id[]\" value=\"".$dkp["kuip_id"]."\"></td>
                                    <td valign=\"center\" colspan=\"".$jmlcolspan."\">".$dkp["kuip_pertanyaan"]."</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan=\"".$jmlcolspan."\" ><textarea id=\"essay[".$k."]\" name=\"essay[]\" cols=\"90%\" rows=\"4\"></textarea></td>
                                </tr>";
                $k++;
                $i++;
                $flagp = 1;
            }	 
        }
        $tpertanyaan = "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"5\" bgcolor=\"#DDDDDD\">
                                <tr bgcolor=\"#CCCCCC\">
                                    <td align=\"center\" width=\"5%\"><b>No</b></td>
                                    <td align=\"center\" width=\"80%\"><b>Pertanyaan</b></td>
                                    ".$colkre."
                                </tr>
                                ".$tpertanyaan." ";
        $tpertanyaan .= "</table>";
    }
    
    
    if($flagp==0){
        $tpertanyaan = "";
    }
    if($flagk==0){
        $kreteria = "";
    }
    
    echo "<div class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <div class=\"row\">
                        <div class=\"col-md-10 col-md-offset-1\">
                            <form id=\"formKuesioner\" name=\"formKuesioner\" role=\"form\">
                                <h3>".$d["kui_header"]."</h3><hr />
                                <input type=\"hidden\" id=\"kuisioner\" name=\"kuisioner\" value=\"".$d["kui_id"]."\" />
                                ".$kreteria."
                                ".$tpertanyaan."<br />
                                ".$tessay."
                                <br />
                                <input type=\"button\" class=\"btn btn-primary\" value=\"Submit\" onclick=\"addKuisioner();\"/>
                                <input type=\"reset\" class=\"btn btn-default\"  value=\"Cancel\" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
?>