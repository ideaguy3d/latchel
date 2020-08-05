<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 8/4/2020
 * Time: 3:01 PM
 */

namespace zce\oop\features;

class Features
{
    public self $pipelines;
    
    public array $pipeline;
    
    // 'metrics', 'dimensions'
    private array $types;
    
    protected array $bigData;
    
    public Features $featureResults;
    
    public function __construct(string $type) {
        $this->types [] = $type;
        
        foreach($this->types as $type) {
            // create a 200MB array
            for($i=0; $i <= 400_000; $i++) {
                $this->bigData [] = [
                    "$type cluster reduce",
                    "$type training set computation",
                    [0,1,0,1],
                    [1,0,1,0]
                ];
            }
        }
        
        // This probably creates a memory leak if unset()
        $this->pipelines = $this;
    }
    
    public function getPipelines(): string {
        return var_export($this->pipelines, true);
    }
    
    protected function refreshPipelines() {
         /*
            -- will invoke ctor, which re-inits the obj from scratch --
            $this->pipelines = new $this;
         */
        
        unset($this->pipelines);
        $this->pipelines = clone $this;
        foreach($this->pipelines as $prop => $value) {
            if('pipeline' !== $prop) unset($this->pipelines->$prop);
        }
    }
    
    public function __toString() {
        return 'Please append "->pipelines"';
    }
    
    public function __unset($name) {
        unset($this->bigData);
        unset($this->pipelines);
        echo "\n_> Freeing memory from buffer\n";
    }
}

class FeatureSelection extends Features
{
    public array $pipeline;
    
    public int $pipelinesCount;
    
    public function __construct() {
        parent::__construct('selection');
    }
    
    public function addPipeline(string $pipeline): void {
        $this->pipeline [] = $pipeline;
        $this->refreshPipelines();
    }
    
    public function __toString() {
        return 'Please append "->pipelines"';
    }
    
    public function freeMemory() {
        $this->bigData = [];
        unset($this->bigData);
        unset($this->pipelines);
        echo "\n_> Freeing memory from buffer\n";
    }
}

class FeatureExtraction extends Features
{
    public function __construct() {
        parent::__construct('extraction');
    }
}

$featureSelection = new FeatureSelection();
$buildPipeline = false;


echo "\n\n";

if($buildPipeline) {
    $featureSelection->addPipeline('Quantity');
    $featureSelection->addPipeline('Sales');
    
    echo $featureSelection->pipelines->pipeline[0];
    echo $featureSelection->pipelines->pipeline[1];
}
else {
    // This begins the memory leak, but it's not even noticeable
    $featureSelection->freeMemory();
    unset($featureSelection);
}



echo "\n\n";