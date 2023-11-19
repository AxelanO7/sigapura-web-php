<?php
    include ("kamus_update.php");

    $basa_kasar = $_POST['basa_kasar'];
    $basa_kasar = str_replace(' ', '', $basa_kasar);

	$basa_kesamen = $_POST['basa_kesamen'];
    $basa_kesamen = str_replace(' ', '', $basa_kesamen);

	$basa_alus_sor = $_POST['basa_alus_sor'];
    $basa_alus_sor = str_replace(' ', '', $basa_alus_sor);

	$basa_alus_mider = $_POST['basa_alus_mider'];
    $basa_alus_mider = str_replace(' ', '', $basa_alus_mider);

    $basa_alus_madia = $_POST['basa_alus_madia'];
    $basa_alus_madia = str_replace(' ', '', $basa_alus_madia);

	$basa_alus_singgih = $_POST['basa_alus_singgih'];
    $basa_alus_singgih = str_replace(' ', '', $basa_alus_singgih);

	$bahasa_indonesia = $_POST['bahasa_indonesia'];
    $bahasa_indonesia = str_replace(' ', '', $bahasa_indonesia);

	$english = $_POST['english'];
    $english = str_replace(' ', '', $english);

    //get input kalimat from form
    $basa_kasar_kalimat = $_POST['basa_kasar_kalimat'];
	$basa_kesamen_kalimat = $_POST['basa_kesamen_kalimat'];
	$basa_alus_sor_kalimat = $_POST['basa_alus_sor_kalimat'];
	$basa_alus_mider_kalimat = $_POST['basa_alus_mider_kalimat'];
    $basa_alus_madia_kalimat = $_POST['basa_alus_madia_kalimat'];
	$basa_alus_singgih_kalimat = $_POST['basa_alus_singgih_kalimat'];
	$bahasa_indonesia_kalimat = $_POST['bahasa_indonesia_kalimat'];
	$english_kalimat = $_POST['english_kalimat'];

    //get input aksara bali from form
    $basa_kasar_aksara = $_POST['basa_kasar_aksara'];
	$basa_kesamen_aksara = $_POST['basa_kesamen_aksara'];
	$basa_alus_sor_aksara = $_POST['basa_alus_sor_aksara'];
	$basa_alus_mider_aksara = $_POST['basa_alus_mider_aksara'];
    $basa_alus_madia_aksara = $_POST['basa_alus_madia_aksara'];
	$basa_alus_singgih_aksara = $_POST['basa_alus_singgih_aksara'];
	$bahasa_indonesia_aksara = $_POST['bahasa_indonesia_aksara'];
	$english_aksara = $_POST['english_aksara'];

	$jenis_kata = $_POST['jenis_kata'];
    
    //query untuk basa kasar
    if($basa_kasar!=""){
        $qbasa_kesamen = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_mider = "";
        $qbasa_alus_madia = "";
        $qbasa_alus_singgih = "";
        $qbahasa_indonesia = "";
        $qenglish = "";
        $qbasa_kasar_kalimat = "";
        $qbasa_kasar_aksara = "";

        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$basa_kasar lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$basa_kasar lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$basa_kasar lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$basa_kasar lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$basa_kasar lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$basa_kasar lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english!=""){
            $qenglish = "kamus:$basa_kasar lexinfo:synonym kamus:$english .
                            kamus:$basa_kasar kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($basa_kasar_kalimat!=""){
            $qbasa_kasar_kalimat = "kamus:skos:example '$basa_kasar_kalimat'@ban . ";
        }
        if($basa_kasar_aksara!=""){
            $qbasa_kasar_aksara = "kamus:aksaraBali '$basa_kasar_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$basa_kasar a kamus:BasaKasar .
                    ".$qbasa_kasar_kalimat."
                    ".$qbasa_kasar_aksara."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_madia."
                    ".$qbasa_alus_singgih."
                    ".$qbahasa_indonesia."
                    ".$qenglish."
            } " );
    }
    
    
    //query untuk basa kesamen
    if($basa_kesamen!=""){
        $qbasa_kasar = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_mider = "";
        $qbasa_alus_madia = "";
        $qbasa_alus_singgih = "";
        $qbahasa_indonesia = "";
        $qenglish = "";
        $qbasa_kesamen_kalimat = "";
        $qbasa_kesamen_aksara = "";

        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$basa_kesamen lexinfo:synonym kamus:$basa_kasar .
                                kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$basa_kesamen lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$basa_kesamen lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$basa_kesamen lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$basa_kesamen lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$basa_kesamen lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english!=""){
            $qenglish = "kamus:$basa_kesamen lexinfo:synonym kamus:$english .
                            kamus:$basa_kesamen kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($basa_kesamen_kalimat!=""){
            $qbasa_kesamen_kalimat = "kamus:skos:example '$basa_kesamen_kalimat'@ban . ";
        }
        if($basa_kesamen_aksara!=""){
            $qbasa_kesamen_aksara = "kamus:aksaraBali '$basa_kesamen_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$basa_kesamen a kamus:BasaKesamen .
                    ".$qbasa_kesamen_kalimat."
                    ".$qbasa_kesamen_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_madia."
                    ".$qbasa_alus_singgih."
                    ".$qbahasa_indonesia."
                    ".$qenglish."
    
            } " );
    }

    //query untuk basa alus sor
    if($basa_alus_sor!=""){
        $qbasa_kasar = "";
        $qbasa_kesamen = "";
        $qbasa_alus_mider = "";
        $qbasa_alus_madia = "";
        $qbasa_alus_singgih = "";
        $qbahasa_indonesia = "";
        $qenglish = "";
        $qbasa_alus_sor_kalimat = "";
        $qbasa_alus_sor_aksara = "";

        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$basa_alus_sor lexinfo:synonym kamus:$basa_kasar .
                                kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$basa_alus_sor lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$basa_alus_sor lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$basa_alus_sor lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$basa_alus_sor lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$basa_alus_sor lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english!=""){
            $qenglish = "kamus:$basa_alus_sor lexinfo:synonym kamus:$english .
                            kamus:$basa_alus_sor kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($basa_alus_sor_kalimat!=""){
            $qbasa_alus_sor_kalimat = "kamus:skos:example '$basa_alus_sor_kalimat'@ban . ";
        }
        if($basa_alus_sor_aksara!=""){
            $qbasa_alus_sor_aksara = "kamus:aksaraBali '$basa_alus_sor_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$basa_alus_sor a kamus:BasaAlusSor .
                    ".$qbasa_alus_sor_kalimat."
                    ".$qbasa_alus_sor_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_madia."
                    ".$qbasa_alus_singgih."
                    ".$qbahasa_indonesia."
                    ".$qenglish."
    
            } " );
    }

    //query untuk basa alus sor
    if($basa_alus_mider!=""){
        $qbasa_kasar = "";
        $qbasa_kesamen = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_madia = "";
        $qbasa_alus_singgih = "";
        $qbahasa_indonesia = "";
        $qenglish = "";
        $qbasa_alus_mider_kalimat = "";
        $qbasa_alus_mider_aksara = "";

        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$basa_alus_mider lexinfo:synonym kamus:$basa_kasar .
                                kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$basa_alus_mider lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$basa_alus_mider lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$basa_alus_mider lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$basa_alus_mider lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$basa_alus_mider lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english!=""){
            $qenglish = "kamus:$basa_alus_mider lexinfo:synonym kamus:$english .
                            kamus:$basa_alus_mider kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($basa_alus_mider_kalimat!=""){
            $qbasa_alus_mider_kalimat = "kamus:skos:example '$basa_alus_mider_kalimat'@ban . ";
        }
        if($basa_alus_mider_aksara!=""){
            $qbasa_alus_mider_aksara = "kamus:aksaraBali '$basa_alus_mider_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$basa_alus_mider a kamus:BasaAlusMider .
                    ".$qbasa_alus_mider_kalimat."
                    ".$basa_alus_mider_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_madia."
                    ".$qbasa_alus_singgih."
                    ".$qbahasa_indonesia."
                    ".$qenglish."
    
            } " );
    }

    //query untuk basa alus madia
    if($basa_alus_madia!=""){
        $qbasa_kasar = "";
        $qbasa_kesamen = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_mider= "";
        $qbasa_alus_singgih = "";
        $qbahasa_indonesia = "";
        $qenglish = "";
        $qbasa_alus_madia_kalimat = "";
        $qbasa_alus_madia_aksara = "";

        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$basa_alus_madia lexinfo:synonym kamus:$basa_kasar .
                                kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$basa_alus_madia lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$basa_alus_madia lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$basa_alus_madia lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$basa_alus_madia lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$basa_alus_madia lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english!=""){
            $qenglish = "kamus:$basa_alus_madia lexinfo:synonym kamus:$english .
                            kamus:$basa_alus_madia kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($basa_alus_madia_kalimat!=""){
            $qbasa_alus_madia_kalimat = "kamus:skos:example '$basa_alus_madia_kalimat'@ban . ";
        }
        if($basa_alus_madia_aksara!=""){
            $qbasa_alus_madia_aksara = "kamus:aksaraBali '$basa_alus_madia_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$basa_alus_madia a kamus:BasaAlusMadia .
                    ".$qbasa_alus_madia_kalimat."
                    ".$qbasa_alus_madia_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_singgih."
                    ".$qbahasa_indonesia."
                    ".$qenglish."
    
            } " );
    }

    //query untuk basa alus singgih
    if($basa_alus_singgih!=""){
        $qbasa_kasar = "";
        $qbasa_kesamen = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_mider= "";
        $qbasa_alus_madia = "";
        $qbahasa_indonesia = "";
        $qenglish = "";
        $qbasa_alus_singgih_kalimat = "";
        $qbasa_alus_singgih_aksara = "";

        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$basa_kasar .
                                kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english!=""){
            $qenglish = "kamus:$basa_alus_singgih lexinfo:synonym kamus:$english .
                            kamus:$basa_alus_singgih kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($basa_alus_singgih_kalimat!=""){
            $qbasa_alus_singgih_kalimat = "kamus:skos:example '$basa_alus_singgih_kalimat'@ban . ";
        }
        if($basa_alus_singgih_aksara!=""){
            $qbasa_alus_singgih_aksara = "kamus:aksaraBali '$basa_alus_singgih_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .
                    ".$qbasa_alus_singgih_kalimat."
                    ".$qbasa_alus_singgih_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_madia."
                    ".$qbahasa_indonesia."
                    ".$qenglish."
    
            } " );
    }

    //query untuk bahasa indonesia
    if($bahasa_indonesia!=""){
        $qbasa_kasar = "";
        $qbasa_kesamen = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_mider= "";
        $qbasa_alus_singgih = "";
        $qbasa_alus_madia = "";
        $qenglish = "";
        $qbahasa_indonesia_kalimat = "";
        $qbahasa_indonesia_aksara = "";
        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$basa_kasar .
                                kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($english!=""){
            $qenglish = "kamus:$bahasa_indonesia lexinfo:synonym kamus:$english .
                            kamus:$bahasa_indonesia kamus:partOfSpeech kamus:$jenis_kata .
                            kamus:$english a kamus:BahasaInggris .";
        }
        if($bahasa_indonesia_kalimat!=""){
            $qbahasa_indonesia_kalimat = "kamus:skos:example '$bahasa_indonesia_kalimat'@id . ";
        }
        if($bahasa_indonesia_aksara!=""){
            $qbahasa_indonesia_aksara = "kamus:aksaraBali '$bahasa_indonesia_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$bahasa_indonesia a kamus:BahasaIndonesia .
                    ".$qbahasa_indonesia_kalimat."
                    ".$qbahasa_indonesia_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_madia."
                    ".$qbasa_alus_singgih."
                    ".$qenglish."
    
            } " );
    }
    
    //query untuk bahasa inggris
    if($english!=""){
        $qbasa_kasar = "";
        $qbasa_kesamen = "";
        $qbasa_alus_sor = "";
        $qbasa_alus_mider= "";
        $qbasa_alus_madia = "";
        $qbasa_alus_singgih = "";
        $qbahasa_indonesia = "";
        $qenglish_kalimat = "";
        $qenglish_aksara = "";
        
        if($basa_kasar!=""){
            $qbasa_kasar = "kamus:$english lexinfo:synonym kamus:$basa_kasar .
                                kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kasar a kamus:BasaKasar .";
        }
        if($basa_kesamen!=""){
            $qbasa_kesamen = "kamus:$english lexinfo:synonym kamus:$basa_kesamen .
                                kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_kesamen a kamus:BasaKesamen .";
        }
        if($basa_alus_sor!=""){
            $qbasa_alus_sor = "kamus:$english lexinfo:synonym kamus:$basa_alus_sor .
                                kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                kamus:$basa_alus_sor a kamus:BasaAlusSor .";
        }
        if($basa_alus_mider!=""){
            $qbasa_alus_mider = "kamus:$english lexinfo:synonym kamus:$basa_alus_mider .
                                    kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_mider a kamus:BasaAlusMider .";
        }
        if($basa_alus_madia!=""){
            $qbasa_alus_madia = "kamus:$english lexinfo:synonym kamus:$basa_alus_madia .
                                    kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_madia a kamus:BasaAlusMadia .";
        }
        if($basa_alus_singgih!=""){
            $qbasa_alus_singgih = "kamus:$english lexinfo:synonym kamus:$basa_alus_singgih .
                                    kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$basa_alus_singgih a kamus:BasaAlusSinggih .";
        }
        if($bahasa_indonesia!=""){
            $qbahasa_indonesia = "kamus:$english lexinfo:synonym kamus:$bahasa_indonesia .
                                    kamus:$english kamus:partOfSpeech kamus:$jenis_kata .
                                    kamus:$bahasa_indonesia a kamus:BahasaIndonesia .";
        }
        if($english_kalimat!=""){
            $qenglish_kalimat = "kamus:skos:example '$english_kalimat'@en . ";
        }
        if($english_aksara!=""){
            $qenglish_aksara = "kamus:aksaraBali '$english_aksara' . ";
        }
        $kamus_update->update(
            "INSERT DATA
            {
                kamus:$english a kamus:BahasaInggris .
                    ".$qenglish_kalimat."
                    ".$qenglish_aksara."
                    ".$qbasa_kasar."
                    ".$qbasa_kesamen."
                    ".$qbasa_alus_sor."
                    ".$qbasa_alus_mider."
                    ".$qbasa_alus_madia."
                    ".$qbasa_alus_singgih."
                    ".$qbahasa_indonesia."
    
            } " );
    }
    header("location:../pages/populate_details/index.php?pesan=Proses Sukses Dilakukan! <br>");

?>