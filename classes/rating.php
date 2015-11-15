<?php


class rating {
    private $rating;
    
    public function _construct($rat){
        $rating = $rat;
    }
    
    public function getRating(){
        return $this->rating;
    }
    
    public function setNewRating($newRat){
    $this->rating = (getRating() + $newRat)/2.0;
    }
}
