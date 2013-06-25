<?php
namespace de\phpdesignpatterns\exceptions;

class MilageLimitExceededException extends \Exception {
    protected $limit = null;
    protected $exceeded = null;

    public function __construct($limit, $exceeded) {
        $this->limit = $limit;
        $this->exceeded = $exceeded;
        $this->message = "Sie wollten das Limit von {$this->limit}km".
                         " um {$this->exceeded}km �berschreiten.";
    }

    public function getLimit() {
        return $this->limit;
    }

    public function getExceeded() {
        return $this->exceeded;
    }
}
?>