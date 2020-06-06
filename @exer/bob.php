<?php
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 6/5/2020
 * Time: 5:48 PM
 */

class Bob
{
    private array $bobReplies;
    
    public function __construct() {
        $this->bobReplies = [
            'sure' => 'Sure.',
            'whoa' => 'Whoa, chill out!',
            'calm' => "Calm down, I know what I'm doing!",
            'fine' => 'Fine. Be that way!',
            'what' => 'Whatever.',
        ];
    }
    
    public function respondTo(string $response) {
    
    }
    
    private function interactionType(string $interaction) {
        /*
            if question: // contains '?' at the end of sentence
                'Sure.'
            else if yelling: // all caps or '!'
                'Whoa, chill out!'
            else if yelling question: // all caps & '?'
                'Calm down, I know what I'm doing!'
            else if saying nothing: // no alphanumeric chars or empty
                'Fine. Be that way!'
            else:
                'Whatever.'
        */
        $questionLambda = function() {
        
        };
        
        $yellingLambda = function() {
        
        };
        $question = '/\w+\?\W/';
        $yelling = '/[A-Z!]/';
        $yellingQuestion = '/[A-Z?]/';
        $sayingNothing = '';
        
        if(preg_match($question, $interaction)) {
            return $this->bobReplies['sure'];
        }
        else if($yellingLambda()) {
            return '';
        }
        else {
            return $this->bobReplies['what']; 
        }
    }
}