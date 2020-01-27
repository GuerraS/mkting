<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Login');
		$this->load->model('cm/Empleado','e');
        $this->load->library('form_validation');
        $this->load->library('facebook');
		
    }
    function publicar(){

        $arr = array('message' => 'Adios romero',);
				$userProfile = $this->facebook->request('post','2325078441038936' .'/feed/', $arr, 'EAADDccDBPtsBAAbmPH4GsFuNSlpN0E104TgA4mZChj8nu5SBkZB9BoLFWhHjzZAiZCEd1a5lVQdYBnyeZAdzJBJWJSZCBY8qOAwcGKdND7uPzN2DzYKrPDupLqZBgVs2iP6lq5qBoZAL0ZA7uZBGZBJcr1mvu9Ftvj67bbSpju5Ig8rNbFKvUcElLx0T7S4RYzvxHTGLcLoRGxZCQHHbqhxaJmVe');
                print_r($userProfile);
            }












            if(isset($_REQUEST['page']))
{
 
 $token = "EAADDccDBPtsBALNrDWjtbnUVtovIPcuHqGfHoT5p3IP0ReN3zbc2TwHjp3QzOZAuIMjINALdBw6UAi3CzaY6v2UfPYANMXxFc9u1wpMqZBbhgZAvoc9CZBRpUz5buPchl2bNMdrWxRA4iiMYr7e89GOxTSCIupxXybR8Pt5IOhpyeVfo6pzahAycIJAjlaijx6N6IQcX18a6ndTv7Sj9EsZBbR8wSeZAUZD"; // making app token by its id and secret
 
 $pageDetails = "2325078441038936"; // Get page details like name of page, page ID, Likes, people talking about that page.
 if(!isset($pageDetails->id))
 {
 echo "Error Occured please provide a valid facebook page unique id / unique name";
 exit;
 }
 $query = "SELECT * FROM pages where PageID='".$pageDetails->id."'"; // select page already in database or not query.
 $result = mysqli_query($connection,$query); // execute query
 $numResults = mysqli_num_rows($result); // number of records
 if($numResults>=1) // if page found in database then run update query
 {
 $Results = mysqli_fetch_array($result);
 mysqli_query($connection,"UPDATE `pages` SET `Name` = '".mysqli_real_escape_string($connection,$pageDetails->name)."',`Likes` = '".$pageDetails->fan_count."',`Talking` = '".$pageDetails->talking_about_count."' 
 WHERE `id` ='".$Results['id']."' LIMIT 1");
 }
 else // else run insert query for new page
 {
 mysqli_query($connection,"INSERT INTO `pages` ( `id` , `PageID` , `Name` , `Likes` , `Talking` )
 VALUES 
 (NULL , '".$pageDetails->id."', '".$pageDetails->name."', '".$pageDetails->fan_count."', '".$pageDetails->talking_about_count."')");
 }
 
 feedExtract("",$pageDetails->id,$token); // This function will get feed of page.
 header("Location: view.php");
 exit;
}
else
{
 header("Location: index.php");
 exit;
}
 
// Function to get all feed of a page with like, comment and share count.
function feedExtract($url="",$pageFBID) // $url contain url for next pages and $page contain page id
{
 global $token, $connection; // database connection and tocken required
 
 // first time fetch page posts
 $response = file_get_contents_curl("https://graph.facebook.com/v2.6/$pageFBID/feed?fields=picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)&access_token=".$token);
 
 $query = "SELECT id FROM pages where pageID='".$pageFBID."'"; // select feed already in database or not query.
 $result = mysqli_query($connection,$query); // execute query
 $fieldID = mysqli_fetch_row($result);
 $pageID = $fieldID['0'];
 // decode json data to array
 $get_data = json_decode($response,true);
 // loop extract data
 for($ic=0;$ic<count($get_data['data']);$ic++)
 {
 // Exracting Day, Month, Year
 $date = date_create($get_data['data'][$ic]['created_time']);
 $newDate = date_format($date,'Y-m-d H:i:s');
 
 
 // $story of post in if link, video or image it will return "message" plain status as "story"
 $story = $get_data['data'][$ic]['message'];
 
 if(!isset($story))
 $story = $get_data['data'][$ic]['story'];
 
 
 $query = "SELECT id FROM feed where PostID='".$get_data['data'][$ic]['id']."'"; // select page id from pages table.
 $result = mysqli_query($connection,$query); // execute query
 $numResults = mysqli_num_rows($result); // number of records
 if($numResults>=1) // if post found in database then run update query
 {
 //Update Record
 mysqli_query($connection,"update `feed` set 
 `Comments` = '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['comments']['summary']['total_count'])."' , 
 `Likes` = '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['likes']['summary']['total_count'])."', 
 `Shares` = '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['shares']['count'])."' 
 where `PostID` = '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['id'])."'");
 }
 else
 {
 
 // Puting data in sql query values
 $dataFeed = "(
 '".mysqli_real_escape_string($connection,$pageID)."', 
 '".mysqli_real_escape_string($connection,$newDate)."',
 '".mysqli_real_escape_string($connection,$story)."',
 '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['picture'])."',
 '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['comments']['summary']['total_count'])."',
 '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['likes']['summary']['total_count'])."',
 '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['shares']['count'])."',
 '".mysqli_real_escape_string($connection,$get_data['data'][$ic]['id'])."')";
 
 mysqli_query($connection,"INSERT INTO `feed` (`PageID` , `Date` , `Post` , `Picture` , `Comments` , `Likes` , `Shares` , `PostID` ) VALUES $dataFeed");
 }
 }
 
 // Return message.
 return 1;
}
 
function getFacebookId($pageID) // This function return facebook page details by its url
{
 // get token from main file
 global $token; 
 $json = file_get_contents_curl('https://graph.facebook.com/'.$pageID.'?fields=fan_count,talking_about_count,name&access_token='.$token); 
 // decode returned json data in arrau.
 $json = json_decode($json);
 return $json;
}
	


