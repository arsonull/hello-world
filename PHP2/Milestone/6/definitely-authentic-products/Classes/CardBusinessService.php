<?php
//echo "BusinessService.php loaded <br>";
require "CardDataService.php";
?>
<?php
class cardBusinessService{

    function __construct(){
        //echo "new business service<br>";
    }
    function fetchCards(){
        //echo "searchByFirstName<br>";

        $service = new CardDataService();
        return $service->findAllCards();
    }
    function deleteCard($id){
        $service = new UserDataService();
        return $service->removeCard($id);
    }
}
?>