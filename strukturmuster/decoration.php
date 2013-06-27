<?php

/**
 * Class Book
 *
 * Stammklasse die dekoriert werden soll
 */
class Book
{
    private $author;
    private $title;

    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }

    function getAuthor() {
        return $this->author;
    }

    function getTitle() {
        return $this->title;
    }

    function getAuthorAndTitle() {
      return $this->getTitle().' by '.$this->getAuthor();
    }
}

/**
 * Buch Dekorierer
 *
 * Class BookTitleDecorator
 */
class BookTitleDecorator
{
    protected $book;
    protected $title;

    public function __construct(Book $book_in) {
        $this->book = $book_in;
        $this->resetTitle();
    }

    //doing this so original object is not altered
    function resetTitle() {
        $this->title = $this->book->getTitle();
    }

    function showTitle() {
        return $this->title;
    }
}

/**
 * Erste Variante der Dekoration
 *
 * Class BookTitleExclaimDecorator
 */
class BookTitleExclaimDecorator extends BookTitleDecorator
{
    private $btd;

    public function __construct(BookTitleDecorator $btd_in)
    {
        $this->btd = $btd_in;
    }

    function exclaimTitle() {
        $this->btd->title = "!" . $this->btd->title . "!";
    }
}

/**
 * Zweite Variante der Dekoration
 *
 * Class BookTitleStarDecorator
 */
class BookTitleStarDecorator extends BookTitleDecorator
{
    private $btd;

    public function __construct(BookTitleDecorator $btd_in) {
        $this->btd = $btd_in;
    }

    function starTitle() {
        $this->btd->title = Str_replace(" ","*",$this->btd->title);
    }
}

// ******* Befehlsfolgen ******************

    // zu verändernde Stammklasse
    $patternBook = new Book('Gamma, Helm, Johnson, and Vlissides', 'Design Patterns');

    // Übergabe der Stammklasse an den Dekorierer
    $decorator = new BookTitleDecorator($patternBook);

    // Übergabe des Dokorierer an Variante 1
    $starDecorator = new BookTitleStarDecorator($decorator);

    // Übergabe des Dokorierer an Variante 2
    $exclaimDecorator = new BookTitleExclaimDecorator($decorator);

// ****** Ausgabe der Werte ****************

    writeln('BEGIN TESTING DECORATOR PATTERN');
    writeln('');

    writeln('showing title : ');
    writeln($decorator->showTitle());
    writeln('');

    writeln('showing title after two exclaims added : ');
    $exclaimDecorator->exclaimTitle();
    $exclaimDecorator->exclaimTitle();
    writeln($decorator->showTitle());
    writeln('');

    writeln('showing title after star added : ');
    $starDecorator->starTitle();
    writeln($decorator->showTitle());
    writeln('');

    writeln('showing title after reset: ');
    writeln($decorator->resetTitle());
    writeln($decorator->showTitle());
    writeln('');

    writeln('END TESTING DECORATOR PATTERN');

    function writeln($line_in)
    {
    echo $line_in."<br/>";
    }

?>