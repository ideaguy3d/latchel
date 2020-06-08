<?php
/**
 * Created by PhpStorm.
 * User: julius hernandez alvarado
 * Date: 6/5/2020
 * Time: 5:48 PM
 */

class Bob
{
    private object $bobReplies;
    
    public function __construct() {
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
        $this->bobReplies = new class() {
            public string $sure = 'Sure.';
            public string $whoa = 'Whoa, chill out!';
            public string $calm = 'Calm down, I know what I\'m doing!';
            public string $fine = 'Fine. Be that way!';
            public string $what = 'Whatever.';
        };
        
    }
    
    public function respondTo(string $interaction): string {
        $pattern = new class() {
            public string $question = '/[\w:)]+\s?\?\W*$/';
            public string $lowercase = '/[a-z]/';
            public string $lowercaseOrNumbers = '/[a-z1-9]/';
            public string $uppercase = '/[A-Z]/';
            public string $letters = '/[a-zA-Z]/';
        };
        
        // must contain question mark at the end
        // must not be all uppercase
        // letters are optional
        $question = function() use ($pattern, $interaction): bool {
            $isQuestion = 1 === preg_match($pattern->question, $interaction);
            $hasOneLowerCase = 1 === preg_match($pattern->lowercase, $interaction);
            $hasNoUpperCase = 1 !== preg_match($pattern->uppercase, $interaction);
            if(
                ($isQuestion && $hasOneLowerCase) ||
                ($isQuestion && $hasNoUpperCase)
            ) {
                return true;
            }
            return false;
        };
        
        // must be all uppercase
        // must contain "?"
        $yellingQuestion = function() use ($pattern, $interaction): bool {
            if(
                strpos($interaction, '?') !== false &&
                1 !== preg_match($pattern->lowercase, $interaction)
            ) {
                return true;
            }
            return false;
        };
        
        // must be all upper case
        // must have a letter
        // "!" is optional
        $yelling = function() use ($pattern, $interaction): bool {
            if(
                1 === preg_match($pattern->uppercase, $interaction) &&
                1 !== preg_match($pattern->lowercase, $interaction)
            ) {
                return true;
            }
            return false;
        };
        
        $notSayingAnything = function() use ($pattern, $interaction): bool {
            //$pattern->letters
            if(1 !== preg_match('/\w/', $interaction)) {
                return true;
            }
            return false;
        };
        
        if($question()) {
            return $this->bobReplies->sure;
        }
        else if($yellingQuestion()) {
            return $this->bobReplies->calm;
        }
        else if($yelling()) {
            return $this->bobReplies->whoa;
        }
        else if($notSayingAnything()) {
            return $this->bobReplies->fine;
        }
        else {
            return $this->bobReplies->what;
        }
    }
}
