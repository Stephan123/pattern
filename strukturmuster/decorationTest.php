<?php
    // Interface, das sowohl die Dekorierer als auch die konkrete Komponente einbinden
    // So brauchen sich Klassen "außerhalb" dieses Decorator-Patterns nicht darum kümmern,
    // das es Dekorierer gibt, sondern rufen (hier) einfach getString() auf bzw. prüfen auf
    // das Interface ISanitizeable
    interface ISanitizeable {
        public function getString();
    }

    // Konkrete Komponente
    class SanitizeableString implements ISanitizeable {
        private $str;
        public function __construct($str) {
            $this->str = $str;
        }

        public function getString() {
            return $this->str;
        }
    }

    // Oberklasse aller Dekorierer
    abstract class SanitizedStringDecorator implements ISanitizeable {
        private $str;
        public function __construct(ISanitizeable $str) {
            $this->str = $str;
        }

        public function getString() {
            return $this->str->getString();
        }
    }

    // Dekorierer, der ein trim() auf den String ausführt
    class TrimmedString extends SanitizedStringDecorator {
        public function getString() {
            return trim(parent::getString());
        }
    }

    // Dekorierer, der HTML-Zeichen im String encoded
    class EncodeHtml extends SanitizedStringDecorator {
        public function getString() {
            return htmlentities(parent::getString(), ENT_QUOTES, 'UTF-8');
        }
    }

    // Dekorierer, der alle Zeichen entfernt, die nicht im Bereich a bis z liegen
    class OnlyAtoZ extends SanitizedStringDecorator {
        public function getString() {
            return preg_replace('/[^a-zA-Z]/', '', parent::getString());
        }
    }


    // Undekorierter String
    $str1 = new SanitizeableString('Ein Beispielsatz.');
    var_dump($str1->getString());

    // String mit trim()
    $str2 = new TrimmedString(new SanitizeableString('      Ein Beispielsatz.    '));
    var_dump($str2->getString());

    // String mit codierten HTML-Zeichen
    $str3 = new EncodeHtml(new SanitizeableString('   Das ist ein <b>Test!</b>   '));
    var_dump($str3->getString());

    // String mit codierten HTML-Zeichen, nur Zeichen aus dem Bereich a-z und trim()
    // aus "   <>   "
    // wird "   &lt;&gt;   " (EncodeHtml)
    // daraus wiederum "   ltgt   " (OnlyAtoZ)
    // und schließlich "ltgt" (TrimmedString)
    $str4 = new TrimmedString(new OnlyAtoZ(new EncodeHtml(new SanitizeableString('   <>   '))));
    var_dump($str4->getString());
?>