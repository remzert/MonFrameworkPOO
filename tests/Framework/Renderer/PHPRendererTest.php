<?php

namespace Tests\Framework\Renderer;

use Framework\Renderer;
use PHPUnit\Framework\TestCase;

Class PHPRendererTest extends TestCase
{
    
    private $renderer;
    
    public function setUp(){
        $this->renderer = new Renderer\PHPRenderer(__DIR__ . '/views');
        
    }
    
    public function testRenderTheRightPath() {
        $this->renderer->addPath('blog', __DIR__ . '/views');
        $content = $this->renderer->render('@blog/demo');
        $this->assertEquals('Salut les gens', $content);
    }
    
    public function testRenderTheDefaultPath() {
        
        $content = $this->renderer->render('demo');
        $this->assertEquals('Salut les gens', $content); 
    }
    
    public function testRenderWithParams() {
        $content = $this->renderer->render('demoparams', ['nom' => 'Remy']);
        $this->assertEquals('Salut Remy', $content); 
    }
    
    public function testGlobalParameters() {
        $this->renderer->addGlobal('nom', 'Remy');
        $content = $this->renderer->render('demoparams');
        $this->assertEquals('Salut Remy', $content); 
    }
    
    
}


