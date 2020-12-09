<main>
    
    <div class="container">
        <div class="description">
            <h1><?php echo "ברוכים הבאים לספריית המוזיקה של TicketMe" ?></h1><br>
            <div id="searchWrraper">

                <form action="" method="get">
                    <div class="inputWrapper"><label id="lable" for="query">הכנס/י את שם האומן:</label>
                        <input id="query" class="center query formInput"  type="text" name="query" /> </div>
                    <input class="search center" name="submit" type="submit" value="חפש">
                </form>
                <br>
            </div>


            <?php
        $name=filter_input(INPUT_GET, 'query');
        for($i=0;$i<strlen($name);$i++)
        {
            if($name[$i]==" ")
            {
                $name[$i]='_';
            }
        }


        $curl = curl_init();
            if ( filter_input(INPUT_GET, 'query')!=null &&  filter_input(INPUT_GET, 'query') != '') {
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://deezerdevs-deezer.p.rapidapi.com/search?q='.$name,

                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "x-rapidapi-host: deezerdevs-deezer.p.rapidapi.com",
                        "x-rapidapi-key: 330272edfamsh93ac20081cbc3acp1e7058jsnbaa4afe9393e"
                    ),
                ));
                $query_fields = [
                    'autoCorrect' => 'true',
                    'pageNumber' => 1,
                    'pageSize' => 10,
                    'safeSearch' => 'false',
                    // 'keyword' => $_GET['query']
                    'keyword' =>  filter_input(INPUT_GET, 'query')
                ];

                $response = json_decode(curl_exec($curl),true);
                $err = curl_error($curl);

                curl_close($curl);
            }
            if(!empty($response)){
                
                if ($response['total']!=0) {
                    for($i=0;$i<10;$i++)
                    {
                        echo '<b>שם השיר:</b>'.' ';
                        print_r($response["data"][$i]['title']);
                        echo '<br>';
                        echo '<b>שם האומן:</b>'.' ';
                        print_r ($response["data"][$i]['artist']['name']); 
                        echo '<br>';
                        echo '<b>שם האלבום:</b>'.' ';
                        print_r ($response["data"][$i]['album']['title']); 
                        echo '<br>';
                        echo '<b>הדירוג באתר:</b>'.' ';
                        print_r ($response["data"][$i]['rank']);
                        echo '<br>';
                         $link=($response["data"][$i]['link']);
                        echo '<b><a target="_blank" href='.$link.'>למעבר לשיר לחץ כאן</a></b>';
                        echo '<br>';
                        echo '<hr class="line">';
                    }

                }
                else{
                    echo '<p id="error"><b>'."האומן לא קיים במאגר".'</b></p>';
                }
            }
            ?>




        </div>
    </div>
</main>
