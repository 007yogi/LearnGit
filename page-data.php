<?php

    // Template Name: DATA

    get_header();

$url  = 'http://api.2020-wob.curiovision.io/api/companies';
$headers = array(
    'Content-Type: application/json',
    'Authorization: Token bd914c8973f19c368572a4080e31b0e7c663923e',
    'Cache-Control: no-cache' ,
    'Connection:keep-alive',
    'Accept-Encoding:*/*'
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
$return = curl_exec($ch);

curl_close($ch);


/*print_r( json_decode($return ) ) ;*/
$data = json_decode($return)   ;
$i = 1; 
foreach ($data as $record) {
  $postarr = array();
/*  if($i < 570){
  	continue;
  }*/

  /*echo $i.'='.$record->ID.'<br/>';*/
  $postarr  = array(
        'post_title'      => addslashes($record->Company_Name) ,
        'post_status'     => 'publish',
        'post_type'       => 'diversitydirectory',
        'comment_status'  => 'closed',
        'ping_status'     => 'closed',
        'post_name'       => addslashes($record->Company_Name),
        'meta_input'      => array(

          'ID'                      =>  addslashes($record->ID),
          'Company_Name'            =>  addslashes($record->Company_Name),
          'Address_One'             =>  addslashes($record->Address_One),
          'Address_Two'             =>  addslashes($record->Address_Two),
          'City'                    =>  addslashes($record->City),
          'State'                   =>  addslashes($record->State),
          'Zip'                     =>  addslashes($record->Zip),
          'Country'                 =>  addslashes($record->Country),
          'Fortune_Rank_2010'       =>  addslashes($record->Fortune_Rank_2010),
          'Exchange_Symbol'         =>  addslashes($record->Exchange_Symbol),
          'Website'                 =>  addslashes($record->Website),
          'Sector'                  =>  addslashes($record->Sector),
          'Industry'                =>  addslashes($record->Industry),
          'CURRENT_Company_Status'  =>  addslashes($record->{'Company_Data:_CURRENT::Company_Status'}),
          'CURRENT_Women_On_Board'  =>  addslashes($record->{'Company_Data:_CURRENT::Women_On_Board'}),
          'CURRENT_Total_On_Board'  =>  addslashes($record->{'Company_Data:_CURRENT::Total_On_Board'}),
          'CURRENT_Source'          =>  addslashes($record->{'Company_Data:_CURRENT::Source'}),
          'CURRENT_Governance_Link' =>  addslashes($record->{'Company_Data:_CURRENT::Governance_Link'}),
          'CURRENT_Fiscal_Year_End' =>  addslashes($record->{'Company_Data:_CURRENT::Fiscal_Year_End'}),
          'CURRENT_Percent_Women'   =>  addslashes($record->{'Company_Data:_CURRENT::Percent_Women'}),
          'CURRENT_Rating'          =>  addslashes($record->{'Company_Data:_CURRENT::Rating'})

        )
  );

  wp_insert_post( $postarr);


$i++; 
}

 get_footer(); ?>