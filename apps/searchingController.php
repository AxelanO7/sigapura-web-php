<?php
    include ("kamus_update.php");

    $keyword = $_POST['basa_kasar'];
    $keyword = ucfirst($keyword);

    /*$result = $sparql->query("SELECT  ?kata
                            WHERE { 
                                {
                                ?kata  rdf:type  kamus:BasaKasar 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:BasaKesamen 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:BasaAlusSor 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:BasaAlusMider 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:BasaAlusMadia 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:BasaAlusSinggih 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:BahasaIndonesia 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                                UNION
                                { 
                                    ?kata  rdf:type  kamus:Engslih 
                                    filter(contains(str(?kata), '$keyword'))
                                }
                            } LIMIT 1");*/
        echo "SELECT  ?kata
        WHERE { 
            {
            ?kata  rdf:type  kamus:BasaKasar 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:BasaKesamen 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:BasaAlusSor 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:BasaAlusMider 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:BasaAlusMadia 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:BasaAlusSinggih 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:BahasaIndonesia 
                filter(contains(str(?kata), '$keyword'))
            }
            UNION
            { 
                ?kata  rdf:type  kamus:Engslih 
                filter(contains(str(?kata), '$keyword'))
            }
        } LIMIT 1";
        if(is_array($result)){
            print_r($result);
        }
    
    header("location:../pages/populate_details/index.php?pesan=Proses Sukses Dilakukan! <br>");

?>