<?php

use App\Article;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase{
    protected $article;

    public function setUp(): void
    {
        $this->article = new App\Article;
    }

    public function testTitleIsEmptyByDefault(){
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle(){
        $this->assertSame($this->article->getSlug(), "");
    }

//    public function testSlugHasSpacesReplacedByUnderscores(){
//        $this->article->title = "An example article";
//
//        $this->assertEquals("An_example_article", $this->article->getSlug());
//    }
//
//    public function testSlugHasWhitespaceReplacedBySingleUnderscore(){
//        $this->article->title = "An   example  \n  article";
//
//        $this->assertEquals("An_example_article", $this->article->getSlug());
//    }
//
//    public function testSlugDoesNotStartOrEndWithAnUnderscore(){
//        $this->article->title = " An example article ";
//
//        $this->assertEquals("An_example_article", $this->article->getSlug());
//    }
//
//    public function testSlugDoesNotHaveAnyNonWordCharacters(){
//        $this->article->title = " Read! This! Now! ";
//
//        $this->assertEquals("Read_This_Now", $this->article->getSlug());
//    }

    public static function titleProvider(){
        return [
            'Slug Has Spaces Replaced By Underscores' =>
                ["An example article", "An_example_article"],
            'Slug Has Whitespace Replaced By Single Underscore' =>
                ["An   example   \n    article", "An_example_article"],
            'Slug Does Not Start Or End With An Underscore' =>
                [" An example article ", "An_example_article"],
            'Slug Does Not Have Any Non Word Characters' =>
                ["Read! This! Now! ", "Read_This_Now"]
        ];
    }

    /**
     * @dataProvider titleProvider
     */
    public function testSlug($title, $slug){
        $this->article->title = $title;

        $this->assertEquals($this->article->getSlug(), $slug);
    }
}