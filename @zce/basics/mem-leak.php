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
    
    public Features $featureResults;
    
    public function __construct(string $type) {
        $this->types [] = $type;
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
    }
    
    public function __toString() {
        return 'Please append "->pipelines"';
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
}

class FeatureExtraction extends Features
{
    public function __construct() {
        parent::__construct('extraction');
    }
}

$featureSelection = new FeatureSelection();

$featureSelection->addPipeline('Quantity');
$featureSelection->addPipeline('Sales');

echo "\n\n"; 

echo $featureSelection->pipelines->pipeline[0];

echo "\n\n";